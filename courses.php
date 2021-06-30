<?php require_once __DIR__ . '../public/ini/header.php'; ?>
<!--====== PRELOADER PART START ======-->
<!-- <?php require_once __DIR__ . '../public/navbar/preloader.php'; ?> -->
<!--====== Header and PreHeader with title ======-->
<?php require_once __DIR__ . '../public/navbar/navbar.php'; ?>

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- serach form -->
</div>

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(../public/images/page-banner-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Our Courses</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
                <!-- page banner cont -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES PART START ======-->

<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                        <li class="nav-item">Showning 4 0f 24 Results</li>
                    </ul>
                    <!-- nav -->

                    <div class="courses-search float-right">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- courses search -->
                </div>
                <!-- courses top search -->
            </div>
        </div>
        <!-- row -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row">
                    <?php
                    $number_per_page = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_from = ($page - 1) * 3;
                    $posts = $db->query("SELECT * FROM courses LIMIT $start_from, $number_per_page ");
                    ?>
                    <?php
                    $number_of_result = mysqli_num_rows($posts);
                    if ($number_of_result) {
                        while ($item = mysqli_fetch_array($posts)) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="<?php echo $item['thubnial']; ?>" height="200px;" alt="Course">
                                        </div>
                                        <div class="price">
                                            <a href="check_event.php?checkout=<?php echo $item['id']; ?>"> <span>Check</span></a>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <div>(20 Reviws)</div>
                                        <div>
                                            <a href="check_event.php?checkout=<?php echo $item['id']; ?>">
                                                <h4><?php echo $item['title']; ?></h4>
                                            </a>
                                        </div>

                                        <div class="card-header mt-1">
                                            <?php
                                            if (isset($_SESSION["guest_login_id"])) {
                                                $guest_login_id = $_SESSION["guest_login_id"];
                                                session_write_close();
                                            ?>
                                            <?php }else{ ?> 
                                                <a href="/public/admin/login.php" class="btn btn-primary btn-sm">Enroll Now</a>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                                <!-- singel course -->
                            </div>
                            <!-- while loop end -->
                    <?php }
                    } ?>
                </div>
                <!-- row -->
            </div>
            <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                <div class="row">
                    <!-- cards in column -->
                </div>
            </div>
        </div>
        <!-- pagination -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    <ul class="pagination justify-content-center">
                        <?php
                        $per_result = $db->query("SELECT * FROM courses");
                        $total_record = mysqli_num_rows($per_result);
                        if ($total_record) {
                            $total_page = ceil($total_record / $number_per_page);
                            if ($page > 1) {
                        ?>
                                <li class='page-item'><a href='courses.php?page=<?php echo ($page - 1) ?>'><i class='fa fa-angle-left'></i></a></li>
                            <?php }
                            for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li class="page-item"><a href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php
                                if ($i > $page) { ?>
                                    <li class='page-item'><a href='courses.php?page=<?php echo ($page + 1) ?>'><i class='fa fa-angle-right'></i></a></li>
                        <?php }
                            }
                        } ?>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- end pagination -->
    </div>
    <!-- container -->
</section>


<!--====== PATNAR LOGO PART ENDS ======-->
<?php require_once __DIR__ . '../public/ini/footer.php'; ?>