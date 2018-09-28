<?php

class Product {

    private $id, $name, $sku, $vendorSKU, $description, $price, $vendorID;

    public function __construct($name, $sku, $vendorSKU, $description, $price, $vendorID) {

        $this->name = $name;
        $this->sku = $sku;
        $this->vendorSKU = $vendorSKU;
        $this->description = $description;
        $this->price = $price;
        $this->vendorID = $vendorID;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSku() {
        return $this->sku;
    }

    public function getVendorSKU() {
        return $this->vendorSKU;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function setVendorSKU($vendorSKU) {
        $this->vendorSKU = $vendorSKU;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getVendorID() {
        return $this->vendorID;
    }

    public function setVendorID($vendorID) {
        $this->vendorID = $vendorID;
    }

}
