var games = [];
var most_percent = {};
$(document).ready(function () {
    loadData();
    setInterval(function () {
        loadData()
    }, 2000);

});
var preload = 0;
function loadData() {
    var x = 0;
    var count = 0;
    var i = 0;
    $.getJSON('api/render', function (res) {
        $.each(res.data, function (key, value) {
            count = res.data.length;
            value.percent = parseInt(value.percent);
            if (games.hasOwnProperty(value.name)) {
                if (games[value.name].percent != value.percent) {
                    games[value.name].percent = value.percent;
                    update_game(value.name, value.percent);
                }
            } else {
                add_game(value.name, value.percent);
                games[value.name] = { name: value.name, percent: value.percent };

                x++;
                setTimeout(function () {
                    i++;
                    $("#game-list").append(value.name + ",");
                    if (i == 10) {
                        $("#progress-loading").css('width', '10%');
                    }

                    if (i == 30) {
                        $("#progress-loading").css('width', '30%');
                    }

                    if (count == i) {
                        $("#progress-loading").css('width', '100%');
                        setTimeout(function () {
                            $("#preload-logo").hide();
                            $("#preload").hide();
                            $("#main-logo").show();
                            $("#games").show();
                        }, 2500);

                    }

                }, 100 + (x * 50));
            }

        });
        var xx = res.data.sort((a, b) => a.percent < b.percent ? -1 : 1);
        var last = xx[xx.length - 1];
        if (last.name != most_percent.name || last.percent != most_percent.percent) {
            most_percent = { name: last.name, percent: last.percent }
            console.log(most_percent);
            $(".w-100").removeClass('open animated heartBeat infinite');
            $("#GAME_" + most_percent.name).removeClass('close').removeClass('up2you').removeClass('open').removeClass('animated heartBeat infinite').addClass("open animated heartBeat infinite");
            $("#P_" + most_percent.name).removeClass('bg-success').removeClass('bg-dark').removeClass('bg-danger').addClass("bg-success");
        }
    });
}

function sortObj(a, b) {
    return a.percent < b.percent ? 0 : 1;
}


function update_game(name, percent) {
    var progress = "";
    var classname = "";
    if (percent >= 0 && percent <= 49) {
        progress = "bg-danger";
        classname = "close";
    } else if (percent >= 50 && percent <= 79) {
        progress = "bg-dark";
        classname = "up2you";
    } else if (percent >= 80 && percent <= 95) {
        progress = "bg-success";
        classname = "open";
    } else if (percent >= 96 && percent <= 97) {
        progress = "bg-success";
        classname = "open";
    } else if (percent >= 97 && percent <= 100) {
        progress = "bg-success";
        classname = "open";
    }
    $("#GAME_" + name).removeClass('close').removeClass('up2you').removeClass('open').removeClass('animated heartBeat infinite').addClass(classname);
    $("#P_" + name).removeClass('bg-success').removeClass('bg-dark').removeClass('bg-danger').addClass(progress);
    $("#P_" + name).css('width', percent + '%');

    // p = game_percents[Object.keys(game_percents)[Object.keys(game_percents).length - 1]].name;
    // $(".w-100").removeClass('open animated heartBeat infinite');
    // $("#GAME_" + p).removeClass('close').removeClass('up2you').removeClass('open').removeClass('animated heartBeat infinite').addClass("open animated heartBeat infinite");
    // $("#P_" + p).removeClass('bg-success').removeClass('bg-dark').removeClass('bg-danger').addClass("bg-success");

}

function add_game(name, percent) {
    var progress = "";
    var classname = "";
    if (percent >= 0 && percent <= 49) {
        progress = "bg-danger";
        classname = "close";
    } else if (percent >= 50 && percent <= 79) {
        progress = "bg-dark";
        classname = "up2you";
    } else if (percent >= 80 && percent <= 95) {
        progress = "bg-success";
        classname = "open";
    } else if (percent >= 96 && percent <= 97) {
        progress = "bg-success";
        classname = "open";
    } else if (percent >= 97 && percent <= 100) {
        progress = "bg-success";
        classname = "open";
    }
    $("#games").append('<div class="col m-0 p-2 animated fadeIn col-4 col-md-2"> <div class="bg-box p-2"> <img id="GAME_' + name + '" class="w-100 ' + classname + '" src="assets/img/' + name + '.jpg" /> <div style="height:15px;" class="md-progress"> <div id="P_' + name + '" class="progress-bar progress-bar-striped progress-bar-animated ' + progress + '" role="progressbar" style="width: ' + percent + '%" aria-valuenow="' + percent + '" aria-valuemin="0" aria-valuemax="100"></div> </div></div> </div>');
}