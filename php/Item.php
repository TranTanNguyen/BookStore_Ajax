<?php
    class Item
    {
        private $id, $ten, $tacgia, $mota, $gia, $anh, $soluong;
        public function __construct($id, $ten, $tacgia, $mota, $gia, $anh)
        {
            $this -> id = $id;
            $this ->ten = $ten;
            $this ->tacgia = $tacgia;
            $this ->mota = $mota;
            $this ->gia = $gia;
            $this ->anh = $anh;
            $this ->soluong = 1;
        }

        public function __destruct()
        {
            $this->id = $this ->ten = $this ->tacgia =$this->mota =$this->gia = $this->anh =$this->soluong = null;
        }
        
        public function GetId()
        {
            return $this->id;
        }

        public function GetTen()
        {
            return $this->ten;
        }

        public function GetGia()
        {
            return floatval($this->gia);
        }


        public function GetMoTa()
        {
            return $this->mota;
        }

        public function GetTacGia()
        {
            return $this->tacgia;
        }

        public function GetSL()
        {
            return $this->soluong;
        }

        public function SetSL($soluong)
        {
            $this->soluong = $soluong;
        }
    }
?>