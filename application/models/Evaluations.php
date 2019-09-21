<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Filename: Evaluations.php
 * Filepath: models / Evaluations.php
 * Author: Saddam
 */
class Evaluations extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }
    // Insert CHW evaluation into the database.
    public function add_chw_evaluation($data){
    	$this->db->insert('chw_evaluations', $data);
    	if($this->db->affected_rows() > 0){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    // Get CHW evaluations from the database.
    public function get_chw_evaluations(){
    	return $this->db->get('chw_evaluations')->result();
    }
    // Export the saved data to excel sheet.
    public function get_for_excel(){
        $this->db->select('*');
        $this->db->from('chw_evaluations');
        $query = $this->db->get();
        return $query->result_array();
    }
    // Insert AS evaluation into the database.
    public function add_as_evaluation($data){
        $this->db->insert('as_evaluations', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // Get AS evaluations from the database.
    public function get_as_evaluations(){
        return $this->db->get('as_evaluations')->result();
    }
}


?>