<?php

require_once "model/Friend.class.php";
require_once "model/persist/DBConnect.class.php";
require_once "model/persist/DBConnection.class.php";
require_once "model/Friend_and_Hobbie.class.php";



class FriendsDAO {

    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }



      /**
     * Recull el total de amics
     * @param void 
     * @return array de Friend objectes
     */

     public function listAll() : array
     {
         $sql = "SELECT * FROM friends";
         
         $result = $this->dbConnection->myQuery($sql, []);

        if ($result) {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {

            $friends[] = new Friend($row['id'], $row['friend']);
        }
    }
    
    return $friends;
     }




    /**
     * MÈTODE OBSOLET
     * Recull el nombre de totes les categories
     * @param void
     * @return vector amb tots els objectes de categories
     */
    
    public function categoryCount():int{

        $array_categorias=array();
        $array_categorias=$this->dbConnect->realAllLines();

        return count($array_categorias);
    }  
    



      
    //     if ($result==FALSE) {
    //         $_SESSION['error']=CategoryMessage::ERR_DAO['insert'];
    //     }
        
    //     return $result;

	// }


    /**
    * Afegeix un amic
    * @param Friend objecte
    * @return TRUE O FALSE
    */

    public function add($friend) : bool
{
    $sql = "INSERT INTO friends (id, friend) VALUES (:id, :friend)";

    $params = [
        ':id' => $friend->getId(),        
        ':friend' => $friend->getName()   
    ];

    $result = $this->dbConnection->myQuery($sql, $params);

    if ($result) {
        return TRUE;
        echo "<script>window.location.href = 'http://localhost/src/index.php?menu=friends&option=list_all_friends';</script>";
    } else {
        return FALSE;
        echo "<script>window.location.href = 'https://brave.com';</script>";
        
    }


}





    /**
    * Modificar un amic
    * @param id id de l'amic donat
    * @param name nom de l'amic donat
    * @return TRUE o FALSE
    */
    public function modify($id, $name) : bool{

		$sql = "UPDATE friends SET friend = :friend WHERE id = :id";

        $params = [
            ':id' => $id,
            ':friend' => $name
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
	    
    }


    /**
    * Esborra un amic donat l' id
    * @param id identificador de l'amic a buscar
    * @return TRUE O FALSE
    */
    public function delete($id) : bool {

        $sql = "DELETE FROM friends WHERE id = :id";

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
    * Selecionar un amic per id
    * @param id identificador de l'amic a buscar
    * @return Friend objecte or NULL
    */
    public function searchById($id) : Friend {

        $sql = "SELECT * FROM friends WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return new Friend($row['id'], $row['friend']);
        } else {
            return NULL;
        }

    }

    /**
    * Selecionar un amic per id
    * @param id identificador de l'amic a buscar
    * @return row de Friend objecte or NULL
    */
    public function searchNameById($id) {

        $sql = "SELECT * FROM friends WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['friend'];
        } else {
            return NULL;
        }

    }

    public function listAllFriendsHobbies() {
        
        $sql = "SELECT f.id AS friend_id, f.friend AS friend_name, h.id AS hobby_id, h.hobbie AS hobby_name
        FROM friends f JOIN friend_hobbies fh ON f.id = fh.friend_id JOIN hobbies h ON fh.hobbie_id = h.id
        ORDER BY f.id ASC;";

        $result = $this->dbConnection->myQuery($sql, []);
        
        if ($result) {
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $friends_and_hobbies[] = new Friend_and_Hobbie(
                    $row['friend_id'],   
                    $row['friend_name'],
                    $row['hobby_id'],    
                    $row['hobby_name']   
                );
            }
        }
    
        return $friends_and_hobbies;

    }

    public function assignHobby($friend_and_hobby) {

        try {


      

        echo "ID del amic: ";
        echo $friend_and_hobby->getFriendId();
        echo "<br> ID del hobby: <br>";
        echo $friend_and_hobby->getHobbyId();

        $sql = "INSERT INTO friend_hobbies (friend_id, hobbie_id) VALUES (:friend_id, :hobbie_id)";
        


        $params = [
            ':friend_id' => $friend_and_hobby->getFriendId(),
            ':hobbie_id' => $friend_and_hobby->getHobbyId()
        ];

        $result = $this->dbConnection->myQuery($sql, $params);

        if ($result) {
            return TRUE;
        }
        else {
            return FALSE;
        }
     
        } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Ya existe una relación entre este amigo y hobby.<br>";
        } else {
            echo "Error desconocido: " . $e->getMessage() . "<br>";
        }        
    }

    }

    public function listFriendsAndHobbies_separated() {

        
        
    }



}
    ?>
