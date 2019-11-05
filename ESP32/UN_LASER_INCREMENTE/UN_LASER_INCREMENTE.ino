#include <WiFi.h>
#include <HTTPClient.h>

/*
  1 LASERS SUR UNE CARTE POUR COMPTER 
  LES ENTREES DANS UNE SEULE PORTE
*/

// Network credentials
const char* ssid = "WiFi-2.4-AA4C";
const char* password = "";
//const char* ssid = "VOO-540128";
//const char* password = "";
const char* serverName = "http://peopleflux.gauthierbohyn.com/post-esp-data.php";
String apiKeyValue = "12mAT5Ab3j7F9";
boolean vrai = 0;  // VALEUR PRECEDENTE DU LASER AU COMPTEUR

void setup() {
  Serial.begin(115200);
  pinMode(18, INPUT);  // RECEPTEUR LASER ENTRÉE
  pinMode(21, OUTPUT); // LED 
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}
void ledBlink(int x){
  int i;
  for(i=0;i<x;i++){
    digitalWrite(21, HIGH);
    delay(200);
    digitalWrite(21, LOW);
    delay(100);
  }
}
int incremente(){
  int valeur = (digitalRead(18)); // VALEUR RECEPTEUR LASER
  if(valeur == 0 && vrai == 1){
    vrai = 0;
    ledBlink(1);
    return 1;
  }
  else if(valeur == 1){
    vrai = 1;
    return 0;
  }
}
void loop() {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    // Domain name with URL path
    http.begin(serverName);
    
    // Content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&id_stage=" + "1"
                          + "&nbr_entree=" + "1";
    
    // Send HTTP POST request
    if(incremente() == 1){
      int httpResponseCode = http.POST(httpRequestData);
      Serial.print("httpRequestData: ");
      Serial.println(httpRequestData);
      delay(500);
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      if(httpResponseCode!=200){
        ledBlink(3);
      }
    }
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
    ledBlink(2);
  } 
}
