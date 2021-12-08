<nav class="navbar navbar-expand-lg navbar-dark black fixed-top scrolling-navbar" style="background:url(../backend/img/<?php echo $bgImage ?>); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; -o-background-size: 100% 100%, auto; -moz-background-size: 100% 100%, auto; -webkit-background-size: 100% 100%, auto; background-size: 100% 100%, auto;">
    <div class="container">
        <a class="navbar-brand" href="#">HACK SLOT AI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link py-1 mt-1 rounded-lg bg-info" href="./"><i class="fas fa-home"></i> หน้าแรก <span
                            class="sr-only">(current)</span></a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link py-1 mt-1 rounded-lg text-dark bg-warning"><i class="fas fa-mobile-alt"></i> เบอร์มือถือ <?php echo $phone;?></a>
                </li>
            </ul>
            <br>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                    <a class="nav-link py-1 mt-1 rounded-lg bg-success"><i class="fas fa-redo"></i> สถานะ : ใช้งานฟรี</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link py-1 mt-1 rounded-lg bg-danger" href="../logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>