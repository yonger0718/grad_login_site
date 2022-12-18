#include "DHT.h"
#include <SPI.h>
#include <RH_RF95.h>

#define DHTPIN 3 
#define DHTTYPE DHT11
//#define DHTTYPE DHT22   // DHT 22 如果用的是DHT22，就用這行
//#define DHTTYPE DHT21   // DHT 21
DHT dht(DHTPIN,DHTTYPE);
#define CO_In A0
const float CO_scalar=1;
const float CO_offset=0;

RH_RF95 rf95;
void setup()
{
  Serial.begin(9600);
  if(!rf95.init())
    Serial.println("init failed");
  Serial.println("DHTxx test!");
  
  dht.begin();  //初始化DHT
  
} // setup()

void loop()
{
  delay(30000);
  float h = dht.readHumidity();   //取得濕度
  float t = dht.readTemperature();  //取得溫度C
  dht.read(DHTPIN);
  float CO_Val = compensate(analogRead(CO_In),CO_scalar,CO_offset); //取得一氧化碳濃度
  String a="";
  a+=t;
  a+="', '";
  a+=h;
  a+="', '";
  a+=CO_Val;
  Serial.println(a);
  delay(1000);
  lorasend(a);
  delay(1000);
  //顯示在監控視窗裡
  
 
} // loop()
void lorasend(String d)
{
  
  int d1=d.length();
  uint8_t data[d1+1];
  for(int i=0;i<d1;i++){
    data[i]=d[i];
  }
  data[d1]=0;  
  rf95.send(data,sizeof(data));
  rf95.waitPacketSent();
 
  
} //透過lora傳送
float compensate(float raw, float scalar, float offset)
{
  return(scalar*raw + offset);
}
