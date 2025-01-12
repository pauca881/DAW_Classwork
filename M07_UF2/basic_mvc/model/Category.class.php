<?php
class Category {
    
    private $id;
    private $name;
    private $productList=array(); // si el necessitessim en una posterior ampliació!

    public function __construct($id=NULL, $name=NULL) {
        $this->id=$id;
        $this->name=$name;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id=$id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name=$name;
    }

    public function getProductList() {
        return $this->productList; 
    }

    public function setProductList($productList) {
        $this->productList[]=$productList;
    }

    public function writingNewLine() {
        return "\n$this->id;$this->name;"; // podríem volem algun mètode extrar de la classe que ens fos interessant i general
    }

}
