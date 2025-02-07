<?php
require_once "model/Owner.class.php";
require_once "model/persist/DBConnection.class.php";
require_once "model/persist/ModelInterface.php";

class OwnerDAO implements ModelInterface
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DBConnection();
    }

    /**
     * Recopilar todos los propietarios
     * @param void
     * @return array Con todos los owners
     */
    public function listAll()
    {
        // declarar array para los resultados
        $response = array();

        // myQuery parametros
        $sql = "SELECT * FROM propietarios"; // Listar todos los propietarios 
        $vector = array(); // array vacío porque no se necesitan parámetros para una consulta 'seleccionar todo'

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            foreach ($sentence as $line) {
                $owner = new Owner($line["nif"], $line["nom"], $line["email"], $line["movil"]);
                $response[] = $owner;
            }
        }

        return $response;
    }

    /**
     * Recupera un propietario de la base de datos dado su $nif
     * @param $nif del propietario a recuperar
     * @return owner propietario encontrado con ese nif en la base de datos. Si no se encuentra ninguno, devuelve null
     */
    public function searchById($nif)
    {
        // Declarar array para resultados
        $owner = NULL;

        // myQuery parametros
        $sql = "SELECT * FROM propietarios WHERE nif=?";
        $vector = array($nif);

        // preparar sentencia
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            foreach ($sentence as $line) {
                $owner = new Owner($line["nif"], $line["nom"], $line["email"], $line["movil"]);
            }
        }

        return $owner;
    }

    /**
     * Modifies a owner in the DB given its $nif and params
     * @param owner to modify
     * @return true if the owner was modified successfully, false otherwise
     */
    public function modify($owner)
    {
        // myQuery params
        $sql = "UPDATE propietarios SET nom=?, email=?, movil=? WHERE nif=?"; // Modificar propietario (1,5 punts)
        $vector = array($owner->getName(), $owner->getEmail(), $owner->getPhone(), $owner->getNif());

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    /**
     * Writes a new owner into the database
     * @param owner to add
     * @return true if the owner was added successfully, false otherwise
     */
    public function add($owner)
    {
        // myQuery params
        $sql = "INSERT INTO propietarios (nif, nom, email, movil) VALUES (?, ?, ?, ?)";
        $vector = array($owner->getNif(), $owner->getName(), $owner->getEmail(), $owner->getPhone());

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    /**
     * Deletes a owner from the DB given its $nif
     * @param $nif of owner to delete
     * @return true if the owner was deleted successfully, false otherwise
     */
    public function delete($nif)
    {
        // myQuery params
        $sql = "DELETE FROM propietarios WHERE nif=?";
        $vector = array($nif);

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);

        if ($sentence != null && $sentence->rowCount() != 0) {
            return true;
        }

        return false;
    }

    // Modificar la configuración de la restricción de clave externa:
    //     Puedes modificar la configuración de la restricción de clave externa para permitir acciones en cascada (ON DELETE CASCADE), 
    //     lo que significa que al eliminar una fila principal, todas las filas secundarias relacionadas se eliminarán automáticamente. Nuevamente, ten cuidado con esta opción.

    //     Ejemplo de cómo modificar la restricción:

    //     ALTER TABLE mascotas
    //     DROP FOREIGN KEY mascotas_ibfk_1;

    //     ALTER TABLE mascotas
    //     ADD CONSTRAINT mascotas_ibfk_1
    //     FOREIGN KEY (nifpropietario)
    //     REFERENCES propietarios(nif)
    //     ON DELETE CASCADE;
}
