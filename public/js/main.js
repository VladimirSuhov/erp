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
           $('.overlay').show();
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    $('.overlay').hide();
                    if (data == 'EMAIL_ALREADY_EXISTS') {
                        alert("It seems like your email is already used");
                    } else if(data = 'SOME_ERROR') {
                        alert("Something went wrong");
                    } else {
                        $('.overlay').hide();
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
            $('.overlay').show();
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    $('.overlay').hide();
                    if (data == 'NOT_REGISTRED') {
                        $("#e_error").html("It seems like you dont have accound");
                    } else if(data == 'PASS_NOT_MATCHED') {
                        $("#p_error").html("Please, enter correct password.");
                    } else {
                        $('.overlay').hide();
                        window.location.href = encodeURI('http://erp/public/dashboard.php')
                    }
                },
                error: function (data) {
                    console.log(data);
                }

            });
        }
    });
    
    
    //Fetch category
    fetch_category();
    function fetch_category() {
        $.ajax({
           url: 'http://erp/public/includes/process.php',
           method: 'post',
           data: {getCategory:1},
           success: function (data) {
               var root = "<option value='0'>Root</option>";
                $('#parent_category, #product_category, #update_parent_category').html(data);
            }
        });
    }

    //Fetch category
    fetch_brands();
    function fetch_brands() {
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {getBrand:1},
            success: function (data) {
                var root = "<option value='0'>Root</option>";
                $('#product_brand').html(data);
            }
        });
    }

    //Add category

    $("#form_category").on('submit', function () {
       if ($("#category_name").val() == "") {
           $("#category_name").addClass("border-danger");
           $("#cat_error").html("<span class='text-danger'>Please enter category name.</span>");
       } else {
           $.ajax({
               url: 'http://erp/public/includes/process.php',
               method: 'post',
               data: $("#form_category").serialize(),
               success: function (res) {
                   res = JSON.parse(res);
                   if(res.success == true) {
                       $("#cat_error").html("<span class='text-success'>New category has been added.</span>");
                       $("#category_name").val("")
                   } else {
                       alert(res);
                   }
               }
           })
       }
    });

    //Add brand
    $("#form_brands").on('submit', function () {
        if ($("#brand_name").val() == "") {
            $("#brand_name").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please enter brand name.</span>");
        } else {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $("#brand_name").serialize(),
                success: function (res) {
                    res = JSON.parse(res);
                    console.log(res.success);
                    if(res.success == true) {
                        $("#brand_error").html("<span class='text-success'>New brand has been added.</span>");
                        $("#brand_name").val("")
                    } else {
                        alert(res);
                    }
                }
            })
        }
    });

    //Add brand
    $("#add_product").on('submit', function () {
        if ($("#product_name").val() == "") {
            $("#product_name").addClass("border-danger");
            $("#product_error").html("<span class='text-danger'>Please enter product name.</span>");
        } else if($("#product_price").val() == "") {
            $("#product_price").addClass("border-danger");
            $("#price_error").html("<span class='text-danger'>Please enter product price.</span>");
        } else if($("#product_quantity").val() == "") {
            $("#product_quantity").addClass("border-danger");
            $("#quantity_error").html("<span class='text-danger'>Please enter product quantity.</span>");
        } else {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        $("#product_error").html("<span class='text-success'>New product has been added.</span>");
                        $("#product_name").val("")
                        $("#product_price").val("")
                        $("#product_quantity").val("")
                    } else {
                        alert(res);
                    }
                }
            })
        }
    });

});