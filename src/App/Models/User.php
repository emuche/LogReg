<?php
declare(strict_types=1);
namespace App\Models;

use Framework\Model;

class User extends Model
{
    // protected $table = "user";

    public function validateRegistration(array|object $data): void
    {
        $data = (object)$data;
        if(empty($data->name)){
            $this->addError('name', "Full Name field is required");
        }

        if($this->fieldValueExists("email",$data->email)){
            $this->addError("email", "email is already taken");
        }

        if(filter_var($data->email, FILTER_VALIDATE_EMAIL) === false){
            $this->addError("email", "Email field is required");
        }

        if($data->password != $data->confirm_password){
            $this->addError("password", "Password does not match");
        }

        if(preg_match("#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z]{6,}$#" , $data->password) === 0){
            $this->addError("password", "Password must be at least 6 characters, contain a digit and UPPER and lower case alphabet");
        }
    }

}