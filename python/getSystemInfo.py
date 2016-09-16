import json,sys,os
osrelease=os.popen("cat /etc/os-release")
osprettyname=osrelease.readline().split("=")[1].split("\n")[0].replace("\"","")
osversion=os.popen("cat /proc/version")
ossplited=osversion.readline().split(" ")
arch=ossplited[0]+" "+ossplited[1]+" "+ossplited[2]
processor=os.popen("cat /proc/cpuinfo")
processor0=processor.readline()
model=processor.readline().split(": ")[1].replace("\n","")
import subprocess
# Return RAM information (unit=kb) in a list
# Index 0: total RAM
# Index 1: used RAM
# Index 2: free RAM
def getram():
    p = os.popen('free')
    i = 0
    while 1:
        i = i + 1
        line = p.readline()
        if i==2:
            return(line.split()[1:4])
# Return % of CPU used by user as a character string
def getcpuusage():
    return(str(os.popen("top -n1 | awk '/Cpu\(s\):/ {print $2}'").readline().strip()))
# Return information about disk space as a list (unit included)
# Index 0: total disk space
# Index 1: used disk space
# Index 2: remaining disk space
# Index 3: percentage of disk used
def getdiskusage():
    p = os.popen("df /")
    i = 0
    while 1:
        i = i +1
        line = p.readline()
        if i==2:
            return(line.split()[1:5])
# Return CPU temperature as a character string
def getcputemp():
    res = os.popen('vcgencmd measure_temp').readline()
    return(res.replace("temp=","").replace("'C\n",""))
# Returns cpu speed
def getcpuspeed():
    """Returns the current CPU speed"""
    f = os.popen("/opt/vc/bin/vcgencmd get_config arm_freq")
    cpu = f.read()
    return cpu
ram=getram()
usedram=ram[1]
freeram=ram[0]
disk=getdiskusage()
useddisk=disk[1]
freedisk=disk[0]
cpuusage=str(getcpuusage()+"%")
cpuspeed=getcpuspeed().replace("\n","")
cputemp=getcputemp()
from time import gmtime, strftime
print json.dumps({"state":1,"osname":osprettyname,"architecture":arch,"processor":model,"usedram":usedram,"freeram":freeram,"cpuusage":cpuusage,"useddisk":useddisk,"freedisk":freedisk,"cputemp":cputemp+"C","cpuspeed":cpuspeed,"time":strftime("%Y-%m-%d %H:%M:%S", gmtime())})
