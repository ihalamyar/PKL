<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<!-- time picker -->
<script src='assets/js/tempusdominus-bootstrap-4.min.js'></script>
<!-- link ajax for inserting data, course, event -->
<script src="assets/ajax/course.js"></script>
<script src="assets/ajax/event.js"></script>
<script src="assets/ajax/certificate.js"></script>
<!-- course modal -->

<?php require_once __DIR__ . '/../modals/course/make_course.php'; ?>
<?php require_once __DIR__ . '/../modals/course/edit_course.php'; ?>
<!-- event modal -->
<?php require_once  __DIR__ . '/../modals/event/make.php'; ?>
<?php require_once  __DIR__ . '/../modals/event/edit.php'; ?>
<!-- timepicker script -->
<script type="text/javascript">
  $(function() {
    $('#startTime').datetimepicker({});
  });
  $(function() {
    $('#endTime').datetimepicker({});
  });
  $(function() {
    $('#event_update_start_time').datetimepicker({});
  });
  $(function() {
    $('#event_update_end_time').datetimepicker({});
  });
</script>
<!-- image -->
<script>
  $('#course__thumbnail').change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))) {
      $('#course__thumbnailError').text("format: jpeg, png, jpg");
      $("#course__thumbnail").val('');
      return false;
    } else {
      $('#course__thumbnailError').text("");
    }
    
  });
  // $('input[type="file"]').change(function(e) {
  //     e.preventDefault();
  //     var fileName = e.target.files[0].name;
  //     $('.custom-file-label').html(fileName);
  //   });
</script>
<!-- end -->
<script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2019-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [{
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });
</script>

</body>


</html>