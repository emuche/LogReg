<?php
declare(strict_types=1);
namespace App\Models;

use Framework\Model;

class User extends Model
{
    // protected $table = "user";

    protected function validate(array|object $data): void
    {
        foreach($data as $key => $value){
            if(empty($value)){
                $this->addError($key, "$key field is required");
            }
        }
    }
}