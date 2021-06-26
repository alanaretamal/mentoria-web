<?php

namespace app\models;

use app\core\DbModel;



abstract class RegisterModel extends DbModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }
    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
    public function rules(): array
    {
    
        return[
            'firstname' =>[self::RULE_REQUIRED],
            'lastname' =>[self::RULE_REQUIRED],
            'email' =>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' =>[self::RULE_REQUIRED,[self::RULE_MIN, 'min' =>8]],
            'confirmPassword' =>[self::RULE_REQUIRED, [self::RULE_MATCH,'match'=>'password']],
        ];
    }
    //public function attributes(): array
    //{
    //    return[
    //        'firstname',
    //        'lastname',
    //        'email' ,
    //        'password',
    //    ];
   // }
  
   public function attributes(): array
   {
        $sql = "SELECT COLUMN_NAME 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE 
        TABLE_SCHEMA = Database()
        AND TABLE_NAME = 'users' ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
  
    }
   
}