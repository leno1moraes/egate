

////////////////////////////////////////////////////
//////////////Variaveis Globais/////////////////////
////////////////////////////////////////////////////



////////////////////////////////////////////////////
/////////// Ouvir acesso de entrada ////////////////
////////////////////////////////////////////////////
//////////////////app_mqtt.js///////////////////////
////////////////////////////////////////////////////
var mqtt = require('mqtt');
var Topic = '#'; //subscribe to all topics
var Broker_URL = 'mqtt://127.0.0.1';
var Database_URL = '127.0.0.1';

var options = {
	clientId: 'MyMQTT',
	port: 1883,
	//username: 'mqtt_user',
	//password: 'mqtt_password',	
	keepalive : 60
};

var client  = mqtt.connect(Broker_URL, options);

client.on('connect', mqtt_connect);
client.on('reconnect', mqtt_reconnect);
client.on('error', mqtt_error);
client.on('message', mqtt_messsageReceived);
client.on('close', mqtt_close);

function mqtt_connect()
{
    console.log("Connecting MQTT");
    client.subscribe(Topic, mqtt_subscribe);
}

function mqtt_subscribe(err, granted)
{
    console.log("Subscribed to " + Topic);
    if (err){
		console.log(err);
	}
}

function mqtt_reconnect(err)
{
    console.log("Reconnect MQTT");
    if (err){
		console.log(err);
	}
	client  = mqtt.connect(Broker_URL, options);
}

function mqtt_error(err)
{
    /*console.log("Error!");
	if (err){
		console.log(err);
	}*/
}

function after_publish()
{
	//do nothing
}

function mqtt_close()
{
	console.log("Close MQTT");
}

function mqtt_messsageReceived(topic, message, packet)
{
	var message_str = message.toString();
	message_str = message_str.replace(/\n$/, '');
	if (countInstances(message_str) != 1) {
		console.log("Invalid payload");
		//var msgRetorno = "Invalid payload";
		
	} else {	
		tratar_mensagem(topic, message_str, packet);
	}
}

var delimiter = ",";
function countInstances(message_str) {
	var substrings = message_str.split(delimiter);
	return substrings.length - 1;
};

////////////////////////////////////////////////////
///////////////////// MYSQL ////////////////////////
////////////////////////////////////////////////////
////////////////////////////////////////////////////
////////////////////////////////////////////////////
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

function  tratar_mensagem(topic, message_str, packet){	
	
	var message_arr = extract_string(message_str); //split a string into an array
	var clientID= message_arr[0];
	var message = message_arr[1];	
	var sql = "call sp_registrygate_save (?, ?);";	
	var params = [clientID, message];	
	sql = mysql.format(sql, params);
	
	/*
	clientID = FR69TGA55 -- catraca para ENTRAR
	clientID = YU70YHS60 -- catraca para SAIR
	*/
		
	connection.query(sql, function (error, results) {
		if (!error) {
			
			var sqlb = "SELECT desmessage FROM tb_registrygate WHERE id = (SELECT MAX(id) FROM tb_registrygate)";			
			connection.query(sqlb, function (errorb, resultsb) {

				if (clientID == "FR69TGA55") {
					message = message + " - Resultado: " + resultsb[0].desmessage;
					publishGateIn(topic, clientID, message);
					
				}
				
				if (clientID == "YU70YHS60") {
					message = message + " - Resultado: " + resultsb[0].desmessage;
					publishGateOut(topic, clientID, message);
					
				}			
			
			});		
			
		}else{
			throw error;
			
		}
		
	});
	
}

function extract_string(message_str) {
	var message_arr = message_str.split(","); //convert to array	
	return message_arr;
};	

////////////////////////////////////////////////////
///////////////// Publicacao MQTT //////////////////
////////////////////////////////////////////////////


var mqtt_send = require('mqtt');
var client_send_a = mqtt_send.connect('mqtt://127.0.0.1');
var client_send_b = mqtt_send.connect('mqtt://127.0.0.1');

function publishGateIn(ptopic, pclientID, pticket){
	
	var msg = "Cliente: " + pclientID + " - Mensagem: " + pticket;
	
	enviarEmailREsponsavel();
	
	client_send_a.publish(ptopic, msg);		
	
}

function publishGateOut(ptopic, pclientID, pticket){
	
	var msg ="Cliente: " + pclientID + " - Mensagem: " + pticket;
	
	enviarEmailREsponsavel();
	
	client_send_b.publish(ptopic, msg);	
	
}

function enviarEmailREsponsavel(){
	//href = 'http://egate.com/emailteste.php';
	
	var request = require('request');

	// Set the headers
	var headers = {
		'User-Agent':       'Super Agent/0.0.1',
		'Content-Type':     'application/x-www-form-urlencoded'
	}

	// Configure the request
	var options = {
		url: 'http://egate.com/emailteste.php'
		,method: 'GET'
		,headers: headers
		//,qs: {'key1': 'xxx', 'key2': 'yyy'}
	}

	// Start the request
	request(options, function (error, response, body) {
		
		if (!error && response.statusCode == 200) {
			//console.log(body);
			console.log("Executar com sucesso o arquivo do email");
			
		}else{
			console.log("Error ao executar o arquivo do email");
			
		}
	});
	
}















