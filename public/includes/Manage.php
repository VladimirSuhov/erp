<?php

class Manage
{
    private $conn;

    function __construct()
    {
        include_once '../database/db.php';

        $db = new Databse();
        $this->conn = $db->connect();
    }

    private function pagination($conn, $table, $pno, $n)
    {
        $query = $conn->query("SELECT COUNT(*) as rows FROM " . $table);
        $row = mysqli_fetch_assoc($query);
        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"] / $numberOfRecordsPerPage);

        $pagination = "<nav aria-label=\"Page navigation example\">";
        $pagination .= "<ul class=\"pagination\">";


        if ($last != 1) {
            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a  class='page-link' href='$previous' pn='$previous' style='color:#333;'> Previous </a></li>";
            }
            for ($i = $pageno - 5; $i < $pageno; $i++) {
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a  class='page-link' href='$i' pn='$i'> " . $i . " </a></li>";
                }

            }
            $pagination .= "<li class='page-item'><a  class='page-link' href='$pageno' pn='$i' style='color:#333;'> $pageno </a></li>";
            for ($i = $pageno + 1; $i <= $last; $i++) {
                $pagination .= "<li class='page-item'><a  class='page-link' href='$i' pn='$i'> " . $i . " </a></li>";
                if ($i > $pageno + 4) {
                    break;
                }
            }
            if ($last > $pageno) {
                $next = $pageno + 1;
                $pagination .= "<li class='page-item'><a  class='page-link' href='$next' pn='$next' style='color:#333;'> Next </a></li>";
            }
        }

        $pagination .= "</ul></nav>";

        $limit = "LIMIT " . ($pageno - 1) * $numberOfRecordsPerPage . "," . $numberOfRecordsPerPage;

        return ["pagination" => $pagination, "limit" => $limit];
    }

    function manageRecordWithPagination($table, $pno)
    {
        $a = $this->pagination($this->conn, $table, $pno, 5);
        if ($table == "categories") {
            $sql = "SELECT p.category_name as category, c.category_name as parent, p.status, p.cid FROM 
                    categories p LEFT JOIN  categories c ON p.parent_category=c.cid " . $a['limit'];
        } if ($table == "brands") {
            $sql = "SELECT * FROM ".$table." ".$a['limit'];
        } if ($table == "products") {
            $sql = "SELECT p.pid, p.product_name, c.category_name, b.brand_name, p.product_price, p.product_stock, p.added_date,p.p_status FROM products p, brands b, categories c WHERE p.bid = b.bid AND p.cid = c.cid " .$a['limit'];
        }
        $result = $this->conn->query($sql) or die($this->conn->error);

        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $limit = "LIMIT " . ($pageno - 1) * $numberOfRecordsPerPage . "," . $numberOfRecordsPerPage;

        return ["rows" => $rows, "pagination" => $a["pagination"]];

    }

    public function deleteRecord($table, $pk, $id)
    {
        if ($table == "categories") {
            $pre_stmt = $this->conn->prepare("SELECT " . $id . " FROM categories WHERE parent_category = ?");
            $pre_stmt->bind_param("i", $id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->con->error);
            if ($result->num_rows > 0) {
                echo json_encode(["message" => "dependent_category"]);
            } else {
                $pre_stmt = $this->conn->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
                $pre_stmt->bind_param("i", $id);
                $result = $pre_stmt->execute() or die($this->conn->error);
                if ($result) {
                    echo json_encode(["success" => true, "message" => "category deleted"]);
                }
            }
        } else {
            $pre_stmt = $this->conn->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
            $pre_stmt->bind_param("i", $id);
            $result = $pre_stmt->execute() or die($this->conn->error);
            if ($result) {
                echo json_encode(["success" => true, "message" => "record deleted"]);
            }

        }
    }

    public function getSingleRecord($table, $pk, $id)
    {
        $pre_stmt = $this->conn->prepare("SELECT * FROM " . $table . " WHERE " . $pk . " = ?");
        $pre_stmt->bind_param("i", $id);
        $pre_stmt->execute() or die($this->conn->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }


    //$where , $fields are arrays
    public function updateRecord($table, $where, $fields)
    {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='" . $value . "', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $condition;
        if (mysqli_query($this->conn, $sql)) {
            echo json_encode(["success" => true, "message" => "category updated"]);
        } else {
            echo json_encode(["success" => false,"message" => "failed to update"]);
        }
    }
}
//$obj = new Manage();
//echo "<pre>";
//print_r($obj->deleteRecord('brands', 'bid', 36));