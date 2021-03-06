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

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(../public/images/page-banner-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Learn basic javascript</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Learn basic javasript</li>
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

<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <!-- start here check out event -->
            <div class="col-lg-8">
                <?php
                $checkout = (isset($_GET['checkout']) ? ($_GET['checkout']) : null);
                $courses = $db->select("SELECT id, title, price, description, created_at,thubnial FROM courses WHERE id = '$checkout'  LIMIT 1");
                if (is_array($courses) || is_object($courses)) :
                    if (mysqli_num_rows($courses) > 0) {
                        foreach ($courses as $course) :
                ?>

                            <div class="corses-singel-left mt-30">

                                <div class="title">
                                    <h3><?php echo $course['title']; ?></h3>
                                </div>
                                <!-- title -->
                                <div class="course-terms">
                                    <ul>
                                        <li>
                                            <div class="teacher-name">
                                                <div class="thum">
                                                    <img src="../public/images/course/teacher/t-1.jpg" alt="Teacher">
                                                </div>
                                                <div class="name">
                                                    <span>Teacher</span>
                                                    <h6>Mark anthem</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-category">
                                                <span>Category</span>
                                                <h6>Programaming </h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="review">
                                                <span>Review</span>
                                                <ul>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li class="rating">(20 Reviws)</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- course terms -->

                                <div class="corses-singel-image pt-50 mb-2">

                                    <img src="<?php echo $course['thubnial']; ?>" alt="This course has no Thumbnial">
                                </div>
                                <!-- check if gues is logged in or not -->
                                <div class="card-header mt-1">
                                <?php
                                if (isset($_SESSION["guest_login_id"])) {
                                    $guest_login_id = $_SESSION["guest_login_id"];
                                    session_write_close();
                                ?>
                                        <a href="" class="btn btn-primary btn-sm">Enroll Now</a>
                                <?php } ?>
                                </div>
                               
                                <!-- end gues check -->
                                <!-- corses singel image -->

                                <div class="corses-tab mt-30">
                                    <ul class="nav nav-justified" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="overview-description">
                                                <div class="singel-description pt-40">
                                                    <h6><?php echo $course['title']; ?></h6>
                                                    <p><?php echo $course['description'] ?></p>
                                                </div>

                                            </div>
                                            <!-- overview description -->
                                        </div>
                                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                            <div class="reviews-cont">
                                                <ul>
                                                    <li>
                                                        <div class="singel-reviews">
                                                            <div class="reviews-author">
                                                                <div class="author-thum">
                                                                    <img src="../public/images/review/r-3.jpg" alt="Reviews">
                                                                </div>
                                                                <div class="author-name">
                                                                    <h6>Tania Aktar</h6>
                                                                    <span>April 20, 2019</span>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-description pt-20">
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                                <div class="rating">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                    <span>/ 5 Star</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- singel reviews -->
                                                    </li>
                                                </ul>

                                                <div class="title pt-15">
                                                    <h6>Leave A Comment</h6>
                                                </div>

                                                <div class="reviews-form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-singel">
                                                                    <input type="text" placeholder="Fast name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-singel">
                                                                    <input type="text" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-singel">
                                                                    <div class="rate-wrapper">
                                                                        <div class="rate-label">Your Rating:</div>
                                                                        <div class="rate">
                                                                            <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                            <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                            <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                            <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                            <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-singel">
                                                                    <textarea placeholder="Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-singel">
                                                                    <button type="button" class="main-btn">Post Comment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;  ?>
                    <?php } else { ?>
                        <div class="col-lg-12">
                            <div class="corses-singel-left mt-30">
                                <div class="title">
                                    <h3>Complete JavaScript Course</h3>
                                </div>
                                <!-- title -->
                                <div class="course-terms">
                                    <ul>
                                        <li>
                                            <div class="teacher-name">
                                                <div class="thum">
                                                    <img src="../public/images/course/teacher/t-1.jpg" alt="Teacher">
                                                </div>
                                                <div class="name">
                                                    <span>Teacher</span>
                                                    <h6>Mark anthem</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-category">
                                                <span>Category</span>
                                                <h6>Programaming </h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="review">
                                                <span>Review</span>
                                                <ul>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javasc:void();"><i class="fa fa-star"></i></a></li>
                                                    <li class="rating">(20 Reviws)</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- course terms -->
                                <div class="corses-singel-image pt-50">
                                    <img src="../public/images/course/cu-1.jpg" alt="Courses">
                                </div>
                                <!-- corses singel image -->
                                <div class="corses-tab mt-30">
                                    <ul class="nav nav-justified" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="overview-description">
                                                <div class="singel-description pt-40">
                                                    <h6>Course Summery</h6>
                                                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum
                                                        velit. Nam nec tellus .</p>
                                                </div>
                                            </div>
                                            <!-- overview description -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endif;  ?>
            </div>
            <!-- end here check out event -->
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li>
                                <li><i class="fa fa-clone"></i>Leactures : <span>09</span></li>
                                <li><i class="fa fa-beer"></i>Quizzes : <span>05</span></li>
                                <li><i class="fa fa-user-o"></i>Students : <span>100</span></li>
                            </ul>
                            <div class="price-button pt-10">
                                <span>Price : <b>$25</b></span>
                            </div>
                        </div>
                        <!-- course features -->
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="You-makelike mt-30">
                            <h4>You make like </h4>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="../public/images/your-make/y-1.jpg" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>Introduction to machine languages</h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="../public/images/your-make/y-1.jpg" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>How to build a basis game with java </h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="../public/images/your-make/y-1.jpg" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>Basic accounting from primary</h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="releted-courses pt-95">
                    <div class="title">
                        <h3>Releted Courses</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="../public/images/course/cu-2.jpg" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
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
                                    <span>(20 Reviws)</span>
                                    <a href="check_event.php">
                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="../public/images/course/teacher/t-2.jpg" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>Mark anthem</h6>
                                            </a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- singel course -->
                        </div>
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="../public/images/course/cu-1.jpg" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
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
                                    <span>(20 Reviws)</span>
                                    <a href="check_event.php">
                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="../public/images/course/teacher/t-3.jpg" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>Mark anthem</h6>
                                            </a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- singel course -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- releted courses -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<?php require_once __DIR__ . '../public/ini/footer.php'; ?>