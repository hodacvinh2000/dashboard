<?php
include_once "./Models/DBs.php";
include_once "./Models/Major.php";
class MajorController
{

    static public function index()
    {
        try {
            //code...
            if(isset($_GET['keyword'])){
                $list_major = Majors::search($_REQUEST['keyword']);
            }
            else {
                $list_major = Majors::getList();
            }
            include_once "./Views/major.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add($request)
    {
        try {
            //code...
            if (!$request['name'] || !$request['id']) {
                MajorController::add_major_view();
                echo "Dữ liệu không hợp lệ";
                echo "<a href='./add_major'><button>Nhập lại</butoon></a><br>";
                echo "<a href='./major'><button>Trở về</butoon></a>";
                return;
            }
            $major = new Majors($request['id'], $request['name']);
            $result = Majors::add($major);
            header('Location: major');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function add_major_view()
    {
        try {
            //code...
            include_once "./Views/add_major.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function edit_view($id)
    {
        try {
            //code...
            $major = Majors::detail($id);
            include_once "./Views/edit_major.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function update($id,$request){
        try {
            //code...
            if (!$request['name'] || !$request['id']) {
                //MajorController::edit_view($id);
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $major = new Majors($request['id'], $request['name']);
            $result = Majors::update($id,$major);
            header('Location: major');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function delete($id){
        try {
            $list_student = Majors::get_list_student($id);
            if (count($list_student) > 0) {
                echo "Ngành đã có sinh viên không thể xóa<br>";
                echo "<button><a href='./major'>Back</a></button>";
            } else {
                $result = Majors::delete($id);
                header("Location: major");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    static public function detail_view($id) {
        // Lấy thông tin major
        $major = Majors::detail($id);
        // Lấy danh sách sinh viên
        $list_student = Majors::get_list_student($id);
        include_once "./Views/detail_major.php";
    }

}