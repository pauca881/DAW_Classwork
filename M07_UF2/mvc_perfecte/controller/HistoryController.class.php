<?php

/**
 * Controlador de Historial - Gestiona las solicitudes de los usuarios relacionadas con el historial médico de las mascotas.
 * Este archivo controla las interacciones entre la vista (presentación), el modelo (acceso a datos), y el manejo de mensajes relacionados con el historial.
 * 
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López
 */

require_once "view/HistoryView.class.php"; // REQUIERE VISTA (PARA MOSTRAR)

require_once "model/persist/HistoryDAO.class.php"; // para mostrar detalles de mascotas

require_once "util/HistoryMessage.class.php"; // para mostrar detalles de mascotas

/**
 * Clase que controla las solicitudes de los usuarios enviadas a la sección de mascotas del sitio web.
 */
class HistoryController
{
    private $view;
    private $model;

    /**
     * Instancia Vista y Modelo.
     */
    public function __construct()
    {
        $this->view = new HistoryView();
        $this->model = new HistoryDAO();
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
            default:
                // EL PARÁMETRO URL "option" NO EXISTE Y NO SE PRESIONÓ EL BOTÓN DE ENVÍO DEL FORMULARIO --> MOSTRAR VISTA (SOLO MENÚ DE MASCOTAS)
                $this->view->display();
        }
    }

    /**
     * Mostrar todas las mascotas en una tabla, utilizando la vista. Las mascotas se obtuvieron del modelo.
     */
    public function listAll()
    {
        $content = $this->model->listAll(); // obtener datos del DAO

        if (!empty($content)) $_SESSION["info"][]  = HistoryMessage::SELECT_SUCCESS;
        else               $_SESSION["error"][] = HistoryMessage::SELECT_ERROR;

        $this->view->display("view/form/HistoryList.php", $content); // mostrar datos
    }
}
