<?php 

class User extends Db_object
{

    protected static $table = 'users';
    protected static $field = ['name','address','password','pincode','mobile'];
    protected static $update_field = ['id','name','address','password','pincode','mobile'];
    public $id;
    public $name;
    public $address;
    public $password;
    public $pincode;
    public $mobile;

   




}//endofclass





?>