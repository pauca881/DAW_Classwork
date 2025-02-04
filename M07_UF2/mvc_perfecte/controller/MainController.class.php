<?php

/**
 * Controlador Principal 
 * Este archivo controla las solicitudes de los usuarios enviadas a la sección principal del sitio web.
 * 
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López 
 */

require_once "controller/OwnerController.class.php";
require_once "controller/PetController.class.php";
require_once "controller/HistoryController.class.php";

/**
 * Clase que controla las solicitudes de los usuarios enviadas a la sección principal del sitio web.
 */
class MainController
{
	/**
	 * Este método es llamado por index.php y es el primer método llamado en la aplicación.
	 * Muestra el Menú Principal y llama al método processRequest() de un controlador dependiendo de la variable $_GET (parámetro de menú URL).
	 */
	
	public function processRequest()
	{
		// Mostrar siempre el Menú Principal:
		include("view/menu/MainMenu.html");

		// Establecer $request dependiendo de la variable $_GET (parámetro de menú URL):

		if (isset($_GET["menu"])) $request = $_GET["menu"];
		else $request = NULL;

		// Procesar la $request llamando al método processRequest() de un controlador:

		switch ($request) {
			case "owner": // URL: [...]/index.php?menu=owner
				$ownerController = new OwnerController();
				$ownerController->processRequest();
				break;

			case "pet": // URL: [...]/index.php?menu=pet
				$petController = new PetController();
				$petController->processRequest();
				break;

			case "history":
				$historyController = new HistoryController();
				$historyController->processRequest();
				break;
		}
	}
}
