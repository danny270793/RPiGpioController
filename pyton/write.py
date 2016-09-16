import json,sys
# check arguments
if not len(sys.argv)==3:
    # invalid data size
    print json.dumps({"state":invalidArgumentsCode,"message":"invalid arguments number"})
else:
    # get data
    pinNumber=int(sys.argv[1])
    mode=sys.argv[2]
    
    # create pin and set mode
    try:
        from Gpio import *
        pin=Pin(pinNumber)
        pin.setMode(OUTPUT)
        if mode=='high':
            pin.setState(pin.HIGH)
            print json.dumps({"state":okCode,"message":"Pin set to high correctly"})
        if mode=='low':
            pin.setState(pin.LOW)
            print json.dumps({"state":okCode,"message":"Pin set to low correctly"})
    except Exception as exception:
        print json.dumps({"state":exceptionCode,"message":exception})