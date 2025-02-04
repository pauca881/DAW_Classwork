<?php

/**
 * Este archivo contiene la implementación de la clase PetController, que actúa como controlador para la sección de mascotas en el sitio web.
 *
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López
 */

require_once "controller/ControllerInterface.php"; // REQUIERE LA INTERFAZ DEL CONTROLADOR

require_once "view/PetView.class.php"; // REQUIERE LA VISTA (PARA MOSTRAR)

require_once "model/persist/PetDAO.class.php";
require_once "model/persist/OwnerDAO.class.php"; // para mostrar detalles de mascotas
require_once "model/persist/HistoryDAO.class.php"; // para mostrar detalles de mascotas
require_once "model/Pet.class.php"; // REQUIERE EL MODELO (DAO Y DTO)

require_once "util/PetMessage.class.php"; // ARCHIVO QUE CONTIENE MENSAJES DE INFORMACIÓN Y ERROR
require_once "util/OwnerMessage.class.php"; // para mostrar detalles de mascotas
require_once "util/HistoryMessage.class.php"; // para mostrar detalles de mascotas

require_once "util/PetFormValidation.class.php"; // VALIDADOR UTILIZADO ANTES DE CREAR/ACTUALIZAR EL OBJETO
require_once "util/HistoryFormValidation.class.php";

/**
 * Clase que controla las solicitudes de los usuarios enviadas a la sección de mascotas del sitio web.
 */
class PetController implements ControllerInterface
{
    private $view;
    private $model;

    /**
     * Instancia Vista y Modelo.
     */
    public function __construct()
    {
        $this->view = new PetView();
        $this->model = new PetDAO();
    }

    /**
     * Este método es llamado por el Controlador Principal. Procesará la solicitud $_POST o $_GET enviada por el usuario.
     */
    public function processRequest()
    {
        // VERIFICAR GET Y POST
        $request = NULL;
        if (isset($_POST["action"])) $request = $_POST["action"]; // EL PARÁMETRO POST "action" EXISTE (SE HIZO CLIC EN EL BOTÓN DE ENVÍO) --> ESTABLECER $request CON SU VALOR
        else if (isset($_GET["option"])) $request = $_GET["option"]; // EL PARÁMETRO URL "menu" EXISTE --> ESTABLECER $request CON SU VALOR (EL USUARIO ESTÁ EN UNA SUBPÁGINA ESPECÍFICA)

        switch ($request) {
            case "list_all":
                $this->listAll();
                break;

            case "form_search_pet_by_id":
                $this->formSearchById();
                break;

            case "search_pet_by_id":
                $this->searchById();
                break;

            case "form_add_history":
                $this->formAddHistory();
                break;

            case "form_add":
                $this->formAddPet();
                break;

            case "add":
                $this->add();
                break;

            case "add_history":
                $this->addHistory();
                break;

            case "form_modify_pet":
                $this->formModify();
                break;

            case "update_pet":
                $this->modify();
                break;

            case "delete":
                $this->delete();
                break;

                // POR DEFECTO
            default:
                $this->view->display();
        }
    }

    /**
     * Mostrar todas las mascotas en una tabla utilizando la vista. Las mascotas se obtuvieron del modelo.
     */
    public function listAll()
    {
        $pets = $this->model->listAll(); // obtener datos del DAO

        if (!empty($pets)) $_SESSION["info"][]  = PetMessage::SELECT_SUCCESS;
        else               $_SESSION["error"][] = PetMessage::SELECT_ERROR;

        $this->view->display("view/form/PetList.php", $pets); // mostrar datos
    }

    public function formSearchById()
    {
        $this->view->display("view/form/PetFormSearchById.php"); // mostrar formulario
    }

    /**
     * Mostrar una sola mascota por id.
     */
    public function searchById()
    {
        $id = $_POST["id"];

        $pet = null;
        $owner = null;
        $history = array();

        if ($id == null) {
            $_SESSION["error"][] = PetMessage::FORM_EMPTY_ID;
        } else {
            // BUSCAR MASCOTA EN LA BASE DE DATOS
            $pet = $this->model->searchById($id);

            if (!isset($pet)) $_SESSION["error"][] = PetMessage::SELECT_ERROR;
            else {
                $_SESSION["info"][]  = PetMessage::SELECT_SUCCESS;

                // BUSCAR DUEÑO DE LA MASCOTA EN LA BASE DE DATOS
                $ownerModel = new OwnerDAO();
                $owner = $ownerModel->searchById($pet->getIdOwner());
                if (!empty($owner)) $_SESSION["info"][]  = OwnerMessage::SELECT_SUCCESS;
                else                $_SESSION["error"][] = OwnerMessage::SELECT_ERROR;

                // BUSCAR HISTORIAL DE LA MASCOTA EN LA BASE DE DATOS
                $historyModel = new HistoryDAO();
                $history = $historyModel->searchByPetId($id);
                if (!empty($history)) $_SESSION["info"][]  = HistoryMessage::SELECT_SUCCESS;
                else                  $_SESSION["error"][] = HistoryMessage::SELECT_ERROR;
            }
        }

        $item = array($pet, $owner, $history);

        if (!empty($_SESSION["error"])) {

            $this->view->display("view/form/PetFormSearchById.php"); // mostrar formulario

        } else {
            // MOSTRAR FORMULARIO NUEVAMENTE CON LOS PARÁMETROS DEL ELEMENTO Y MENSAJES DE ÉXITO/ERROR
            $this->view->display("view/form/PetDetail.php", $item);
        }
    }

    /**
     * Mostrar el formulario para agregar un nuevo historial, utilizando la vista.
     **/
    public function formAddHistory()
    {
        $this->view->display("view/form/HistoryFormInsert.php");
    }

    /**
     * Mostrar el formulario para agregar una mascota, utilizando la vista.
     */
    public function formAddPet()
    {
        $this->view->display("view/form/PetFormUpdate.php");
    }

    /**
     * Agregar nuevo historial.
     * Acceder a la entrada del formulario del usuario a través de $_POST y acceder a la base de datos a través del DAO de Historial. Luego mostrar el resultado utilizando la vista.
     **/
    public function addHistory()
    {
        // NECESITARÁ ACCEDER AL MODELO DE HISTORIAL
        $historyModel = new HistoryDAO();

        // VALIDAR ENTRADA PARA INSERTAR (solo requiere idPet y fecha)
        $historyInput = HistoryFormValidation::checkData(HistoryFormValidation::INSERT);

        if (empty($_SESSION["error"])) // Si la validación no tuvo errores...
        {
            // COMPROBAR SI LA MASCOTA EXISTE
            $petFound = $this->model->searchById($historyInput->getIdPet());
            if (!$petFound) $_SESSION["error"][] = PetMessage::ID_DOES_NOT_EXIST;
            else {
                // AGREGAR HISTORIAL A LA BASE DE DATOS
                $success = $historyModel->add($historyInput);

                if ($success) $_SESSION["info"][]  = HistoryMessage::INSERT_SUCCESS;
                else          $_SESSION["error"][] = HistoryMessage::INSERT_ERROR;
            }
        }

        // MOSTRAR FORMULARIO NUEVAMENTE CON LOS PARÁMETROS DEL ELEMENTO Y MENSAJES DE ÉXITO/ERROR
        $this->view->display("view/form/HistoryFormInsert.php", $historyInput);
    }

    /**
     * Hacer clic en el botón "modificar" en la lista de mascotas. Mostrar un formulario.
     */
    public function formModify()
    {
        $petInput = PetFormValidation::checkData(PetFormValidation::SELECT);
        $petFinal = $petInput;

        if (empty($_SESSION["error"])) // Si la validación no tuvo errores...
        {
            // SELECCIONAR MASCOTA
            $petFound = $this->model->searchById($petInput->getId());
            if ($petFound == NULL) {
                $_SESSION["error"][] = PetMessage::ID_DOES_NOT_EXIST;
            } else {
                $petFinal = $petFound;
            }
        }

        $this->view->display("view/form/PetFormUpdate.php", $petFinal);
    }

    /**
     * Modificar mascota.
     * Acceder a la entrada del formulario del usuario a través de $_POST y acceder a la base de datos a través del DAO. Luego mostrar el resultado utilizando la vista.
     */
    public function modify()
    {
        // VALIDAR ENTRADA
        $petInput = PetFormValidation::checkData(PetFormValidation::UPDATE);
        $petFinal = $petInput;

        if (empty($_SESSION["error"])) // Si la validación no tuvo errores...
        {
            // COMPROBAR SI LA MASCOTA EXISTE
            $petFound = $this->model->searchById($petInput->getId());
            if ($petFound == NULL) {
                $_SESSION["error"][] = PetMessage::ID_DOES_NOT_EXIST;
            } else {
                // COMPROBAR SI EL DUEÑO EXISTE
                $ownerModel = new OwnerDAO();
                $ownerFound = $ownerModel->searchById($petInput->getIdOwner());
                if ($ownerFound == NULL) {
                    $_SESSION["error"][] = OwnerMessage::NIF_DOES_NOT_EXIST;
                } else {
                    $petFinal = $petFound;
                    $petFinal->setIdOwner($petInput->getIdOwner());
                    $petFinal->setName($petInput->getName());

                    // ACTUALIZAR MASCOTA EN LA BASE DE DATOS
                    $success = $this->model->modify($petFinal);
                    if ($success) $_SESSION["info"][]  = PetMessage::UPDATE_SUCCESS;
                    else          $_SESSION["error"][] = PetMessage::UPDATE_ERROR;
                }
            }
        }

        // MOSTRAR FORMULARIO NUEVAMENTE CON LOS PARÁMETROS DE LA MASCOTA Y MENSAJES DE ÉXITO/ERROR
        $this->view->display("view/form/PetFormUpdate.php", $petFinal);
    }

    // ============== MÉTODOS NO UTILIZADOS ============== //

    /**
     * Agregar nueva mascota.
     * Acceder a la entrada del formulario del usuario a través de $_POST y acceder a la base de datos a través del DAO. Luego mostrar el resultado utilizando la vista.
     **/
    public function add()
    {
        // VALIDAR ENTRADA
        $petInput = PetFormValidation::checkData(PetFormValidation::INSERT);
        $petFinal = $petInput;

        if (empty($_SESSION["error"])) // Si la validación no tuvo errores...
        {
            // COMPROBAR SI LA MASCOTA EXISTE
            $petFound = $this->model->searchById($petInput->getId());
            if ($petFound != NULL) {
                $_SESSION["error"][] = PetMessage::ID_ALREADY_EXISTS;
            } else {
                // COMPROBAR SI EL DUEÑO EXISTE
                $ownerModel = new OwnerDAO();
                $ownerFound = $ownerModel->searchById($petInput->getIdOwner());
                if ($ownerFound == NULL) {
                    $_SESSION["error"][] = OwnerMessage::NIF_DOES_NOT_EXIST;
                } else {
                    // AGREGAR MASCOTA A LA BASE DE DATOS
                    $success = $this->model->add($petFinal);
                    if ($success) $_SESSION["info"][]  = PetMessage::INSERT_SUCCESS;
                    else          $_SESSION["error"][] = PetMessage::INSERT_ERROR;
                }
            }
        }
        $this->view->display("view/form/PetFormUpdate.php");
    }

    /**
     * Eliminar mascota.
     * Acceder a la entrada del formulario del usuario a través de $_POST y acceder a la base de datos a través del DAO. Luego mostrar el resultado utilizando la vista.
     */
    public function delete()
    {
        $id = $_POST["id"];

        if ($id == null) {
            $_SESSION["error"][] = PetMessage::FORM_EMPTY_ID;
        } else {
            // BUSCAR MASCOTA EN LA BASE DE DATOS
            $pet = $this->model->delete($id);
            if (!$pet) {
                $_SESSION["error"][] = PetMessage::DELETE_ERROR;
            } else {
                $_SESSION["info"][]  = PetMessage::DELETE_SUCCESS;
            }
        }

        // MOSTRAR FORMULARIO NUEVAMENTE CON LOS PARÁMETROS DEL ELEMENTO Y MENSAJES DE ÉXITO/ERROR
        $this->listAll();
    }
}
