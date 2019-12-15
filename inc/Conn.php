<?php

include 'Dbconfig.php';

class Mysql extends Dbconfig    {

public $conn;
public $dataSet;
private $sqlQuery;

protected $databaseName;
protected $hostName;
protected $userName;
protected $passCode;

function Mysql()    {
    $this->conn = NULL;
    $this->sqlQuery = NULL;
    $this->dataSet = NULL;

    $dbPara = new Dbconfig();
    $this->databaseName = $dbPara->dbName;
    $this->hostName = $dbPara->serverName;
    $this->userName = $dbPara->userName;
    $this->passCode = $dbPara->passCode;
    $dbPara = NULL;
    $this->checkEnv();
    
}

function checkEnv() {
    if(!defined('ENV')) {
    if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost:80') {
        define('ENV', 'dev');
        //$environment = 'dev';
    } else {
        define('ENV', 'live');
        //$environment = 'live';
    }
    /* *** Set default timezone *** */

    date_default_timezone_set('America/New_York');

    /* *** Find time ago for comments *** */
    }
}

function dbConnect()    {
    $this->conn = new PDO("mysql:host=$this->hostName;dbname=$this->databaseName", $this->userName, $this->passCode);
    return $this->conn;
}

/* function selectAll($tableName)  {
    $this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;
    $this -> dataSet = mysql_query($this -> sqlQuery,$this -> conn);
            return $this -> dataSet;
}

function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
    $this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
    if($valueType == 'int') {
        $this -> sqlQuery .= $value;
    }
    else if($valueType == 'char')   {
        $this -> sqlQuery .= "'".$value."'";
    }
    $this -> dataSet = mysql_query($this -> sqlQuery,$this -> conn);
    $this -> sqlQuery = NULL;
    return $this -> dataSet;
    #return $this -> sqlQuery;
}

function insertInto($tableName,$values) {
    $i = NULL;

    $this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
    $i = 0;
    while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL)    {
        if($values[$i]["type"] == "char")   {
            $this -> sqlQuery .= "'";
            $this -> sqlQuery .= $values[$i]["val"];
            $this -> sqlQuery .= "'";
        }
        else if($values[$i]["type"] == 'int')   {
            $this -> sqlQuery .= $values[$i]["val"];
        }
        $i++;
        if($values[$i]["val"] != NULL)  {
            $this -> sqlQuery .= ',';
        }
    }
    $this -> sqlQuery .= ')';
            #echo $this -> sqlQuery;
    mysql_query($this -> sqlQuery,$this ->conn);
            return $this -> sqlQuery;
    #$this -> sqlQuery = NULL;
}

function selectFreeRun($query)  {
    $this -> dataSet = mysql_query($query,$this -> conn);
    return $this -> dataSet;
}

function freeRun($query)    {
    return mysql_query($query,$this -> conn);
  } */
}
?>