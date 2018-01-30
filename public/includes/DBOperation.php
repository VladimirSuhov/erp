<?php


class DBOperation {

    private $conn;

    function __construct() {
        include_once '../database/db.php';

        $db = new Databse();
        $this->conn = $db->connect();
    }

    public function addCategory($parent, $cat_name) {
        $pre_stmt = $this->conn->prepare("INSERT INTO categories (parent_category, category_name, status) VALUES (?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("isi", $parent, $cat_name, $status);
        $result = $pre_stmt->execute() or die($this->conn->error);

        if ($result) {
            echo json_encode(array('success'=> true, 'message' => 'category added'));
        } else {
            echo json_encode(array('success'=> false, 'message' => 'brand not added'));
        }
    }

    public function addBrand($brand_name) {
        $pre_stmt = $this->conn->prepare("INSERT INTO brands (brand_name, status) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si", $brand_name, $status);
        $result = $pre_stmt->execute() or die($this->conn->error);

        if ($result) {
            echo json_encode(array('success'=> true, 'message' => 'brand added'));
        } else {
            echo json_encode(['success'=> false, 'message' => 'brand not added']);
        }
    }

    public function addProduct($cat_id, $brand_id, $name, $price, $quantity, $date_add) {
        $pre_stmt = $this->conn->prepare("INSERT INTO products (cid, bid, product_name, product_price, product_stock, added_date, p_status) VALUES (?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iisdisi", $cat_id, $brand_id, $name, $price, $quantity, $date_add, $status);
        $result = $pre_stmt->execute() or dir($this->conn->error);

        if ($result) {
            echo json_encode(array('success'=> true, 'message' => 'product added'));
        } else {
            echo json_encode(array('success'=> false, 'message' => 'product not added'));
        }
    }

    public function getAllRecords($table) {
        $pre_stmt = $this->conn->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->conn->error);
        $result = $pre_stmt->get_result();
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }
}

//$opr = new DBOperation();
//echo '<pre>';
//$opr->addProduct(1, 1, 'Zalupa', 777, 11, date("Y-m-d"));
//echo '</pre>';