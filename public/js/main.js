$(document).ready(function () {
   $("#register_form").on('submit', function () {
       var ajax_path = "http://erp/public/";
       var status = false;
       var name = $("#username");
       var email = $("#email");
       var password1 = $("#password1");
       var password2 = $("#password2");
       var usertype = $("#usertype");
       // var n_patt = new RegExp(/^[A-Za-z ]+$/);
       // var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.)$/);

       if(name.val() == "" || name.val().length < 4) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please enter name. Name should be not less than 4 chars. </span>");
            status = false;
       } else {
           name.removeClass("border-danger");
           $("#u_error").html("");
           status = true;
       }

       if(email.val() == "") {
           email.addClass("border-danger");
           $("#e_error").html("<span class='text-danger'>Please enter correct email. </span>");
           status = false;
       } else {
           email.removeClass("border-danger");
           $("#e_error").html("");
           status = true;
       }

       if(password1.val() == "" || password1.val().length < 9) {
           password1.addClass("border-danger");
           $("#p_error").html("<span class='text-danger'>Please enter valid pass. Pass should be not less than 9 chars. </span>");
           status = false;
       } else {
           password1.removeClass("border-danger");
           $("#p_error").html("");
           status = true;
       }

       if(password2.val() == "" || password2.val().length < 9) {
           password2.addClass("border-danger");
           $("#p2_error").html("<span class='text-danger'>Please enter valid pass. Pass should be not less than 9 chars. </span>");
           status = false;
       } else {
           password2.removeClass("border-danger");
           $("#p2_error").html("");
           status = true;
       }

       if(usertype.val() == "") {
           usertype.addClass("border-danger");
           $("#t_error").html("<span class='text-danger'>Please select type. </span>");
           status = false;
       } else {
           password2.removeClass("border-danger");
           $("#t_error").html("");
           status = true;
       }

       if(password1.val() === password2.val()) {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    if (data == 'EMAIL_ALREADY_EXISTS') {
                        alert("It seems like your email is already used");
                    } else if(data = 'SOME_ERROR') {
                        alert("Something went wrong");
                    } else {
                        window.location.href = encodeURI('http://erp/public/index.php?msg="You are already redistred"')
                    }
                },
                error: function (data) {
                    console.log(data);
                }

            });
       } else {
           password2.addClass("border-danger");
           $("#p2_error").html("<span class='text-danger'>Passwords doesn't match</span>");
           status = false;
       }
   });

    $("#login_form").on('submit', function () {
        var status = false;
        var email = $("#log_email");
        var password = $("#log_password");

        if(email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please enter correct email. </span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        if(password.val() == "" || password.val().length < 9) {
            password.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please enter valid pass. Pass should be not less than 9 chars. </span>");
            status = false;
        } else {
            password.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }

        if (status) {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    if (data == 'NOT_REGISTRED') {
                        $("#e_error").html("It seems like you dont have accound");
                    } else if(data == 'PASS_NOT_MATCHED') {
                        $("#p_error").html("Please, enter correct password.");
                    } else {
                        window.location.href = encodeURI('http://erp/public/dashboard.php')
                    }
                },
                error: function (data) {
                    console.log(data);
                }

            });
        }
    });
})