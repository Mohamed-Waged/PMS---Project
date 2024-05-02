<?php

require_once __DIR__ . '/Database.php';

class Validation
{

    public $error;

    public function requiredValidation($name, $string)
    {
        $validate = strlen($string) > 0;

        if (!$validate) {
            $this->error[$name] =  ucfirst($name)." Is Required ";
        }

        return $this;
    }

    public function maxValidation($name, $string, $len)
    {
        $validate = strlen($string) > $len;

        if (!$validate) {
            $this->error[$name] = ucfirst($name)." Must Be More Than $len Chars" ;
        }

        return $this;
    }

    public function existsValidate($tableName, $columnName, $value)
    {
        $db = new Database();

        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . $columnName . ' = ' . $value;

        $response = $db->makeQuery($sql);

        $result =  $response->fetch_all(MYSQLI_ASSOC);

        $validate = count($result);

        if (!$validate) {
            $this->error[$columnName] = strtoupper($columnName) ." Not Exists ";
        }

        return $validate;
    }

    public function minValidation($name, $string, $len)
    {
        $validate = strlen($string) <= $len;

        if (!$validate) {
            $this->error[$name] = ucfirst($name) ." Must Be Less Than  $len  Chars ";
        }

        return $this;
    }
}