<?php defined('BASEPATH') OR exit('No direct script access allowed !');
/**
 * Filename: Uco_evaluations.php
 * Filepath: controllers / Uco_evaluations.php
 * Author: Saddam
 */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Uco_evaluations extends CI_Controller
{
    /**
     * This class is responsible for all the operations of UCO's i.e. Save to database, edit data, 
     * update and delete data if necessary. Export in excel format.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluations');
    }
    // This method will load the UCO Evaluation form.
    public function index(){
    	$data['title'] = "UCO's Evaluation | Emp Evaluations";
    	$data['content'] = 'uco_evaluation';
    	$this->load->view('components/template', $data);
    }
    // Save UCO evaluation.
    public function save_uco_eval(){
    	$data = array(
    		'emp_cnic' => $this->input->post('emp_cnic'),
    		'emp_id' => $this->input->post('emp_id'),
    		'emp_name' => $this->input->post('emp_name'),
    		'emp_fname' => $this->input->post('emp_father'),
    		'job_title' => $this->input->post('job_title'),
         'province' => $this->input->post('province'),
    		'emp_district' => $this->input->post('district'),
    		'emp_town' => $this->input->post('town'),
    		'assigned_ucs' => $this->input->post('assigned_ucs'),
    		'doj' => $this->input->post('doj'),
    		'period_covered' => $this->input->post('period'),
    		'sup_name_desig' => $this->input->post('name_desig'),
         'sec_supervisor_name' => $this->input->post('desig_first'),
         'sec_supname_desig' => $this->input->post('sec_desig'),
         'sec_supervisor_desig' => $this->input->post('desig_sec'),
    		'rep_purpose' => $this->input->post('purpose'),
    		'b1_record' => $this->input->post('b1_record'),
    		'b2_record' => $this->input->post('b2_record'),
    		'b3_record' => $this->input->post('b3_record'),
    		'b4_record' => $this->input->post('b4_record'),
    		'b5_record' => $this->input->post('b5_record'),
    		'b6_record' => $this->input->post('b6_record'),
    		'b7_record' => $this->input->post('b7_record'),
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
    	$this->Evaluations->add_uco_evaluation($data);
    	$this->session->set_flashdata('success', '<strong>Success !</strong> Evaluation has been saved successfully !');
    	redirect('Uco_evaluations');
    }
    // Display UCO's data.
    public function recent_ucos($offset = NULL){
    	$limit = 10;
    	if(!empty($offset)){
    		$this->uri->segment(3);
    	}
    	$this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url('Chws_evaluations/recent_chws');
        $config['total_rows'] = $this->Evaluations->count_ucos();
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
    	$data['recent_ucos'] = $this->Evaluations->get_uco_evaluations($limit, $offset);
    	$data['title'] = 'Recently Added UCOs| Emp Evaluations';
    	$data['content'] = 'recent_ucos';
    	$this->load->view('components/template', $data);
    }
    // Search in UCO's.
    public function search_ucos(){
    	$cnic = $this->input->get('search_record');
    	$data['title'] = 'Search Results | UCO Evaluations';
    	$data['content'] = 'recent_ucos';
    	$data['search_results'] = $this->Evaluations->search_ucos($cnic);
    	$this->load->view('components/template', $data);
    }
    // Edit UCO's evaluations.
    public function edit_uco($uco_id){
    	$data['title'] = 'Update | UCOs Evaluations';
    	$data['content'] = 'uco_evaluation';
    	$data['edit'] = $this->Evaluations->edit_uco($uco_id);
    	$this->load->view('components/template', $data);
    }
    // Update record in the database.
    public function update_uco_eval(){
    	$uco_id = $this->input->post('uco_id');
    	$data = array(
    		'emp_cnic' => $this->input->post('emp_cnic'),
    		'emp_id' => $this->input->post('emp_id'),
    		'emp_name' => $this->input->post('emp_name'),
    		'emp_fname' => $this->input->post('emp_father'),
    		'job_title' => $this->input->post('job_title'),
         'province' => $this->input->post('province'),
    		'emp_district' => $this->input->post('district'),
    		'emp_town' => $this->input->post('town'),
    		'assigned_ucs' => $this->input->post('assigned_ucs'),
    		'doj' => $this->input->post('doj'),
    		'period_covered' => $this->input->post('period'),
    		'sup_name_desig' => $this->input->post('name_desig'),
         'sec_supervisor_name' => $this->input->post('desig_first'),
         'sec_supname_desig' => $this->input->post('sec_desig'),
         'sec_supervisor_desig' => $this->input->post('desig_sec'),
    		'rep_purpose' => $this->input->post('purpose'),
    		'b1_record' => $this->input->post('b1_record'),
    		'b2_record' => $this->input->post('b2_record'),
    		'b3_record' => $this->input->post('b3_record'),
    		'b4_record' => $this->input->post('b4_record'),
    		'b5_record' => $this->input->post('b5_record'),
    		'b6_record' => $this->input->post('b6_record'),
    		'b7_record' => $this->input->post('b7_record'),
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
    	$this->Evaluations->update_uco($uco_id, $data);
    	$this->session->set_flashdata('success', '<strong>Success !</strong> The update operation was successful !');
    	redirect('Uco_evaluations/recent_ucos');
    }
    // Export to excel sheet.
    public function export_excel(){
        $fileName = 'UCO Evaluations Report.xlsx';  
        $evalData = $this->Evaluations->get_uco_for_excel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Employee ID (HRIS)');
        $sheet->setCellValue('B1', 'District');
        $sheet->setCellValue('C1', 'Town');
        $sheet->setCellValue('D1', 'Name of UC Assigned');
        $sheet->setCellValue('E1', 'Employee Name');
        $sheet->setCellValue('F1', 'CNIC');      
        $sheet->setCellValue('G1', 'DOJ');      
        $sheet->setCellValue('H1', 'Promotion History');      
        $sheet->setCellValue('I1', 'Appraisal Conducted by (name, designation)');      
        $sheet->setCellValue('J1', 'Date of Appraisal');      
        $sheet->setCellValue('K1', 'Additional Comments');      
        $sheet->setCellValue('L1', 'Area and UC micro plans revised/ updated by AS and US respectively before each SIA/IEC Materia'); 
        $sheet->setCellValue('M1', 'Actively participates in training/ capacity building of FLWs & AS');
        $sheet->setCellValue('N1', 'Timely reports on Daily Activities (e.g. refusal conversion activity, etc.)');
        $sheet->setCellValue('O1', 'Meeting Deadlines   (e.g. SMC List, etc.)');      
        $sheet->setCellValue('P1', 'Undertakes RI activities Follow-up of Zero dose/ New Born/ RI defaulters');      
        $sheet->setCellValue('Q1', 'Follow-up of missed children coverage/ tracking of PMCs');      
        $sheet->setCellValue('R1', 'Ensures participation in UC Meeting, CE activities, etc.');      
        $sheet->setCellValue('S1', 'Team Player (relationship with peers, partner staff, etc.)');
        $sheet->setCellValue('T1', 'Initiative (suggests new ways for improvement, refusal conversion, compliance of SOPs etc.)');  
        $sheet->setCellValue('U1', 'Works Independently with minimum supervision');  
        $sheet->setCellValue('V1', 'Guides, motivates and assists team to perform effectively');  
        $sheet->setCellValue('W1', 'Stress Management (remains calm and positive, productive, able to take feedback, etc.');
        $sheet->setCellValue('X1', 'Attendance and Late Coming');
        $sheet->setCellValue('Y1', 'Previous Adminstrative History in past year (Final Warning- Poor Counseling/Warning- Need improvement No Admin History - Satisfactory)');
        $rows = 2;
        foreach ($evalData as $val){
            $sheet->setCellValue('A' . $rows, $val['emp_id']);
            $sheet->setCellValue('B' . $rows, $val['emp_district']);
            $sheet->setCellValue('C' . $rows, $val['emp_town']);
            $sheet->setCellValue('D' . $rows, $val['assigned_ucs']);
            $sheet->setCellValue('E' . $rows, $val['emp_name']);
            $sheet->setCellValue('F' . $rows, $val['emp_cnic']);
            $sheet->setCellValue('G' . $rows, $val['doj']);
            $sheet->setCellValue('H' . $rows, '-------');
            $sheet->setCellValue('I' . $rows, $val['sup_name_desig'].', '.$val['sec_supervisor_name']);
            $sheet->setCellValue('J' . $rows, $val['created_at']);
            $sheet->setCellValue('K' . $rows, '   ');
            $sheet->setCellValue('L' . $rows, $val['b1_record']);
            $sheet->setCellValue('M' . $rows, $val['b2_record']);
            $sheet->setCellValue('N' . $rows, $val['b3_record']);
            $sheet->setCellValue('O' . $rows, $val['b4_record']);
            $sheet->setCellValue('P' . $rows, $val['b5_record']);
            $sheet->setCellValue('Q' . $rows, $val['b6_record']);
            $sheet->setCellValue('R' . $rows, $val['b7_record']);
            $sheet->setCellValue('S' . $rows, $val['c1_record']);
            $sheet->setCellValue('T' . $rows, $val['c2_record']);
            $sheet->setCellValue('U' . $rows, $val['c3_record']);
            $sheet->setCellValue('V' . $rows, $val['c4_record']);
            $sheet->setCellValue('W' . $rows, $val['c5_record']);
            $sheet->setCellValue('X' . $rows, $val['d1_record']);
            $sheet->setCellValue('Y' . $rows, $val['d2_record']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("excel_files/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/excel_files/".$fileName);
    }
}


?>