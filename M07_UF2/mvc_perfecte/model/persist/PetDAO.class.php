<?php

/**
 * PetDAO - Objeto de Acceso a Datos para gestionar datos relacionados con mascotas en la base de datos.
 *
 * Esta clase implementa la interfaz ModelInterface.
 * Interactúa con DBConnection para el acceso a la base de datos.
 *
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López
 */
require_once "model/Pet.class.php";
require_once "model/persist/DBConnection.class.php";
require_once "model/persist/ModelInterface.php";

class PetDAO implements ModelInterface
{
    private $dbConnection;

    private $sqlListPetsByOwner = "SELECT * FROM mascotas WHERE nifpropietario=?"; // Buscar mascotas dado un propietario (1,5 punts)

    public function __construct()
    {
        $this->dbConnection = new DBConnection();
    }

    /**
     * Recopilar todas las mascotas
     * @param void
     * @return array con todas las mascotas
     */
    public function listAll()
    {
        // declarar array para los resultados
        $response = array();

        // myQuery parametros
        $sql = "SELECT * FROM mascotas"; // Listar todas las mascotas 
        $vector = array(); // array vacío porque no se necesitan parámetros para una consulta 'seleccionar todo'

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            foreach ($sentence as $line) {
                $pet = new Pet($line["id"], $line["nifpropietario"], $line["nom"]);
                $response[] = $pet;
            }
        }

        return $response;
    }

    /**
     * Escribe una nueva mascota en la base de datos
     * @param pet para añadir
     * @return true true si la mascota se añadió con éxito, false en caso contrario
     */
    public function add($pet)
    {
        // myQuery parametros
        $sql = "INSERT INTO mascotas (id, nifpropietario, nom) VALUES (?, ?, ?)";
        $vector = array($pet->getId(), $pet->getIdOwner(), $pet->getName());

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    /**
     * Recupera una mascota de la base de datos dado su $id
     * @param $id de la mascota a recuperar
     * @return pet encontrada con ese id en la base de datos. Si no se encuentra ninguna, devuelve null
     */
    public function searchById($id)
    {
        // declarar variables de resultado
        $pet = null;

        // Obtener los datos de la mascota (basado en el parámetro $id)
        $sql = "SELECT * FROM mascotas WHERE id=?";
        $vector = array($id);
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        if ($sentence != null && $sentence->rowCount() != 0) {
            foreach ($sentence as $line) {
                $pet = new Pet($line["id"], $line["nifpropietario"], $line["nom"]);
            }
        }

        $response = $pet;

        return $response;
    }

    /**
     * Recupera una mascota de la base de datos dado el $nif del propietario
     * @param $nif del propietario de la mascota
     * @return pet mascota encontrada con ese nif del propietario en la base de datos. Si no se encuentra ninguna, devuelve null
     */
    public function searchByOwnerNif($nif)
    {
        // declarar array para los resultados
        $response = array();

        // myQuery parametros
        $sql = "SELECT * FROM mascotas WHERE nifpropietario=?";
        $vector = array($nif);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            foreach ($sentence as $line) {
                $pet = new Pet($line["id"], $line["nifpropietario"], $line["nom"]);
                $response[] = $pet;
            }
        } 
        return $response;
    }

    /**
     * Modifica una mascota en la base de datos dado su $id y parámetros
     * @param pet a modificar
     * @return true true si la mascota se modificó con éxito, false en caso contrario
     */
    public function modify($pet)
    {
        // myQuery parametros
        $sql = "UPDATE mascotas SET nifpropietario=?, nom=? WHERE id=?";
        $vector = array($pet->getIdOwner(), $pet->getName(), $pet->getId());

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    /**
     * Elimina una mascota de la base de datos dado su $id
     * @param $id de la mascota a borrar
     * @return true si la mascota se eliminó con éxito, false en caso contrario
     */
    public function delete($id)
    {
        // myQuery parametros
        $sql = "DELETE FROM mascotas WHERE id=?";
        $vector = array($id);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    //     Modificar la configuración de la restricción de clave externa:
    //     Puedes modificar la configuración de la restricción de clave externa para permitir acciones en cascada (ON DELETE CASCADE), lo que significa que al eliminar una fila principal, todas las filas secundarias relacionadas se eliminarán automáticamente. Sin embargo, ten cuidado con esta opción, ya que puede tener consecuencias no deseadas si no se maneja adecuadamente.

    //     Ejemplo de cómo modificar la restricción:

        // ALTER TABLE lineas_de_historial
        // DROP FOREIGN KEY lineas_de_historial_ibfk_1;

        // ALTER TABLE lineas_de_historial
        // ADD CONSTRAINT lineas_de_historial_ibfk_1
        // FOREIGN KEY (idmascota)
        // REFERENCES mascotas(id)
        // ON DELETE CASCADE;
}
