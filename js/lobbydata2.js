$(document).ready(function() {
    check_credit();
    var x = JSON.parse(sessionStorage.getItem('formula'));
    var socket = io.connect('ws://103.86.50.183:8093', {
        path: '/app'
    });

    socket.on('connect', function() {
        check_credit();
        console.log("[open] Connection established");
        let wstr2 = `{"sender":"client", "action":"rq_data_allroom", "user":"${sessionStorage.User}", "scode":"${sessionStorage.sCode}"}`;
        socket.send(wstr2);
    });
    socket.on('connect_error', () => {
        console.log('connect_error!');
    });
    socket.on('connect_timeout', () => {
        console.log('connect_timeout!');
    });

    socket.on('disconnect', function() {
        console.log('Disconnected');
    });

    socket.on('message', function(message) {
        var arr = [];
        var obj = JSON.parse(message);
        check_credit();
        if (obj.action == "rq_data_allroom") {
            if (obj.data == "err_maintenance" || obj.data == "") {
                console.log('err_maintenance');
                Swal.fire({
                    type: 'info',
                    title: 'ปิดปรับปรุง',
                    text: 'ขณะนี้คาสิโนกำลังปิดปรับปรุง โปรดลองใหม่อีกครั้ง'
                });
                return;
            }
            var b_data = obj.data;
            $.each(b_data, function(index, value) {
                for (el in value) {
                    arr.push(value[el]);
                }
            });
            //console.log(arr);
            roomdata(arr);
        } else {
            //console.log(message);
        }

    });

    function chkresult(s) {
        if (predict == s) {
            win++;
            rate = Math.round((win / active) * 100);
            winid = 'winrate' + room;
            winhtml = rate + '%';
            document.getElementById(winid).style.color = '#ffcc00'
            document.getElementById(winid).innerHTML = winhtml;
            stack = 1;
        } else if (predict != "") {
            let winid = 'winrate' + room;
            if (active > 0) {
                if (stack < 3) {
                    active--;
                    stack++;
                } else {
                    rate = Math.round((win / active) * 100);
                    winhtml = rate + '%';
                    document.getElementById(winid).style.color = '#ffcc00';
                    document.getElementById(winid).innerHTML = winhtml;
                    stack = 1;
                }
            } else {
                winhtml = 'รอผล';
                document.getElementById(winid).style.color = 'khaki';
                document.getElementById(winid).innerHTML = winhtml;
            }
        }
        if (slot.length == x[0].data.length - 1) slot = slot.substring(1, x[0].data.length - 1);
        slot += s;
        for (let i = 0; i < x.length; i++) {
            if (slot == x[i].data.substring(0, x[i].data.length - 1)) {
                active++;
                predict = x[i].data.charAt(x[i].data.length - 1);
                break;
            }
            predict = "";
        }
    }
	
	function chktie(s) {
        if (predict == s) {
            win++;
            rate = Math.round((win / active) * 100);
            winid = 'winrate' + room;
            winhtml = rate + '%';
            document.getElementById(winid).style.color = '#ffcc00'
            document.getElementById(winid).innerHTML = winhtml;
            stack = 1;
        }
        if (slot.length == x[0].data.length - 1) slot = slot.substring(1, x[0].data.length - 1);
        slot += s;
        for (let i = 0; i < x.length; i++) {
            if (slot == x[i].data.substring(0, x[i].data.length - 1)) {
                active++;
                predict = x[i].data.charAt(x[i].data.length - 1);
                break;
            }
            predict = "";
        }
    }

    function check_credit() {
        $.ajax({
            url: "database/redcredit.php"
        }).done(function(credit) {
            sessionStorage.Credit = $.number(credit);
            $('#navCredit').html(`<img src="resource/images/new/credit.png" style="height:30px;">&nbsp; ${$.number(sessionStorage.Credit)} &nbsp; </span>`);
            $('#navCredit2').html(`<img src="resource/images/new/credit.png" style="height:30px;">&nbsp; ${$.number(sessionStorage.Credit)} &nbsp; </span>`);
            $('#showCreditM').html('Credit : ' + sessionStorage.Credit);
        });
    }

    function roomdata(formula) {
        for (room = 0; room < 16; room++) {

            res = formula[room].split("");
            if (res[0] != 'w') {
                active = 0;
                win = 0;
                slot = "";
                stack = 1;
                predict = "";
                for (let i = 0; i < 72; i++) {

                    if (res[i] == 'B') {
                        chkresult('b');
                    } else if (res[i] == 'P') {
                        chkresult('p');
                    } else if (res[i] == 'T') {
                        chktie('t');
                    }
                }

            } else if (res[0] == '') {
                let winid = 'winrate' + room;
                let winhtml = 'สับไพ่';
                document.getElementById(winid).style.color = '#FF6600';
                document.getElementById(winid).innerHTML = winhtml;
            } else {
                let winid = 'winrate' + room;
                let winhtml = 'สับไพ่';
                document.getElementById(winid).style.color = '#FF6600';
                document.getElementById(winid).innerHTML = winhtml;
            }
        }
    }

    function showdata() {
        let wstr = `{"sender":"client", "action":"rq_data_allroom", "user":"${sessionStorage.User}", "scode":"${sessionStorage.sCode}"}`;
        socket.send(wstr);
    }
    setInterval(showdata, 500);
});