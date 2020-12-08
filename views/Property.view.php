<?php require_once '../section/'; ?>

<div class="bg-light hide-s">

    <div style="padding: 10px; margin: 0 23%;">
        <a href="/TaskDev/adminpanel.php" class="f-w-100"
           style="font-size: 23px; text-decoration: none ; color: #818181"> Home</a>
        <form action="../TaskDev/logout.php" method="post" class="form-inline my-2 my-lg-0 float-right  "
              style="padding: 0px 10px;">
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">Log Out</button>
        </form>

    </div>

</div>
<div class="topnav hide-x">
    <form action="../TaskDev/logout.php" method="post" class="form-inline my-2 my-lg-0 float-right  "
          style="padding: 0px 10px;">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Log Out</button>
    </form>
    <div id="myLinks" class="tab-1" style="margin-top: 53px;">
        <a href="/TaskDev/adminpanel.php"> Home </a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 ">

            <div>
                <h1 class="f-w-100">Title</h1>
                <img class="mt-4 imageLogin">
            </div>
        </div>
        <div class="col-lg-2"></div>

    </div>
</div>

<?php require_once 'section/Footer.php'; ?>
