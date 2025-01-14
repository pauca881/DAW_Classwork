<?php

class DBConnection
{

    private $dsn = "mysql:host=127.0.0.1;port=3306;dbname=myfriends";
    private $user = "root";
    private $password = "root";

    //$dbh: Aquí guardo la conexió activa a la BD como un objecte PDO
    private $dbh; 


    private function connect()
    {
        $flag = true;

        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            $flag = false;
            echo "Error de conexió a la base de dades: " . $e->getMessage();
        }
        return $flag;
    }

    private function disconnect()
    {
        $this->dbh = null;
    }


// Mètode myQuery($sql, $vector): Aquest mètode permet executar consultes SQL.

// Primer intenta connectar-se a la base de dades.
// Després, prepara la consulta SQL amb PDO::prepare i
// utilitza un vector de paràmetres ($vector) per evitar injeccions SQL.


    public function myQuery($sql, $vector)
    {
        $sentencia = null;
        //select, insert, update,delete
        if ($this->connect()) {

            try {
                $sentencia = $this->dbh->prepare($sql);
            } catch (PDOException $e) {

                echo "Error de conexió al fer la consulta a la base de dades: " . $e->getMessage();  // Muestra el error si no se puede conectar
               

            }

            if ($sentencia->execute($vector) != false) {
                $this->disconnect();
            }
        }

        return $sentencia;
    }
}
