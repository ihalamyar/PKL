<?php require_once __DIR__ . '/admin_ini/header.php'; ?>
<?php require_once __DIR__ . '/admin_navbar/admin_navbar.php'; ?>
<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
	<div class="ttr-sidebar-wrapper content-scroll">
		<div class="ttr-sidebar-logo">
			<a href="#"><img alt="" src="assets/images/logo-3.png" width="50" height="20"></a>
			<div class="ttr-sidebar-toggle-button">
				<i class="ti-arrow-left"></i>
			</div>
		</div>
		
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
			<h4 class="breadcrumb-title">Certificate</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
				<li>Dashboard</li>
				<li><a href="../../app/certificate/certificate.php"><i class="fa fa-home"></i>Certificate</a></li>
			</ul>
		</div>
		<!-- Card -->
		<div class="row">
		<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
			<a href="make_certificate.php" target="_blank" class="btn btn-primary mb-3">New Certificate</a>
		</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				<div class="widget-card widget-bg1">
					<div class="wc-item">
						<?php
						$post = $db->query("SELECT nim, COUNT(nim) AS countData FROM student");
						foreach ($post as $item) :
						?>
							<h4 class="wc-title">
								Total Of Students
							</h4>
							<span class="wc-des">
								All Customs Value
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo $item['countData']; ?></span>
							</span>
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									78%
								</span>
							</span>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				<div class="widget-card widget-bg2">
					<div class="wc-item">
						<?php
						$post = $db->query("SELECT teacherid, COUNT(teacherid) AS countTeacher FROM teacher");
						foreach ($post as $item) :
						?>
							<h4 class="wc-title">
								Total Of Teachers
							</h4>
							<span class="wc-des">
								Teachers
							</span>
							<span class="wc-stats counter">
								<?php echo $item['countTeacher']; ?>
							</span>
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									88%
								</span>
							</span>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				<div class="widget-card widget-bg3">
					<div class="wc-item">
						<?php
						$post = $db->query("SELECT sub_id, COUNT(sub_id) AS countSubject FROM subjects");
						foreach ($post as $item) :
						?>
							<h4 class="wc-title">
								Total Of Subjects
							</h4>
							<span class="wc-des">
								All Subjects available
							</span>
							<span class="wc-stats counter">
								<?php echo $item['countSubject']; ?>
							</span>
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									65%
								</span>
							</span>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				<div class="widget-card widget-bg4">
					<div class="wc-item">
						<?php
						$post = $db->query("SELECT id, COUNT(id) AS countEvent FROM event");
						foreach ($post as $item) :
						?>
							<h4 class="wc-title">
								All Events
							</h4>
							<span class="wc-des">
								New and Old events here
							</span>
							<span class="wc-stats counter">
								<?php echo $item['countEvent']; ?>
							</span>
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									90%
								</span>
							</span>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
		<!-- Card END -->
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-8 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>List Of Certificates</h4>
					</div>
					<div class="widget-inner" id="table__scroll">
						<table class="table small">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Description</th>
									<th scope="col">Student ID</th>
									<th scope="col">Event ID</th>
									<th scope="col">Course ID</th>
									<th scope="col">Generate</th>
								</tr>
							</thead>
							<tbody>
								<?php $posts = $db->query("SELECT id, certificate_name,certificate_desc,student_id,event_id,courses_id FROM certificate ORDER BY certificate_name "); ?>
								<?php foreach ($posts as $item) : ?>
									<tr>
										<td><?php echo $item['certificate_name']; ?></td>
										<td><?php echo $item['certificate_desc']; ?></td>
										<td><?php echo $item['student_id']; ?></td>
										<td><?php echo $item['event_id']; ?></td>
										<td><?php echo $item['courses_id']; ?></td>
										<td>
										<a href="../../app/certificate/certificate.php?certificateid=<?php echo $item['id']; ?>" target="_blank">Make</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<!-- <canvas id="chart" width="100" height="45"></canvas> -->
					</div>


				</div>
			</div>
			<!-- Your Profile Views Chart END-->
			<div class="col-lg-4 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>Notifications</h4>
					</div>
					<div class="widget-inner">
						<div class="noti-box-list">
							<ul>
								<li>
									<span class="notification-icon dashbg-gray">
										<i class="fa fa-check"></i>
									</span>
									<span class="notification-text">
										<span>Sneha Jogi</span> sent you a message.
									</span>
									<span class="notification-time">
										<a href="#" class="fa fa-close"></a>
										<span> 02:14</span>
									</span>
								</li>
								<li>
									<span class="notification-icon dashbg-yellow">
										<i class="fa fa-shopping-cart"></i>
									</span>
									<span class="notification-text">
										<a href="#">Your order is placed</a> sent you a message.
									</span>
									<span class="notification-time">
										<a href="#" class="fa fa-close"></a>
										<span> 7 Min</span>
									</span>
								</li>
								<li>
									<span class="notification-icon dashbg-red">
										<i class="fa fa-bullhorn"></i>
									</span>
									<span class="notification-text">
										<span>Your item is shipped</span> sent you a message.
									</span>
									<span class="notification-time">
										<a href="#" class="fa fa-close"></a>
										<span> 2 May</span>
									</span>
								</li>
								<li>
									<span class="notification-icon dashbg-green">
										<i class="fa fa-comments-o"></i>
									</span>
									<span class="notification-text">
										<a href="#">Sneha Jogi</a> sent you a message.
									</span>
									<span class="notification-time">
										<a href="#" class="fa fa-close"></a>
										<span> 14 July</span>
									</span>
								</li>
								<li>
									<span class="notification-icon dashbg-primary">
										<i class="fa fa-file-word-o"></i>
									</span>
									<span class="notification-text">
										<span>Sneha Jogi</span> sent you a message.
									</span>
									<span class="notification-time">
										<a href="#" class="fa fa-close"></a>
										<span> 15 Min</span>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>