$(document).ready(function() {
    $('.add-data').click(function() {
        $('#addadminprofile').modal('show');
    });
  
    $('#addform_Data').on('submit', function(e) {
        e.preventDefault();
        let actionUrl = $(this).attr("action");
        let cstfToken = $(this).find('input[name="_token"]').val();
        $('.errors').text('');
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                $('#addadminprofile').modal('hide');
                $('.success').css('display', 'block');
                setTimeout(function() {
                    $('.success').css('display', 'none');
                }, 1500);
                $('#addform_Data')[0].reset();
                location.reload();
                $(".success").html(data.message)
            },
            error: function(error) {
                let responJson = error.responseJSON.errors;
                if (Object.keys(responJson).length > 0) {
                    $(".msg_error").text(responJson.msg);
                    for (let key in responJson) {
                        $("." + key + "_error").text(responJson[key]);
                    }
                }
            }
        });
    });

    $('.view-data').click(function() {
        // var id = $(this).data('id');
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url: url,
            success: function(data) {

                $('#fullname-show').val(data['fullname']);
                $('#email-show').val(data['email']);
                $('#gender-show').val(data['gender']);
                $('#status-show').val(data['status']);
                $('#role_id-show').val(data['role']);
                $('#viewadminprofile').modal('show');
            }
        });
    });
});