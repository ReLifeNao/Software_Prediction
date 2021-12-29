<?php

function conectar(){
        $user='root';
        $pass="";
        $server='localhost';
        $db='house_prices';
        try{
            $con = mysqli_connect($server,$user,$pass,$db);
            return $con;
        }
        catch(Exception $e){
            echo "No se pudo conectar";
        }

    }

?>