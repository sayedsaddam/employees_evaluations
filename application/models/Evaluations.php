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
    // CHW Evaluations.
    // Insert CHW evaluation into the database.
    public function add_chw_evaluation($data){
    	$this->db->insert('chw_evaluations', $data);
    	if($this->db->affected_rows() > 0){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    // Count all results to create pagination.
    public function count_chws(){
        return $this->db->from('chw_evaluations')->count_all_results();
    }
    // Get CHW evaluations from the database.
    public function get_chw_evaluations($limit, $offset){
    	$this->db->select('*');
        $this->db->from('chw_evaluations');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    // Search in CHW evaluations.
    public function search_chws($cnic = ''){
        $this->db->select('*');
        $this->db->from('chw_evaluations');
        $this->db->where('emp_cnic', $cnic);
        return $this->db->get()->row();
    }
    // Get CHW's for edit.
    public function edit_chws($chw_id){
        $this->db->select('*');
        $this->db->from('chw_evaluations');
        $this->db->where('chw_id', $chw_id);
        return $this->db->get()->row();
    }
    // Update CHW's.
    public function update_chws($chw_id = '', $data = ''){
        $this->db->where('chw_id', $chw_id);
        $this->db->update('chw_evaluations', $data);
        return true;
    }
    // Export the saved data to excel sheet.
    public function get_for_excel(){
        $this->db->select('*');
        $this->db->from('chw_evaluations');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ----------------------------------------------------------------------------------------------//
    // AS evaluations.
    // Export to excel the AS evaluations.
    public function get_as_for_excel(){
        $this->db->select('*');
        $this->db->from('as_evaluations');
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
    // Count AS evaluations in the database so to create pagination.
    public function count_as(){
        return $this->db->from('as_evaluations')->count_all_results();
    }
    // Get AS evaluations from the database.
    public function get_as_evaluations($limit, $offset){
        $this->db->select('*');
        $this->db->from('as_evaluations');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    // Search AS evaluations.
    public function search_as($cnic = ''){
        $this->db->select('*');
        $this->db->from('as_evaluations');
        $this->db->where('emp_cnic', $cnic);
        return $this->db->get()->row();
    }
    // Get AS for Edit.
    public function edit_as($as_id){
        $this->db->select('*');
        $this->db->from('as_evaluations');
        $this->db->where('as_id', $as_id);
        return $this->db->get()->row();
    }
    // Update AS evaluations.
    public function update_as($as_id = '', $data = ''){
        $this->db->where('as_id', $as_id);
        $this->db->update('as_evaluations', $data);
        return true;
    }
    // -------------------------------------------------------------------------------------------- //
    // UCO Evaluations.
    // Insert USO evaluation into the database.
    public function add_uco_evaluation($data){
        $this->db->insert('uco_evaluations', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    // Count UCO's data in the database.
    public function count_ucos(){
        return $this->db->from('uco_evaluations')->count_all_results();;
    }
    // Get all UCO evaluations from database.
    public function get_uco_evaluations($limit, $offset){
        $this->db->select('*');
        $this->db->from('uco_evaluations');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    // Search for specific data in UCO evaluations.
    public function search_ucos($cnic = ''){
        $this->db->select('*');
        $this->db->from('uco_evaluations');
        $this->db->where('emp_cnic', $cnic);
        return $this->db->get()->row();
    }
    // Get UCO for edit.
    public function edit_uco($uco_id){
        $this->db->select('*');
        $this->db->from('uco_evaluations');
        $this->db->where('uco_id', $uco_id);
        return $this->db->get()->row();
    }
    // Update UCO evaluations.
    public function update_uco($uco_id = '', $data = ''){
        $this->db->where('uco_id', $uco_id);
        $this->db->update('uco_evaluations', $data);
        return true;
    }
    // Get UCO for excel.
    public function get_uco_for_excel(){
        $this->db->select('*');
        $this->db->from('uco_evaluations');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ------------------------------------------------------------------------------------------//
    // DHCSO Evaluations.
    // Add DHCSO data to the database.
    public function add_dhcso_eval($data){
        $this->db->insert('dhcso_evaluations', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    // Count no. of DHCSO's.
    public function count_dhcsos(){
        return $this->db->from('dhcso_evaluations')->count_all_results();
    }
    // Get all dhcso evaluations.
    public function get_dhcso_evaluations($limit, $offset){
        $this->db->select('*');
        $this->db->from('dhcso_evaluations');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    // Search in DHCSO evaluations.
    public function search_dhcsos($cnic = ''){
        $this->db->select('*');
        $this->db->from('dhcso_evaluations');
        $this->db->where('emp_cnic', $cnic);
        return $this->db->get()->row();
    }
    // Get DHCSO for edit.
    public function edit_dhcso($dhcso_id){
        $this->db->select('*');
        $this->db->from('dhcso_evaluations');
        $this->db->where('dhcso_id', $dhcso_id);
        return $this->db->get()->row();
    }
    // Update DHCSO evaluation.
    public function update_dhcso($dhcso_id = '', $data = ''){
        $this->db->where('dhcso_id', $dhcso_id);
        $this->db->update('dhcso_evaluations', $data);
        return true;
    }
    // Export to excel.
    public function get_dhcso_for_excel(){
        $this->db->select('*');
        $this->db->from('dhcso_evaluations');
        $query = $this->db->get();
        return $query->result_array();
    }
}


?>