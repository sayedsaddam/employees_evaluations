<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Chws_evaluations.php
 * Filepath: controllers / Chws_evaluations.php
 * Author: Saddam
 */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Chws_evaluations extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluations');
    }
    // The index method will load the CHW Evaluation form.
    public function index(){
    	$data['title'] = "CHW's Evaluation | Emp Evaluations";
    	$data['content'] = 'chw_evaluation';
    	$this->load->view('components/template', $data);
    }
    // This method will load the AS Evaluation form.
    public function as_evaluation(){
    	$data['title'] = "AS Evaluation | Emp Evaluations";
    	$data['content'] = 'as_evaluation';
    	$this->load->view('components/template', $data);
    }
    // Save CHW evaluation to the database.
    public function save_chw_eval(){
    	$data = array(
    		'emp_cnic' => $this->input->post('emp_cnic'),
    		'emp_id' => $this->input->post('emp_id'),
    		'emp_name' => $this->input->post('emp_name'),
    		'emp_fname' => $this->input->post('emp_father'),
    		'job_title' => $this->input->post('job_title'),
            'province' => $this->input->post('province'),
            'area' => $this->input->post('area'),
    		'emp_district' => $this->input->post('district'),
    		'emp_town' => $this->input->post('town'),
    		'assigned_ucs' => $this->input->post('assigned_ucs'),
    		'doj' => $this->input->post('doj'),
    		'period_covered' => $this->input->post('period'),
    		'sup_name_desig' => $this->input->post('name_desig'),
            'desig_first' => $this->input->post('desig_first'),
            'sec_supname_desig' => $this->input->post('sec_desig'),
            'desig_sec' => $this->input->post('desig_sec'),
    		'rep_purpose' => $this->input->post('purpose'),
    		'b1_record' => $this->input->post('b1_record'),
    		'b2_record' => $this->input->post('b2_record'),
    		'b3_record' => $this->input->post('b3_record'),
    		'b4_record' => $this->input->post('b4_record'),
    		'b5_record' => $this->input->post('b5_record'),
    		'b6_record' => $this->input->post('b6_record'),
    		'c1_record' => $this->input->post('c1_record'),
    		'c2_record' => $this->input->post('c2_record'),
    		'c3_record' => $this->input->post('c3_record'),
    		'c4_record' => $this->input->post('c4_record'),
    		'c5_record' => $this->input->post('c5_record'),
    		'd1_record' => $this->input->post('d1_record'),
    		'd2_record' => $this->input->post('d2_record'),
    		'disc_issue_date' => $this->input->post('date_of_issue'),
    		'disc_warning' => $this->input->post('warning'),
    		'disc_reason' => $this->input->post('reason'),
            'disc_date_1' => $this->input->post('date_of_issue1'),
            'disc_warning_1' => $this->input->post('warning1'),
            'disc_reason_1' => $this->input->post('reason1'),
            'disc_date_2' => $this->input->post('date_of_issue2'),
            'disc_warning_2' => $this->input->post('warning2'),
    		'cont_learning' => $this->input->post('learing'),
    		'career_development' => $this->input->post('career'),
    		'staff_comments' => $this->input->post('staff_comments'),
    		'staff_name' => $this->input->post('staff_name'),
    		'staff_sign' => $this->input->post('staff_sign'),
    		'staff_date' => $this->input->post('staff_date'),
    		'first_sec_rep_officer' => $this->input->post('town_comments'),
    		'first_sec_remarks' => $this->input->post('remarks'),
    		'sec_off_name' => $this->input->post('second_officer'),
    		'sec_off_title' => $this->input->post('second_title'),
    		'sec_off_sign' => $this->input->post('second_sign'),
    		'sec_off_date' => $this->input->post('second_date'),
    		'ctc_coord_com' => $this->input->post('ctc_coord'),
    		'ctc_coord_remarks' => $this->input->post('ctc_coord_remarks'),
    		'ctc_coord_name' => $this->input->post('ctc_name'),
    		'ctc_coord_title' => $this->input->post('ctc_title'),
    		'ctc_coord_sign' => $this->input->post('ctc_sign'),
    		'ctc_coord_date' => $this->input->post('ctc_date'),
    		'cat_a' => $this->input->post('cat_a'),
    		'filler_name' => $this->input->post('filler_name'),
    		'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
    	);
    	$this->Evaluations->add_chw_evaluation($data);
    	$this->session->set_flashdata('success', '<strong>Success !</strong> Evaluation has been saved successfully !');
    	redirect('Chws_evaluations');
    }
    // Display data from database.
    public function recent_chws($offset = NULL){
        $limit = 10;
        if(!empty($offset)){
            $this->uri->segment(3);
        }
        $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url('Chws_evaluations/recent_chws');
        $config['total_rows'] = $this->Evaluations->count_chws();
        $config['per_page'] = $limit;
        $config['num_links'] = 3;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = 'next &raquo;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "prev &laquo;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='javascript:void(0);'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $this->pagination->initialize($config);
        $data['title'] = "Recent Evaulations | Emp Evaluations";
        $data['content'] = 'recent_chws';
    	$data['recent_chws'] = $this->Evaluations->get_chw_evaluations($limit, $offset);
        $this->load->view('components/template', $data);
    }
    // Search CHW's
    public function search_chws(){
        $cnic = $this->input->get('search_record');
        $data['search_results'] = $this->Evaluations->search_chws($cnic);
        $data['title'] = 'Search Results | Emp Evaluations';
        $data['content'] = 'recent_chws';
        $this->load->view('components/template', $data);
    }
    // Search AS.
    public function search_as(){
        $cnic = $this->input->get('search_record');
        $data['search_results'] = $this->Evaluations->search_as($cnic);
        $data['title'] = 'Search Results | Emp Evaluations';
        $data['content'] = 'recent_as';
        $this->load->view('components/template', $data);
    }
    // Edit CHW's.
    public function edit_chws($chw_id){
        $data['title'] = 'Update | Emp Evaluations';
        $data['content'] = 'chw_evaluation';
        $data['edit'] = $this->Evaluations->edit_chws($chw_id); // Model call.
        $this->load->view('components/template', $data);
    }
    // Update the form data.
    public function update_chws(){
      $chw_id = $this->input->post('chw_id');
      $data = array(
            'emp_cnic' => $this->input->post('emp_cnic'),
            'emp_id' => $this->input->post('emp_id'),
            'emp_name' => $this->input->post('emp_name'),
            'emp_fname' => $this->input->post('emp_father'),
            'job_title' => $this->input->post('job_title'),
            'province' => $this->input->post('province'),
            'area' => $this->input->post('area'),
            'emp_district' => $this->input->post('district'),
            'emp_town' => $this->input->post('town'),
            'assigned_ucs' => $this->input->post('assigned_ucs'),
            'doj' => $this->input->post('doj'),
            'period_covered' => $this->input->post('period'),
            'sup_name_desig' => $this->input->post('name_desig'),
            'desig_first' => $this->input->post('desig_first'),
            'sec_supname_desig' => $this->input->post('sec_desig'),
            'desig_sec' => $this->input->post('sec_desig'),
            'rep_purpose' => $this->input->post('purpose'),
            'b1_record' => $this->input->post('b1_record'),
            'b2_record' => $this->input->post('b2_record'),
            'b3_record' => $this->input->post('b3_record'),
            'b4_record' => $this->input->post('b4_record'),
            'b5_record' => $this->input->post('b5_record'),
            'b6_record' => $this->input->post('b6_record'),
            'c1_record' => $this->input->post('c1_record'),
            'c2_record' => $this->input->post('c2_record'),
            'c3_record' => $this->input->post('c3_record'),
            'c4_record' => $this->input->post('c4_record'),
            'c5_record' => $this->input->post('c5_record'),
            'd1_record' => $this->input->post('d1_record'),
            'd2_record' => $this->input->post('d2_record'),
            'disc_issue_date' => $this->input->post('date_of_issue'),
            'disc_warning' => $this->input->post('warning'),
            'disc_reason' => $this->input->post('reason'),
            'disc_date_1' => $this->input->post('date_of_issue1'),
            'disc_warning_1' => $this->input->post('warning1'),
            'disc_reason_1' => $this->input->post('reason1'),
            'disc_date_2' => $this->input->post('date_of_issue2'),
            'disc_warning_2' => $this->input->post('warning2'),
            'disc_reason_2' => $this->input->post('reason2'), 
            'cont_learning' => $this->input->post('learing'),
            'career_development' => $this->input->post('career'),
            'staff_comments' => $this->input->post('staff_comments'),
            'staff_name' => $this->input->post('staff_name'),
            'staff_sign' => $this->input->post('staff_sign'),
            'staff_date' => $this->input->post('staff_date'),
            'first_sec_rep_officer' => $this->input->post('town_comments'),
            'first_sec_remarks' => $this->input->post('remarks'),
            'sec_off_name' => $this->input->post('second_officer'),
            'sec_off_title' => $this->input->post('second_title'),
            'sec_off_sign' => $this->input->post('second_sign'),
            'sec_off_date' => $this->input->post('second_date'),
            'ctc_coord_com' => $this->input->post('ctc_coord'),
            'ctc_coord_remarks' => $this->input->post('ctc_coord_remarks'),
            'ctc_coord_name' => $this->input->post('ctc_name'),
            'ctc_coord_title' => $this->input->post('ctc_title'),
            'ctc_coord_sign' => $this->input->post('ctc_sign'),
            'ctc_coord_date' => $this->input->post('ctc_date'),
            'cat_a' => $this->input->post('cat_a'),
            'filler_name' => $this->input->post('filler_name'),
            'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
        );
      $this->Evaluations->update_chws($chw_id, $data);
      $this->session->set_flashdata('success', '<strong>Success !</strong> The update operation was successful !');
      redirect('Chws_evaluations/recent_chws');
    }
    // Save AS evaluation into the database.
    public function save_as_eval(){
        $data = array(
            'emp_cnic' => $this->input->post('emp_cnic'),
            'emp_id' => $this->input->post('emp_id'),
            'emp_name' => $this->input->post('emp_name'),
            'emp_fname' => $this->input->post('emp_father'),
            'job_title' => $this->input->post('job_title'),
            'province' => $this->input->post('province'),
            'area' => $this->input->post('area'),
            'emp_district' => $this->input->post('district'),
            'emp_town' => $this->input->post('town'),
            'assigned_ucs' => $this->input->post('assigned_ucs'),
            'doj' => $this->input->post('doj'),
            'period_covered' => $this->input->post('period'),
            'sup_name_desig' => $this->input->post('name_desig'),
            'sec_supname_desig' => $this->input->post('sec_desig'),
            'sec_supervisor_name' => $this->input->post('desig_first'),
            'sec_supervisor_desig' => $this->input->post('desig_sec'),
            'rep_purpose' => $this->input->post('purpose'),
            'b1_record' => $this->input->post('b1_record'),
            'b2_record' => $this->input->post('b2_record'),
            'b3_record' => $this->input->post('b3_record'),
            'b4_record' => $this->input->post('b4_record'),
            'b5_record' => $this->input->post('b5_record'),
            'b6_record' => $this->input->post('b6_record'),
            'c1_record' => $this->input->post('c1_record'),
            'c2_record' => $this->input->post('c2_record'),
            'c3_record' => $this->input->post('c3_record'),
            'c4_record' => $this->input->post('c4_record'),
            'c5_record' => $this->input->post('c5_record'),
            'd1_record' => $this->input->post('d1_record'),
            'd2_record' => $this->input->post('d2_record'),
            'disc_issue_date' => $this->input->post('date_of_issue'),
            'disc_warning' => $this->input->post('warning'),
            'disc_reason' => $this->input->post('reason'),
            'disc_date_1' => $this->input->post('date_of_issue1'),
            'disc_warning_1' => $this->input->post('warning1'),
            'disc_reason_1' => $this->input->post('reason1'),
            'disc_date_2' => $this->input->post('date_of_issue2'),
            'disc_warning_2' => $this->input->post('warning2'),
            'disc_reason_2' => $this->input->post('reason2'), 
            'cont_learning' => $this->input->post('learing'),
            'career_development' => $this->input->post('career'),
            'staff_comments' => $this->input->post('staff_comments'),
            'staff_name' => $this->input->post('staff_name'),
            'staff_sign' => $this->input->post('staff_sign'),
            'staff_date' => $this->input->post('staff_date'),
            'first_sec_rep_officer' => $this->input->post('town_comments'),
            'first_sec_remarks' => $this->input->post('remarks'),
            'sec_off_name' => $this->input->post('second_officer'),
            'sec_off_title' => $this->input->post('second_title'),
            'sec_off_sign' => $this->input->post('second_sign'),
            'sec_off_date' => $this->input->post('second_date'),
            'ctc_coord_com' => $this->input->post('ctc_coord'),
            'ctc_coord_remarks' => $this->input->post('ctc_coord_remarks'),
            'ctc_coord_name' => $this->input->post('ctc_name'),
            'ctc_coord_title' => $this->input->post('ctc_title'),
            'ctc_coord_sign' => $this->input->post('ctc_sign'),
            'ctc_coord_date' => $this->input->post('ctc_date'),
            'cat_a' => $this->input->post('cat_a'),
            'filler_name' => $this->input->post('filler_name'),
            'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
        );
        $this->Evaluations->add_as_evaluation($data);
        $this->session->set_flashdata('success', '<strong>Success ! </strong> Evaluation has been saved successfully !');
        redirect('Chws_evaluations');
    }
    // Edit AS.
    public function edit_as($as_id){
        $data['title'] = 'Update | Emp Evaluations';
        $data['content'] = 'as_evaluation';
        $data['edit'] = $this->Evaluations->edit_as($as_id); // Model call.
        $this->load->view('components/template', $data);
    }
    // Update the AS evaluation.
    public function update_as_eval(){
      $as_id = $this->input->post('as_id');
      $data = array(
            'emp_cnic' => $this->input->post('emp_cnic'),
            'emp_id' => $this->input->post('emp_id'),
            'emp_name' => $this->input->post('emp_name'),
            'emp_fname' => $this->input->post('emp_father'),
            'job_title' => $this->input->post('job_title'),
            'province' => $this->input->post('province'),
            'area' => $this->input->post('area'),
            'emp_district' => $this->input->post('district'),
            'emp_town' => $this->input->post('town'),
            'assigned_ucs' => $this->input->post('assigned_ucs'),
            'doj' => $this->input->post('doj'),
            'period_covered' => $this->input->post('period'),
            'sup_name_desig' => $this->input->post('name_desig'),
            'sec_supname_desig' => $this->input->post('sec_desig'),
            'sec_supervisor_name' => $this->input->post('desig_first'),
            'sec_supervisor_desig' => $this->input->post('desig_sec'),
            'rep_purpose' => $this->input->post('purpose'),
            'b1_record' => $this->input->post('b1_record'),
            'b2_record' => $this->input->post('b2_record'),
            'b3_record' => $this->input->post('b3_record'),
            'b4_record' => $this->input->post('b4_record'),
            'b5_record' => $this->input->post('b5_record'),
            'b6_record' => $this->input->post('b6_record'),
            'c1_record' => $this->input->post('c1_record'),
            'c2_record' => $this->input->post('c2_record'),
            'c3_record' => $this->input->post('c3_record'),
            'c4_record' => $this->input->post('c4_record'),
            'c5_record' => $this->input->post('c5_record'),
            'd1_record' => $this->input->post('d1_record'),
            'd2_record' => $this->input->post('d2_record'),
            'disc_issue_date' => $this->input->post('date_of_issue'),
            'disc_warning' => $this->input->post('warning'),
            'disc_reason' => $this->input->post('reason'),
            'disc_date_1' => $this->input->post('date_of_issue1'),
            'disc_warning_1' => $this->input->post('warning1'),
            'disc_reason_1' => $this->input->post('reason1'),
            'disc_date_2' => $this->input->post('date_of_issue2'),
            'disc_warning_2' => $this->input->post('warning2'),
            'disc_reason_2' => $this->input->post('reason2'), 
            'cont_learning' => $this->input->post('learing'),
            'career_development' => $this->input->post('career'),
            'staff_comments' => $this->input->post('staff_comments'),
            'staff_name' => $this->input->post('staff_name'),
            'staff_sign' => $this->input->post('staff_sign'),
            'staff_date' => $this->input->post('staff_date'),
            'first_sec_rep_officer' => $this->input->post('town_comments'),
            'first_sec_remarks' => $this->input->post('remarks'),
            'sec_off_name' => $this->input->post('second_officer'),
            'sec_off_title' => $this->input->post('second_title'),
            'sec_off_sign' => $this->input->post('second_sign'),
            'sec_off_date' => $this->input->post('second_date'),
            'ctc_coord_com' => $this->input->post('ctc_coord'),
            'ctc_coord_remarks' => $this->input->post('ctc_coord_remarks'),
            'ctc_coord_name' => $this->input->post('ctc_name'),
            'ctc_coord_title' => $this->input->post('ctc_title'),
            'ctc_coord_sign' => $this->input->post('ctc_sign'),
            'ctc_coord_date' => $this->input->post('ctc_date'),
            'cat_a' => $this->input->post('cat_a'),
            'filler_name' => $this->input->post('filler_name'),
            'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
              );
      $this->Evaluations->update_as($as_id, $data);
      $this->session->set_flashdata('success', '<strong>Success ! </strong> Evaluation has been updated successfully !');
      redirect('Chws_evaluations/recent_as');
    }
    // Display data from database for AS evaluations.
    public function recent_as($offset = NULL){
      $limit = 10;
      if(!empty($offset)){
        $this->uri->segment(3);
      }
      $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url('Chws_evaluations/recent_chws');
        $config['total_rows'] = $this->Evaluations->count_as();
        $config['per_page'] = $limit;
        $config['num_links'] = 10;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = 'next &raquo;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "prev &laquo;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='javascript:void(0);'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $this->pagination->initialize($config);
        $data['title'] = 'Recent Evaluations | Emp Evaluations';
        $data['content'] = 'recent_as';
        $data['recent_as'] = $this->Evaluations->get_as_evaluations($limit, $offset);
        $this->load->view('components/template', $data);
    }
    // Export the retrieved data to Excel sheet.
    public function export_excel(){
        $fileName = 'CHW Evaluations Report.xlsx';  
        $evalData = $this->Evaluations->get_for_excel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Employee ID (HRIS)');
        $sheet->setCellValue('B1', 'District');
        $sheet->setCellValue('C1', 'Town');
        $sheet->setCellValue('D1', 'Name of UC Assigned');
        $sheet->setCellValue('E1', 'CNIC');
        $sheet->setCellValue('F1', 'DOJ');      
        $sheet->setCellValue('G1', 'Promotion History');      
        $sheet->setCellValue('H1', 'Appraisal Conducted by (name, designation)');      
        $sheet->setCellValue('I1', 'Date of Appraisal');      
        $sheet->setCellValue('J1', 'Additional Comments');      
        $sheet->setCellValue('K1', 'Record and Update HH registrations');      
        $sheet->setCellValue('L1', 'Community Mobilization/Outreach'); 
        $sheet->setCellValue('M1', 'Ensuring Vaccination of children');
        $sheet->setCellValue('N1', 'Preparation of plans/Reporting');
        $sheet->setCellValue('O1', 'Vaccination cold chain management and capacity building');      
        $sheet->setCellValue('P1', 'Improved coordination and referals');      
        $sheet->setCellValue('Q1', 'Communication skills (e.g has good convincing skills, active listening skills etc)');      
        $sheet->setCellValue('R1', 'Interpersonal skills (eg builds relationship with community, manage multiple stakeholder ie UCCSO, AS, UCMO, UCPO etc)');      
        $sheet->setCellValue('S1', 'Resilience  ( eg motivated,  can keep going despite refusals)');      
        $sheet->setCellValue('T1', 'Detail Orientation ( enters accurate data, is able to identify discrepancies in data, enters complete data etc)');  
        $sheet->setCellValue('U1', 'Teamwork ( can work in collaboration with other team members to achieve goals, assists team members)');  
        $sheet->setCellValue('V1', 'Attendance and Late Coming');  
        $sheet->setCellValue('W1', 'Previous Adminstrative History in past year(Final Warning- Poor Counseling/Warning- Need improvement No Admin History - Satisfactory)');
        $rows = 2;
        foreach ($evalData as $val){
            $sheet->setCellValue('A' . $rows, $val['emp_id']);
            $sheet->setCellValue('B' . $rows, $val['emp_district']);
            $sheet->setCellValue('C' . $rows, $val['emp_town']);
            $sheet->setCellValue('D' . $rows, $val['assigned_ucs']);
            $sheet->setCellValue('E' . $rows, $val['emp_cnic']);
            $sheet->setCellValue('F' . $rows, $val['doj']);
            $sheet->setCellValue('G' . $rows, '----');
            $sheet->setCellValue('H' . $rows, $val['sup_name_desig'].', '.$val['desig_first']);
            $sheet->setCellValue('I' . $rows, $val['created_at']);
            $sheet->setCellValue('J' . $rows, '    ');
            $sheet->setCellValue('K' . $rows, $val['b1_record']);
            $sheet->setCellValue('L' . $rows, $val['b2_record']);
            $sheet->setCellValue('M' . $rows, $val['b3_record']);
            $sheet->setCellValue('N' . $rows, $val['b4_record']);
            $sheet->setCellValue('O' . $rows, $val['b5_record']);
            $sheet->setCellValue('P' . $rows, $val['b6_record']);
            $sheet->setCellValue('Q' . $rows, $val['c1_record']);
            $sheet->setCellValue('R' . $rows, $val['c2_record']);
            $sheet->setCellValue('S' . $rows, $val['c3_record']);
            $sheet->setCellValue('T' . $rows, $val['c4_record']);
            $sheet->setCellValue('U' . $rows, $val['c5_record']);
            $sheet->setCellValue('V' . $rows, $val['d1_record']);
            $sheet->setCellValue('W' . $rows, $val['d2_record']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("excel_files/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/excel_files/".$fileName);
    }
    // Export AS data to excel.
    public function export_excel_as(){
        $fileName = 'AS Evaluations Report.xlsx';  
        $evalData = $this->Evaluations->get_as_for_excel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Employee ID (HRIS)');
        $sheet->setCellValue('B1', 'District');
        $sheet->setCellValue('C1', 'Town');
        $sheet->setCellValue('D1', 'Name of UC Assigned');
        $sheet->setCellValue('E1', 'CNIC');
        $sheet->setCellValue('F1', 'DOJ');      
        $sheet->setCellValue('G1', 'Promotion History');      
        $sheet->setCellValue('H1', 'Appraisal Conducted by (name, designation)');      
        $sheet->setCellValue('I1', 'Date of Appraisal');      
        $sheet->setCellValue('J1', 'Additional Comments');      
        $sheet->setCellValue('K1', 'Record and Update HH registrations');      
        $sheet->setCellValue('L1', 'Community Mobilization/Outreach'); 
        $sheet->setCellValue('M1', 'Ensuring Vaccination of children');
        $sheet->setCellValue('N1', 'Preparation of plans/Reporting');
        $sheet->setCellValue('O1', 'Vaccination cold chain management and capacity building');      
        $sheet->setCellValue('P1', 'Improved coordination and referals');      
        $sheet->setCellValue('Q1', 'Communication skills (e.g has good convincing skills, active listening skills etc)');      
        $sheet->setCellValue('R1', 'Interpersonal skills (eg builds relationship with community, manage multiple stakeholder ie UCCSO, AS, UCMO, UCPO etc)');      
        $sheet->setCellValue('S1', 'Resilience  ( eg motivated,  can keep going despite refusals)');      
        $sheet->setCellValue('T1', 'Detail Orientation ( enters accurate data, is able to identify discrepancies in data, enters complete data etc)');  
        $sheet->setCellValue('U1', 'Teamwork ( can work in collaboration with other team members to achieve goals, assists team members)');  
        $sheet->setCellValue('V1', 'Attendance and Late Coming');  
        $sheet->setCellValue('W1', 'Previous Adminstrative History in past year(Final Warning- Poor Counseling/Warning- Need improvement No Admin History - Satisfactory)');

        $rows = 2;
        foreach ($evalData as $val){
            $sheet->setCellValue('A' . $rows, $val['emp_id']);
            $sheet->setCellValue('B' . $rows, $val['emp_district']);
            $sheet->setCellValue('C' . $rows, $val['emp_town']);
            $sheet->setCellValue('D' . $rows, $val['assigned_ucs']);
            $sheet->setCellValue('E' . $rows, $val['emp_cnic']);
            $sheet->setCellValue('F' . $rows, $val['doj']);
            $sheet->setCellValue('G' . $rows, '---------');
            $sheet->setCellValue('H' . $rows, $val['sup_name_desig'].', '.$val['sec_supervisor_name']);
            $sheet->setCellValue('I' . $rows, $val['created_at']);
            $sheet->setCellValue('J' . $rows, '     ');
            $sheet->setCellValue('K' . $rows, $val['b1_record']);
            $sheet->setCellValue('L' . $rows, $val['b2_record']);
            $sheet->setCellValue('M' . $rows, $val['b3_record']);
            $sheet->setCellValue('N' . $rows, $val['b4_record']);
            $sheet->setCellValue('O' . $rows, $val['b5_record']);
            $sheet->setCellValue('P' . $rows, $val['b6_record']);
            $sheet->setCellValue('Q' . $rows, $val['c1_record']);
            $sheet->setCellValue('R' . $rows, $val['c2_record']);
            $sheet->setCellValue('S' . $rows, $val['c3_record']);
            $sheet->setCellValue('T' . $rows, $val['c4_record']);
            $sheet->setCellValue('U' . $rows, $val['c5_record']);
            $sheet->setCellValue('V' . $rows, $val['d1_record']);
            $sheet->setCellValue('W' . $rows, $val['d2_record']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("excel_files/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/excel_files/".$fileName);
    }
}

?>