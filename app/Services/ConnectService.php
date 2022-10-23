<?php

namespace App\Services;

use PDO;
use PDOException;

class ConnectService
{
    public function connectDataBase($request)
    {
        try{
            $conn =new PDO("mysql:host=$request->db_host;dbname=$request->db_name",
            $request->db_username, $request->user_pass);
        }catch (PDOException){
            return response()->json(['Could not connect to the database'], 432);
        }
        return $conn;
    }
}