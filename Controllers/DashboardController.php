<?php
include_once "./Models/Class.php";
include_once "./Models/Major.php";
include_once "./Models/Student.php";
include_once "./Models/Subject.php";
class DashboardController {
    public static function index(){
        $count_student = Student::count_student();
        $count_class = Classes::count_class();
        $count_major = Majors::count_major();
        $count_subject = Subjects::count_subject();
        $list_student = Student::getList();
        include_once "./Views/dashboard.php";    
    }
}
?>