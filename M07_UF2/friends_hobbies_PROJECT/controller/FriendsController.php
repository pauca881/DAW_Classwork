<?php


require_once "view/FriendsView.class.php";
require_once "model/persist/FriendsDAO.class.php";
require_once "model/Friend.class.php";
require_once "model/Friend_and_Hobbie.class.php";

require_once "util/CategoryMessage.class.php";
    

class FriendsController {


    private $view;
    private $model;

    //Això ho he d'afegir, per accedir al model de hobbies 
    //quan vulgui afegir el formulari d'assignació de friends i hobbies
    private $modelHobbies;


    public function __construct() {

        $this->view=new FriendsView();
        $this->model=new FriendsDAO();
        $this->modelHobbies=new HobbiesDAO();

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
            case "list_all_friends":
                $this->listAll();
                break;

            case "form_add_friend":
                $this->formAdd();
                break;

            case "Add friend": 
                $this->add();
                break;

            case "delete_friend":
                $this->delete_friend($id);
                break;

            case "edit_friend":
                $this->edit_friend($id);
                break;
            
            case "Actualitzar":
                $this->update();
                break;

            case "friends_hobbies":
                $this->friends_hobbies();
                break;

            case "form_assign":
                $this->display_form_assign();
                break;

            case "Assignar Hobbie":
                $this->assignHobby();
                break;

                default: 
                $this->view->display();

        }


    }


    
      /**
     * Recull tots els amics i els envia a la vista
     * @param void 
     * @return void
     */

    public function listAll()  {
        $friends = array();
    
        $friends = $this->model->listAll();
    
        // // Contamos la cantidad de amigos
        // $numero_friends = count($friends);
    
        // // Si hay amigos, los mostramos y almacenamos el número en la sesión
        // if (!empty($friends)) {
        //     $_SESSION['numero_friends'] = $numero_friends;
        // } else {

        //     $_SESSION['error'] = 'No friends found';
        // }
    
        $this->view->display("view/form/FriendsList.php", $friends);
    }
    

    /**
     * Redirigeixo a la vista, al formulari per afegir un amic
     * @param void 
     * @return void
     */
    
    public function formAdd() {

        $this->view->display("view/form/FriendForm.php");


        
    }

    
    /**
     * Recull el id i el nom que prové el formulari per afegir un amic ( FriendForm.php )
     * i envia'l al DAO per afegir un amic
     * Si es fa correctament, redirigeixo a la vista, a la llista d'amics
     * @param void 
     * @return void
     */

    public function add() {

        $id=$_POST['id'];
        $name=$_POST['name'];

        $friend=new Friend($id, $name);

        $result=$this->model->add($friend);

        if ($result==TRUE) {

            $_SESSION['message']=CategoryMessage::INF_FORM['insert'];
            $friends=array();
            $friends=$this->model->listAll();
            $this->view->display("view/form/FriendsList.php", $friends);

        }
        else {
            $_SESSION['message']=CategoryMessage::ERR_DAO['insert'];

            $this->view->display("view/form/FriendsList.php", $friend);

        }


    }

    /**
     * Recullo id del amic que prové el formulari que es troba al llistar amics ( FriendsList.php )
     * i envio'l al DAO per esborrar l'amic
     * Si es fa correctament, redirigeixo a la vista, a la llista d'amics
     * @param void 
     * @return void
     */

    public function delete_friend($id){

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $this->model->delete($id);

            if($delete){
                $_SESSION['message']=CategoryMessage::INF_FORM['delete'];
                $friends = $this->model->listAll();
                $this->view->display("view/form/FriendsList.php", $friends);
                }
            else {
                $_SESSION['message']=CategoryMessage::ERR_DAO['delete'];
                $friends = $this->model->listAll();
                $this->view->display("view/form/FriendsList.php", $friends);
            }
        }

    }

    /**
     * Recullo id del amic que prové el formulari que es troba al llistar amics ( FriendsList.php )
     * El busca pel mètode del model SearchById 
     * i l'envio a la vista del form per editar l'amic ( FriendEditForm.php )
     * @return void
     */

    public function edit_friend($id){

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $friend = $this->model->searchById($id);

            $this->view->display("view/form/FriendEditForm.php", $friend);
        }

    }

    
    /**
     * Recullo id del amic que prové el formulari que es troba d'edició amics ( FriendEditForm.php )
     * i envio'l al DAO per editar l'amic
     * Si es fa correctament, redirigeixo a la vista, a la llista d'amics
     * @param void 
     * @return void
     */

    public function update() {

        $id=$_POST['id'];
        $name=$_POST['name'];

        $update = $this->model->modify($id, $name);

        //Si s'ha actualitzat correctament, mostram els amics
        if($update){

            $_SESSION['message']=CategoryMessage::INF_FORM['update'];	
            $friends = $this->model->listAll();
            $this->view->display("view/form/FriendsList.php", $friends);


        }
        else {
            $_SESSION['message']=CategoryMessage::ERR_DAO['update'];
            $friends = $this->model->listAll();
            $this->view->display("view/form/FriendsList.php", $friends);
        }

    }


        /**
     * Recullo la taula de amics i hobbies assignats i la mostro a la vista
     * @param void 
     * @return void
     */

    public function friends_hobbies() {

        $friends_and_hobbies = array();

        $friends_and_hobbies = $this->model->listAllFriendsHobbies();
            

        $this->view->display("view/form/FriendHobbieList.php", $friends_and_hobbies);
    }



    public function assignHobby() {

        $friend_id=$_POST['friend_id'];
        $friend_name= $this->model->searchNameById($friend_id);
        $hobbies_id=$_POST['hobbie_id'];


        for ($i=0; $i < count($hobbies_id); $i++) {

            $hobbie_name=$this->modelHobbies->searchNameById($hobbies_id[$i]);


            $friend_and_hobby = new Friend_and_Hobbie($friend_id, $friend_name, $hobbies_id[$i], $hobbie_name);
            $result=$this->model->assignHobby($friend_and_hobby);

        }

            $friends_and_hobbies = $this->model->listAllFriendsHobbies();
            $this->view->display("view/form/FriendHobbieList.php", $friends_and_hobbies);


    }

    public function display_form_assign() {

        $friends_and_hobbies = array();

        // $friends_and_hobbies = $this->model->listFriendsAndHobbies_separated();

        $friends = array();
        $friends = $this->model->listAll();

        $hobbies = array();
        $hobbies = $this->modelHobbies->listAll();

        $data = array(
            'friends' => $friends,
            'hobbies' => $hobbies
        );

        $this->view->display("view/form/FriendHobbieForm.php", $data);


    }

}

?>
