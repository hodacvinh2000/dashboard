<?php
include_once "DBs.php";
include_once "Class.php";
class Student
{
    //Properties
    public $id;
    public $name;
    public $age;
    public $major;

    function __construct($id, $name, $age, $major)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->major = $major;
    }

    static function getList()
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function count_student()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $ls = $result->num_rows;
        $conn->close();
        return $ls;
    }

    static function add($student)
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `students` (`id`,`name`, `age`,`major`) 
                VALUES ('" . $student->id . "',
                        '" . $student->name . "',
                        '" . $student->age . "',
                        '" . $student->major . "')";
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
        $conn = DB::connect();
        $sql = "DELETE FROM students WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static function update($id,$student) {
        $conn = DB::connect();
        $sql = "UPDATE `students` SET `name`='".$student->name."',`age`='".$student->age."',`major`='".$student->major."'
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
        $sql = "SELECT * FROM `students` WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major']);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        if(count($ls)> 0){
            return $ls[0];
        }
    }

    static public function register($student_id,$class_id){
        $conn = DB::connect();
        $sql = "INSERT INTO `student_class`(`student_id`, `class_id`) VALUES ('".$student_id."','".$class_id."')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }

    static public function list_registered($id) {
        $conn = DB::connect();
        $sql = "SELECT `class_id` FROM `student_class` WHERE `student_id` = '".$id."'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = $row['class_id'];
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }

    static public function cancel_register($student_id,$class_id) {
        $conn = DB::connect();
        $sql = "DELETE FROM `student_class` WHERE student_id = '$student_id' AND class_id = '$class_id'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }

    static function search($key)
    {
        $key = "%".$key."%";
        $conn = db::connect();
        $sql = "SELECT * FROM students WHERE `name` LIKE N'$key' OR `major` LIKE N'$key' OR `age` LIKE N'$key'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major']);
            }
        }
        $conn->close();
        return $ls;
    }
}

?>