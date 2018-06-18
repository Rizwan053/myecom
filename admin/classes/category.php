<?php 

class Category extends Db_object
{

    protected static $table = 'categories';
    protected static $field = ['name'];
    // protected static $update_field = ['id','name'];

    public function cascade_delete($id){
        global $db;
                $sql = "DELETE FROM products WHERE category_id=$id";
                    if (!$db->query($sql)) {
                    die('Query Failed In Cascade Delete Method ' . mysqli_error($db));
                    }

                $this->delete($id);
              
            // var_dump($sql);
    }






}//endofclass





?>