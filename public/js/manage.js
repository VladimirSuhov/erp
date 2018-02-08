$(document).ready(function () {
    //Manage Category
    manageCategory(1);
    function manageCategory(pn) {
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {manageCategory: 1, pageno: pn},
            success: function (res) {
                $("#get_category").html(res);
            }
        })
    }

    $("body").on('click', '.page-link', function (e) {
        e.preventDefault();
        var pn = $(this).attr('pn');
        manageCategory(pn);
    });


    //Delete category
    $("body").on('click', '.delete-cat', function (e) {
        e.preventDefault();
        var del_id = $(this).attr("data-id");

        if (confirm("A you sure to delete this category?")) {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: {deleteCat:1, id: del_id},
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        console.log(res.message);
                        manageCategory(1);
                    } else {
                        console.log(res.message);
                    }
                }
            })
        } else {
            return false;
        }
    });


    //Edit category
    $("body").on('click', '.edit-cat', function (e) {
        e.preventDefault();
        var cid = $('#update_category_form #cid');
        var category_name = $('#update_category_name');
        var parent_category = $('#update_parent_category');

        var edit_id = $(this).attr("data-id");
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {editCat:1, id: edit_id},
            success: function (res) {
                res = JSON.parse(res);
                if(res) {
                    console.log(res);
                    cid.val(res.cid);
                    category_name.val(res.category_name);
                }
            },
            error: function(res) {
                console.log(res.success + ' ' + res.message);
            }
        })
    });

    $('#update_category_form').on('submit', function () {
        if ($("#update_category_name").val() == "") {
            $("#update_category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please enter category name.</span>");
        } else {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $("#update_category_form").serialize(),
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        $("#cat_error").html("<span class='text-success'>Category has been updated.</span>");
                        $("#update_category_name").val("")
                    } else {
                        alert(res);
                    }
                }
            })
        }
    });

});