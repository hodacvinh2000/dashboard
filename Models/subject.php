<?php
include_once "DBs.php";
include_once "Class.php";
class Subjects
{
    public $id;
    public $name;

    function __construct($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    static function getList(){
        $conn = db::connect();
        $sql = "SELECT * FROM subjects";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Subjects($row['id'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function count_subject()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM subjects";
        $result = $conn->query($sql);
        $ls = $result->num_rows;
        $conn->close();
        return $ls;
    }

    static function add($subject)
    {
        $conn = db::connect();
        $sql = "INSERT INTO subjects (`id`,`name`)
                VALUE ('$subject->id','$subject->name')";
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
        $sql = "DELETE FROM subjects WHERE id = '$id'"; 
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static function update($id,$subject) {
        $conn = DB::connect();
        $sql = "UPDATE `subjects` SET `name`='".$subject->name."'
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
        $sql = "SELECT * FROM `subjects` WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Subjects($row['id'], $row['name']);
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

    static function search($key)
    {
        $key = "%".$key."%";
        $conn = db::connect();
        $sql = "SELECT * FROM subjects WHERE `name` LIKE N'$key'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Subjects($row['id'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function get_list_class($id) {
        $conn = db::connect();
        $sql = "SELECT classes.id,classes.name,classes.subject FROM `classes` JOIN subjects 
                WHERE classes.subject COLLATE utf8mb4_general_ci = subjects.name AND subjects.id = '$id'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['id'],$row['name'], $row['subject'],);
            }
        }
        $conn->close();
        return $ls;
    }
}