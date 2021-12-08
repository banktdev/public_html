$(document).ready(function () {
  const bgSound = new Audio('media/GameBGM_High.mp3');
  bgSound.play();
  $(function () {
    $(this).bind("contextmenu", function (e) {
      e.preventDefault();
    });
  });

  for (let i = 1; i <= 56; i++) {
    $(".row-pgslot").append(
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

    /* #################### Setting Card #################### */

    const card = $(`.c_${id}`);
    const textResult = $(`.tr_${id}`);
    const textResultt = $(`.ttr_${id}`);
    const image = $(`.image_${id}`);
    const progressBar = $(`.pb_${id}`);
    textResult.html('<i class="far fa-clock"></i> กรุณารอซักครู่.....');
    progressBar.html("ระบบกำลังสแกนผล.....");

    /* #################### End of Setting Card #################### */


    setTimeout(function () { // Delay Download Card

      $(".image").addClass("animated flipInX"); // Add image Class
      var rand = Math.floor(Math.random() * (100 - 20 + 1)) + 20;
      const _rand = () => {
        return Math.floor(Math.random() * (35 - 1 + 1)) + 1;
      }

      setInterval(function () { // Update per 0.5s

        /* ################## Set default progress ################## */
        progressBar.html(rand + "%");
        textResult.html(
          '<i class="fas fa-money-bill-alt rotate"></i> อัตราชนะ ' + rand + "%"
        );
        
        if (rand <= 25) {
          let id = setInterval(function () {
            if (rand < 26) {
              rand++;
            } else {
              clearInterval(id);
            }
          }, 500);
          /* ################## Clear Class ################## */
          progressBar.removeClass();
          progressBar.addClass('progress-bar progress-bar-striped progress-bar-animated')
          textResultt.removeClass();
          card.removeClass("sweetlandia");
          image.removeClass("sweetlandia");

          /* ################## Set new Class ################## */
          textResultt.html('<i class="fas fa-times-circle"></i> ไม่ควรเล่น');
          textResultt.addClass("text-danger");
          progressBar.addClass("bg-danger");
          image.addClass("filter");
          progressBar.css("width", +rand + "%");

        } else if (rand <= 50) {
          let id = setInterval(function () {
            if (rand < 51) {
              rand++;
            } else {
              clearInterval(id); // Clear Intevel Time
            }
          }, 2000);

          /* ################## Clear Class ################## */
          progressBar.removeClass();
          progressBar.addClass('progress-bar progress-bar-striped progress-bar-animated')
          textResultt.removeClass();
          card.removeClass("sweetlandia");
          image.removeClass("sweetlandia");

          /* ################## Set new Class ################## */
          textResultt.html('<i class="fas fa-exclamation-circle"></i> ควรระวัง!!!');
          textResultt.addClass("text-warning");
          progressBar.addClass("bg-warning");
          progressBar.css("width", +rand + "%");
          image.removeClass("filter")
        } else if (rand < 90) {
          let id = setInterval(function () {
            if (rand < 90) {
              rand++;
            } else {
              clearInterval(id);
            }
          }, 5000);

          /* ################## Clear Class ################## */
          progressBar.removeClass();
          progressBar.addClass('progress-bar progress-bar-striped progress-bar-animated')
          textResultt.removeClass();
          card.removeClass("sweetlandia");
          image.removeClass("sweetlandia");

          /* ################## Set new Class ################## */
          textResultt.html('<i class="fas fa-check-circle"></i> FREE SPIN');
          textResultt.addClass("text-info");
          progressBar.addClass("bg-info");
          progressBar.css("width", +rand + "%");
          
        } else if (rand <= 100) {
          let id = setInterval(function () {
            if (rand < 100) {
              rand++;
            } else {
              clearInterval(id);
              rand = _rand();
            }
            // if(rand == 100){
            //   rand = _rand();
            // }
          }, 10000);
          /* ################## Clear Class ################## */
          progressBar.removeClass();
          progressBar.addClass('progress-bar progress-bar-striped progress-bar-animated')
          textResultt.removeClass();

          /* ################## Set new Class ################## */
          textResultt.html('<i class="fas fa-check-circle"></i> BIG WIN');
          textResultt.addClass("text-success");
          progressBar.addClass("bg-success");
          progressBar.css("width", + rand + "%");
          card.addClass("sweetlandia");
          image.addClass("sweetlandia");
        }
      }, 500); // Interval Update per 0.5s
    }, 1000); // Timeout Delay Download Card
  }
  
  /* ####################  Loop Card #################### */
  for (var i = 1; i <= 56; i++) {
    get_process(i);
  }
});
