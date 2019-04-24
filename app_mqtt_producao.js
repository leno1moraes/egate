
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
		
		console.log('Topic=' +  topic + '  Message=' + message + '  Packet=' + packet);
		
		
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
				
				publishGate(topic, resultsb[0].desmessage);
			
			});				

			
		}else{
			throw error;
			
		}
		
	});		
}


////////////////////////////////////////////////////
///////////////// Publicacao MQTT //////////////////
////////////////////////////////////////////////////
var mqtt_send = require('mqtt');
var client_send = mqtt_send.connect('mqtt://mybly.ddns.net');

function publishGate(topicEntrada, messageRetorno){
	
	client_send.on('connect', function () {
		
	  //client_send.publish('retornoEntrada', messageRetorno)
	  client_send.publish('retornoEntrada', 'ENTRANDO/Leno')
	  
	});	
}

