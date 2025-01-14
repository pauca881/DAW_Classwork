<?php

require_once "model/Hobbie.class.php";
require_once "model/persist/DBConnect.class.php";
require_once "model/persist/DBConnection.class.php";


class HobbiesDAO {

    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

     /**
    * Recull tots els hobbies
    * @param void
    * @return array amb tots objetes Hobbie
    */
    
    public function listAll()
     {
         $sql = "SELECT * FROM hobbies";
         
         $result = $this->dbConnection->myQuery($sql, []);

        if ($result) {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {

            $hobbies[] = new Hobbie($row['id'], $row['hobbie']);
        }
    }
    
    return $hobbies;
     }

  

    /**
    * Afegeix una hobbie
    * @param Hobbie objecte
    * @return TRUE O FALSE
    */
    public function add($hobbie){

		$sql = "INSERT INTO hobbies (id, hobbie) VALUES (:id, :hobbie)";

    $params = [
        ':id' => $hobbie->getId(),        
        ':hobbie' => $hobbie->getName()   
    ];

    $result = $this->dbConnection->myQuery($sql, $params);

    if ($result) {
        return TRUE;

    } else {
        return FALSE;        
    }

	}


    /**
    * Modificar una hobbie
    * @param id id del hobbie donat
    * @param name nom del hobbie donat
    * @return TRUE o FALSE
    */
    public function modify($id, $name) : bool{

        $sql = "UPDATE hobbies SET hobbie = :hobbie WHERE id = :id";

        $params = [
            ':id' => $id,
            ':hobbie' => $name
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }	    
    }


    /**
    * Esborra una categoria donat l' id
    * @param id identificador del hobbie a buscar
    * @return TRUE O FALSE
    */
    public function delete($id): bool {

        $sql = "DELETE FROM hobbies WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
    /**
    * Selecionar una hobbie per id
    * @param id identificador del hobbie a buscar
    * @return Hobbie objecte or NULL
    */
    public function searchById($id) : Hobbie {

        $sql = "SELECT * FROM hobbies WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return new Hobbie($row['id'], $row['hobbie']);
        } else {
            return NULL;
        }

    }


     /**
    * Selecionar un hobbie per id
    * @param id identificador de l'amic a buscar
    * @return row de Hobbie objecte or NULL
    */
    public function searchNameById($id) {

        $sql = "SELECT * FROM hobbies WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['hobbie'];
        } else {
            return NULL;
        }

    }



}
    ?>
