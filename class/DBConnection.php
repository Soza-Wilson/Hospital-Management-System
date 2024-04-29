<?php


trait DBConnection
{

    protected $HOST, $USERNAME, $PASSWORD, $DATABASE, $PORT;
    private $con;

    private  function __construct()
    {
        $this->HOST ='localhost';
        $this->USERNAME ='root';
        $this->PASSWORD= '';
        $this->DATABASE = 'bwaila_hospital_schema';
        // $this->PORT = 3306;
       
        
    }

    private function  connect():object
    {
        try {
            // database connection
            $connection = mysqli_connect('localhost','root', '','bwaila_hospital_schema');
            return $connection;
        } catch (\Throwable $th) {
            die("Connection failed :" . $th);
        }
    }
}
