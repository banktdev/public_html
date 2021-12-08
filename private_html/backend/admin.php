<?php require 'database/session.php';
    if ($_SESSION["Permit"] != '99') {
        header('location: main.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel | HackBaccaRat : User Manage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
</head>

<body>
  <script type="text/javascript">
    function changeStat(userid) {
      $.ajax({
        method: "POST",
        url: "database/editstat.php",
        data: {
          uid: userid
        },
        success: function(data) {
          if (data == 'logout') {
            window.location.href = "database/logout.php";
          }
        }
      });
    }
  </script>
  <div id="overlay">
    <div id="overlay-text">Processing..</div>
  </div>
  <?php include 'navbar.php'; ?>

  <main class="content-wrapper">
    <div class="container-fluid">

      <div class="container">
        <div style="float:left;margin-bottom:5px;">
          <div class="input-group">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button" onclick="changePage()">
                <i class="fas fa-paper-plane"></i>
              </button>
            </div>
            <input id="changePage" type="number" min="1" class="form-control" placeholder="Go to Page">
          </div>
        </div>

        <div style="float:right;margin-bottom:5px;">
          <div class="input-group">
            <button id="usersbtn" type="button" class="btn btn-outline-success" style="margin-right: 1em"><i class="fas fa-user"></i> Users</button>
            <?php if ($_SESSION["Permit"] == '99'): ?>
              <button id="adminbtn" type="button" class="btn btn-primary" style="margin-right: 1em"><i class="fas fa-user-secret"></i> Admin</button>
            <?php endif; ?>
            <input id="searchBox" type="text" class="form-control" placeholder="Search Username">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button" onclick="getUser()">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>

        <table id="datatbl" class="table table-bordered table-striped table-hover table-dark text-center" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Credit</th>
              <th>Type</th>
              <th>Last Login</th>
              <th>Ceate Date</th>
              <th>Edit</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="list_users">

          </tbody>
        </table>

      </div>


    </div>
  </main>

</body>

</html>

<script type="text/javascript">
  function getUser() {
    let user_name = document.getElementById('searchBox').value;
    drawTable(1, user_name);
  }

  function changePage() {
    let to_page = document.getElementById('changePage').value;
    drawTable(to_page, "");
  }

  function drawTable(now_page, strSearch) {
    $('#list_users').html('');
    $.ajax({
      type: "POST",
      url: "database/getUser.php",
      data: {
        type: "Super",
        page: now_page,
        user: strSearch
      },
      beforeSend: function() {
        Swal.fire({
          title: 'Loading Users Data',
          allowOutsideClick: false
        });
        swal.showLoading();
      },
      success: function(data) {
        swal.close();
        // console.log(data);
        if (data == 'logout') {
          window.location.href = "database/logout.php";
        }
        if (data != "error") {
          res = JSON.parse(data);
          let html = '';
          $.each(res, function(key, value) {
            html += '<tr><td style="vertical-align: middle;">' + value['id'] + '</td>';
            html += '<td style="vertical-align: middle;">' + value['uname'] + '</td>';
            html += '<td style="vertical-align: middle;">' + value['credit'] + '</td>';
            html += '<td style="vertical-align: middle;font-weight: bold;">';
            switch (value['type']) {
              case '90':
                html += '<span style="color: #0275d8;font-weight:bold">Admin<span>';
                break;
              case '99':
                html += '<span style="color: #d9534f;font-weight:bold">Super<span>';
                break;
              default:
                html += '<span style="color: #5cb85c;font-weight:bold">User<span>';
                break;
            }
            html += '</td>';
            if (value['last_login'] != null) {
              lastLogin = value['last_login'];
            } else {
              lastLogin = "";
            }
            html += '<td style="vertical-align: middle;">' + lastLogin + '</td>';
            html += '<td style="vertical-align: middle;">' + value['created'] + '</td>';
            html += '<td style="vertical-align: middle;"><form action="user.php" method="post">';
            html += '<input type="hidden" name="uid" value="' + value['id'] + '"> <button type="submit" class="btn btn-outline-warning" value="Submit"><i class="far fa-edit fa-lg"></i></button> </form></td>';
            html += '<td style="vertical-align: middle;">';
            if (value['status'] == '0') {
              check_box = "checked";
            } else {
              check_box = "";
            }
            html += '<input name="toggleBtn" type="checkbox" ' + check_box + ' data-toggle="toggle" data-on="Active" data-off="Block" data-size="sm"'
            html += 'data-onstyle="outline-success" data-offstyle="outline-danger" onchange="changeStat( ' + value['id'] + ' )">';
            html += '</td></tr>';
          });
          $('#list_users').append(html);


          $(function() {
            $('input[name="toggleBtn"]').bootstrapToggle()
          });
          $('#usersbtn').click(function() {
            window.location = "member.php";
          });
          // $('#adminbtn').click(function() {
          //   window.location = "admin.php";
          // });
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        window.location.href = "login.php";
      }
    });
  }

  $(document).ready(function() {
    drawTable(1, '');
  });
</script>
