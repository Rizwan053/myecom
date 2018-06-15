<?php include_once('config.php') ?>

<?php 

class Db_object
{

        public static function find_all(){
            $sql = "SELECT * FROM ".static::$table. ' ORDER BY id desc';
            return self::find_by_query($sql); 
        }

        public static function find_by_id($id){
            $sql = "SELECT * FROM ".static::$table. " WHERE id=$id";
            return self::find_by_query($sql); 
        }

        public static function find_by_query($sql){
        global $db;
        $result = $db->query($sql);
        return $result;
        }
        


    



}//endofClass





?>