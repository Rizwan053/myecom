<?php 

class User extends Db_object
{

    protected static $table = 'users';
    protected static $field = ['name','address','password','pincode','mobile'];
    // protected static $update_field = ['id','name','address','password','pincode','mobile'];
    public $id;
    public $name;
    public $address;
    public $password;
    public $pincode;
    public $mobile;


    public function login($input){
        $output = $this->verification($input);
        // if($output){
            

        // }else {
        //     return false;
        // }
        return $output;
    
    
    }

    public function verification($input){
    global $db;
    $sql = "SELECT name,password FROM users Where name='{$input['name']}' AND password='{$input['password']}'";
    $result = $db->query($sql);              
    return $result->fetch_object();                
    }

   




}//endofclass





?>