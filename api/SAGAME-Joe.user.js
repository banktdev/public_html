// ==UserScript==
// @name         SAGAME-Joe
// @namespace    http://tampermonkey.net/
// @version      999
// @description  try to take over the world!
// @author       You
// @require http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js
// @include        https://sgv.sa-api4.net/*/*
// @grant        none
// ==/UserScript==

(function() {
        'use strict';
    setInterval(function(){
         location.replace("https://secure.sagaming-vip.com/play.html")
    }, 500000);

    setInterval(function(){
        addJQuery(datagame)
    }, 1000);
})();

function addJQuery(callback) {
    var script = document.createElement("script");
    script.setAttribute("src", "//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js");
    script.addEventListener('load', function() {
        var script = document.createElement("script");
        script.textContent = "window.jQ=jQuery.noConflict(true);(" + callback.toString() + ")();";
        document.body.appendChild(script);
    }, false);
    document.body.appendChild(script);
}

function datagame() {
    var teppw = 1;

for (i = 0; i < user.hosts.length; i++) {
    var reco = "";
    for (ie = 0; ie < user.hosts[i]._records.length; ie++) {

        if (user.hosts[i]._records[ie].bankerWin) {
            reco = reco + "B";
        } else if (user.hosts[i]._records[ie].playerWin) {
            reco = reco + "P";
        } else {
           reco = reco + "T";
        }
    }

     $.post("http://localhost/joe.php?tab=sagame",
     {
         dealer: user.hosts[i].dealer.name,
         Records: reco,
         id: teppw,
         table_name: Localization.Instance.getString("hostCodeNames." + user.hosts[i]._hostID),
         remain: user.hosts[i].remainTime,
         image: user.hosts[i].dealer.imagePath,
         player1: "https://lnw69.com/resource/images/deck/" + user.hosts[i].player1 + ".png",
                player2: "https://lnw69.com/resource/images/deck/" + user.hosts[i].player2 + ".png",
                player3: "https://lnw69.com/resource/images/deck/" + user.hosts[i].player3 + ".png",

                banker1: "https://lnw69.com/resource/images/deck/" + user.hosts[i].banker1 + ".png",
                banker2: "https://lnw69.com/resource/images/deck/" + user.hosts[i].banker2 + ".png",
                banker3: "https://lnw69.com/resource/images/deck/" + user.hosts[i].banker3 + ".png",
     },
    function(){

    });
        teppw++;

    console.log(user.hosts[i].dealer.name + " | Records : " + user.hosts[i]._records.length + " , " + reco + " | Remain : " + user.hosts[i].remainTime);
}


console.log(user.hosts);

}