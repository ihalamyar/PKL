<?php require_once __DIR__ . '/admin_ini/header.php'; ?>
<!-- header end -->
<?php require_once __DIR__ . '/admin_navbar/admin_navbar.php'; ?>
<?php require_once __DIR__ . '/../../app/course/insert.php'; ?>
<main class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-info" role="alert">
                <?php echo $message; ?>
            </div>
            <form id="make_course_mdal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $userid; ?>" id="postuserid" class="form-control" name="postuserid" placeholder="Author ID" autocomplete="off">
                    <small id="postuseridError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <input type="text" id="posttitle" name="posttitle" class="form-control" name="posttitle" placeholder="Post Title" autocomplete="off">
                    <small id="posttitleError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <input type="text" onkeypress="return isNumber(event)" id="postprice" class="form-control" name="postprice" placeholder="Post Price" autocomplete="off">
                    <small id="postpriceError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <textarea name="postdescription" id="postdescription" class="form-control" placeholder="Post description"></textarea>
                    <small id="postdescriptionError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="course__thumbnail" name="course__thumbnail" required />
                    <small id="course__thumbnailError" class="text-danger"></small>
                </div>
                <button type="submit" class="btn btn-primary" name="makeCourseBtn">submit</button>
            </form>
        </div>
    </div>

</main>

<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>