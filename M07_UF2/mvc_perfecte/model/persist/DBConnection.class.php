<?php
require_once("config.php");
/**
 * Clase que interactua mediante funcinones con la base de datos
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López 
 */

class DBConnection
{
    //Atributos
    /*
    private $dsn;
    private $user;
    private $password;
    */
    private $dbh; // Almacenará el objeto de la conexión con la BBDD

    // //Config 2 
    // public function __construct()
    // {
    //     require "config.php";
    //     $this->dsn = $DSN;
    //     $this->user = $USER;
    //     $this->password = $PASSWORD;
    //     $dbh;
    // }

    // Método necesario para conectarnos desde otros métodos
    private function connect()
    {
        $flag = true;

        try {
            $this->dbh = new PDO(CONSTDSN, CONSTUSER, CONSTPASSWORD);
        } catch (PDOException $e) {
            $flag = false;
        }
        return $flag;
    }

    // Desconectamos de la base de datos
    private function disconnect()
    {
        $this->dbh = null;
    }

    public function myQuery($sql, $vector)
    {
        $sentencia = null;
        //select, insert, update,delete
        if ($this->connect()) {

            try {
                $sentencia = $this->dbh->prepare($sql);
            } catch (PDOException $e) {
            }

            if ($sentencia->execute($vector) != false) {
                $this->disconnect();
            }
        }

        return $sentencia;
    }
}
