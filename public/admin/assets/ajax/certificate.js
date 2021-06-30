$(document).ready(function () {
    $(document).on('click', '#make__certificate__Btb', function (e) {
        e.preventDefault();
        let certificate__name = $('input#certificate__name').val().trim();
        let certificate__description = $('textarea#certificate__description').val().trim();
        let certificate__studentid = $('select#certificate__studentid').val().trim();
        let certificate__event = $('select#certificate__event').val().trim();
        let certificate__coursesid = $('select#certificate__coursesid').val().trim();
        // ============================
        if (certificate__name.length == 0) {
            $('#certificate__name').focus();
            $('#certificate__nameError').text('Certificate Must Have a Name');
            return false;
        } else {
            $('#certificate__nameError').text('');
        }
        // ============================
        if (certificate__description.length == 0) {
            $('#certificate__description').focus();
            $('#certificate__descriptionError').text('A Certificate Must Have Description');
            return false;
        } else {
            $('#certificate__descriptionError').text('');
        }
        // ============================
        if (certificate__studentid == 0) {
            $('select#certificate__studentid').focus();
             $('#certificate__studentidError').text('Select A Participant');
            return false;
        } else {
          $('#certificate__studentidError').text('');
        }
        // ============================
        if (certificate__event == 0) {
            $('select#certificate__event').focus();
             $('#certificate__eventError').text('Select A Speaker');
            return false;
        } else {
          $('#certificate__eventError').text('');
        }
        // ============================
        if (certificate__coursesid == 0) {
            $('select#certificate__coursesid').focus();
             $('#certificate__coursesidError').text('Select A Course');
            return false;
        } else {
          $('#certificate__coursesidError').text('');
        }
        $.ajax({
            url: '/app/certificate/insert.php',
            method: 'POST',
            data: {
                certificate__name: certificate__name,
                certificate__description: certificate__description,
                certificate__studentid: certificate__studentid,
                certificate__event: certificate__event,
                certificate__coursesid: certificate__coursesid,
            },
            success: function (data) {
                $('#certificate_message').html(data);
                $("form").trigger("reset");
                // setTimeout(() => {
                //     window.location.reload();
                // }, 3000);
            }
        });
        
        // ============================
    });
});


// only text 
function process(input) {
    let value = input.value;
    let letters = value.replace(/[0-9]/g, "");
    input.value = letters;
}