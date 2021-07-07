<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "";
$method = $_SERVER['REQUEST_METHOD'];
include_once "./Controllers/DashboardController.php";
include_once "./Controllers/StudentController.php";
include_once "./Controllers/ClassController.php";
include_once "./Controllers/MajorController.php";
include_once "./Controllers/SubjectController.php";
switch ($url) {
    case '':
        switch ($method) {
            case 'GET':
                DashboardController::index();
                return;
        }
    case 'student':
        switch ($method) {
            case 'GET':
                StudentController::index();
                return;
        }
    case 'add_student':
        switch ($method) {
            case 'GET':
                StudentController::add_student_view();
                return;
            case 'POST':
                StudentController::add($_REQUEST);
                return;
        }
    case 'edit_student':
        switch ($method) {
            case 'GET':
                StudentController::edit_view($_GET['id']);
                return;
            case 'POST':
                StudentController::update($_GET['id'],$_REQUEST);
                return;
        }
    case 'delete_student':
        switch ($method) {
            case 'GET':
                StudentController::delete($_GET['id']);
                return;
        }
    case 'detail_student':
        switch ($method) {
            case 'GET':
                StudentController::detail_view($_GET['id']);
                return;
        }
    case 'join_class':
        switch ($method) {
            case 'GET':
                StudentController::register_view($_REQUEST);
                return;
            case 'POST':
                StudentController::register($_GET['id'],$_REQUEST);
                return;
        }
    case 'unregister':
        var_dump($_REQUEST);
        switch ($method){
            case 'POST':
                StudentController::cancel_registration($_REQUEST['id'],$_REQUEST['class_id']);
                return;
        }

    case 'class':
        switch ($method) {
            case 'GET':
                ClassController::index();
                return;
        }
    case 'add_class':
        switch ($method) {
            case 'GET':
                ClassController::add_class_view();
                return;
            case 'POST':
                ClassController::add($_REQUEST);
                return;
        }
    case 'edit_class':
        switch ($method) {
            case 'GET':
                ClassController::edit_view_class($_GET['id']);
                return;
            case 'POST':
                ClassController::update($_GET['id'],$_REQUEST);
                return;
        }
    case 'delete_class':
        switch ($method) {
            case 'GET':
                ClassController::delete($_GET['id']);
                return;
        }
    case 'detail_class':
        switch ($method) {
            case 'GET':
                ClassController::detail_view($_GET['id']);
                return;
        }
    case 'major':
        switch ($method) {
            case 'GET':
                MajorController::index();
                return;
        }
    case 'add_major':
        switch ($method) {
            case 'GET':
                MajorController::add_major_view();
                return;
            case 'POST':
                MajorController::add($_REQUEST);
                return;
        }
    case 'edit_major':
        switch ($method) {
            case 'GET':
                MajorController::edit_view($_GET['id']);
                return; 
            case 'POST':
                MajorController::update($_GET['id'],$_REQUEST);
                return;
        }
    case 'delete_major':
        switch ($method){
            case 'GET':
                MajorController::delete($_GET['id']);
                return;
        }
    case 'detail_major':
        switch ($method){
            case 'GET':
                MajorController::detail_view($_GET['id']);
                return;
        }
    case 'subject':
        switch ($method) {
            case 'GET':
                SubjectController::index();
                return;
        }
    case 'add_subject':
        switch ($method) {
            case 'GET':
                SubjectController::add_subject_view();
                return;
            case 'POST':
                SubjectController::add($_REQUEST);
                return;
        }
    case 'edit_subject':
        switch ($method) {
            case 'GET':
                SubjectController::edit_view($_GET['id']);
                return;
            case 'POST':
                SubjectController::update($_GET['id'],$_REQUEST);
                return;
        }
    case 'detail_subject':
        switch ($method){
            case 'GET':
                SubjectController::detail_view($_REQUEST['id']);
                return;
        }
    case 'delete_subject':
        switch ($method){
            case 'GET':
                SubjectController::delete($_GET['id']);
                return;
        }
}
?>