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
  <title>Admin Panel : Gen Code Summary</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="./css/datatable.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
</head>

<body>
  <?php include "navbar.php"; ?>

  <main class="content-wrapper">
    <div class="container-fluid">

      <table id="datatble" class="table table-dark table-hover table-striped text-center">
        <thead>
          <tr>
            <th>User Admin</th>
            <th>Type</th>
            <th>จำนวน Gen Code(ครั้ง)</th>
            <th>ยอดรวมทั้งหมด(Credit)</th>
          </tr>
        </thead>
        <tbody id="list_summary">

        </tbody>
      </table>

    </div>
  </main>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "database/getSummary.php",
      beforeSend: function() {
        Swal.fire({
          title: 'Loading Summary Data',
          allowOutsideClick: false
        });
        swal.showLoading();
      },
      success: function(data) {
        swal.close();
        if (data == 'logout') {
          window.location.href = "database/logout.php";
        }
        html = "";
        arr = JSON.parse(data);
        $.each(arr, function(index, value) {
          html += '<tr><td>' + value['user'] + '</td>';
          html += '<td>';
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
          html += '<td>' + $.number(value['count']) + '</td>';
          html += '<td>' + $.number(value['sumCredit']) + '</td></tr>';
        });
        $('#list_summary').html(html);
        $('#datatble').DataTable({
          "pageLength": 100,
          "order": [[ 3, "desc" ]]
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        window.location.href = "login.php";
      }
    });
  });
</script>
