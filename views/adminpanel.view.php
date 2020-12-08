<?php require_once 'section/Header.php' ?>
    <section>
        <div class="row">
            <div class="col-xl-2 col-lg-2">
                <div class="sidebar tab-1">
                    <?php $fn = $pdo->prepare("select fullname from users where username = '$username'");
                    $fn->execute();
                    $fname = $fn->fetchAll();
                    ?>
                    <span disabled="disabled" class="text-truncate drbtn" id="drbtn" data-open="open"
                          style="cursor: pointer"> <i class="fa fa-user"></i> <?= $fname[0]["fullname"] ?> <i
                                class="fas fa-arrow-circle-down up"></i> </span>
                    <ul class="drop-contentSide ul-drop">
                        <li>
                                <span>
                                    <form action="/logout.php">
                                    <button class="btn btn-outline-danger my-2 my-sm-0 f-w-100 hide-s"
                                            style="float: right ; padding:5px 30px; margin:0 10px;" type="submit">
                                        Log Out
                                    </button>
                                </form>
                                </span>
                        </li>
                    </ul>
                    <a href="#users"><i class="fas fa-users mx-2" style="font-size: 16px"></i> Users</a>
                    <a href="#category"><i class="fas fa-book mx-2" style="font-size: 16px"></i> Category</a>
                    <a href="#post"><i class="fas fa-envelope mx-2" style="font-size: 16px"></i> Posts</a>
                    <a href="#about"><i class="fas fa-sticky-note mx-2" style="font-size: 16px"></i> About</a>
                </div>
                <!-- this is for header mobile  -->
                <div class="topnav hide-x">
                    <form action="/logout.php" class="form-inline my-2 my-lg-0 float-right  "
                          style="padding: 0px 10px;">

                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Log Out</button>
                    </form>
                    <div id="myLinks" class="tab-1" style="margin-top: 53px;">

                        <a href="#users"> <i class="fas fa-users mx-2" style="font-size: 16px"></i> Users </a>
                        <a href="#category"> <i class="fas fa-book mx-2" style="font-size: 16px"></i> Category </a>
                        <a href="#post"> <i class="fas fa-envelope mx-2" style="font-size: 16px"></i> Posts </a>
                        <a href="#about"> <i class="fas fa-sticky-note mx-2" style="font-size: 16px"></i> About </a>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction_n()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12  col-xs-12  ">
                <diV class="tabcontent-1">
                    <!--///////////......Users.......////////////-->
                    <div class="tab_n" id="users">
                        <div class="card-body" style="padding: 0">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="f-w-100" style="float: left">List</h4>
                                    <button style="float: right" id="myBtn-register"
                                            class="btn btn-danger my-2 my-sm-0">
                                        <i class="fa fa-plus" title="Add User"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table class="table hide-s">
                                        <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Edite</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;
                                        foreach ($user as $items) :
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $items["fullname"]; ?></td>
                                                <td><?= $items["username"]; ?></td>
                                                <td><?= $items["email"]; ?></td>
                                                <td>
                                                    <a href="userupdate.php?userid=<?php echo $items["id"]; ?> " class="fas fa-edit edite_user" name="<?php echo $items["id"]; ?> " style="color: mediumslateblue; padding: 5px 10px; cursor: pointer;" title="edit"></a>
                                                </td>
                                                <td>
                                                    <a class="fas fa-times delete_user" name="<?php echo $items["id"]; ?>"
                                                       style="padding: 5px 10px; cursor: pointer; color: mediumslateblue;"
                                                       title="delete"></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i += 1;
                                        endforeach; ?>
                                        </tbody>
                                    </table>
                                    <ul class="list-group hide-x" id="ul">
                                        <?php foreach ($user as $items)  : ?>
                                            <li class="list-group-item"><?= $items["fullname"]; ?>
                                                <div class="float-right">
                                                    <a class="fas fa-edit"
                                                       href="userupdate.php?userid=<?php echo $items["id"]; ?> "
                                                       style="padding: 5px 10px; cursor: pointer;"
                                                       title="edit"></a>
                                                    <a onclick="conf1(url<?php echo $items["id"]; ?>)"
                                                       class="fas fa-times" style="padding: 5px 10px; cursor: pointer;"
                                                       title="delete"></a>

                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--///////////......category.......////////////-->
                    <div class="tab_n" id="category">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="f-w-100" style="float: left">
                                    Content Category
                                </h4>
                            </div>
                            <div class="card-body">
                                <div id="myBtnContainer" class="tab-2 flex_responsive">
                                    <a class="btn_1 btn btn-other w-100 d-inline mx-1 my-1"
                                       href="#all">Show All</a>
                                    <?php foreach ($cats as $items): ?>
                                        <a class="btn_1 btn btn-other w-100 d-inline mx-1 my-1"
                                           href="#<?= $items->category_name ?>"><?= $items->category_name ?></a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="filterDiv " id="all">
                                            <div class="row">
                                                <?php foreach ($posts as $itemspos) : ?>
                                                    <?php if ($itemspos["users_id"] == $userlog[0]["id"]) { ?>
                                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4 d-flex justify-content-center ">
                                                            <div class="card car-boxShadow" style="width: 18rem; ">
                                                                <img src="data:image/jpeg;base64,<?= base64_encode($itemspos["images"]); ?>"
                                                                     class="card-img-top pos-rel" height="180px">
                                                                <div class="pos-absolute" style="">
                                                                    <a href="PostUpdate.php?postid=<?php echo $itemspos["id"]; ?>"
                                                                       class="btn-a">
                                                                        Edit
                                                                    </a>
                                                                </div>
                                                                <div class="pos-absolute-1" style="">
                                                                    <a onclick="conf(url<?php echo $itemspos["id"]; ?>)"
                                                                       class="btn-a" id="btn_a">
                                                                        <i class="fa fa-times"
                                                                           style="cursor: pointer; border: 2px solid #0c5460; border-radius: 50%; padding: 3px 6px 3px 6px"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="card-body text-center" style="padding: 0;">
                                                                    <h5 class="card-title "
                                                                        style="padding:10px 20px; font-weight: 400;"> <?= $itemspos["title"]; ?> </h5>
                                                                    <p class="card-text f-w-100 text-Post_truncate "
                                                                       style="padding:10px 20px; "><?= $itemspos["description"]; ?> </p>
                                                                    <p class="color_time"
                                                                       style="padding:10px 20px;  border-top: 1px solid #d4d4d4;"><?= $itemspos["Create_at"]; ?> </p>
                                                                    <!-- This is very Important -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php foreach ($cats as $itemscat): ?>
                                            <div class="filterDiv " id="<?= $itemscat->category_name ?>">
                                                <div class="row">
                                                    <?php foreach ($posts as $itemspos) : ?>
                                                        <?php if ($itemscat->category_id == $itemspos["category_id"] && $itemspos["users_id"] == $userlog[0]["id"]) { ?>
                                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4 d-flex justify-content-center ">
                                                                <div class="card car-boxShadow" style="width: 18rem; ">
                                                                    <img src="data:image/jpeg;base64,<?= base64_encode($itemspos["images"]); ?>"
                                                                         class="card-img-top pos-rel" height="180px">
                                                                    <div class="pos-absolute" style="">
                                                                        <a href="PostUpdate.php?postid=<?php echo $itemspos["id"]; ?>"
                                                                           class="btn-a">
                                                                            Edit
                                                                        </a>
                                                                    </div>
                                                                    <div class="pos-absolute-1" style="">
                                                                        <a onclick="conf(url<?php echo $itemspos["id"]; ?>)"
                                                                           class="btn-a">
                                                                            <i class="fa fa-times"
                                                                               style="cursor: pointer; border: 2px solid #0c5460; border-radius: 50%; padding: 3px 6px 3px 6px"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="card-body text-center"
                                                                         style="padding: 0;">
                                                                        <h5 class="card-title "
                                                                            style="padding:10px 20px; font-weight: 400;"> <?= $itemspos["title"]; ?> </h5>
                                                                        <p class="card-text f-w-100 text-Post_truncate "
                                                                           style="padding:10px 20px; "><?= $itemspos["description"]; ?> </p>
                                                                        <p style="padding:10px 20px;  "><?= $itemspos["Create_at"]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--///////////......Posts.......////////////-->
                    <div class="tab_n" id="post">
                        <div class="card">
                            <div class="card-header f-w-100">
                                <h4 class="f-w-100" style="float: left">
                                    Create Posts
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/createpost.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title" class="f-w-100">Title</label>
                                        <input type="text" name="title" class="form-control f-w-100">
                                    </div>
                                    <div class="form-group">
                                        <label for="Description" class="f-w-100">Description</label>
                                        <textarea class="form-control" name="Description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Category" class="f-w-100">Category</label>
                                        <select name="Category" class="form-control">
                                            <?php foreach ($cats as $items): ?>
                                                <option value="<?= $items->category_id ?>"><?= $items->category_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time" class="f-w-100">Create </label>
                                        <input type="datetime-local" name="time" class="form-control f-w-100 width-20">
                                    </div>
                                    <div class=" d-flex justify-content-between" style="align-items: flex-end;">
                                        <div class="form-group">
                                            <label for="images" class="f-w-100">Choose Image</label>
                                            <input name="images" id="images" type="file"
                                                   class="form-control-file f-w-100" multiple onchange="readURL(this);">
                                            <img id="blah" src="" alt="your image"
                                                 style="border-radius: 5px; margin-top: 10px"/>
                                        </div>
                                        <?php foreach ($user as $items) : ?>
                                            <input type="hidden" name="userid" value="<?= $items["id"]; ?>"
                                                   class="form-control f-w-100">
                                        <?php endforeach; ?>
                                        <div>
                                            <button type="submit" class="btn btn-primary f-w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--///////////......About.......////////////-->
                    <div class="tab_n" id="about">
                        <h1 class="f-w-100">
                            About Dashbord Project
                        </h1>
                        <ul>
                            <li class=" f-w-100">
                                This is test Project
                            </li>
                        </ul>
                    </div>
                </diV>
            </div>
        </div>
    </section>
    <!-- modal register-->
    <div id="myModal-register" class="modal-register">
        <!-- Modal content -->
        <div class="modal-content-register">
            <span class="close-register">&times;</span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div>
                            <h2 class="f-w-100">Register</h2>
                            <hr>
                            <!--                        action="/Taskdev/register.php"-->
                            <form method="POST" id="formRegister">
                                <div class="form-group">
                                    <label for="fullname">fullname :</label>
                                    <input type="text" name="fullname" class="form-control fullname"
                                           value="<?= old('fullname') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <input type="text" name="username" class="form-control username"
                                           value="<?= old('username') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Email :</label>
                                    <input type="text" name="email" class="form-control email"
                                           value="<?= old('email') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" name="password" class="form-control Password">
                                </div>
                                <div class="form-group">
                                    <button type="button" id="submitReg" class="btn btn-danger f-w-100 sb ">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--script-->
    <script src="/public/js/jquery-3.5.1.js"></script>
    <script>
        $(".delete_user").click(function (){
            $id_user = $(this).attr('name');
            $.ajax({
                type: "GET",
                url: "/Deleteuser.php",
                data: {
                    userid: $id_user
                },
                cache: false,
                success: function (data) {
                }
            });

        });
        $("#submitReg").click(function (){
            $('#submitReg').attr('disable', 'disable');
                $fullname = $('.fullname').val();
                $username = $('.username').val();
                $email = $('.email').val();
                $Password = $('.Password').val();
                if ($fullname != "" && $username != "" && $email != "" && $Password != "") {
                    $.ajax({
                        url: "/register.php",
                        type: "POST",
                        data: {
                            fullname: $fullname,
                            username: $username,
                            email: $email,
                            Password: $Password
                        },
                        cache: false,
                        success: function (data) {
                            alert(data);
                        }
                    });
                }else {
                    alert("please insert all item");
                }

        });

    </script>
<?php require_once 'section/Footer.php' ?>