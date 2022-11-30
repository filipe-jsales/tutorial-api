<?php

namespace App\Services;

use PDO;
use PDOException;

class ConnectService
{
    public function connectDataBase($request)
    {
        try {
            $mysql_host = \config('credentials.mysql_host');
            $mysql_database = \config('credentials.mysql_database');
            $mysql_user = \config('credentials.mysql_user');
            $mysql_password = \config('credentials.mysql_password');
            $conn = new PDO(
                "mysql:host=$mysql_host;dbname=$mysql_database",
                $mysql_user,
                $mysql_password
            );
        } catch (PDOException) {
            return response()->json(['Could not connect to the database'], 432);
        }
        return $conn;
    }
}