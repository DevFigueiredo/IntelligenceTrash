#include <SPI.h>
#include <Ethernet.h>
#include <Ultrasonic.h>


byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};

IPAddress ip(192, 168, 1, 177);
IPAddress myDns(192, 168, 1, 1);
EthernetClient client;
char server[] = "8324210fb2a2.ngrok.io";  
//IPAddress server(64,131,82,241);

unsigned long lastConnectionTime = 0;           
const unsigned long postingInterval = 10*1000; 
float sensorU1 = 0;
float sensorU2 = 0;
float sensorU3 = 0;
float lixeira = 9;

#define TRIGGER_PIN_SENSOR1  7
#define ECHO_PIN_SENSOR1     6
#define TRIGGER_PIN_SENSOR2  35
#define ECHO_PIN_SENSOR2   31

Ultrasonic sensor1(TRIGGER_PIN_SENSOR1, ECHO_PIN_SENSOR1);
Ultrasonic sensor2(TRIGGER_PIN_SENSOR2, ECHO_PIN_SENSOR2);



void setup() {
  Serial.begin(9600);
  while (!Serial) {;}

  Serial.println("Ethernet Shield Inicializado no no IP:");
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Desculpe, tivemos problemas para configurar o seu endereço de IP");
    if (Ethernet.hardwareStatus() == EthernetNoHardware) {
      Serial.println("Desculpe, não conseguimos encontrar o seu EthernetShield, por favor verifique os pinos  e tente novamente:(");
      while (true) {
        delay(1);
        }
    }
    if (Ethernet.linkStatus() == LinkOFF) {
      Serial.println("Tive problemas para comunicar com seu Ethernet Shield, pode verificar se o cabo de rede está conectado ?.");
    }
    Ethernet.begin(mac, ip, myDns);
    Serial.print("Meu Endereço de IP: ");
    Serial.println(Ethernet.localIP());
  } else {
    Serial.print("Endereço de IP Definido:");
    Serial.println(Ethernet.localIP());
  }
  delay(1000);
}






















void loop() {
  
  long microsecSensor1 = sensor1.timing();
  long microsecSensor2 = sensor2.timing();

    Serial.println("Sensor1!"); 
  sensorU1 = sensor1.convert(microsecSensor1, Ultrasonic::CM);
    Serial.println(sensorU1); 
   
    Serial.println("Sensor2!"); 
  sensorU2 = sensor2.convert(microsecSensor2, Ultrasonic::CM);
    Serial.println(sensorU2); 

  
  if (millis() - lastConnectionTime > postingInterval) {
    
    EnviaInformacoesParaLixeira(sensorU1,sensorU2,10, lixeira);
  
  }

}







































void EnviaInformacoesParaLixeira(float sensorU1, float sensorU2, float sensorU3, int id_lixeira) {
  client.stop();

  if (client.connect(server, 80)) {
    Serial.println("Enviando Requisição...");
    client.print("POST http://8324210fb2a2.ngrok.io/trash/add/capacity");
    client.print("?id_trash=");
    client.print(9);
    client.print("&sensor1=");
    client.print(sensorU1);
    client.print("&sensor2=");
    client.print(sensorU2);
    client.print("&sensor3=");
    client.print(sensorU3);
    client.println(" HTTP/1.0");
    client.println("Connection: close");
    client.println();

    lastConnectionTime = millis();
    Serial.println("Enviado!"); }
    
    else {
    Serial.println("Hmm... A Conexão Falhou!");
  }
  
}
