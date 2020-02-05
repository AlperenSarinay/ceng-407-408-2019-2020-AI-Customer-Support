<?php
/**
 * Class helperDev
 * @author Atakan Demircioğlu
 * @blog https://www.atakann.com
 * @mail mehata1997@hotmail.com
 * @date 02.02.2020
 * @update 05.02.2020
 */ 
include '../inc/Conn.php';
class adminController
{
    public static function getAllUsers() {
        $conne = new Mysql();
        $conn = $conne->dbConnect();
        $query = $conn->query("SELECT * FROM users");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $r= $query->fetchAll();
        return $r;
    }
}