<?php

namespace App\login;

use App\database\Database;

class Login
{
    // this is login class;
    protected $db = null;
    public function __construct()
    {
        $this->db = database::getInstance();
    }
    // admin
    public function getAdmin($id)
    {
        $query = 'SELECT * FROM login where admin_nim = ? LIMIT 1';
        $paramType = 's';
        $paramValue = array(
            $id
        );
        $memberRecord = $this->db->getSelect($query, $paramType, $paramValue);
        return $memberRecord;
    }
    // student
    public function getStudent($id)
    {
        $query = 'SELECT * FROM student where nim = ? LIMIT 1';
        $paramType = 's';
        $paramValue = array(
            $id
        );
        $memberRecord = $this->db->getSelect($query, $paramType, $paramValue);
        return $memberRecord;
    }
    // course sold 
    public function guestLogin($id)
    {
        $query = 'SELECT * FROM guest_login where email = ? LIMIT 1';
        $paramType = 's';
        $paramValue = array(
            $id
        );
        $memberRecord = $this->db->getSelect($query, $paramType, $paramValue);
        return $memberRecord;
    }
    // 
    public function loginUser()
    {
        $admin_record = $this->getAdmin($_POST['userid']);
        $admin_login_password = 0;
        if (!empty($admin_record)) {
            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
            }
            $hashPassword = $admin_record[0]['admin_pass'];
            $admin_login_password = 0;
            if (\password_verify($password, $hashPassword)) {
                $admin_login_password = 1;
            } else {
                $admin_login_password = 0;
            }
            if ($admin_login_password == 1) {
                session_start();
                $_SESSION["userid"] = $admin_record[0]["admin_nim"];
                session_write_close();
                $url = "main.php";
                header("Location: $url");
            } else if ($admin_login_password == 0) {
                $loginStatus = 'Invalid ID or Password';
                return $loginStatus;
            }
        }
        //================ student side
        $student_record = $this->getStudent($_POST['userid']);
        $student_login_password = 0;
        if (!empty($student_record)) {
            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
            }
            $hashPassword = $student_record[0]['password'];
            $student_login_password = 0;
            if (\password_verify($password, $hashPassword)) {
                $student_login_password = 1;
            } else {
                $student_login_password = 0;
            }
            if ($student_login_password == 1) {
                if ($student_record[0]['student_level'] == \strtolower('student')) {
                    session_start();
                    $_SESSION["student_logged_in"] = $student_record[0]["nim"];

                    session_write_close();
                    $url = "student.php";
                    header("Location: $url");
                } else {
                    $student_status = 'Invalid ID or Password';
                    return $student_status;
                }
            } else if ($student_login_password == 0) {
                $student_status = 'Invalid ID or Password';
                return $student_status;
            }
            // 
        }
        //================ course side
        $guest_record = $this->guestLogin($_POST['userid']);
        $guest_login_password = 0;
        if (!empty($guest_record)) {
            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
            }
            $hashPassword = $guest_record[0]['password'];
            $guest_login_password = 0;
            if (password_verify($password, $hashPassword)) {
                $guest_login_password = 1;
            } else {
                $guest_login_password = 0;
            }
            if ($guest_login_password == 1) {
                if ($guest_record[0]['level'] == strtolower('guest')) {
                    session_start();
                    $_SESSION["guest_login_id"] = $guest_record[0]["guest_id"];
                    session_write_close();
                    $url = "../guest/guest.php";
                    header("Location: $url");
                } else {
                    $guest_status = 'Invalid ID or Password';
                    return $guest_status;
                }
            } else if ($guest_login_password == 0) {
                $guest_status = 'Invalid ID or Password';
                return $guest_status;
            }
            // 
        }
    }
}
