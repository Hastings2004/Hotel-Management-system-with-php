<?php

class Update extends Change{
    private $email;
    private $oldpass;
    private $newPass;
    private $cPass;

    public function __construct($email, $oldpass, $newPass)
    {
        $this -> email = $email;
        $this -> oldpass = $oldpass;
        $this -> newPass = $newPass;
    }
    public function changePassword(){
        /*if($this->emptyFields() == false){
            header("location: ../menu/profile.php?error=empty-fields");
            exit();
        }*/
            $this -> update_password($this-> email, $this -> oldpass, $this -> newPass);
        
    }
    private function emptyFields(){
        $result = false;
        if(empty($this -> email) || empty($this -> newPass) ||empty($this -> cPass) ||empty($this -> oldpass)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}