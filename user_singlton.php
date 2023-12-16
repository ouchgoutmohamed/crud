<?php
class user_singlthon{
    private $name;
    public static $instance;
 public function getname(){
    return $this->name;
 }
 public function getinstance(){
    if( self::$instance instanceof  self){
        self::$instance= new self();

    }
    return self::$instance;
 }
 public function setname($name){
    $this->name = $name;
 }
 private function __construct(){   
 }
 private function  __clone(){
 }
}
$var = user_singlthon::getinstance();
$var->getname();
?>

