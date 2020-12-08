<?php require_once 'section/Header.php' ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xl-2 col-sm-2 "></div>
            <div class="col-lg-8  card card-body mt-5" style="box-shadow: 0px 4px 10px #212121">
                <div class="mt-2">
                    <div class="imageLogin">
                        <h2 class=" login">Login</h2>
                    </div>
                    <hr>
                    <form action="/login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <div class="d-flex flex-row">
                                <i class="fa fa-user create-icon_user"></i>
                                <input type="text" name="username" class="form-control" style="border-radius: 0 5px 5px 0;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <div class="d-flex flex-row">
                                <i class="fa fa-key create-icon_user"></i>
                                <input type="password" name="password" class="form-control" style="border-radius: 0 5px 5px 0;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">send</button>
                        </div>
                    </form>
                    <?php if (!is_null($status)) : ?>
                        <div class="alert alert-danger">
                            <?= $status ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-xl-2 col-sm-2 "></div>

        </div>
    </div>


<?php require_once 'section/Footer.php' ?>