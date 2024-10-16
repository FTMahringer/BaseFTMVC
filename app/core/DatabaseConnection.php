<?php

defined('ROOTPATH') or die('Access denied!');
Trait DatabaseConnection
{
    private function connect()
    {
        $string = DBDRIVER.":host=" . DBHOST .";dbname=". DBNAME .";charset=". DBCHARSET;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $params = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute($params);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function get_row($query, $params = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute($params);
        if ($check) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if (is_object($result)) {
                return $result;
            }
        }
        return false;
    }
}