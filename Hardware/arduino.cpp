int sensorpin1 = A0;
 int sensorpin2 = A1;
 int sensorvalue1 = 0;
 int sensorvalue2 = 0;
 int ledpin1 = 13;
 int ledpin2 = 12;
 int tim = 800;
 
void setup()
{
  Serial.begin(9600);
  pinMode(ledpin1,OUTPUT);
  pinMode(ledpin2,OUTPUT);
}

void loop()
{
  sensorvalue1 = analogRead(sensorpin1);
  if(sensorvalue1<20&&tim!=0)
   {
    tim=0;
    digitalWrite(ledpin1,HIGH);
    delay(300);
    digitalWrite(ledpin1,LOW);
    delay(300);
   }
   delay(100);
   tim++;
  sensorvalue2 = analogRead(sensorpin2);
  if(sensorvalue2<20)
   {
    Serial.println(tim);
    tim=800;
    digitalWrite(ledpin2,HIGH);
    delay(300);
    digitalWrite(ledpin2,LOW);
    delay(300);
   }
  //Serial.println(sensorvalue1);    //in case if u want to get IR raw values
  //delay(1);
  //Serial.println(sensorvalue2);    //in case if u want to get IR raw values
  //delay(1);
}