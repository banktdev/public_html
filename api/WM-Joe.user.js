// ==UserScript==
// @name         WM-Joe
// @namespace    http://tampermonkey.net/
// @version      999
// @description  try to take over the world!
// @author       You
// @require http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js
// @include        https://wm777.net/*/*
// @include        https://wm777.net/*
// @include        https://wm777.net/*/
// @grant        none
// ==/UserScript==

(function() {
        'use strict';
    setInterval(function(){
        datagame()
    }, 1000);
})();

function checkbacc(num) {
    var ut = "";
    if (num == 1) {
        ut = 1;
    } else if (num == 2) {
        ut = 2;
    } else if (num == 3) {
        ut = 3;
    } else if (num == 4) {
        ut = 4;
    } else if (num == 5) {
        ut = 5;
    } else if (num == 6) {
        ut = 6;
    } else if (num == 7) {
        ut = 7;
    } else if (num == 8) {
        ut = 8;
    } else if (num == 9) {
        ut = 9;
    } else if (num == 10) {
        ut = 0;
    } else if (num == 11) {
        ut = 0;
    } else if (num == 12) {
        ut = 0;
    } else if (num == 13) {
        ut = 0;
    } else if (num == 21) {
        ut = 1;
    } else if (num == 22) {
        ut = 2;
    } else if (num == 23) {
        ut = 3;
    } else if (num == 24) {
        ut = 4;
    } else if (num == 25) {
        ut = 5;
    } else if (num == 26) {
        ut = 6;
    } else if (num == 27) {
        ut = 7;
    } else if (num == 28) {
        ut = 8;
    } else if (num == 29) {
        ut = 9;
    } else if (num == 30) {
        ut = 0;
    } else if (num == 31) {
        ut = 0;
    } else if (num == 22) {
        ut = 0;
    } else if (num == 33) {
        ut = 0;
    } else if (num == 41) {
        ut = 1;
    } else if (num == 42) {
        ut = 2;
    } else if (num == 43) {
        ut = 3;
    } else if (num == 44) {
        ut = 4;
    } else if (num == 45) {
        ut = 5;
    } else if (num == 46) {
        ut = 6;
    } else if (num == 47) {
        ut = 7;
    } else if (num == 48) {
        ut = 8;
    } else if (num == 49) {
        ut = 9;
    } else if (num == 50) {
        ut = 0;
    } else if (num == 51) {
        ut = 0;
    } else if (num == 52) {
        ut = 0;
    } else if (num == 53) {
        ut = 0;
    } else if (num == 61) {
        ut = 1;
    } else if (num == 62) {
        ut = 2;
    } else if (num == 63) {
        ut = 3;
    } else if (num == 64) {
        ut = 4;
    } else if (num == 65) {
        ut = 5;
    } else if (num == 66) {
        ut = 6;
    } else if (num == 67) {
        ut = 7;
    } else if (num == 68) {
        ut = 8;
    } else if (num == 69) {
        ut = 9;
    } else if (num == 70) {
        ut = 0;
    } else if (num == 71) {
        ut = 0;
    } else if (num == 72) {
        ut = 0;
    } else if (num == 73) {
        ut = 0;
    } else {
        ut = 0;
    }

    return ut;
}

function plusbacc(a,b,c) {
    var d = "";
    var dem = a + b;

    if (dem.toString().length == 2) {
        var res = parseInt(dem.toString().substring(1, 2));
		var res1 = res + c;

        if (res1.toString().length == 2) {

          d = parseInt(res1.toString().substring(1, 2));

        } else {
		  d = res1;
        }
    } else {

		var res1 = dem + c;

        if (res1.toString().length == 2) {

          d = parseInt(res1.toString().substring(1, 2));

        } else {
		  d = res1;
        }
    }

    return d;
}

function checkstatus(p,b) {                                                                                                                                                             -
  var joe = "";
  if (p > b) {
  	joe = "P";
  } else if (b > p) {
    joe = "B";
  } else {
    joe = "T";
  }

  return joe;
}

function datagame() {
 var countit = 0;
    for(var idgame in gData.dtGame[101].dtGroup) {
        //console.log(idgame.toString())

        if (gData.dtGame[101].dtGroup[idgame.toString()].dealerName) {

            var dataroomz = gData.dtGame[101].dtGroup[idgame.toString()];

            var reco = "";

            for(var dataname in dataroomz.historyData.resultObjArr) {

                var baccaratresult = dataroomz.historyData.resultObjArr[dataname.toString()].resultContent;

                var res = baccaratresult.split(":");
                var res1 = res[1].split(",");
                var player = res[1].split(";");
                var player1 = player[0].split(",");
                var banker =  res[2].split(",");

                var play1 = checkbacc(player1[0]);
                var play2 = checkbacc(player1[1]);
                var play3 = checkbacc(player1[2]);

                var bank1 = checkbacc(banker[0]);
                var bank2 = checkbacc(banker[1]);
                var bank3 = checkbacc(banker[2]);

                reco = reco + checkstatus(plusbacc(bank1,bank2,bank3), plusbacc(play1,play2,play3));
            }
            var seconds = "";
            var now = new Date();
            var difference = dataroomz.betTimeMillisecondEnd - now.getTime();

            if (dataroomz.betTimeMillisecondEnd < now.getTime()) {
                seconds = 0;

            } else {
                seconds = Math.floor(difference / 1000);
            }
            console.log(dataroomz.dealerName + " | Records : " + reco  + " | Remain : " + seconds);

            countit++;
            var $ = window.jQuery;

            if (!dataroomz.dtCard[1]) {
                dataroomz.dtCard[1] = 0;
            }
            if (!dataroomz.dtCard[2]) {
                dataroomz.dtCard[2] = 0;
            }
            if (!dataroomz.dtCard[3]) {
                dataroomz.dtCard[3] = 0;
            }
            if (!dataroomz.dtCard[4]) {
                dataroomz.dtCard[4] = 0;
            }
            if (!dataroomz.dtCard[5]) {
                dataroomz.dtCard[5] = 0;
            }
            if (!dataroomz.dtCard[6]) {
                dataroomz.dtCard[6] = 0;
            }





            $.post("http://localhost/api/joe.php?tab=wmcasino",
            {
                dealer: dataroomz.dealerName,
                record: reco,
                id: countit.toString(),
                remain: seconds,

                player1: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[1] + ".svg",
                player2: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[3] + ".svg",
                player3: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[5] + ".svg",

                banker1: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[2] + ".svg",
                banker2: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[4] + ".svg",
                banker3: "https://wm777.net/images/poker/poker_" + dataroomz.dtCard[6] + ".svg",

                image: dataroomz.dealerImage
            },
            function(){

            });



        }
    }

}