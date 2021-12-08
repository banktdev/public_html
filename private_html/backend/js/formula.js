var forType = sessionStorage.forType == undefined ? sessionStorage.forType = 1 : sessionStorage.forType;
var formula = "";
var forlen = 1;

$(document).ready(function() {

  $.ajax({
    type: "POST",
    url: "database/getformu.php",
    data: {
      forType: sessionStorage.forType
    },
    // beforeSend: function(){
    //   document.getElementById("genbut").disabled = true;
    // },
    success: function(data) {
      if (data == 'logout') {
        window.location.href = "database/logout.php";
      }
      if (data != "error") {
        res = JSON.parse(data);
        console.log(res);

        let html = '';
        $.each(res, function(key, value) {
          char = value.data.split('');
          html += '<tr style="background-color: rgba(255,255,255,0.3);vertical-align: middle;">';
          html += '<td align="center" style="background-color: SaddleBrown;width: 3em;">&nbsp ' + (key + 1) + ' &nbsp</td>';
          html += '<td>';
          for (let i = 0; i < char.length - 1; i++) {
            switch (char[i]) {
              case 'b':
                html += '&nbsp<img src="resource/images/symbol_b_small.png">&nbsp';
                break;
              case 'p':
                html += '&nbsp<img src="resource/images/symbol_p_small.png">&nbsp';
                break;
              case 't':
                html += '&nbsp<img src="resource/images/symbol_t_small.png">&nbsp';
                break;
            }
          }
          switch (char[char.length - 1]) {
            case 'b':
              html += '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource/images/symbol_b_small.png">';
              break;
            case 'p':
              html += '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource/images/symbol_p_small.png">';
              break;
            case 't':
              html += '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource/images/symbol_t_small.png">';
              break;
          }
          html += '</td>';
          html += '<td align="right" style="padding-right: 2%;">';
          html += '<a href="#" onclick="deletefor(event,this,' + value.id + ')">';
          html += '<i class="fas fa-trash-alt"></i></a></td></tr>';
        });
        $('#tblfor').append(html);
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      window.location.href = "login.php";
    }
  });

  html = '';
  // if (forType == 1 || forType == 2) {
  //   forlen = 1;
  //   html += `<div class="row text-center">
  //             <div class="col-4">
  //               <img id="box-1" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-2" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-3" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>`;
  //   $('[name="res_box"]').attr("id", "box-4");
  // } else if (forType == 3 || forType == 4) {
  //   forlen = 2;
  //   html += `<div class="row text-center">
  //             <div class="col-3">
  //               <img id="box-1" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-2" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-3" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-4" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>`;
  //   $('[name="res_box"]').attr("id", "box-5");
  // } else
  // if (forType == 5 || forType == 6) {
    forlen = 3;
    html += `<div class="row text-center">
              <div class="col-6">
                <img id="box-1" class="add-box" src="" width="50" height="50">
              </div>
              <div class="col-6">
                <img id="box-2" class="add-box" src="" width="50" height="50">
              </div>
            </div>
            <br><br>
            <div class="row text-center">
              <div class="col-4">
                <img id="box-3" class="add-box" src="" width="50" height="50">
              </div>
              <div class="col-4">
                <img id="box-4" class="add-box" src="" width="50" height="50">
              </div>
              <div class="col-4">
                <img id="box-5" class="add-box" src="" width="50" height="50">
              </div>
            </div>`;
    $('[name="res_box"]').attr("id", "box-6");
  // }
  // else if (forType == 7 || forType == 8) {
  //   forlen = 4;
  //   html += `<div class="row text-center">
  //             <div class="col-4">
  //               <img id="box-1" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-2" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-3" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>
  //           <br><br>
  //           <div class="row text-center">
  //             <div class="col-4">
  //               <img id="box-4" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-5" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-6" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>`;
  //   $('[name="res_box"]').attr("id", "box-7");
  // } else if (forType == 9 || forType == 10) {
  //   forlen = 5;
  //   html += `<div class="row text-center">
  //             <div class="col-4">
  //               <img id="box-1" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-2" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-4">
  //               <img id="box-3" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>
  //           <br><br>
  //           <div class="row text-center">
  //             <div class="col-3">
  //               <img id="box-4" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-5" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-6" class="add-box" src="" width="50" height="50">
  //             </div>
  //             <div class="col-3">
  //               <img id="box-7" class="add-box" src="" width="50" height="50">
  //             </div>
  //           </div>`;
  //   $('[name="res_box"]').attr("id", "box-8");
  // }
  $('#draw_box').html(html);

});

function addfor(e, button) {
  e.preventDefault();
  if (formula.length < (forlen + 3)) {
    formula += button;
    let id = "box-";
    for (i = 0; i < formula.length; i++) {
      switch (formula[i]) {
        case 'b':
          src = "resource/images/symbol_b.png";
          break;
        case 'p':
          src = "resource/images/symbol_p.png";
          break;
        case 't':
          src = "resource/images/symbol_t.png";
          break;
      }
      document.getElementById(id + (i + 1)).src = src;
    }
  }
}

function clearfor(e, type) {
  e.preventDefault();
  formula = "";
  let id = "box-";
  for (i = 0; i < (forlen + 3); i++) {
    document.getElementById(id + (i + 1)).src = "";
  }
}

function submitfor(e) {
  e.preventDefault();
  if (formula.length == (forlen + 3)) {
    $.ajax({
      type: "POST",
      url: "database/addformu.php",
      data: {
        strf: formula,
        typef: forType
      },
      beforeSend: function() {
        document.getElementById("overlay").style.display = "block";
      },
      success: function(data) {
        document.getElementById("overlay").style.display = "none";
        if (data == "Added") {
          Swal.fire({
            type: 'error',
            title: 'formula already added'
          });
        } else if (data == 'logout') {
          window.location.href = "database/logout.php";
        } else {
          Swal.fire(
            'Success!',
            'Add FORMULA completed!',
            'success'
          );
          let tblid = "tblfor";
          $('#' + tblid).append(data);
          formula = "";
          let id = "box-";
          for (i = 0; i < (forlen + 3); i++) {
            document.getElementById(id + (i + 1)).src = "";
          }
          let countrows = $("#" + tblid + " tr").length;
          for (i = 0; i < countrows; i++) {
            document.getElementById(tblid).rows[i].cells[0].innerHTML = "" + (i + 1);
          }
        }

      },
      error: function(jqXHR, textStatus, errorThrown) {
        document.getElementById("overlay").style.display = "none";
        window.location.href = "login.php";
      }
    });
  }
}

function deletefor(e, row, forid) {
  e.preventDefault();

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        type: "POST",
        url: "database/delformu.php",
        data: {
          delid: forid,
          typef: forType
        },
        beforeSend: function() {
          document.getElementById("overlay").style.display = "block";
        },
        success: function(data) {
          document.getElementById("overlay").style.display = "none";
          console.log(data);
          if (data == "deleted") {
            let tblid = "tblfor";
            var i = row.parentNode.parentNode.rowIndex;
            document.getElementById(tblid).deleteRow(i);
            let countrows = $("#" + tblid + " tr").length;
            for (i = 0; i < countrows; i++) {
              document.getElementById(tblid).rows[i].cells[0].innerHTML = "" + (i + 1);
            }
            Swal.fire(
              'Deleted!',
              'Formula has been deleted.',
              'success');
          } else if (data == 'logout') {
            window.location.href = "database/logout.php";
          } else {
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Can\'t Delete this!',
            });
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          document.getElementById("overlay").style.display = "none";
          window.location.href = "login.php";
        }
      });

    }
  })
}
