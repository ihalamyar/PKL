
$(document).ready(function () {
    $(document).on('click', '#make__post__btn', function (e) {
        e.preventDefault();
        let postuserid = $('#postuserid').val().trim();
        let posttitle = $('#posttitle').val().trim();
        let postprice = $('#postprice').val().trim();
        let postdescription = $('#postdescription').val().trim();
        let course__thumbnail = $('#course__thumbnail').val();

        if (postuserid.length == 0) {
            $('#postuserid').focus();
            $('#postuseridError').css('color', 'red').text('Author ID empty');
            return false;
        } else {
            $('#postuseridError').text('');
        }
        // ----------------------------
        if (posttitle.length == 0) {
            $('#posttitle').focus();
            $('#posttitleError').css('color', 'red').text('Post title empty');
            return false;
        } else {
            $('#posttitleError').text('');
        }
        // ----------------------------
        if (postprice.length == 0) {
            $('#postprice').focus();
            $('#postpriceError').css('color', 'red').text('Post price empty');
            return false;
        }
        if (postdescription.length == 0) {
            $('#postdescription').focus();
            $('#postdescriptionError').css('color', 'red').text('Post Description empty');
            return false;
        } else {
            $('#postdescriptionError').text('');
        }
        //   
        // File type validation
        if (course__thumbnail.length <= 0) {
            $('#course__thumbnail').focus();
            $('#course__thumbnailError').text('Select a File');
            return false;
        }
        var fd = new FormData();
        var files = $('#course__thumbnail')[0].files;
        if (files.length > 0) {
            fd.append('file', files[0]);
            $.ajax({
                url: '/app/course/insert.php',
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                // data: {
                //     postuserid: postuserid,
                //     posttitle: posttitle,
                //     postprice: postprice,
                //     postdescription: postdescription,
                //     course__thumbnail: course__thumbnail,
                // },
                // beforeSend: function () {
                //     $('#make__post__btn').attr("disabled", "disabled");
                //     $('#make_course_mdal').css("opacity", ".5");
                // },
                success: function (data) {
                    $('#course_message').html(data);
                    $("#make_course_mdal").trigger("reset");
                    // setTimeout(() => {
                    //     window.location.reload();
                    // }, 3000);
                    // $('#make_course_mdal').css("opacity", "");
                    // $("#make__post__btn").removeAttr("disabled");
                },
            });
        }

    });

});
// --------------------fetch
$(document).ready(function () {
    $(document).on("click", ".course__fetch__Btn", function (e) {
        e.preventDefault();
        let id = $(this).attr("id");
        $.ajax({
            url: '/app/course/fetch.php',
            method: "POST",
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                $('input#course_post_id').val(data[0]);
                $('input#course_post_title').val(data[1]);
                $('input#course_post_price').val(data[2]);
                $('textarea#course_post_desc').val(data[3]);
                // $('#post_edit').html(data);
            }
        });
    });
});
// -----------update
$(document).ready(function () {
    $(document).on('click', '#edit__post__Btn', function (e) {
        e.preventDefault();
        let course_post_id = $('#course_post_id').val().trim();
        let course_post_title = $('#course_post_title').val().trim();
        let course_post_price = $('#course_post_price').val().trim();
        let course_post_desc = $('#course_post_desc').val().trim();

        if (course_post_id.length == 0) {
            $('#course_post_id').focus();
            $('#postuseridErrorid').css('color', 'red').text('Author ID empty');
            return false;
        } else {
            $('#postuseridErrorid').text('');
        }
        //====================

        if (course_post_title.length == 0) {
            $('#course_post_title').focus();
            $('#posttitleErroredit').css('color', 'red').text('Post title empty');
            return false;
        } else {
            $('#posttitleErroredit').text('');
        }
        //====================
        if (course_post_price.length == 0) {
            $('#course_post_price').focus();
            $('#postpriceErroredit').css('color', 'red').text('Post price empty');
            return false;
        } else {
            $('#postpriceErroredit').text('');
        }
        //====================
        if (course_post_desc.length == 0) {
            $('#course_post_desc').focus();
            $('#postdescriptionErroredit').css('color', 'red').text('Post Description empty');
            return false;
        } else {
            $('#postdescriptionErroredit').text('');
        }
        //====================
        $.ajax({
            url: '/app/course/update.php',
            method: 'POST',
            data: {
                course_post_id: course_post_id,
                course_post_title: course_post_title,
                course_post_price: course_post_price,
                course_post_desc: course_post_desc
            },
            success: function (data) {
                $('#post_edit').html(data);
                $("form").trigger("reset");
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            }
        })
    });
});
// --------------------delete
$(document).ready(function () {
    $('.course__delete__Btn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            $.ajax({
                url: '/app/course/delete.php',
                type: 'POST',
                data: { id: id },
                success: function (data) {
                    $(this).remove();
                }
            });
        }
    });
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


// send request from user to course for entrollment
