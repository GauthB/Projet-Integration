#include <WiFi.h>
#include <HTTPClient.h>

/*
  2 LASERS SUR UNE SEULE CARTE POUR COMPTER 
  LES ENTREES/SORTIES DANS UNE SEULE PORTE
*/
// Network credentials
const char* ssid = "LAPTOP-QUU5U7G9 5473";
const char* password = "8440<4Dq";

String scene = "11";

const char* serverName = "http://peopleflux.gauthierbohyn.com/post-esp-data.php";
String apiKeyValue = "12mAT5Ab3j7F9";

boolean prev1 = 0; // Valeur précédente du recepteur 1
boolean prev2 = 0; // Valeur précédente du recepteur 2

void setup(){                
  Serial.begin(115200); // Vitesse du taux de donnée
  pinMode(19, INPUT);  // Recepteur 1 en mode input
  pinMode(23, INPUT);  // Recepteur 2 en mode input
  pinMode(21, OUTPUT); // LED bleu en mode output
  pinMode(18, OUTPUT); // LED rouge en mode output
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
    ledBlink(2,18);
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  ledBlink(3,21);
  Serial.println(WiFi.localIP());
}
void ledBlink(int x, int y){ // Clignotement LED
  int i;
  for(i=0;i<x;i++){       
    digitalWrite(y, HIGH); // Allume led
    delay(200);            // Attend 0.2s
    digitalWrite(y, LOW);  // Eteint led
    delay(100);            // Attend 0.1s
  }
}

int laser1(){                     // Retourne 1 quand le laser est coupé
  int valeur = (digitalRead(19)); // Valeur recue au recepteur 1
    if(valeur==0 && prev1==1){  // Verifie que le laser soit coupé
      prev1 = 0;  
        if(laser2() < laser1() && laser2()== 0){ // Si le laser 1 est coupé avant le laser 2
          ledBlink(1,21);        // LED clignote
          Serial.println("Entre");
          delay(1000);           // On attend 1.0s 
          return 1;              // On renvoit 1 pour dire qu'une personne entre
        }   
    }
    if(valeur==1){               // Le laser n'est pas coupé
      prev1 = 1;                 // On remet la var precedente a 1 pour ne pas rentrer dans la premiere condition
      return 0;                  // On renvoit 0 pour dire que personne ne passe
    }
}
int laser2(){                     // Retourne 1 quand le laser est coupé
  int valeur = (digitalRead(23)); // Valeur recue au recepteur 2
    if(valeur==0 && prev2==1){  // Verifie que le laser soit coupé
      prev2 = 0;
        if(laser1() < laser2()  && laser1()== 0){ // Si le laser 2 est coupé avant le laser 1
          ledBlink(1,18);        // LED clignote
          Serial.println("Sort");
          delay(1000);           // On attend 1.0s
          return 1;              // On renvoit 1 pour dire qu'une personne entre
        }
    }
    if(valeur==1){               // Le laser n'est pas coupé
      prev2 = 1;                 // On remet la var precedente a 1 pour ne pas rentrer dans la premiere condition
      return 0;                  // On renvoit 0 pour dire que personne ne passe
    }
}

void loop(){

  if(WiFi.status()== WL_CONNECTED){ //Check WiFi connection status
    HTTPClient http;
    http.begin(serverName); // Domain name with URL path
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Content-type header
    
    // Prepare your HTTP POST request data
    String httpRequestDataE = "api_key=" + apiKeyValue + "&id_stage=" + scene
                          + "&nbr_entree=" + "1";
    String httpRequestDataS = "api_key=" + apiKeyValue + "&id_stage=" + scene
                          + "&nbr_sortie=" + "1";
                          
    // Send HTTP POST request
    if(laser1() == 1){
      int httpResponseCode = http.POST(httpRequestDataE);
      Serial.print("httpRequestData: ");
      Serial.println(httpRequestDataE);
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
        ledBlink(3,18); // Code d'erreur
      }
    }
    if(laser2() == 1){
      int httpResponseCode = http.POST(httpRequestDataS);
      Serial.print("httpRequestData: ");
      Serial.println(httpRequestDataS);
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
        ledBlink(3,18); // Code d'erreur
      }
    }
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
    ledBlink(2,18); // Code d'erreur
  } 
  
}
