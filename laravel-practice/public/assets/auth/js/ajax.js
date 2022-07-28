$(document).ready(function() {
    $("#users-form-login").on("submit", function(e) {
        e.preventDefault();
        let email = $('#email[name="email"]').val().trim();
        let password = $('#password[name="password"]').val().trim();
        let actionUrl = $(this).attr("action");
        let cstfToken = $(this).find('input[name="_token"]').val();
        $(".error").text("");
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: {
                email: email,
                password: password,
                _token: cstfToken
            },
            dataType: 'json',
            success: function(data) {
                let success = $(".success").show();
                if(data.status == true){
                    switch (data.role) {
                        case 1:
                            if (data.status == true) {
                                success.text(data.msg);
                                window.location = data.redirect_location;
                            }
                            break;
                            case 2:
                                if (data.status == true) {
                                    success.text(data.msg);
                                    window.location = data.redirect_location;
                            } 
                            break;
                        }
                }else{
                    success.text('Email or Password is incorrect');
                }
            },
            error: function(error) {
                $(".msg_error").show();
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

    $('#users-form-register').on('submit', function (e) {
    e.preventDefault();
    let actionUrl = $(this).attr("action");
    let cstfToken = $(this).find('input[name="_token"]').val();
    $(".error").text("");
    $.ajax({
        url:actionUrl,
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data) {
            $('.success').text(data.msg);
            window.location = data.redirect_location;

        },
        error: function(error) {
                $(".msg_error").show();
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
});