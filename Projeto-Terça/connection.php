<?php
    $db_name = 'mysql:host=localhost;dbname=proj_db';
    $db_user = 'root';
    $db_password = '';

    $conn = new PDO($db_name, $db_user, $db_password);
    if($conn) {
        echo "conectado";
    }
    function unique_id(){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charLength = strLen($chars);
        $randomString = '';
        
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $chars[mt_rand(0, $charLength - 1)];
        }
        return $randomString;
    }