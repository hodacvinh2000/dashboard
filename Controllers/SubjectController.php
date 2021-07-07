<?php
include_once "./Models/DBs.php";
include_once "./Models/Subject.php";
class SubjectController
{

    static public function index()
    {
        try {
            //code...
            if(isset($_GET['keyword'])){
                $list_Subject = Subjects::search($_GET['keyword']);
            }
            else {
                $list_Subject = Subjects::getList();
            }
            include_once "./Views/subject.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add($request)
    {
        try {
            //code...
            if (!$request['name'] || !$request['id']) {
                echo "Dữ liệu không hợp lệ";
                echo "<a href='./add_subject'><button>Nhập lại</butoon></a><br>";
                echo "<a href='./subject'><button>Trở về</butoon></a>";
                return;
            }   
            $Subject = new Subjects($request['id'], $request['name']);
            $result = Subjects::add($Subject);
            header('Location: subject');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add_subject_view()
    {
        try {
            //code...
            include_once "./Views/add_subject.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function edit_view($id)
    {
        try {
            //code...
            $subject = Subjects::detail($id);
            include_once "./Views/edit_subject.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function update($id,$request){
        try {
            //code...
            if (!$request['name']) {
                SubjectController::edit_view($id);
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $Subject = new Subjects(null, $request['name']);
            $result = Subjects::update($id,$Subject);
            header('Location: subject');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function delete($id){
        try {
            $list_class = Subjects::get_list_class($id);
            if (count($list_class) > 0) {
                echo "Môn đã có lớp học không thể xóa<br>";
                echo "<button><a href='./subject'>Back</a></button>";
            } else {
                $result = Subjects::delete($id);
                header("Location: subject");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function detail_view($id) {
        // Lấy thông tin Subject
        $subject = Subjects::detail($id);
        // Lấy danh sách sinh viên
        $list_class = Subjects::get_list_class($id);
        include_once "./Views/detail_subject.php";
    }

}