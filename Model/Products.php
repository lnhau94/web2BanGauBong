<?php
include_once __DIR__.'/../util/dbconnect.php';
class Products extends DBConnect{
    private $products;
    private $selectQuery = "SELECT * FROM 
		                        Product p join Image i on p.ProductId = i.ProductId 
		                            join Category c on  p.CategoryId  = c.CategoryId";

    public function productFromRow($row){
        return new Product($row['ProductId'],$row['ProductName'],
            $row['ProductPrice'],$row["ProductInventory"],
            $row["ProductSize"],$row["ProductStatus"],
            $row["CategoryId"],$row["CategoryName"],
            $row["ImageUrl"]);
    }
    public function getProducts(){
        if($this->products==null){
            $this -> products = array();
            $rs = $this -> getConnection()
                -> query($this->selectQuery);
            if($rs->num_rows>0){
                while($row = $rs->fetch_assoc()){
                    array_push($this->products,$this->productFromRow($row));

                }
            }
        }
        return $this -> products;
    }

    public function getNewProducts(){
        $products = array();
        $rs = $this -> getConnection()
            -> query($this->selectQuery." order by p.ProductId desc limit 10");
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }
    public function getByCategoryId($categoryId){
        $products = array();
        $rs = $this -> getConnection()
            -> query($this->selectQuery." where p.CategoryId = $categoryId");
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }
    public function getAllProduct(){
        $products = array();
        $rs = $this -> getConnection()
            -> query($this->selectQuery);
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }
    public function getProduct($page = 1,$productCount=5, $categories = "('1','2')"){
        $products = array();
        $rs = $this -> getConnection()
            -> query($this->selectQuery." WHERE p.CategoryId in ".$categories." 
                                 order by p.ProductId limit ".$productCount*$page.", ".$productCount);
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }

    public function getProductCount($page = 1,$productCount=5, $categories = "('1','2')"){
        $rs = $this -> getConnection()
            -> query("select count(p.ProductId) from Product p WHERE p.CategoryId in ".$categories.
                " order by p.ProductId ");
        $c = -1;
        if($rs->num_rows>0){
            $data = $rs->fetch_array();
            $c = $data[0];
        }
        return $c;
    }
}
?>