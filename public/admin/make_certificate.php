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
		</nav>
	</div>
</div>

<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container">
		<div class="db-breadcrumb ">
			<h4 class="breadcrumb-title">Courses</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
				<li>Courses</li>
			</ul>
		</div>
		<!-- content -->
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-8  ">
				<h4 class="mb-3">New Certificate</h4>
				<div class="alert alert-info" role="alert" id="certificate_message"></div>
				<form class="needs-validation" method="POST">
					<div class="row g-3">
						<div class="col-sm-12 mt-2">
							<input type="text" oninput="process(this)" class="form-control" id="certificate__name" name="certificate__name" placeholder="Certificate Name">
							<small id="certificate__nameError" class="text-danger"></small>
						</div>
						<div class="col-12 mt-2">
							<textarea class="form-control" name="certificate__description" id="certificate__description" cols="30" rows="10" placeholder="Write Brief Description"></textarea>
							<small id="certificate__descriptionError" class="text-danger"></small>
						</div>
						<!-- student or participant -->
						<div class="col-12 mb-2 mt-2">
							<select name="certificate__studentid" id="certificate__studentid" class="form-control">
								<option value="0"  style="display: none" selected>Select A Participant</option>
								<?php $post = $db->query("SELECT nim, name FROM student"); ?>
								<?php foreach ($post as $student) : ?>
									<option value="<?php echo $student['nim']; ?>"><?php echo $student['name']; ?></option>
								<?php endforeach; ?>
							</select>
								<small id="certificate__studentidError" class="text-danger"></small>
						</div>
						<!-- Event Speaker of Teacher -->
						<div class="col-12 mb-2">
							<select name="certificate__event" id="certificate__event" class="form-control">
								<option value="0" style="display:none" selected>Select A Speaker</option>
								<?php $post = $db->query("SELECT id, title FROM event"); ?>
								<?php foreach ($post as $teacher) : ?>
									<option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['title']; ?></option>
								<?php endforeach; ?>
							</select>
							<small id="certificate__eventError" class="text-danger"></small>
						</div>
						<!-- Course or subjects -->
						<div class="col-12 mb-2">
							<select name="certificate__coursesid" id="certificate__coursesid" class="form-control">
								<option value="0" style="display:none" selected>Select A Course</option>
								<?php $post = $db->query("SELECT id, title FROM courses"); ?>
								<?php foreach ($post as $course) : ?>
									<option value="<?php echo $course['id']; ?>"><?php echo $course['title']; ?></option>
								<?php endforeach; ?>
							</select>
							<small id="certificate__coursesidError" class="text-danger"></small>
						</div>
					</div>
					<button class="w-100 btn btn-primary btn-lg" id="make__certificate__Btb">Submit</button>
				</form>
			</div>
		</div>
	</div>
	</div>
</main>
<div class="ttr-overlay"></div>
<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>