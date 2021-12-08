<?php require 'database/session.php';?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel : User Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
</head>

<body>
  <div id="overlay">
    <div id="overlay-text">Processing..</div>
  </div>
  <?php
      require 'database/connection.php';

      $userid = mysqli_real_escape_string($db,$_POST['uid']);
      $sql = " SELECT * FROM `users` WHERE `id` = '$userid' ";
      $result = mysqli_query($db, $sql);
      $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if (!$data) {
          header("location: member.php");
          exit();
      }

      require 'navbar.php';
     ?>



  <main class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <h1 style="color: white;">User : <?php echo $data['uname']; ?></h1>
        </div>
        <div class="col text-right">
          <a href="member.php" class="btn btn-outline-warning btn-lg"><i class="fas fa-reply-all"></i> Back</a>
        </div>
      </div>

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Edit</a>
          <a class="nav-item nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login Log</a>
          <a class="nav-item nav-link" id="refill-tab" data-toggle="tab" href="#refill" role="tab" aria-controls="refill" aria-selected="false">Refill Log</a>
		  <a class="nav-item nav-link" id="Topup-tab" data-toggle="tab" href="#Topup" role="tab" aria-controls="Topup" aria-selected="false">TrueWallet Log</a>
          <a class="nav-item nav-link" id="kb-tab" data-toggle="tab" href="#kb" role="tab" aria-controls="kb" aria-selected="false">KBank Log</a> 
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">

        <!-- Edit User Tab-->
        <div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
          <div class="container bg-dark" style="padding: 2%;">

            <div class="container text-warning" style="width: 80%;">
              <form action="database/edituser.php" method="post">

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>Firstname</label>
                      <input type="text" class="form-control" name="ed_fname" value="<?php echo $data['fname']; ?>">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Lastname</label>
                      <input type="text" class="form-control" name="ed_lname" value="<?php echo $data['lname']; ?>">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="ed_phone" value="<?php echo $data['phone'] ?>">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" name="ed_email" value="<?php echo $data['email'] ?>">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>Line ID</label>
                      <input type="text" class="form-control" name="ed_line" value="<?php echo $data['line']; ?>">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="ed_pass" value="<?php echo $data['pass'] ?>">
                    </div>
                  </div>
                  <input type="hidden" name="u_id" value="<?php echo $data['id']; ?>">
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <?php if ($_SESSION["Permit"]==99): ?>
                    <div class="form-group text-left">
                      <button type="button" class="btn btn-outline-danger btn-lg" onclick="deleteUser()"><i class="fas fa-eraser fa-lg"></i> DELETE USER</button>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="col">
                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save fa-lg"></i> SAVE</button>
                      <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='member.php'"><i class="fas fa-times fa-lg"></i> CANCEL</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
        <!-- End Edit User -->

        <!-- Show Login Tab -->
        <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
          <div class="container bg-dark" style="padding: 2%;">

            <table class="table table-light table-striped table-hove table-sm text-center table-bordered">
              <thead class="thead-dark">
                <th>No. #</th>
                <th>Time</th>
              </thead>
              <tbody>
                <?php
                  if ($data['login_log'] != "") {
                      $strlog = json_decode($data['login_log'], true);
                      for ($i=0;$i<count($strlog);$i++) {
                          ?>
                <tr>
                  <td><?php echo $i+1 ?></td>
                  <td class="text-left"><?php echo $strlog[$i];
                          if ($i==0) {
                              echo " <span style='color: red;font-weight: bold;font-style: oblique;'>Lastest</span>";
                          } ?></td>
                </tr>
                <?php
                      }
                  } else {
                      echo '<tr><td colspan="2">No matching records found</td></tr>';
                  }?>

              </tbody>
            </table>

          </div>
        </div>
        <!-- End Show Login -->

        <!-- Show Refill Tab -->
        <div class="tab-pane fade" id="refill" role="tabpanel" aria-labelledby="refill-tab">
          <div class="container bg-dark" style="padding: 2%;">

            <table class="table table-light table-striped table-hove table-sm text-center table-bordered">
              <thead class="thead-dark">
                <th>No. #</th>
                <th>Credit</th>
                <th>Time</th>
              </thead>
              <tbody>
                <?php
                    if ($data['refill_log'] != "") {
                        $strlog = json_decode($data['refill_log'], true);
                        $no = 1;
                        foreach ($strlog as $value) {
                            ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $value['credit']; ?></td>
                  <td class="text-left"><?php echo $value['time'];
                            if ($no==1) {
                                echo " <span style='color: red;font-weight: bold;font-style: oblique;'>Lastest</span>";
                            } ?>
                  </td>
                </tr>
                <?php $no++;
                        }
                    } else {
                        echo '<tr><td colspan="3">No matching records found</td></tr>';
                    }?>

              </tbody>
            </table>

          </div>
        </div>
        <!-- End Refill Tab -->
		
		<!-- Show Topup Tab -->
        <div class="tab-pane fade" id="Topup" role="tabpanel" aria-labelledby="Topup-tab">
          <div class="container bg-dark" style="padding: 2%;">

            <table class="table table-light table-striped table-hove table-sm text-center table-bordered">
              <thead class="thead-dark">
                <th>No. #</th>
				<th>Amount</th>
				<th>Rate</th>
                <th>Credit Get</th>
                <th>Time</th>
              </thead>
              <tbody>
                <?php
				$no = 1;
				    $sql = "SELECT * FROM `tw_log` WHERE uid = '{$userid}'";
					$result = mysqli_query($db, $sql);
					$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    if (count($rows) != 0) {
                        foreach($rows as $value){

                            ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $value['sender_amount']; ?></td>
				  <td><?php echo $value['u_rate']; ?></td>
				  <td><?php echo $value['u_credit']; ?></td>
                  <td class="text-left"><?php echo $value['created_at'];
                            if ($no==1) {
                                echo " <span style='color: red;font-weight: bold;font-style: oblique;'>Lastest</span>";
                            } ?>
                  </td>
                </tr>
                <?php $no++;
                        }
                    } else {
                        echo '<tr><td colspan="5">No matching records found</td></tr>';
                    }?>

              </tbody>
            </table>

          </div>
        </div>
        <!-- End Topup Tab -->
		
		<!-- Show kb Tab -->
        <div class="tab-pane fade" id="kb" role="tabpanel" aria-labelledby="kb-tab">
          <div class="container bg-dark" style="padding: 2%;">

            <table class="table table-light table-striped table-hove table-sm text-center table-bordered">
              <thead class="thead-dark">
                <th>No. #</th>				
				<th>Chanel</th>
				<th>Type</th>
				<th>Date/Time</th>
				<th>Amount</th>
				<th>Rate</th>
                <th>Credit Get</th>
                <th>Time</th>
              </thead>
              <tbody>
                <?php
				$no = 1;
				    $sql = "SELECT * FROM `kbank_log` WHERE uid = '{$userid}'";
					$result = mysqli_query($db, $sql);
					$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    if (count($rows) != 0) {
                        foreach($rows as $value){

                            ?>
                <tr>
                  <td><?php echo $no; ?></td>
				  <td><?php echo $value['bank_chanel']; ?></td>
				  <td><?php echo $value['bank_type']; ?></td>
				  <td><?php echo $value['bank_date']; ?> <?php echo $value['bank_time']; ?></td>
                  <td><?php echo $value['bank_amount']; ?></td>
				  <td><?php echo $value['u_rate']; ?></td>
				  <td><?php echo $value['u_credit']; ?></td>
                  <td class="text-left"><?php echo $value['create_at'];
                            if ($no==1) {
                                echo " <span style='color: red;font-weight: bold;font-style: oblique;'>Lastest</span>";
                            } ?>
                  </td>
                </tr>
                <?php $no++;
                        }
                    } else {
                        echo '<tr><td colspan="5">No matching records found</td></tr>';
                    }?>

              </tbody>
            </table>

          </div>
        </div>
        <!-- End Topup Tab -->

      </div>
    </div>
  </main>

</body>

</html>
<?php if ($_SESSION["Permit"] == '99'): ?>
<script type="text/javascript">
  function deleteUser() {
    Swal.fire({
      title: 'Delete User [ <?php echo $data['uname']; ?> ]',
      text: "Are you sure to delete this User?่",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#28a745',
      confirmButtonText: 'Yes!'
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Confirm Delete',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#dc3545',
          cancelButtonColor: '#28a745',
          confirmButtonText: 'Delete User!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "POST",
              url: "database/delUser.php",
              data: { uid : <?php echo $data['id']; ?> },
              beforeSend: function() {
                document.getElementById("overlay").style.display = "block";
              },
              success: function(data) {
                document.getElementById("overlay").style.display = "none";
                console.log(data);
                if (data == "deleted") {
                  Swal.fire(
                    'Deleted!',
                    'User [ <?php echo $data['uname']; ?> ] has been deleted.',
                    'success'
                  );
                  setTimeout(function(){ window.location.href = "member.php"; }, 1500);
                } else if (data == 'logout') {
                  window.location.href = "database/logout.php";
                } else {
                  Swal.fire(
                    'Error!',
                    "Can't Delete This User",
                    'error'
                  );
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
    })

  }
</script>
<?php endif; ?>
