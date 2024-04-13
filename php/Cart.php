<?php
    require_once('Item.php');
    require_once('DbAccess.php');
    class Cart 
    {
        private $items;

        public function __construct()
        {
            $this->items = array();
        }

        public function __destruct()
        {
            $this->items = null;
        }

        public function InsertItem($item)
        {
            $id = $item->GetId();
            if (!array_key_exists($id, $this->items))
                $this->items[$id]= $item;
            else
            {

                $this->items[$id]->SetSL($this->items[$id]->GetSL()+1);
            }
        }

        public function RemoveItem($id)
        {
            unset($this->items[$id]);
        }

        public function CountItem()
        {
            return count ($this->items);
        }

        public function GetCart(){
            return $this->items;
        }
    }
?>