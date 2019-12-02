#include <WiFi.h>
#include <HTTPClient.h>

/*
  2 LASERS SUR UNE SEULE CARTE POUR COMPTER 
  LES ENTREES/SORTIES DANS UNE SEULE PORTE
*/

boolean compt1 = 0;
boolean compt2 = 0;// VALEUR PRECEDENTE DU LASER AU COMPTEUR

void setup(){                
  Serial.begin(115200);
  pinMode(19, INPUT);  // RECEPTEUR LASER 1
  pinMode(23, INPUT);  // RECEPTEUR LASER 2
  pinMode(21, OUTPUT); // LED bleu
  pinMode(18, OUTPUT); // LED rouge
}
void ledBlink(int x, int y){
  int i;
  for(i=0;i<x;i++){
    digitalWrite(y, HIGH);
    delay(200);
    digitalWrite(y, LOW);
    delay(100);
  }
}

int laser1(){ // Retourne 1 quand le laser est coupé
  int valeur = (digitalRead(19)); // VALEUR RECEPTEUR LASER
    if(valeur==0 && compt1 == 1){
      compt1 = 0;  
        if(laser2() < laser1()){
          ledBlink(1,18);
          Serial.println("Entre");
          delay(1000);
        }   
      return 1;
    }
    if(valeur == 1){
      compt1 = 1;
      return 0;
    }
}
int laser2(){
  int valeur = (digitalRead(23)); // VALEUR RECEPTEUR LASER
    if(valeur == 0 && compt2 == 1){
      compt2 = 0;
        if(laser1() < laser2()){
          ledBlink(1,21);
          Serial.println("Sort");
          delay(1000);
        }
      return 1;
    }
    if(valeur == 1){
      compt2 = 1;
      return 0;
    }
}

void loop(){
  laser1();
  laser2();
}
