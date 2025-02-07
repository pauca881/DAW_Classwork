<?php
require_once "model/History.class.php";
require_once "model/persist/DBConnection.class.php";
require_once "model/persist/ModelInterface.php";

class HistoryDAO implements ModelInterface
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DBConnection();
    }

    /**
     * Recopila todas las visitas
     * @param void
     * @return array con todas las visitas
     */
    public function listAll()
    {
        // declarar array para los resultados
        $response = array();

        // parámetros para myQuery
        $sql = "SELECT * FROM lineas_de_historial ORDER BY fecha ASC";
        $vector = array(); // array vacío porque no se necesitan parámetros para una consulta 'seleccionar todo'

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            foreach ($sentence as $line)
            {
                $history = new History($line["id"], $line["idmascota"], $line["fecha"], $line["motivo_visita"], $line["descripcion"]);
                $response[] = $history;
            }
        }

        return $response;
    }

    /**
     * Escribe una nueva historia en la base de datos
     * @param historia a añadir
     * @return true si la historia se añadió con éxito, false en caso contrario
     */
    public function add($history)
    {
        // parámetros para myQuery
        $sql = "INSERT INTO lineas_de_historial (idmascota, fecha, motivo_visita, descripcion) VALUES (?, ?, ?, ?)";
        $vector = array($history->getIdPet(), $history->getDate(), $history->getMotive(), $history->getDesc() );

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }

    /**
     * Recupera una historia de la base de datos dado su $id
     * @param $id de la historia a recuperar
     * @return historia encontrada con ese id en la base de datos. Si no se encuentra ninguna, devuelve null
     */
    public function searchById($id)
    {
        // declarar array para los resultados
        $response = array();

        // parámetros para myQuery
        $sql = "SELECT * FROM lineas_de_historial WHERE id=?";
        $vector = array($id);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            foreach ($sentence as $line)
            {
                $history = new History($line["id"], $line["idmascota"], $line["fecha"], $line["motivo_visita"], $line["descripcion"]);
                $response[] = $history;
            }
        }

        return $response;
    }

    /**
     * Recupera una historia de la base de datos dado su $idPet
     * @param $idPet de la historia a recuperar
     * @return historia encontrada con ese idPet en la base de datos. Si no se encuentra ninguna, devuelve null
     */
    public function searchByPetId($idPet)
    {
        // declarar array para los resultados
        $response = array();

        // parámetros para myQuery
        $sql = "SELECT * FROM lineas_de_historial WHERE idmascota=?";
        $vector = array($idPet);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            foreach ($sentence as $line)
            {
                $history = new History($line["id"], $line["idmascota"], $line["fecha"], $line["motivo_visita"], $line["descripcion"]);
                $response[] = $history;
            }
        }

        return $response;
    }




    // ============== MÉTODOS NO UTILIZADOS ============== //




    /**
     * Modifica una historia en la base de datos dado su $id y parámetros
     * @param historia a modificar
     * @return true si la historia se modificó con éxito, false en caso contrario
     */
    public function modify($history)
    {
        // parámetros para myQuery
        $sql = "UPDATE lineas_de_historial SET idMascota=?, fecha=?, motivo_visita=?, descripcion=? WHERE id=?";
        $vector = array( $history->getIdPet(), $history->getDate(), $history->getMotive(), $history->getDesc(), $history->getId() );

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }

    /**
     * Elimina una historia de la base de datos dado su $id
     * @param $id de la historia a eliminar
     * @return true si la historia se eliminó con éxito, false en caso contrario
     */
    public function delete($id)
    {
        // parámetros para myQuery
        $sql = "DELETE FROM lineas_de_historial WHERE id=?";
        $vector = array($id);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }
}