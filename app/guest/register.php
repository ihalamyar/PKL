<?php
namespace App\guest;
use App\database\Database;
class Register
{
    private $errors = array();

    private $db = null;
    public function __construct()
    {
        $this->db =  Database::getInstance();
        $this->db->getInstance();
    }

    public function signup($post)
    {
        foreach ($post as $key => $value) {
            if ($key == "guest_email") {
                // email
                if (trim($value) == "") {
                    $this->errors[] = "Fill the email";
                } else if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[] = "Invalid character on email";
                }
            }
            if ($key == "guest_name") {
                if (trim($value) == "") {
                    $this->errors[] = "Fill the name";
                } else if (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
                    $this->errors[] = "Name should be only letter";
                }
            }
            if ($key == "guest_lastname") {
                if (trim($value) == "") {
                    $this->errors[] = "Fill the last name";
                } else if (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
                    $this->errors[] = "Last name should be only letter";
                }
            }
            if ($key == "guest_mainid") {
                if (trim($value) == "") {
                    $this->errors[] = "Fill the ID";
                }
                if (!\is_numeric($value)) {
                    $this->errors[] = "ID must be number";
                }
            }

            if ($key == "guest_password") {
                if (trim($value) == "") {
                    $this->errors[] = "Fill the last Password";
                }
            }
        }
        try {

            if (count($this->errors) == 0) {
                $command = 'SELECT  COUNT(*) FROM guest_login WHERE email =  "' . $post["guest_email"] . '"
                OR guest_id =  "' . $post["guest_mainid"] . '"   ';
                 $this->db->query($command);
                 if($command == 0){
                    $this->errors[] = "Duplicate";
                 }else{
                    $query = $this->db->insert('INSERT INTO guest_login(email, 
                    name, 
                    lastname, 
                    guest_id, 
                    password) 
                    VALUES ("' . $post["guest_email"] . '"
                    ,"' . $post["guest_name"] . '"
                    ,"' . $post["guest_lastname"] . '"
                    ,"' . $post["guest_mainid"] . '"
                    ,"' . password_hash($post['guest_password'], PASSWORD_DEFAULT) . '")');;
                    if ($query == true) {
                        $this->errors[] = "Successfully Registerd";
                    }
                    $this->db->close();
                 }
            }
        } catch (\Throwable $th) {
            $this->errors[] = "Something went wrong";
        }
        return $this->errors;
    }
}
