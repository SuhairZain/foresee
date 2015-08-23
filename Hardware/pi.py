import serial
import urllib,urllib2
import time
import string

## import RPi.GPIO as GPIO
## GPIO.setmode(GPIO.BOARD)

print 'Initialization'
ser = serial.Serial('/dev/ttyACM0', 9600)
i=0
t=[700,700,700]

print 'Loop Engage'
while True:
    print 'Loop Point 1'
    tem=ser.readline()
    tem=tem.split('\\')
    t[i]=tem[0]
    t[i]=int(t[i])
    print 'Loop Point 2'
    j=i
    i=i+1
    if (j==2):
        print 'Inside IF'
        tot=(t[0]+t[1]+t[2])/3
        print tot
        tot=((36*15*50)/(1000*tot))
        print tot
        url = "http://krsh.colorowebs.com/speedsense/update_traffic_data.php?location=2&speed=43"
        urllib2.urlopen(url).read()
        print 'Push 1 Complete'
        url = "http://krsh.colorowebs.com/speedsense/update_traffic_data.php?location=1&speed="+str(tot)
        urllib2.urlopen(url).read()
        print 'Push 2 Complete'
        i=0

    ## GPIO.cleanup()
