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
            -> query($this->selectQuery." where p.ProductStatus = n'Đang bán' order by p.ProductId desc limit 10");
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
            -> query($this->selectQuery." where p.CategoryId = $categoryId and p.ProductStatus = n'Đang bán'");
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
            -> query($this->selectQuery. " where p.ProductStatus = n'Đang bán'");
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
            -> query($this->selectQuery." WHERE p.CategoryId in ".$categories." and p.ProductStatus = n'Đang bán' 
                                 order by p.ProductId limit ".$productCount*$page.", ".$productCount);
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }

    public function advSearch($page, $productCount = 5,$categories = "('1','2','3','4','5','6','7','8','9','10')",$name="",$minPrice=0,$maxPrice=1000000){
        $products = array();
        $rs = $this -> getConnection()
            -> query($this->selectQuery." WHERE p.CategoryId in ".$categories." 
                                 and p.ProductName like n'%".$name."%'  
                                 and p.ProductPrice between ".$minPrice." and ".$maxPrice." 
                                 and p.ProductStatus = n'Đang bán' 
                                 order by p.ProductId limit ".$productCount*($page-1).", ".$productCount);
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($products,$this->productFromRow($row));
            }
        }
        return $products;
    }

    public function getProductCount($page = 1,$productCount=5, $categories = "('1','2')",$name="",$minPrice=0,$maxPrice=1000000){
        $queryString = "select count(p.ProductId) from Product p WHERE p.CategoryId in ".$categories

                                 ;
        if ($name != ""){
            $queryString = $queryString." and p.ProductName like n'%".$name."%' ";
        }
        $queryString = $queryString." and p.ProductPrice between ".$minPrice." and ".$maxPrice." and p.ProductStatus = n'Đang bán' 
                                        order by p.ProductId ";

        $rs = $this -> getConnection()
            -> query($queryString);
        $c = -1;
        if($rs->num_rows>0){
            $data = $rs->fetch_array();
            $c = $data[0];
        }
        return $c;
    }
}
?>