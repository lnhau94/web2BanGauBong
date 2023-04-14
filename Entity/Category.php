<?php
    require_once "util/dbconnect.php";
    class Category extends DBConnect{
        private $name;
        private $id;

        public function __construct($name="", $id=""){
            $this->name = $name;
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }

        public function getId(){
            return $this->id;
        }
    }

    class Categories extends DBConnect{
        private $categories;
        public function getCategories(){
            if($this->categories == null){
                $this -> categories = array();
                $connect = $this -> getConnection();
                $rs = $connect->query("SELECT * FROM Category");
                if ($rs->num_rows > 0){
                    while ( $row = $rs->fetch_assoc() ){
                        array_push($this -> categories,new Category($row['CategoryName'],$row['CategoryId']));
                    }
                }
            }
            return $this -> categories;
            
        }
    }
?>