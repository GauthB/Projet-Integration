/*
  1 LASERS SUR UNE CARTE POUR COMPTER 
  LES SORTIES DANS UNE SEULE PORTE
*/

int compt = 0;  // VALEUR PRECEDENTE DU LASER AU COMPTEUR

void setup(){                
  Serial.begin(9600);
  pinMode(13, OUTPUT); // EMETTEUR LASER ENTRÉE
  pinMode(12, INPUT);  // RECEPTEUR LASER ENTRÉE
  //pinMode(26, OUTPUT); // EMETTEUR LASER SORTIE
  //pinMode(25, INPUT);  // RECEPTEUR LASER SORTIE
  pinMode(27, OUTPUT); // LED 
  pinMode(33, OUTPUT); // Bouton retour a zero
  pinMode(32, INPUT);  // Bouton retour a zero
}
int increment(){
  int valeur = (digitalRead(12)); // VALEUR RECEPTEUR LASER
  digitalWrite(13, HIGH); // EMETTEUR LASER
  if(valeur==1 && compt == 1){
    compt = 0;
    digitalWrite(27, HIGH);
    delay(200);
    digitalWrite(27, LOW);
    Serial.println(1);
    return 1;
  }
  else if(valeur == 0){
    compt = 1;
    delay(300);
  }
}
void loop(){   
  increment();
}
