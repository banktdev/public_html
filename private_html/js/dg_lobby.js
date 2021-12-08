$(document).ready(function() {
  var x = JSON.parse(sessionStorage.getItem('formula'));
  showdata();
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
          if(s != 't'){
            stack++;
          }
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

  function roomdata(formula) {
    for (room = 0; room < 9; room++) {
      data = formula[room];
      res = data['records'].split("");
      if (typeof res[0] !== 'undefined') {
        active = 0;
        win = 0;
        slot = 0;
        stack = 1;
        predict = "";
        for (let i = 0; i < 72; i++) {

          if (res[i] == 'B') {
            chkresult('b');
          } else if (res[i] == 'P') {
            chkresult('p');
          } else if (res[i] == 'T') {
            chkresult('t');
          }
        }

      } else {
        let winid = 'winrate' + room;
        let winhtml = 'สับไพ่';
        document.getElementById(winid).style.color = 'khaki';
        document.getElementById(winid).innerHTML = winhtml;
      }
    }
  }

  $('.navUser').html(`<img src="resource/images/new/user.png" style="height:30px;">&nbsp; ${sessionStorage.User} &nbsp; </span>`);
  $('.navCredit').html(`<img src="resource/images/new/credit.png" style="height:30px;">&nbsp; ${$.number(sessionStorage.Credit)} &nbsp; </span>`);
  let head = document.getElementsByTagName('HEAD')[0];
  let link = document.createElement('link');
  switch (sessionStorage.forType) {
    case "10":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_pirate4.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/1/BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "2":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_racing4.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/racing/01_Racing_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "3":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_space4.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/space/01_Space_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "4":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_winter4.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/winter/01_Winter_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "5":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_neon.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/neon/01_Neon_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/theme/neon/02_Neon_Lobby_05_Sidebar.png")');
      break;
    case "6":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_mayan4.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/mayan/01__Mayan_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "7":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_china.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/china/01_China_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "8":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_music.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/music/01_Music_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    case "9":
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = 'css/lbtheme_skull.css';
      head.appendChild(link);
      $('body').css('background-image', 'url("resource/images/theme/skull/01_Skull_BG.png")');
      $('.sidenav').css('background-image', 'url("resource/images/topbar/Sidebar_sahacker.png")');
      break;
    default:
      var asset_path = "asset/" + sessionStorage.forType;
      $('body').css('background-image', 'url(' + "resource/images/new/" + asset_path + "/BG.png" + ')');
      $('.sidenav').css('background-image', 'url(' + "resource/images/new/" + asset_path + "/side_bar.png" + ')');
      $('.resroom').css('background-image', 'url(' + "resource/images/new/" + asset_path + "/Frame_Lobby.png" + ')');
  }
  
  function showdata() {
    // let wstr = '{"sender":"client", "action":"get_baclog"}';
    // socket.send(wstr);
    $.ajax({
      url: './database/getlog_dg.php',
      type: 'POST',
      success: function (response) {
          var obj = JSON.parse(response);
          // console.log(response);
          // handle the response
          roomdata(obj.data);
      },
      error: function (xhr, status) {
          // handle errors
      }
    });
  }
  setInterval(showdata, 3000);
});
