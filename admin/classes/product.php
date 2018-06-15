<?php 

class Product extends Db_object
{

    protected static $table = 'products';
    protected static $field = ['category_id','name', 'description', 'image', 'price', 'quantity'];
    protected static $update_field = ['id','category_id', 'name' ,'description' ,'image' ,'price' ,'quantity'];
   






}//endofclass





?>