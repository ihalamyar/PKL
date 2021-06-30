<?php require_once __DIR__ . '/admin_ini/header.php'; ?>

<!-- header end -->
<?php require_once __DIR__ . '/admin_navbar/admin_navbar.php'; ?>
<!-- header end -->
<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="main.php"><img alt="" src="assets/images/logo-3.png" width="50" height="20"></a>
            <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
                        <i class="material-icons ttr-fixed-icon">gps_fixed</i>
                        <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
            </div> -->
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
                <li>
                    <a href="main.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-home"></i></span>
                        <span class="ttr-label">Dashborad</span>
                    </a>
                </li>
                <li>
                    <a href="courses.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Courses</span>
                    </a>
                </li>
                <li>
                    <a href="Event.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Event</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-calendar"></i></span>
                        <span class="ttr-label">Calendar</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="basic-calendar.html" class="ttr-material-button"><span class="ttr-label">Basic Calendar</span></a>
                        </li>
                        <li>
                            <a href="list-view-calendar.html" class="ttr-material-button"><span class="ttr-label">List View</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="bookmark.html" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="review.html" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-comments"></i></span>
                        <span class="ttr-label">Review</span>
                    </a>
                </li>
                <li>
                    <a href="add-listing.html" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
                        <span class="ttr-label">Add listing</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">My Profile</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="user-profile.html" class="ttr-material-button"><span class="ttr-label">User Profile</span></a>
                        </li>
                        <li>
                            <a href="teacher-profile.html" class="ttr-material-button"><span class="ttr-label">Teacher Profile</span></a>
                        </li>
                    </ul>
                </li>
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->

<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Events</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Events</li>
            </ul>
        </div>
        <div class="row">
            <!-- Your Profile Views Chart -->

            <div class="col-lg-12 m-b30">


                <div class="widget-box">
                    <div class="wc-title">

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EventMakeModal">
                            Add New Event
                        </button> -->
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Make__Event__Modal">
                            Make New Event
                        </button>
                    </div>
                    <div class="wc-title">
                        <h4>All Events</h4>
                    </div>
                    <?php $posts = $db->query("SELECT id, title, description, speaker, location, start_time, start_end FROM event ORDER BY created_at DESC "); ?>
                    <?php
                    if (is_array($posts) || is_object($posts))
                        foreach ($posts as $item) :
                    ?>
                        <div class="widget-inner">
                            <div class="card-courses-list admin-courses">
                                <div class="card-courses-media">
                                    <img src="assets/images/courses/pic1.jpg" alt="" />
                                </div>
                                <div class="card-courses-full-dec">
                                    <div class="card-courses-title">
                                        <h4><?php echo $item['title']; ?></h4>
                                    </div>
                                    <ul class="card-courses-view">
                                        <li class="card-courses-categories">
                                            <h4>Location</h4>
                                            <small class="text-primary">
                                                <?php echo $item['location']; ?>
                                            </small>
                                        </li>
                                    </ul>
                                    <br />
                                    <div class="card-courses-list-bx">
                                        <ul class="card-courses-view">
                                            <li class="card-courses-user">
                                                <div class="card-courses-user-pic">
                                                    <img src="assets/images/testimonials/pic3.jpg" alt="" />
                                                </div>
                                                <div class="card-courses-user-info">
                                                    <h5><?php echo $item['speaker']; ?></h5>
                                                </div>
                                            </li>
                                            <li class="card-courses-categories">
                                                <h4>Start</h4>
                                                <small class="text-primary">
                                                    <?php echo date('jS, M, y, g:i A',  strtotime($item['start_time'])); ?>
                                                </small>
                                            </li>
                                            <li class="card-courses-categories">
                                                <h4>End</h4>
                                                <small class="text-primary">
                                                    <?php echo date('jS, M, y, g:i A',  strtotime($item['start_end'])); ?>
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row card-courses-dec">
                                        <div class="col-md-12" style=" overflow-wrap: break-word;
                                                word-wrap: break-word;
                                                hyphens: auto;">
                                            <h6 class="m-b10">Event Description</h6>
                                            <p><?php echo $item['description']; ?></p>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn red  outline radius-xl btn-sm event__delete__Btn" id="<?php echo $item['id']; ?>">Delete</button>
                                            <button type="button" class="btn green outline radius-xl btn-sm event__fetch__Btn" data-toggle="modal" data-target="#Event__Edit__Modal" id="<?php echo $item['id']; ?>">
                                               Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
</main>
<div class="ttr-overlay"></div>

<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>