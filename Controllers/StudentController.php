<?php
include_once "./Models/DBs.php";
include_once "./Models/Student.php";
include_once "./Models/major.php";
class StudentController
{

    static public function index()
    {
        try {
            //code...
            if(isset($_GET['keyword'])){
                $list_student = Student::search($_GET['keyword']);
            }
            else {
                $list_student = Student::getList();
            }
            $list_major = Majors::getList();
            include_once "./Views/student.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add($request)
    {
        try {
            //code...
            $list_major = Majors::getList();
            if (!$request['id'] || !$request['name'] || !$request['age'] || !$request['major']) {
                echo "Dữ liệu không hợp lệ<br>";
                echo "<a href='./add_student'><button>Nhập lại</butoon></a><br>";
                echo "<a href='./student'><button>Trở về</butoon></a>";
                return;
            }   
            $student = new Student($request['id'], $request['name'], $request['age'], $request['major']);
            $result = Student::add($student);
            header('Location: student');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function edit_view($id)
    {
        try {
            //code...
            $list_major = Majors::getList();
            $student = Student::detail($id);
            for ($i=0;$i<count($list_major);$i++){
                if($student->major === $list_major[$i]->name) {
                    unset($list_major[$i]);
                }
            }
            include_once "./Views/edit_student.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add_student_view()
    {
        try {
            //code...
            $list_major = Majors::getList();
            include_once "./Views/add_student.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function update($id,$request){
        try {
            if (!$request['name'] || !$request['age'] || !$request['major']) {
                StudentController::edit_view($id);
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $student = new Student(null, $request['name'], $request['age'], $request['major']);
            $result = Student::update($id,$student);
            header('Location: student');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function delete($id){
        try {
            $list_class = Student::list_registered($id);
            if(count($list_class) > 0){
                echo "Sinh viên đã đăng ký lớp không thể xóa<br>";
                echo "<button><a href='./student'>Back</a></button>";
            } else {
                $result = Student::delete($id);
                header("Location: student");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function register_view($request) {
        try {
            $list_registered_id = Student::list_registered($request['id']);
            $list_class = Classes::getList();
            $list_unregistered = [];
            //Lấy danh sách lớp chưa đăng ký
            foreach ($list_class as $class) {
                if(!in_array($class->id,$list_registered_id)) {
                    $list_unregistered[] = $class;
                }
            }
            //Lấy danh sách lớp đã đăng ký
            $list_registered = [];
            foreach ($list_registered_id as $id) {
                $list_registered[] = Classes::detail($id);
            }
            $student_id = $request['id'];
            include_once "./Views/join_class_view.php";  
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function register($student_id,$request) {
        try {
            var_dump($request);
            $result = Student::register($student_id,$request['class_id']);
            var_dump($result);
            header("Location: ". $_SERVER['HTTP_REFERER']. "");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function cancel_registration($student_id,$class_id) {
        try {
            $result = Student::cancel_register($student_id,$class_id);
            var_dump($result);
            header("Location: join_class?id=".$student_id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function detail_view($id) {
        // Lấy thông tin sinh viên
        $student = Student::detail($id);
        // Lấy danh sách lớp đã đăng kí
        $class_id = Student::list_registered($id);
        $list_registered = [];
            foreach ($class_id as $id) {
                $list_registered[] = Classes::detail($id);
            }
        include_once "./Views/detail_student.php";
    }

}