<?php

class Banco extends \PDO
{
    private $dsn = "mysql:host=localhost;port:3306";
    private $user = "root";
    private $password = "123456";
    private $database = "geoplan";
    protected $transactionCounter = 0;
    public $handle = null;
    public static $instance;

    final public static function instanciar(){
        if (!(self::$instance instanceof self)) {
          self::$instance = new self();
        }
        return self::$instance;
        //$handle = new PDO('sqlite:/temp/banco.db',null,null,array(self::ATTR_PERSISTENT => true));
        //Set errormode to exceptions
        //$handle->setAttribute(PDO::ATTR_ERRMODE,
                              //  PDO::ERRMODE_EXCEPTION);
        //$handle->exec("CREATE TABLE IF NOT EXISTS perfil (
          //id INTEGER PRIMARY KEY,
          //id_usuario INTEGER,
          //perfil TEXT,
          //criado_em INTEGER
      //  )");

        //$handle->exec("CREATE TABLE  IF NOT EXISTS usuario (
          //id INTEGER PRIMARY KEY,
          //email TEXT,
          //nome TEXT,
          //senha TEXT
        //)");
        //return $handle;
    }

    public function __construct(){
        try {
          $this->handle = parent::__construct($this->dsn,$this->user,$this->password);
          $this->setAttribute(self::ATTR_ERRMODE, self::ERRMODE_EXCEPTION);
          $this->exec("USE ". $this->database);
          return $this->handle;
        }
        catch (\PDOException $e){
            throw new Exception($e->getMessage());
            return false;
        }
    }

    function beginTransaction(){
        if(!$this->transactionCounter++)
            return parent::beginTransaction();
            return $this->transactionCounter >= 0;
    }

    function commit(){
        if(!--$this->transactionCounter)
            return parent::commit();
        return $this->transactionCounter >= 0;
    }

    function rollback(){
        if($this->transactionCounter >= 0){
            $this->transactionCounter = 0;
            return parent::rollback();
        }
        $this->transactionCounter = 0;
        return false;
    }

    final function __destruct(){
        $this->handle = null;
    }
}
