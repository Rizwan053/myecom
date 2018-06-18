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

        public function create($input){
            global $db;
            $sql = "INSERT INTO ".static::$table.' ('.implode(',',static::$field) .") VALUES ('".implode("','",$input)."')"; 
            if(!$db->query($sql)){
                die('Query Failed In Create Method ' . mysqli_error($db));
            }

        }

        public function update($input, $id){
            global $db;
            $combine = array_combine(static::$field,$input);
            $sql = "UPDATE " . static::$table . " SET ";
            foreach ($combine as $key => $value):
            $sql.= "$key='$value',";
            endforeach;
            $trim = rtrim($sql, ',');
            $trim.=" WHERE id=" . $id;
            // var_dump($trim);
        if (!$db->query($trim)) {
            die('Query Failed In Update Method ' . mysqli_error($db));
        }

        }


        public function delete($id){
            global $db;
            $sql = "DELETE FROM ".static::$table. " WHERE id=$id";
            if (!$db->query($sql)) {
                die('Query Failed In Delete Method ' . mysqli_error($db));
            }
         
            
        }
        


    



}//endofClass





?>