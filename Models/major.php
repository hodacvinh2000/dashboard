<?php
include_once "DBs.php";
class Majors
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
        $sql = "SELECT * FROM majors";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Majors($row['id'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function count_major()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM majors";
        $result = $conn->query($sql);
        $ls = $result->num_rows;
        $conn->close();
        return $ls;
    }

    static function add($major)
    {
        $conn = db::connect();
        $sql = "INSERT INTO `majors` (`id`,`name`) 
                VALUES ('" . $major->id . "',
                        '" . $major->name . "')";
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
        $sql = "DELETE FROM majors WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static function update($id,$major) {
        $conn = DB::connect();
        $sql = "UPDATE `majors` SET `name`='".$major->name."', `id` = '".$major->id."'
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
        $sql = "SELECT * FROM `majors` WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Majors($row['id'], $row['name']);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        if(strlen($ls > 0)){
            return $ls[0];
        }
    }

    static function search($key)
    {
        $conn = db::connect();
        if($key != '') {
            $key = "%".$key."%";
            $sql = "SELECT * FROM majors WHERE `name` LIKE N'$key' OR `id` LIKE N'$key'";
        } else {
            $sql = "SELECT * FROM majors";
        }
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Majors($row['id'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function get_list_student($id) {
        $conn = db::connect();
        $sql = "SELECT students.id,students.name, students.age FROM `students` JOIN majors 
                WHERE students.major COLLATE utf8mb4_general_ci = majors.name AND majors.id = '$id'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['id'],$row['name'], $row['age'],'');
            }
        }
        $conn->close();
        return $ls;
    }
}