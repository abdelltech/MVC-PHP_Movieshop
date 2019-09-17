<?php
    class Connexion{
    	public static function connect(){
            $dsn = 'mysql:host='.HOSTNAME.'; dbname='.DATABASE;
            $user = USERNAME;
            $password = PASSWORD;
            try {
                $ma_connexion_mysql = new PDO($dsn, $user, $password);
                $ma_connexion_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $ma_connexion_mysql->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
                $ma_connexion_mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
                return $ma_connexion_mysql;

            } catch (PDOException $e) {
                echo "Problem Connexion MySQL : ", $e->getMessage();
                die();
            }
        }
    }
