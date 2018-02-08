<?php

include_once "../database/constants.php";
include_once "User.php";
include_once "helpers.php";
include_once "DBOperation.php";
include_once "Manage.php";


//Registration
if (isset($_POST['username']) &&
    isset($_POST['email'])    &&
    isset($_POST['password1'])&&
    isset($_POST['password2'])&&
    isset($_POST['usertype']))
{
    $name = formatChars( $_POST['username'] );
    $email = formatChars( $_POST['email'] );
    $password1 = formatChars($_POST['password1']);
    $password2 = formatChars($_POST['password2']);
    $usertype = formatChars($_POST['usertype']);

    if($password1 == $password2) {
        $user = new User();
        $user->createUserAccount($name, $email, $password2, $usertype);
    } else {
        json_encode(['success' => false, 'message' => 'Passwords doesnt match']);
    }

}

//Login

if (isset($_POST['log_email']) &&
    isset($_POST['log_password']))
{
    $log_email = formatChars( $_POST['log_email'] );
    $log_password = formatChars($_POST['log_password']);

    $user = new User();
    $user->userLogin($log_email, $log_password);
}


//===========================CATEGORIES=======================================

//Get category

if (isset($_POST['getCategory'])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("categories");

    foreach ($rows as $row) {
        echo "<option value='".$row["cid"]."'>" .$row["category_name"]. "</option>";
    }
    exit();
}

//Add category

if (isset($_POST['add_cat']) && isset($_POST['category_name'])) {
    $cat_name = formatChars($_POST['category_name']);

    $db = new DBOperation();

    $result = $db->addCategory($_POST['parent_category'], $cat_name);

    exit();
}



//Manage Category

if (isset($_POST['manageCategory'])) {
    $manage = new Manage();
    $result = $manage->manageRecordWithPagination('categories',$_POST['pageno']);
    $rows = $result['rows'];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;

        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['parent']; ?></td>
                <td><a href="" class="btn btn-success btn-sm"><?php echo $row['status'] == 1 ? 'Active' : 'Not active' ; ?></a></td>
                <td class="edit-buttons">
                    <a href="#" data-id="<?php echo $row['cid'];?>" class="btn btn-danger btn-sm delete-cat">Delete</a>
                    <a href="#" data-id="<?php echo $row['cid'];?>" data-toggle="modal" data-target="#update_category" class="btn btn-info btn-sm edit-cat">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete category

if (isset($_POST['deleteCat'])) {
    $manage = new Manage();
    $result = $manage->deleteRecord('categories', 'cid',  $_POST['id']);
    echo $result;
}


//Edit category

if (isset($_POST['editCat'])) {
    $manage = new Manage();
    $result = $manage->getSingleRecord('categories', 'cid', $_POST['id']);
    if ($result) {
        echo json_encode($result);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Data error']);
    }
    exit();
}

//Update Editing category

if (isset($_POST['update_category'])) {
    $id = $_POST['cid'];
    $new_cat_name = formatChars($_POST['update_category_name']);
    $new_parent_cat = $_POST['update_parent_category'];

    $manage = new Manage();
    $result = $manage->updateRecord('categories', ['cid' => $id], ['parent_category' => $new_parent_cat, 'category_name' => $new_cat_name]);
}



//========================BRANDS=============================================

//Get brands

if (isset($_POST['getBrand'])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("brands");

    foreach ($rows as $row) {
        echo "<option value='".$row["bid"]."'>" .$row["brand_name"]. "</option>";
    }
    exit();
}

//Add brand

if (isset($_POST['brand_name'])) {
    $brand_name = formatChars($_POST['brand_name']);

    $db = new DBOperation();

    $result = $db->addBrand($brand_name);

    exit();
}


//Manage Brands

if (isset($_POST['manageBrands'])) {
    $manage = new Manage();
    $result = $manage->manageRecordWithPagination('brands',$_POST['pageno']);
    $rows = $result['rows'];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;

        foreach ($rows as $row) {

            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row['brand_name']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="" class="btn btn-success btn-sm"><?php echo $row['status'] == 1 ? 'Active' : 'Not active' ; ?></a></td>
                <td class="edit-buttons">
                    <a href="#" data-id="<?php echo $row['bid'];?>" class="btn btn-danger btn-sm delete-brand">Delete</a>
                    <a href="#" data-id="<?php echo $row['bid'];?>" data-toggle="modal" data-target="#update_brand" class="btn btn-info btn-sm edit-brand">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Edit brand

if (isset($_POST['editBrands'])) {
    $manage = new Manage();
    $result = $manage->getSingleRecord('brands', 'bid', $_POST['id']);
    if ($result) {
        echo json_encode($result);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Data error']);
    }
    exit();
}

//Delete brand

    if (isset($_POST['deleteBrand'])) {
        $id = $_POST['id'];

        $manage = new Manage();
        $result = $manage->deleteRecord('brands', 'bid', $id);
        echo $result;
    }

//Update Editing brand

if (isset($_POST['update_brand'])) {
    $id = $_POST['bid'];
    $new_brand_name = formatChars($_POST['update_brand_name']);

    $manage = new Manage();
    $result = $manage->updateRecord('brands', ['bid' => $id], ['brand_name' => $new_brand_name]);
}



//=================================PRODUCTS===================================================


//Add products

if (isset($_POST['add_product']) &&
    isset($_POST['date_added']) &&
    isset($_POST['product_name']) &&
    isset($_POST['product_category']) &&
    isset($_POST['product_brand']) &&
    isset($_POST['product_price']) &&
    isset($_POST['product_quantity'])
) {
    $prod_name = formatChars($_POST['product_name']);

    $db = new DBOperation();

    $result = $db->addProduct($_POST['product_category'], $_POST['product_brand'], $prod_name, $_POST['product_price'], $_POST['product_quantity'], $_POST['date_added']);

    exit();
}

//Manage products

if (isset($_POST['manageProducts'])) {
    $manage = new Manage();
    $result = $manage->manageRecordWithPagination('products',$_POST['pageno']);
    $rows = $result['rows'];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;

        foreach ($rows as $row) {

            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['brand_name']; ?></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_stock']; ?></td>
                <td><?php echo $row['added_date']; ?></td>
                <td><a href="" class="btn btn-success btn-sm"><?php echo $row['p_status'] == 1 ? 'Active' : 'Not active' ; ?></a></td>
                <td class="edit-buttons">
                    <a href="#" data-id="<?php echo $row['pid'];?>" class="btn btn-danger btn-sm delete-product">Delete</a>
                    <a href="#" data-id="<?php echo $row['pid'];?>" data-toggle="modal" data-target="#update_products" class="btn btn-info btn-sm edit-products">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Edit products

if (isset($_POST['editProducts'])) {
    $manage = new Manage();
    $result = $manage->getSingleRecord('products', 'pid', $_POST['id']);
    if ($result) {
        echo json_encode($result);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Data error']);
    }
    exit();
}

//Delete products

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];

    $manage = new Manage();
    $result = $manage->deleteRecord('products', 'pid', $id);
    echo $result;
}

//Update Editing products

if (isset($_POST['update_product'])) {
    $id = $_POST['pid'];
    $new_name = formatChars($_POST['update_product_name']);
    $new_cat = formatChars($_POST['update_product_category']);
    $new_brand = formatChars($_POST['update_product_brand']);
    $new_price = formatChars($_POST['update_product_price']);
    $new_quantity = formatChars($_POST['update_product_quantity']);


    $manage = new Manage();
    $result = $manage->updateRecord('products', ['pid' => $id], ['cid' => $new_cat, 'bid' => $new_brand,
                'product_name' => $new_name, 'product_price' => $new_price, 'product_stock' => $new_quantity]);
    exit();
}