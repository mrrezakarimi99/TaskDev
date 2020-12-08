<?php require_once 'section/Header.php' ?>
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
                <h2 class="f-w-100">Update Post</h2>
                <hr>
                <form action="/TaskDev/PostUpdate.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titleupdate">title :</label>
                        <input type="text" name="titleupdate" class="form-control "
                               value="<?= $postup[0]->title ?>">
                    </div>
                    <div class="form-group">
                        <label for="Descriptionupdate" class="f-w-100">Description</label>
                        <textarea class="form-control" name="Descriptionupdate"
                                  rows="3"> <?= $postup[0]->description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Categoryupdate" class="f-w-100">Category</label>
                        <select name="Categoryupdate" class="form-control"">
                        <?php foreach ($cats as $items): ?>

                            <option <?php if ($items->category_id == $postup[0]->category_id) { ?> selected
                            <?php } ?>
                                    value="<?= $items->category_id ?>"><?= $items->category_name ?></option>

                        <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (!isset($postup[0]->images)){ ?>
                    <div class="form-group">
                        <label for="Imgupdate">image :</label>
                        <input class="form-control " type="file"  id="Imgupdate" name="Imgupdate">
                    </div>
                    <?php }?>

                    <div class="parent right">
                        <div class="child "

                             style="background-image: url(data:image/jpeg;base64,<?= base64_encode($postup[0]->images); ?>">
                            <a href="Deletephoto.php?userid=<?php echo $postup[0]->id ; ?>" class="tag_a"><i class="fa fa-times newicon"></i></a>
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center;  ">
                        <button type="submit" style="width: 100%;"
                                class="btn btn-danger f-w-100">Submit
                        </button>
                    </div>
                    <input name="idup" type="hidden" value="<?= $postup[0]->id ?>">
                </form>
            </div>
            <form action="/TaskDev/adminpanel.php">
                <div style="text-align: center">
                    <button type="submit" style="width: 100%; color: #fff;" class="btn btn-danger f-w-100 mb-2">Cancel
                    </button>
                </div>
            </form>
            <?php if (!is_null($statusupdate)) : ?>
                <div id="success" class="alert alert-danger">
                    <?= $statusupdate ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<?php require_once 'section/Footer.php' ?>
