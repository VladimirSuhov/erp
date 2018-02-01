<?php

class Manage {
    private $conn;

    function __construct() {
        include_once '../database/db.php';

        $db = new Databse();
        $this->conn = $db->connect();
    }

    private function pagination($conn,$table,$pno,$n) {
        $query = $conn->query("SELECT COUNT(*) as rows FROM ".$table);
        $row = mysqli_fetch_assoc($query);
        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"]/$numberOfRecordsPerPage);

        $pagination = "<nav aria-label=\"Page navigation example\">";
        $pagination .= "<ul class=\"pagination\">";


        if ($last != 1) {
            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a  class='page-link' href='$previous' pn='$previous' style='color:#333;'> Previous </a></li>";
            }
            for($i=$pageno - 5;$i< $pageno ;$i++){
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a  class='page-link' href='$i' pn='$i'> ".$i." </a></li>";
                }

            }
            $pagination .= "<li class='page-item'><a  class='page-link' href='$pageno' pn='$i' style='color:#333;'> $pageno </a></li>";
            for ($i=$pageno + 1; $i <= $last; $i++) {
                $pagination .= "<li class='page-item'><a  class='page-link' href='$i' pn='$i'> ".$i." </a></li>";
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

        $limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

        return ["pagination"=>$pagination,"limit"=>$limit];
    }

    function manageRecordWithPagination($table, $pno) {
        $a = $this->pagination($this->conn, $table, $pno,5 );
        if($table == "categories") {
            $sql = "SELECT p.category_name as category, c.category_name as parent, p.status FROM categories p LEFT JOIN  categories c ON p.parent_category=c.cid ".$a['limit'];
        }
        $result = $this->conn->query($sql) or die($this->conn->error);

        if($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

        return ["rows" => $rows, "pagination" => $a["pagination"]];

    }


}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageRecordWithPagination('categories',1));