import time
import requests
import MySQLdb

addr = 'https://maker.ifttt.com/trigger/CO_error/with/key/cYL5P85pTMkV2BNfYd0ZVA' 

while True:
    try:
        conn = MySQLdb.connect(host = "localhost", user = "admin", passwd = "admin", db = "iot_test", charset = "utf8") 
        print('a')
        cursor = conn.cursor()
        sql = "SELECT * FROM test ORDER BY id DESC"
        cursor.execute(sql)
        
        table = cursor.fetchone()
        
        if table[3] > 100:
            requests.post(addr, params = {'value1': table[3], 'value2': table[1], 'value3': table[2]}) 
        
        print(table)
        conn.close()
        time.sleep(30) 
            
    except MySQLdb.Error as e: 
        print(e)
        print('cannot connect to sql');

    except KeyboardInterrupt:
        print('exit')
