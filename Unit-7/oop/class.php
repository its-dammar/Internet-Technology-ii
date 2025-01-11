<?php
class Animal{
    public $domesticanimal;
    function set_name($domesticanimal){
         $this->domesticanimal = $domesticanimal;
    }
    function get_name(){
       return $this->domesticanimal;
    }
}
$cat = new Animal();
$cat->set_name('cat');
echo "domesticanimal: ".$cat->get_name();
?>