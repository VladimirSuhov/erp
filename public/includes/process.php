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

//Get category

if (isset($_POST['getCategory'])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("categories");

    foreach ($rows as $row) {
        echo "<option value='".$row["cid"]."'>" .$row["category_name"]. "</option>";
    }
    exit();
}

//Get brands

if (isset($_POST['getBrand'])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("brands");

    foreach ($rows as $row) {
        echo "<option value='".$row["bid"]."'>" .$row["brand_name"]. "</option>";
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
//Add brand

if (isset($_POST['brand_name'])) {
    $brand_name = formatChars($_POST['brand_name']);

    $db = new DBOperation();

    $result = $db->addBrand($brand_name);

    exit();
}

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

//Manage Category

if (isset($_POST['manageCategory'])) {
    $manage = new Manage();
    $result = $manage->manageRecordWithPagination('categories',$_POST['pageno']);
    $rows = $result['rows'];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = 0;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo ++$n; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['parent']; ?></td>
                <td><a href="" class="btn btn-success btn-sm"><?php echo $row['status'] == 1 ? 'Active' : 'Not active' ; ?></a></td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

