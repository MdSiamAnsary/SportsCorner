#!J:/WinPython/WPy64-3740/python-3.7.4.amd64/python

from soccer_data_api import SoccerDataAPI
import os

soccer_data = SoccerDataAPI()

if os.path.exists("txt_bundesliga.txt"):
    os.remove("txt_bundesliga.txt")
f = open("txt_bundesliga.txt", "a")
bundesliga = soccer_data.bundesliga()
for et in bundesliga:
    str1 = et['team']+","+ et['pos']+","+et['points']+","+et['matches_played']+","+et['wins']+","+et['losses']+","+et['goals_for']+","+et['goal_diff']+"\n"
    f.write(str1)
f.close()

