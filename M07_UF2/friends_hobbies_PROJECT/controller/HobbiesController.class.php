<?php 

require_once "view/HobbiesView.class.php";
require_once "model/persist/HobbiesDAO.class.php";
require_once "model/Hobbie.class.php";

class HobbiesController {


    private $view;
    private $model;

    public function __construct() {

        $this->view=new HobbiesView();
        $this->model=new HobbiesDAO();

    }

    public function processRequest() {

        
        $request=NULL;
        //$_SESSION['info']=array(); //per donar sortida a tots els missatges generals d'informació
        //$_SESSION['error']=array(); ////per donar sortida a tots els missatges d'error

        
        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions,
       
        $request=isset($_POST["action"])?$_POST["action"]:NULL;
        if(isset($_POST["action"])){
            $request=$_POST["action"];
        }else if(isset($_GET["option"])){
            $request=$_GET["option"];
        }

        switch ($request) {
            case "list_all_hobbies":
                $this->listAll();
                break;

            case "form_add_hobbie":
                $this->formAdd();
                break;

            case "Add hobbie":
                $this->add();
                break;
            
            case "edit_hobbie":
                $this->edit_hobbie($id);
                break;
            
            case "Actualitzar":
                $this->update();
                break;
            
            case "delete_hobbie":
                $this->delete_hobbie($id);
                break;


            default: 
            $this->view->display();

        }

    }


    /**
     * Recull tots els hobbies i els envia a la vista
     * @param void 
     * @return void
     */

    public function listAll() {
        $hobbies=array();
        $hobbies=$this->model->listAll();
        
        $this->view->display("view/form/HobbieList.php", $hobbies);
    }

    
   /**
     * Redirigeixo a la vista, al formulari per afegir un hobbie
     * @param void 
     * @return void
     */
    
    public function formAdd() {

        $this->view->display("view/form/HobbieForm.php");

    }

     /**
     * Recull el id i el nom que prové el formulari per afegir un hobbie ( HobbieForm.php )
     * i envia'l al DAO per afegir un hobbie
     * Si es fa correctament, redirigeixo a la vista, a la llista de hobbies
     * @param void 
     * @return void
     */  

    public function add(): void {

        $id=$_POST['id'];
        $name=$_POST['name'];

        $hobby=new Hobbie($id, $name);

        $result=$this->model->add($hobby);

        if ($result==TRUE) {

            $_SESSION['message']=CategoryMessage::INF_FORM['insert'];
            $hobbies=array();
            $hobbies=$this->model->listAll();
            $this->view->display("view/form/HobbieList.php", $hobbies);


        }
        else {
            $_SESSION['message']=CategoryMessage::ERR_DAO['insert'];
            $hobbies=array();
            $hobbies=$this->model->listAll();
            $this->view->display("view/form/HobbieList.php", $hobbies);
        }



    }


     /**
     * Recullo id del amic que prové el formulari que es troba al llistar hobbies ( HobbieList.php )
     * El busca pel mètode del model SearchById 
     * i l'envio a la vista del form per editar el hobbie ( HobbieEditForm.php )
     * @return void
     */

    public function edit_hobbie($id) : void {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hobbie = $this->model->searchById($id);



            $this->view->display("view/form/HobbieEditForm.php", $hobbie);
        }

    }


    
    /**
     * Recullo id del hobbie que prové el formulari que es troba d'edició de hobbies ( HobbieEditForm.php )
     * i envio'l al DAO per editar el hobbie
     * Si es fa correctament, redirigeixo a la vista, a la llista de hobbies
     * @param void 
     * @return void
     */

    public function update() : void {

        $id=$_POST['id'];
        $name=$_POST['name'];

        $update = $this->model->modify($id, $name);

        //Si s'ha actualitzat correctament, mostram els amics
        if($update){

            $_SESSION['message']=CategoryMessage::INF_FORM['update'];	
            $friends = $this->model->listAll();
            $this->view->display("view/form/HobbieList.php", $friends);


        }

        else{

            $_SESSION['message']=CategoryMessage::ERR_DAO['update'];
            $friends = $this->model->listAll();
            $this->view->display("view/form/HobbieList.php", $friends);
        }


    }


    /**
     * Recullo id del hobbie que prové el formulari que es troba al llistar hobbies ( HobbieList.php )
     * i envio'l al DAO per esborrar el hobbie
     * Si es fa correctament, redirigeixo a la vista, a la llista de hobbies
     * @param void 
     * @return void
     */

    public function delete_hobbie($id) : void{

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $this->model->delete($id);

            if($delete){

                $_SESSION['message']=CategoryMessage::INF_FORM['delete'];
                $hobbies = $this->model->listAll();
                $this->view->display("view/form/HobbieList.php", $hobbies);

                }
                else {
                    $_SESSION['message']=CategoryMessage::ERR_DAO['delete'];
                    $hobbies = $this->model->listAll();
                    $this->view->display("view/form/HobbieList.php", $hobbies);
                }
        }

    }

}

?>