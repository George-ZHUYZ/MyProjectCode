<?php

class RCtypeKey {

        private $RCtypeKeyTile; //RCtype的全称
        private $shortName;// 只保留后面中文部分的名称
        private $image;//图片路径
        private $link;//经过urlencode的RCtype的全称
        private $belongTo;//属于哪一个1st_category
        private $isSelect;//是否被选择；
        private $hasSpecial;
        private $special;
        private $isAvailable;

        public function RCtypeKey($RCtypeKeyTile, $image) {
                $this->RCtypeKeyTile=$RCtypeKeyTile;
                $this->image=$image;
                $link="";
                $belongTo="";
                $isSelect=false;
                $hasSpecial=false;
                $special="";
                $isAvailable=TRUE;
        }
        public function cmp($left, $right)
        {
                return ($right->getIsSelect()) - ($left->getIsSelect());
        }

        public function getRCtypeKeyTile() {
                return $this->RCtypeKeyTile;
        }

        public function getImage() {
                return $this->image;
        }

        public function getLink() {
                return $this->link;
        }

        public function getBelongTo() {
                return $this->belongTo;
        }

        public function getIsSelect() {
                return $this->isSelect;
        }

        public function setLink($link) {
                $this->link = $link;
        }

        public function setBelongTo($belongTo) {
                $this->belongTo = $belongTo;
        }

        public function setIsSelect($isSelect) {
                $this->isSelect = $isSelect;
        }

        public function getShortName() {
                return $this->shortName;
        }

        public function setShortName($shortName) {
                $this->shortName = $shortName;
        }
        public function getHasSpecial() {
                return $this->hasSpecial;
        }

        public function setHasSpecial($hasSpecial) {
                $this->hasSpecial = $hasSpecial;
        }

        public function getSpecial() {
                return $this->special;
        }

        public function setSpecial($special) {
                $this->special = $special;
        }

        public function getIsAvailable() {
                return $this->isAvailable;
        }

        public function setIsAvailable($isAvailable) {
                $this->isAvailable = $isAvailable;
        }




}
