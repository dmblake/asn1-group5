<?php
class LoginModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function login($person)
    {
        $this->db->select('players.Player');
        $this->db->from('players');
        $this->db->where('players.Player', $person);
        $query = $this->db->get();
        return $query;
    }
}