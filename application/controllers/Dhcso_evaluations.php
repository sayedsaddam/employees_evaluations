<?php defined("BASEPATH") OR exit('No direct script access allowed !');
/**
 * Filename: dhcso_evaluations.php
 * Filepath: controllers / dhcso_evaluations.php
 * Author: Saddam
 */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dhcso_evaluations extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluations');
    }
    // This method will load the DHCSO Evaluation form.
    public function index(){
    	$data['title'] = "DHCSO's Evaluation | Emp Evaluations";
    	$data['content'] = 'dhcso_evaluation';
    	$this->load->view('components/template', $data);
    }
    // Save DHCSO evaluation to database.
    public function save_dhcso_eval(){
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
            'ctc_reg_mgr' => $this->input->post('ctc_reg_mgr'),
            'ctc_reg_remarks' => $this->input->post('ctc_reg_remarks'),
            'reg_name' => $this->input->post('reg_name'),
            'reg_title' => $this->input->post('reg_title'),
            'reg_sign' => $this->input->post('reg_sign'),
            'reg_date' => $this->input->post('reg_date'),
            'cat_a' => $this->input->post('cat_a'),
            'filler_name' => $this->input->post('filler_name'),
            'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
        );
        $this->Evaluations->add_dhcso_eval($data);
        $this->session->set_flashdata('success', '<strong>Success ! </strong> Evaluation has been saved successfully!');
        redirect('dhcso_evaluations');
    }
    // Display evaluations.
    public function recent_dhcsos($offset = NULL){
        $limit = 15;
        if(!empty($offset)){
            $this->uri->segment(3);
        }
        $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url('Chws_evaluations/recent_chws');
        $config['total_rows'] = $this->Evaluations->count_dhcsos();
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
        $data['title'] = 'Recent DHCSOs | Emp Evaluations';
        $data['content'] = 'recent_dhcsos';
        $data['recent_dhcsos'] = $this->Evaluations->get_dhcso_evaluations($limit, $offset);
        $this->load->view('components/template', $data);
    }
    // Search in DHCSO evaluations.
    public function search_dhcsos(){
        $cnic = $this->input->get('search_record');
        $data['search_results'] = $this->Evaluations->search_dhcsos($cnic);
        $data['title'] = 'Search Results | Emp Evaluations';
        $data['content'] = 'recent_dhcsos';
        $this->load->view('components/template', $data);
    }
    // Edit DHCSOs
    public function edit_dhcso($dhcso_id){
        $data['title'] = 'Update | Emp Evaluations';
        $data['content'] = 'dhcso_evaluation';
        $data['edit'] = $this->Evaluations->edit_dhcso($dhcso_id); // Model call.
        $this->load->view('components/template', $data);
    }
    // Update DHCSO evaluation.
    public function update_dhcso_eval(){
      $dhcso_id = $this->input->post('dhcso_id');
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
            'ctc_reg_mgr' => $this->input->post('ctc_reg_mgr'),
            'ctc_reg_remarks' => $this->input->post('ctc_reg_remarks'),
            'reg_name' => $this->input->post('reg_name'),
            'reg_title' => $this->input->post('reg_title'),
            'reg_sign' => $this->input->post('reg_sign'),
            'reg_date' => $this->input->post('reg_date'),
            'cat_a' => $this->input->post('cat_a'),
            'filler_name' => $this->input->post('filler_name'),
            'filler_desig' => $this->input->post('filler_desig'),
            'created_at' => date('Y-m-d')
        );
      $this->Evaluations->update_dhcso($dhcso_id, $data);
      $this->session->set_flashdata('success', '<strong>Success !</strong> The update operation was successful !');
      redirect('Dhcso_evaluations/recent_dhcsos');
    }
    // Export to Excel.
    // Export to excel sheet.
    public function export_excel_dhcso(){
        $fileName = 'DHCSO Evaluations Report.xlsx';  
        $evalData = $this->Evaluations->get_dhcso_for_excel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Employee ID (HRIS)');
        $sheet->setCellValue('B1', 'District');
        $sheet->setCellValue('C1', 'Town');
        $sheet->setCellValue('D1', 'Employee Name');
        $sheet->setCellValue('E1', 'CNIC');      
        $sheet->setCellValue('F1', 'DOJ');      
        $sheet->setCellValue('G1', 'Promotion History');      
        $sheet->setCellValue('H1', 'Appraisal Conducted by (name, designation)');      
        $sheet->setCellValue('I1', 'Date of Appraisal');      
        $sheet->setCellValue('J1', 'Additional Comments');      
        $sheet->setCellValue('K1', 'Prepare distribution plan and ensure implementation for IEC materials'); 
        $sheet->setCellValue('L1', 'DPCR Liaison /DPCR Support (Field Planning, Training, UPEC/DPEC Follow-up, etc.)');
        $sheet->setCellValue('M1', 'Capacity Building of Workers');
        $sheet->setCellValue('N1', 'Campaign Monitoring/Meeting coverage target');      
        $sheet->setCellValue('O1', 'Post Campaign Activities (Missed Children Coverage/eLQAS/etc.)');      
        $sheet->setCellValue('P1', 'Community Engagement/Social Mobilization');      
        $sheet->setCellValue('Q1', 'Validation of updated Micro Plan /Timely Submission');      
        $sheet->setCellValue('R1', 'Strategy- (plans/modifies activities keeping the changing program requirements, refusals in campaigns, district dynamics etc.)');
        $sheet->setCellValue('S1', 'Leadership- (Guides, motivates and assists team to perform effectively)');  
        $sheet->setCellValue('T1', 'Team Player ( relationship with peers, partner staff, etc )');  
        $sheet->setCellValue('U1', 'Stress Management (remains calm and positive, productive, able to take feedback, etc.');  
        $sheet->setCellValue('V1', 'Planning and organizing ( has an execution plan for implementing existing and new strategies keeping in mind resources, timelines etc) ');
        $sheet->setCellValue('W1', 'Attendance and Late Coming');
        $sheet->setCellValue('X1', 'Previous Adminstrative History in past year (Final Warning- Poor Counseling/Warning- Need improvement No Admin History - Satisfactory)');
        $rows = 2;
        foreach ($evalData as $val){
            $sheet->setCellValue('A' . $rows, $val['emp_id']);
            $sheet->setCellValue('B' . $rows, $val['emp_district']);
            $sheet->setCellValue('C' . $rows, $val['emp_town']);
            $sheet->setCellValue('D' . $rows, $val['emp_name']);
            $sheet->setCellValue('E' . $rows, $val['emp_cnic']);
            $sheet->setCellValue('F' . $rows, $val['doj']);
            $sheet->setCellValue('G' . $rows, '-------');
            $sheet->setCellValue('H' . $rows, $val['sup_name_desig'].', '.$val['sec_supervisor_name']);
            $sheet->setCellValue('I' . $rows, $val['created_at']);
            $sheet->setCellValue('J' . $rows, '   ');
            $sheet->setCellValue('K' . $rows, $val['b1_record']);
            $sheet->setCellValue('L' . $rows, $val['b2_record']);
            $sheet->setCellValue('M' . $rows, $val['b3_record']);
            $sheet->setCellValue('N' . $rows, $val['b4_record']);
            $sheet->setCellValue('O' . $rows, $val['b5_record']);
            $sheet->setCellValue('P' . $rows, $val['b6_record']);
            $sheet->setCellValue('Q' . $rows, $val['b7_record']);
            $sheet->setCellValue('R' . $rows, $val['c1_record']);
            $sheet->setCellValue('S' . $rows, $val['c2_record']);
            $sheet->setCellValue('T' . $rows, $val['c3_record']);
            $sheet->setCellValue('U' . $rows, $val['c4_record']);
            $sheet->setCellValue('V' . $rows, $val['c5_record']);
            $sheet->setCellValue('W' . $rows, $val['d1_record']);
            $sheet->setCellValue('X' . $rows, $val['d2_record']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("excel_files/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/excel_files/".$fileName);
    }
}

?>