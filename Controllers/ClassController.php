<?php
include_once "./Models/DBs.php";
include_once "./Models/Class.php";
include_once "./Models/subject.php";
class ClassController {
    static public function index()
    {
        try {   
            //code...
            $list_subject = Subjects::getList();
            if(isset($_GET['keyword'])){
                $list_class = Classes::search($_GET['keyword']);
            }
            else {
                $list_class = Classes::getList();
            }
            include_once "./Views/class.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }   

    static public function add_class_view()
    {
        try {
            //code...
            $list_subject = Subjects::getList();
            include_once "./Views/add_class.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add($request)
    {
        try {
            //code...
            if (!$request['name'] || !$request['subject'] || !$request['id']) {
                ClassController::add_class_view();
                echo "Dữ liệu không hợp lệ";
                echo "<a href='./add_class'><button>Nhập lại</butoon></a><br>";
                echo "<a href='./class'><button>Trở về</butoon></a>";
                return;
            }
            $class = new Classes($request['id'], $request['name'], $request['subject']);
            $result = Classes::add($class);
            header('Location: class');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function edit_view_class($id)
    {
        try {
            //code...
            $list_subject = Subjects::getList();
            $class = Classes::detail($id);
            for ($i=0;$i<count($list_subject);$i++){
                if($class->subject === $list_subject[$i]->name) {
                    unset($list_subject[$i]);
                }
            }
            include_once "./Views/edit_class.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function update($id,$request){
        try {
            //code...
            if (!$request['name'] || !$request['subject'] || !$request['id']) {
                ClassController::edit_view_class($id);
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $class = new Classes($request['id'], $request['name'], $request['subject']);
            $result = Classes::update($id,$class);
            header('Location: class');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function delete($id){
        try {
            $list_student = Classes::list_registered($id);
            if (count($list_student) > 0) {
                echo "Lớp đã có sinh viên không thể xóa<br>";
                echo "<button><a href='./class'>Back</a></button>";
            } else {
                $result = Classes::delete($id);
                header("Location: class");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function detail_view($id) {
        // Lấy thông tin sinh viên
        $class = Classes::detail($id);
        // Lấy danh sách lớp đã đăng kí
        $class_id = Classes::list_registered($id);
        $list_registered = [];
            foreach ($class_id as $id) {
                $list_registered[] = Student::detail($id);
            }
        include_once "./Views/detail_class.php";
    }
}
?>