<?php require_once 'section/Header.php' ?>

<div class="bg-light hide-s">

    <div style="padding: 10px; margin: 0 23%;">
        <a href="/adminpanel.php" class="f-w-100"
           style="font-size: 23px; text-decoration: none ; color: #818181"> Home</a>
        <form action="/logout.php" method="post" class="form-inline my-2 my-lg-0 float-right  "
              style="padding: 0px 10px;">
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">Log Out</button>
        </form>

    </div>

</div>
<div class="topnav hide-x">
    <form action="/logout.php" method="post" class="form-inline my-2 my-lg-0 float-right  "
          style="padding: 0px 10px;">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Log Out</button>
    </form>
    <div id="myLinks" class="tab-1" style="margin-top: 53px;">
        <a href="/adminpanel.php"> Home </a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction_edit()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 ">
            <div>
                <h2 class="f-w-100">Update</h2>
                <hr>
                <form action="/TaskDev/userupdate.php" method="POST">
                    <div class="form-group">
                        <label for="fullnameupdate">fullname :</label>
                        <input type="text" name="fullnameupdate" class="form-control"
                               value="<?= $userup[0]->fullname ?>">
                    </div>
                    <div class="form-group">
                        <label for="usernameupdate">Username :</label>
                        <input type="text" name="usernameupdate" class="form-control"
                               value="<?= $userup[0]->username ?>">
                    </div>
                    <div class="form-group">
                        <label for="emailupdate">Email :</label>
                        <input type="text" name="emailupdate" class="form-control" value="<?= $userup[0]->email ?>">
                    </div>
                    <div class="form-group">
                        <label for="passwordupdate">Password :</label>
                        <input type="password" name="passwordupdate" class="form-control" value="********">
                    </div>
                    <div class="form-group" style="text-align: center;  ">
                        <button  type="submit" style="width: 100%;" class="btn btn-danger f-w-100">Submit</button>
                    </div>
                    <input name="idup" type="hidden" value="<?= $userup[0]->id ?>">
                </form>
            </div>
            <form action="/TaskDev/adminpanel.php">
                <div style="text-align: center">
                    <button type="submit" style="width: 100%; color: #fff;" class="btn btn-danger f-w-100 ">Cancel
                    </button>
                </div>
            </form>
            <?php if (!is_null($statusuupdate)) : ?>
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <?= $statusuupdate ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-2"></div>

    </div>
</div>

<?php require_once 'section/Footer.php' ?>
