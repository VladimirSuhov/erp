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

    //Update category
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

//=============================BRANDS==================================


    //Manage Brand
    manageBrands(1);
    function manageBrands(pn) {
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {manageBrands: 1, pageno: pn},
            success: function (res) {
                $("#get_brands").html(res);
            }
        })
    };

    $("body").on('click', '.page-link', function (e) {
        e.preventDefault();
        var pn = $(this).attr('pn');
        manageBrands(pn);
    });

    //Delete brand
    $("body").on('click', '.delete-brand', function (e) {
        e.preventDefault();
        var del_id = $(this).attr("data-id");

        if (confirm("A you sure to delete this brand?")) {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: {deleteBrand:1, id: del_id},
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        console.log(res.message);
                        manageBrands(1);
                    } else {
                        console.log(res.message);
                    }
                }
            })
        } else {
            return false;
        }
    });


    //Edit brand
    $("body").on('click', '.edit-brand', function (e) {
        e.preventDefault();
        var brand_name = $('#update_brand_name');
        var bid = $('#update_brands_form #bid');
        var edit_id = $(this).attr("data-id");
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {editBrands:1, id: edit_id},
            success: function (res) {
                res = JSON.parse(res);
                if(res) {
                    console.log(res);
                    bid.val(edit_id);
                    brand_name.val(res.brand_name);
                }
            },
            error: function(res) {
                console.log(res.success + ' ' + res.message);
            }
        })
    });

    //Update brand
    $('#update_brands_form').on('submit', function () {
        if ($("#update_brand_name").val() == "") {
            $("#update_brand_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please enter category name.</span>");
        } else {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: $("#update_brands_form").serialize(),
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        $("#brand_error").html("<span class='text-success'>Brand has been updated.</span>");
                    } else {
                        alert(res);
                    }
                }
            })
        }
    });

    //=======================PRODUCTS====================================

    //Manage products
    manageProducts(1);
    function manageProducts(pn) {
        $.ajax({
            url: 'http://erp/public/includes/process.php',
            method: 'post',
            data: {manageProducts: 1, pageno: pn},
            success: function (res) {
                $("#get_products").html(res);
            }
        })
    };

    $("body").on('click', '.page-link', function (e) {
        e.preventDefault();
        var pn = $(this).attr('pn');
        manageProducts(pn);
    });

    //Delete product

    $("body").on('click', '.delete-product', function (e) {
        e.preventDefault();
        var del_id = $(this).attr("data-id");

        if (confirm("A you sure to delete this product?")) {
            $.ajax({
                url: 'http://erp/public/includes/process.php',
                method: 'post',
                data: {deleteProduct:1, id: del_id},
                success: function (res) {
                    res = JSON.parse(res);
                    if(res.success == true) {
                        console.log(res.message);
                        manageProducts(1);
                    } else {
                        console.log(res.message);
                    }
                }
            })
        } else {
            return false;
        }
    });

});