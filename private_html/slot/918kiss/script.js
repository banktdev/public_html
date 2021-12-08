$(document).ready(function () {
  const bgSound = new Audio('media/GameBGM_High.mp3');
  bgSound.play();

  $(function () {
    $(this).bind("contextmenu", function (e) {
      e.preventDefault();
    });
  });

  for (let i = 1; i < 79; i++) {
    $(".row-kiss").append(
      '<div class="col-4 mt-3"><div class="c_' +
        i +
        ' card border-0 rgba-black-light"><div class="card-body p-1"><img class="w-100 image image_' +
        i +
        '" src="img/game-' +
        i +
        '.png"><p class="tr_' +
        i +
        ' text-center text-white m-0 p-0"><i class="far fa-money-bill-alt rotate"></i></p><p class="ttr_' +
        i +
        ' text-center m-0 p-0"></p><div class="progress md-progress mt-2 mb-2"><div class="pb_' +
        i +
        ' progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div></div></div></div></div>'
    );
  }

  function get_process(id) {
    const card = $(`.c_${id}`);
    const textResult = $(`.tr_${id}`);
    const textResultt = $(`.ttr_${id}`);
    const image = $(`.image_${id}`);
    const progressBar = $(`.pb_${id}`);
    textResult.html('<i class="far fa-clock"></i> กรุณารอซักครู่.....');
    progressBar.html("ระบบกำลังสแกนผล.....");
    setTimeout(function () {
      $(".image").addClass("animated flipInX");
      let rand = Math.floor(Math.random() * (100 - 20 + 1)) + 20;
      progressBar.html(rand + "%");
      textResult.html(
        '<i class="fas fa-money-bill-alt rotate"></i> อัตราชนะ ' + rand + "%"
      );
      if (rand <= 25) {
        textResultt.html('<i class="fas fa-times-circle"></i> ไม่ควรเล่น');
        textResultt.addClass("text-danger");
        progressBar.addClass("bg-danger");
        image.addClass("filter");
        progressBar.css("width", +rand + "%");
      } else if (rand <= 50) {
        textResultt.html(
          '<i class="fas fa-exclamation-circle"></i> ควรระวัง!!!'
        );
        textResultt.addClass("text-warning");
        progressBar.addClass("bg-warning");
        progressBar.css("width", +rand + "%");
      } else if (rand <= 90) {
        textResultt.html('<i class="fas fa-check-circle"></i> FREE SPIN');
        textResultt.addClass("text-info");
        progressBar.addClass("bg-info");
        progressBar.css("width", +rand + "%");
      } else if (rand <= 100) {
        textResultt.html('<i class="fas fa-check-circle"></i> BIG WIN');
        textResultt.addClass("text-success");
        progressBar.addClass("bg-success");
        progressBar.css("width", +rand + "%");
        card.addClass("sweetlandia");
        image.addClass("sweetlandia");
      }
    }, 10000);
  }
  get_process(1);
  get_process(2);
  get_process(3);
  get_process(4);
  get_process(5);
  get_process(6);
  get_process(7);
  get_process(8);
  get_process(9);
  get_process(10);
  get_process(11);
  get_process(12);
  get_process(13);
  get_process(14);
  get_process(15);
  get_process(16);
  get_process(17);
  get_process(18);
  get_process(19);
  get_process(20);
  get_process(21);
  get_process(22);
  get_process(23);
  get_process(24);
  get_process(25);
  get_process(26);
  get_process(27);
  get_process(28);
  get_process(29);
  get_process(30);
  get_process(31);
  get_process(32);
  get_process(33);
  get_process(34);
  get_process(35);
  get_process(36);
  get_process(37);
  get_process(38);
  get_process(39);
  get_process(40);
  get_process(41);
  get_process(42);
  get_process(43);
  get_process(44);
  get_process(45);
  get_process(46);
  get_process(47);
  get_process(48);
  get_process(49);
  get_process(50);
  get_process(51);
  get_process(52);
  get_process(53);
  get_process(54);
  get_process(55);
  get_process(56);
  get_process(57);
  get_process(58);
  get_process(59);
  get_process(60);
  get_process(61);
  get_process(62);
  get_process(63);
  get_process(64);
  get_process(65);
  get_process(66);
  get_process(67);
  get_process(68);
  get_process(69);
  get_process(70);
  get_process(71);
  get_process(72);
  get_process(73);
  get_process(74);
  get_process(75);
  get_process(76);
  get_process(77);
  get_process(78);
  get_process(79);
});
