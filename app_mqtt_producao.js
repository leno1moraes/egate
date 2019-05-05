
//////////////////////////////////////////////////////////////////////////
///////////////////VARIAVEIS DE CONEXAO: mqtt/////////////////////////////
//////////////////////////////////////////////////////////////////////////
var mqtt = require('mqtt');
var Topic = '#'; //subscribe to all topics
var Broker_URL = 'mqtt://mybly.ddns.net';
var options = {
	clientId: 'MyMQTT',
	port: 1883,
	keepalive : 60
};
var client  = mqtt.connect(Broker_URL, options);
client.on('connect', mqtt_connect);
client.on('reconnect', mqtt_reconnect);
client.on('error', mqtt_error);
client.on('message', mqtt_messsageReceived);
client.on('close', mqtt_close);
//////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////
///////////////////VARIAVEIS DE CONEXAO: mysql////////////////////////////
//////////////////////////////////////////////////////////////////////////
var Database_URL = '127.0.0.1';
var mysql = require('mysql');
var connection = mysql.createConnection({
	host: Database_URL,
	user: "root",
	password: "1826rlp",
	database: "egatedatabase"
});
connection.connect(function(err) {
	if (err) throw err;
});
//////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////
///////////////////////////////////Mqtt///////////////////////////////////
//////////////////////////////////////////////////////////////////////////
function mqtt_connect()
{
    console.log("Connecting MQTT");
    client.subscribe(Topic, mqtt_subscribe);
}

function mqtt_subscribe(err, granted)
{
    console.log("Subscribed to " + Topic);
    if (err) {console.log(err);}
}

function mqtt_reconnect(err)
{
    console.log("Reconnect MQTT");
    if (err) {console.log(err);}
	client  = mqtt.connect(Broker_URL, options);
}

function mqtt_error(err)
{
    console.log("Error!");
	if (err) {console.log(err);}
}

function after_publish()
{
	//do nothing
}

function mqtt_messsageReceived(topic, message, packet)
{
	if (topic != "estadoPorta") {
		
		console.log('Topic=' +  topic + '  Message=' + message);
		
		
		if (topic == "acessoEntrada") {
			
			inserirTicket(topic, message);
			
			comandoCatraca(topic, message);
			
		}
		
	}
	
}

function mqtt_close()
{
	console.log("Close MQTT");
}


//////////////////////////////////////////////////////////////////////////
///////////////////////////////////MySQL//////////////////////////////////
//////////////////////////////////////////////////////////////////////////
function inserirTicket(topic, message)
{
	var sql = "call sp_insertticket_save (?);";	
	var params = [message];	
	sql = mysql.format(sql, params);
	
	connection.query(sql, function (error, results) {});	
	
}

function comandoCatraca(topic, message){
	
	var sql = "call sp_registrygate_save2 (?);";	
	var params = [message];	
	sql = mysql.format(sql, params);
	
	connection.query(sql, function (error, results) {
		
				
		console.log('Topic=' +  topic + '  Message=' + 'Passo na Procedure save');
		
			if (!error) {
				

					
					var sqlb = 	" SELECT d.desname, d.desemailnotice, a.data, a.desmessage "+
								" FROM tb_registrygate a "+
								" LEFT JOIN tb_action b ON a.iaction = b.id "+
								" LEFT JOIN tb_gate c ON a.gate = c.id "+
								" LEFT JOIN  tb_student d ON a.student = d.id "+
								" WHERE a.id = (SELECT MAX(e.id) FROM tb_registrygate e) and d.desid2 = (?)";
					var paramsb = [message];	
					sqlb = mysql.format(sqlb, paramsb)				
								
					connection.query(sqlb, function (errorb, resultsb) {					
						
						console.log('Topic=' +  topic + '  Message=' + resultsb.length);
						
						if (resultsb.length > 0)
						{
							publishGate(topic, resultsb[0].desmessage);
							publishOpenLock(topic, 'ABRE/'.concat(resultsb[0].desname));
														
							resultadomsg = "";
							
							if (resultsb[0].desmessage.substring(0,6) === "SAINDO") 
								resultadomsg = "SAIDA";
							else
								resultadomsg = "ENTRADA";
																			
							enviarEmailREsponsavel(resultsb[0].desname, resultsb[0].desemailnotice, resultsb[0].data, resultadomsg);
							
						}else{
							
							publishGate(topic, "ACESSONEGADO/Nao Vinculado");
							
						}
							
					
					});					
					

				
			}else{
				throw error;
				
			}
		
	});		
}


////////////////////////////////////////////////////
///////////////// Publicacao MQTT //////////////////
////////////////////////////////////////////////////
/*var mqtt_send = require('mqtt');
var client_send = mqtt_send.connect('mqtt://mybly.ddns.net');*/

function publishGate(topicEntrada, messageRetorno){
	
	client.publish('retornoEntrada', messageRetorno);
		
}

function publishOpenLock(topicLock, messageRetorno){
	
	client.publish('retornoEntrada', messageRetorno);
		
}


////////////////////////////////////////////////////
////////////////// ENVIAR E-MAIL ///////////////////
////////////////////////////////////////////////////
function enviarEmailREsponsavel(pdesname, pdesemailnotice, pdata, pdesmessage){
	
	var request = require('request');

	// Set the headers
	var headers = {
		'User-Agent':'Super Agent/0.0.1',
		'Content-Type':'application/x-www-form-urlencoded'
	}

	// Configure the request
	var options = {
		url: 'http://egate.com/emailsentserver.php'
		,method: 'GET'
		,headers: headers
		,qs: {'status': pdesmessage, 'estudante': pdesname, 'datareg': pdata, 'emailnotice': pdesemailnotice}
	}

	// Start the request
	request(options, function (error, response, body) {
		
		if (!error && response.statusCode == 200) {
			console.log("Sent e-mail Sucess");
			
		}else{
			console.log("Fail e-mail");
			
		}
	});
	
}

