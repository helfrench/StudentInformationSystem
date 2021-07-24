<?php

class config
{
    private $user = 'root';
    private $password = 'Skyflakes_02';
    public $pdo = null;

    public function conn()
    {

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=student_system', $this->user, $this->password);

          // echo "Database Connected";
            } 
            catch (\PDOException $e) 
            {
            die($e->getMessage());
            }
            return $this->pdo;

    }
}
 


?>