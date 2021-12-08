$(document).ready(function () {
  const bgSound = new Audio('media/GameBGM_High.mp3');
  bgSound.play();
  $(function () {
    $(this).bind("contextmenu", function (e) {
      e.preventDefault();
    });
  });

  for (let i = 1; i < 30; i++) {
    $(".row-joker").append(
      '<div class="col-4 mt-3"><div class="c_' +
        i +
        ' card border-0 rgba-black-light"><div class="card-body p-1"><img class="w-100 image image_' +
        i +
        '" src="img/game-' +
        i +
        '.jpg"><p class="tr_' +
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
});
