$(document).ready(function() {
    $.ajax({
        url: "database/redcredit.php"
    }).done(function(credit) {
        sessionStorage.Credit = $.number(credit);
        $('#navCredit').html(`<img src="resource/images/new/credit.png" style="height:30px;">&nbsp; ${$.number(sessionStorage.Credit)} &nbsp; </span>`);
        $('#navCredit2').html(`<img src="resource/images/new/credit.png" style="height:30px;">&nbsp; ${$.number(sessionStorage.Credit)} &nbsp; </span>`);
        $('#showCreditM').html('Credit : ' + sessionStorage.Credit);
    });
});