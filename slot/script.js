$(document).ready(function () {
  const bgSound = new Audio('media/GameBGM_High.mp3');
  bgSound.play();
    
  $("#kiss").click(function () {
    location.href = "918kiss/./";
  });
  
  $("#joker").click(function () {
    location.href = "joker/./";
  });

  $("#sagame").click(function () {
    location.href = "sagame/./";
  });

  $("#slotxo").click(function () {
    location.href = "slotxo/./";
  });

  $("#pgslot").click(function () {
    location.href = "pgslot/./";
  });

  $("#live22").click(function () {
    location.href = "live22/./";
  });
  $("#playstar").click(function () {
    location.href = "playstar/./";
  });

  $("#spade-gaming").click(function () {
    location.href = "spade-gaming/./";
  });

  $("#dragon").click(function () {
    location.href = "dragon/./";
  });

  $("#ufaslot").click(function () {
    location.href = "ufaslot/./";
  });

  $(".btn-hide").click(function () {
    $(".bland").hide();
  });

  setTimeout(function () {
    $(".bland").show();
  }, 3000);
});
