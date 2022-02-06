<?php

   // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', '');
  define('DB_PASS', '');
  define('DB_NAME', '');

  class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $data;
    private $error;

    public function __construct(){
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
        die($e);
      }
    }

    public function preRequest($sql){
        $this->data = $this->dbh->prepare($sql);
    }

    public function getLastInserted(){
      return  $this->dbh->lastInsertId();
    }

    public function bindvalue($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->data->bindValue($param, $value, $type);
    }

    public function executeData(){
      return $this->data->execute();
    }

    public function getRowsTable(){
      $this->executeData();
      return $this->data->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRow(){
      $this->executeData();
      return $this->data->fetch(PDO::FETCH_OBJ);
    }

    public function countRow(){
      return $this->data->rowCount();
    }
    
  }
