<?php
include_once "DBs.php";
class Classes
{
    //properties
    public $id;
    public $name;
    public $subject;
    //method
    function __construct($id, $name, $subject)
    {
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
    }

    static function getList()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM classes";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['id'], $row['name'], $row['subject']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function count_class()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM classes";
        $result = $conn->query($sql);
        $ls = $result->num_rows;
        $conn->close();
        return $ls;
    }

    static function add($class)
    {
        $conn = db::connect();
        $sql = "INSERT INTO `classes` (`id`,`name`, `subject`) 
                VALUES ('" . $class->id . "',
                        '" . $class->name . "',
                        '" . $class->subject . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }

    static function delete($id)
    {
        $conn = db::connect();
        $sql = "DELETE FROM `classes` WHERE `id` = '$id'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static function update($id,$class) {
        $conn = DB::connect();
        $sql = "UPDATE `classes` SET `id`='".$class->id."',`name`='".$class->name."',`subject`='".$class->subject."'
                WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static public function detail($id){
        $conn = DB::connect();
        $sql = "SELECT * FROM `classes` WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['id'], $row['name'], $row['subject']);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        if(count($ls) > 0){
            return $ls[0];
        }
    }

    static public function cancel_registration($student_id,$class_id) {
        $conn = DB::connect();
        $sql = "DELETE FROM `student_class` WHERE (`student_id` = '".$student_id."' AND `class_id` = '".$class_id."')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
    }

    static public function list_registered($id) {
        $conn = DB::connect();
        $sql = "SELECT `student_id` FROM `student_class` WHERE `class_id` = '".$id."'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = $row['student_id'];
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }

    static function search($key)
    {
        $key = "%".$key."%";
        $conn = db::connect();
        $sql = "SELECT * FROM classes WHERE `name` LIKE N'$key' OR `subject` LIKE N'$key'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['id'], $row['name'], $row['subject']);
            }
        }
        $conn->close();
        return $ls;
    }
    
}