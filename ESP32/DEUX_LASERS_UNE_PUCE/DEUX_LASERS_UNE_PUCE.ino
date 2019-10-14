/*
  2 LASERS SUR UNE SEULE CARTE POUR COMPTER 
  LES ENTREES/SORTIES DANS UNE SEULE PORTE
*/
boolean compt1 = 0;
boolean compt2 = 0;// VALEUR PRECEDENTE DU LASER AU COMPTEUR
boolean entre = 0;
boolean sort = 0;

void setup(){                
  Serial.begin(9600);
  pinMode(13, OUTPUT); // EMETTEUR LASER 1
  pinMode(12, INPUT);  // RECEPTEUR LASER 1
  pinMode(26, OUTPUT); // EMETTEUR LASER 2
  pinMode(25, INPUT);  // RECEPTEUR LASER 2
  pinMode(27, OUTPUT); // LED 
  pinMode(33, OUTPUT); // Bouton retour a zero
  pinMode(32, INPUT);  // Bouton retour a zero
  Serial.println("Debut du programme");
}
int laser1(){
  int valeur = (digitalRead(12)); // VALEUR RECEPTEUR LASER
  digitalWrite(13, HIGH); // EMETTEUR LASER
  if(valeur==1 && compt1 == 1){
    compt1 = 0;
    digitalWrite(27, HIGH);
    delay(200);
    digitalWrite(27, LOW);
    return 1;
  }
  else if(valeur == 0){
    compt1 = 1;
    delay(300);
    return 0;
  }
}
int laser2(){
  int valeur = (digitalRead(25)); // VALEUR RECEPTEUR LASER
  digitalWrite(26, HIGH); // EMETTEUR LASER
  if(valeur == 1 && compt2 == 1){
    compt2 = 0;
    digitalWrite(27, HIGH);
    delay(200);
    digitalWrite(27, LOW);
    return 1;
  }
  else if(valeur == 0){
    compt2 = 1;
    delay(300);
    return 0;
  }
}
void passage(){
  if(laser1() == 1 && laser2() == 0){
    entre = 1;
  }
  if(laser2() == 1 && entre == 1){
    Serial.println("Entre");
    entre = 0;
  }
  if(laser2() == 1 && laser1() == 0){
    sort = 1;
  }
  if(laser1() == 1 && sort == 1){
    Serial.println("Sort");
    sort = 0;
  }
}
void loop(){
  passage();  
}
