<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Clyde
 */
class Product {

        //put your code here
        private $RCtypeName;
        private $ID;
        private $productName;
        private $shortName;
        private $size;
        private $packageSize;
        private $price;
        private $image;
        private $quanity;
        private $discount;
        private $discountPrice;
        private $total;
        private $isSpecial;
        private $specialType;
        private $unit;
        private $brand;
        private $available;

//        public function __construct() {
////                $argv = func_get_args();
////                switch (func_num_args()) {
////                        case 1:
////                                self::__construct1($argv[0]);
////                                break;
////                        case 2:
////                                self::__construct2($argv[0], $argv[1],$argv[2], $argv[3],$argv[4], $argv[5],$argv[6]);
////                                break;
////                }
//        }

        public function ProductWithArray(array $data) {
                $this->ID = isset($data['ID']) ? trim($data['ID']) : null;
                $this->productName = isset($data['productName']) ? trim($data['productName']) : null;
                $this->shortName = isset($data['shortName']) ? trim($data['shortName']) : null;
                $this->image = isset($data['image']) ? trim($data['image']) : null;
                $this->price = isset($data['price']) ? trim($data['price']) : null;
                $this->size = isset($data['size']) ? trim($data['size']) : null;
                $this->packageSize = isset($data['package']) ? trim($data['package']) : null;
                $this->quanity = isset($data['quantity']) ? trim($data['quantity']) : null;
                $this->discount = isset($data['special']) ? trim($data['special']) : null;
                $this->total = $this->quanity * $this->price * $this->discount;
//                addition value
                $this->unit = "";
                $this->brand = "";
                $this->available = 0;
                $this->discountPrice=0;
        }

        public function ProductWithArguments($ID, $productName, $image, $price, $size, $packageSize, $special) {
                $this->ID = $ID;
                $this->productName = $productName;
                $this->shortName = "";
                $this->image = $image;
                $this->price = $price;
                $this->size = $size;
                $this->packageSize = $packageSize;
                $this->quanity = 0;
                $this->discount = $special;
                $this->total = $this->quanity * $this->price * $this->discount;
//                addition value
                $this->unit = "";
                $this->brand = "";
                $this->available = 0;
                $this->discountPrice=0;
        }

        public function getRCtypeName() {
                return $this->RCtypeName;
        }

        public function getProductName() {
                return $this->productName;
        }

        public function getSize() {
                return $this->size;
        }

        public function getPrice() {

                return number_format($this->price, 2);
        }

        public function getImage() {
                return $this->image;
        }

        public function getID() {
                return $this->ID;
        }

        public function getDiscount() {
                return $this->discount;
        }

        public function getPackageSize() {
                return $this->packageSize;
        }

        public function getShortName() {
                return $this->shortName;
        }

        public function setShortName($shortName) {
                $this->shortName = $shortName;
        }

        public function setPackageSize($packageSize) {
                $this->packageSize = $packageSize;
        }

        public function setID($ID) {
                $this->ID = $ID;
        }

        public function setDiscount($special) {
                $this->discount = $special;
                $this->total = $this->quanity * $this->price * $this->discount;
                $this->discountPrice=$this->price * $this->discount;
        }

        public function setRCtypeName($RCtypeName) {

                $this->shortName = $RCtypeName;
                $this->RCtypeName = $RCtypeName;
        }

        public function setProductName($productName) {
                $this->productName = $productName;
        }

        public function setSize($size) {
                $this->size = $size;
        }

        public function setPrice($price) {
                $this->price = $price;
                $this->total = $this->quanity * $this->price * $this->discount;
                $this->discountPrice=$this->price * $this->discount;
        }

        public function setImage($image) {
                $this->image = $image;
        }

        public function getQuanity() {
                return $this->quanity;
        }

        public function getTotal() {
                $dollor = number_format($this->total, 2);
                return $dollor;
        }

        public function setQuanity($quanity) {
                $this->quanity = $quanity;
                $this->total = $this->quanity * $this->price * $this->discount;
        }

        public function getIsSpecial() {
                return $this->isSpecial;
        }

        public function getSpecialType() {
                return $this->specialType;
        }

        public function setIsSpecial($isSpecial) {
                $this->isSpecial = $isSpecial;
        }

        public function setSpecialType($specialType) {
                $this->specialType = $specialType;
        }

        public function getUnitPrice() {
                return $this->unit;
        }

        public function setUnit($unit) {
                $this->discountPrice=number_format(($this->price * $this->discount), 2);
                $this->unit = number_format(($this->price * $this->discount), 2) . "/" . $unit;
        }

        public function getBrand() {
                return $this->brand;
        }

        public function setBrand($brand) {
                $this->brand = $brand;
        }

        public function getAvailable() {
                return $this->available;
        }

        public function setAvailable($available) {
                $this->available = $available;
        }
        public function getDiscountPrice() {
                return number_format($this->discountPrice, 2);
        }

}
