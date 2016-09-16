from info import *
import json,sys
# check arguments
if not len(sys.argv)==2:
    # invalid data size
    print json.dumps({"state":invalidArgumentsCode,"message":"invalid arguments number"})
else:
    # get data
    pinNumber=int(sys.argv[1])
    
    # create pin and set mode
    try:
        from Gpio import *
        pin=Pin(pinNumber)
        pin.setMode(INPUT)
        state=pin.readState() 
        print json.dumps({"state":okCode,"message":"State read","state":str(state)})
    except Exception as exception:
        print json.dumps({"state":exceptionCode,"message":exception})