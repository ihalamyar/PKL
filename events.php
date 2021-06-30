<?php require_once __DIR__ . '../public/ini/header.php'; ?>
<!-- <?php require_once __DIR__ . '../public/navbar/preloader.php'; ?> -->
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
    </div>
    <!--====== PAGE BANNER PART START ======-->
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Events</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
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

    <!--====== EVENTS PART START ======-->

    <section id="event-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">

            <!-- load events -->
            <?php $posts = $db->query("SELECT * FROM event ORDER BY start_time"); ?>
				<?php if($posts->num_rows <=0){
                   echo 'No Course available';
                } ?>
                <?php  foreach ($posts as $item): ?>
                <div class="col-lg-6">
                    <div class="singel-event-list mt-30">
                        <div class="event-thum">
                            <img src="../public/resources/images/bg-2.jpg" alt="Event">
                        </div>
                        <div class="event-cont">
                            <span><i class="fa fa-calendar"></i> <?php echo date('d,D,F', strtotime($item['start_time'])); ?></span>
                            <a href="events-singel.php">
                                <h4><?php echo $item['title']; ?></h4>
                            </a>
                            <span><i class="fa fa-clock-o"></i><?php echo date('h:i A', strtotime($item['start_time'])); ?> - <?php echo date('h:i A', strtotime($item['start_end'])); ?> </span>
                            <span><i class="fa fa-pencil"></i><?php echo $item['speaker'];?></span>
                            <p><?php echo $item['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php  endforeach; ?>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- courses pagination -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <?php require_once __DIR__ . '../public/ini/footer.php'; ?>