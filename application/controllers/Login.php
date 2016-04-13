<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Login extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Display normal login page
     */
    function index()
    {
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    /**
     * Process user login
     */
    function login()
    {   
        if (($_POST['player'] != "") && ($_POST['password'])) {
            $result = $this->players->checkPlayerExists($_POST['player'], $_POST['password']);
            $player = $_POST['player'];
            if($result == 1){
                $this->session->set_userdata('playername', $_POST['player']);
                redirect("/player/$player");
            } else {
                redirect("/login");
            }
        }
    }

    function getPlayers(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        
        $query = $this->db->get();
        return $query;
    }

    /**
     * Register a new user
     */
    function register()
    {
        $this->load->spark('restclient/2.1.0');
        $this->load->library('rest');

        $registerError = array();
        $registerTeam = $_POST['team'];
        $registerUsername = $_POST['username'];
        $registerPassword = $_POST['password'];

        echo $registerTeam . " :: " . $registerUsername . " :: " . $registerPassword;

        if (empty($registerTeam)) {
            $registerError[] = "You must enter a team.";
        }
        if (empty($registerUsername)) {
            $registerError[] = "You must enter a username.";
        }
        if (empty($registerPassword)) {
            $registerError[] = "You must enter a password.";
        }

        var_dump($this->game->registerUser($registerTeam, $registerUsername, $registerPassword));

        if (empty($registerError) /*&& $registerResult == 1*/) {
            $this->data['registerMessage'] = "You have successfully registered.";
        } else {
            $this->data['registerMessage'] = "Please fix the below errors to continue.";
        }

        $this->data['registerError'] = implode(" ", $registerError);
        $this->data['pagebody'] = "loginresult";

        $this->data['pagebody'] = "loginresult";
        $this->render();
    }

    /**
     * Process user logout
     */
    function logout()
    {
        $this->session->sess_destroy();
        redirect("/");
    }

}

/* End of file Login.php */
