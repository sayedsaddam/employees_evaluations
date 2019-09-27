<?php 
/*
* Filename: as_evaluation.php
* Filepath: views / as_evaluation.php
* Author: Saddam
*/
?>
<style type="text/css">
	table th{
		text-align: center;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2(); // Searchable dropdown lists/select boxes.
	});
</script>
<section class="secMainWidth">
	<section class="secFormLayout">
		<div class="mainInputBg">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-12 text-center">
									<strong>Employee's Performance Evaluation Form [AS]</strong> | 
								  	<a href="<?php echo base_url('chws_evaluations/recent_as'); ?>" class="btn btn-primary btn-xs">Recently Added <i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<?php //if(!empty($this->uri->segment(3))): ?>
							<!-- General and PTPP holder's different skills, starts here... -->
							<form action="<?php if(empty(@$edit)){ echo base_url('chws_evaluations/save_as_eval');}else{ echo base_url('chws_evaluations/update_as_eval'); } ?>" method="post">
								<input type="hidden" name="as_id" value="<?php echo $this->uri->segment(3); ?>">
								<p class="text-center"><strong>Section A: To be completed by First Level Supervisor</strong></p>
								<div class="row">
									<div class="col-md-3">
										<label>Employee's CNIC</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="emp_cnic" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_cnic; } ?>">
									</div>
									<div class="col-md-3">
										<label>Employee ID (HRIS)</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="emp_id" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_id; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Employee Name</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="emp_name" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_name; } ?>">
									</div>
									<div class="col-md-3">
										<label>Father/Husband Name</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="emp_father" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_fname; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Province</label>
									</div>
									<div class="col-md-3">
										<select name="province" class="form-control input-sm" required="">
											<option value="">Select Province</option>
											<option value="Khyber Pakhtoonkhwa" <?php if(!empty(@$edit AND @$edit->province == 'Khyber Pakhtoonkhwa')){ echo 'selected'; } ?>>Khyber Pakhtoonkhwa</option>
											<option value="Punjab" <?php if(!empty(@$edit AND @$edit->province == 'Punjab')){ echo 'selected'; } ?>>Punjab</option>
											<option value="Balochistan" <?php if(!empty(@$edit AND @$edit->province == 'Balochistan')){ echo 'selected'; } ?>>Balochistan</option>
											<option value="Sindh" <?php if(!empty(@$edit AND @$edit->province == 'Sindh')){ echo 'selected'; } ?>>Sindh</option>
											<option value="Gilgit Baltistan" <?php if(!empty(@$edit AND @$edit->province == 'Gilgit Baltistan')){ echo 'selected'; } ?>>Gilgit Baltistan</option>
											<option value="KP-TD" <?php if(!empty(@$edit AND @$edit->province == 'KP-TD')){ echo 'selected'; } ?>>KP-TD</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>District</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="district" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_district; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Town</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="town" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->emp_town; } ?>">
									</div>
									<div class="col-md-3">
										<label>Current Assigned UC's</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="assigned_ucs" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->assigned_ucs; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Area</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="area" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->area; } ?>">
									</div>
									<div class="col-md-3">
										<label>Job Title</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="job_title" class="form-control input-sm" value="AS" readonly="">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Date of Joining</label>
									</div>
									<div class="col-md-3">
										<input type="date" name="doj" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->doj; } ?>">
									</div>
									<div class="col-md-3">
										<label>Period covered by Performance Appraisal</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="period" class="form-control input-sm" required=""  value="<?php if(!empty(@$edit)){ echo @$edit->period_covered; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-6">
										Appraisal Conducted by (First level Supervisior Name & Designation):
									</div>
									<div class="col-md-3">
										<input type="text" name="name_desig" class="form-control input-sm" required=""  value="<?php if(!empty(@$edit)){ echo @$edit->sup_name_desig; } ?>">
									</div>
									<div class="col-md-3">
										<input type="text" name="desig_first" class="form-control input-sm" required=""  value="<?php if(!empty(@$edit)){ echo @$edit->sec_supervisor_name; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-6">
										Appraisal Conducted by (Second level Supervisior Name & Designation):
									</div>
									<div class="col-md-3">
										<input type="text" name="sec_desig" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->sec_supname_desig; } ?>">
									</div>
									<div class="col-md-3">
										<input type="text" name="desig_sec" class="form-control input-sm" required="" value="<?php if(!empty(@$edit)){ echo @$edit->sec_supervisor_desig; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-4">
										<label>Purpose of Report: </label>
									</div>
									<div class="col-md-4">
										<input type="checkbox" name="purpose" checked=""> <strong>Performance Management</strong>
									</div>
									<div class="col-md-4">
										<input type="checkbox" name="purpose" checked=""> <strong>Renewal of Contract</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										<label>Serial No.</label>
									</div>
									<div class="col-md-4">
										<label>Description</label>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<i>Please rate the Technical Skills (3= Meets requirements, 2= Needs Improvement, 1= Does not meet requirements)</i>
									</div>
									<div class="col-md-2">
										<strong>Rating / Score</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12" style="background: khaki;">
										<strong>Section B: Key Perfromance Indicators</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-1: Capacity building of CHWs</strong>
									</div>
									<div class="col-md-2">
										<select name="b1_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->b1_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b1_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b1_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-1.1
									</div>
									<div class="col-md-10">
										Providing on-job trainings on IPC, data collection/compilation on agreed format/tools to CHWs
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-1.2
									</div>
									<div class="col-md-10">
										Develop supervision plan for all field activities to ensure vaccination  and ensure monitoring and supervision of assigned CHWs
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-1.3
									</div>
									<div class="col-md-10">
										Ensuring consistent recording and follow up of zero dose RI children 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-1.4
									</div>
									<div class="col-md-10">
										Checking the logbook of CHWs  for progress and microplans updation 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-2: Compilation and verification of data</strong>
									</div>
									<div class="col-md-2">
										<select name="b2_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1"  <?php if(!empty(@$edit AND @$edit->b2_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b2_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b2_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-2.1
									</div>
									<div class="col-md-10">
										Coordinating with all CHWs in gathering, compling HH vaccination data on weekly/monthly basis
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-2.2
									</div>
									<div class="col-md-10">
										Ensure updating and maintain a missed children logbook after every campaign at CHW level
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-2.3
									</div>
									<div class="col-md-10">
										Compilation and submission of vaccination coverage and missed children data on agreed timeline to supervisor
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-2.4
									</div>
									<div class="col-md-10">
										Performing data analysis to reivew trends of children vaccinated and missed of HR population grous. Highlight unusual movement pattern of HR population groups.
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-2.5
									</div>
									<div class="col-md-10">
										Cross verifying data (30%) of CHW logbooks (micro census and registration) every month through desk and field reviews. 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-3: Ensuring vaccination of Children</strong>
									</div>
									<div class="col-md-2">
										<select name="b3_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->b3_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b3_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b3_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-3.1
									</div>
									<div class="col-md-10">
										%  (targeted) of  missed children (NA, refusal and inaccessible) covered post campaign.
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-4: Preparation of Plans / Reporting</strong>
									</div>
									<div class="col-md-2">
										<select name="b4_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->b4_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b4_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b4_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-4.1
									</div>
									<div class="col-md-10">
										Sharing still missed households/children and refusal cases  list with UCO/UCMO for inclusion in the microplan for upcoming campaign
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-4.2
									</div>
									<div class="col-md-10">
										Submitting the compiled HH vaccination coverage and missed children data to UCO and DHSCO for onward submission to the data support center on daily basis during campaign (5th day) and weekly post campaign
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-4.3
									</div>
									<div class="col-md-10">
										Briefing UCO/MO on the RI status of the HHs and share list of defaulters for RI outreach.
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-4.4
									</div>
									<div class="col-md-10">
										Reporting monthly on pre-campaign meetings with communities and influencers for mobilization 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-5: Vaccine cold chain management</strong>
									</div>
									<div class="col-md-2">
										<select name="b5_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->b5_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b5_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b5_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-5.1
									</div>
									<div class="col-md-10">
										Ensure logistic and vaccine cold chain management during vaccination in her assigned area
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>B-6: Community outreach</strong>
									</div>
									<div class="col-md-2">
										<select name="b6_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->b6_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->b6_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->b6_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-6.1
									</div>
									<div class="col-md-10">
										Ensuring and carrying out mother/school session in assigned area
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-6.2
									</div>
									<div class="col-md-10">
										Organizing effective CE activities and submission of its timely reports
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										B-6.3
									</div>
									<div class="col-md-10">
										Participation in RI activities in the assigned area
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10 text-center" style="background: lightblue;">
										<i>Sub Total of Section B with 60% performance weightage </i>
									</div>
									<div class="col-md-2">
										<input type="text" name="sub_total" class="form-control input-sm" readonly="" value="<?php if(!empty(@$edit)){ echo @$edit->b1_record + @$edit->b2_record + @$edit->b3_record + @$edit->b4_record + @$edit->b5_record + @$edit->b6_record; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12" style="background: khaki;">
										<strong>Section C: Soft Skills (3= Meets requirements, 2= Needs Improvement, 1= Does not meet requirements) </strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>C-1: Commnication Skills (e.g. has good convincing skills, active listening skills etc.)</strong>
									</div>
									<div class="col-md-2">
										<select name="c1_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->c1_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->c1_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->c1_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-1.1
									</div>
									<div class="col-md-10">
										Demonstrated IPC skills for convincinig parents, caregivers, community members, key influencer,  health representatives and other relevant stakeholders for vaccinating children (Both Polio and Routine immunization) 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-1.2
									</div>
									<div class="col-md-10">
										Efficently communicate and assign duties/tasks to CHWs.  
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>C-2: Interpersonal Skills (e.g. builds relationship with community, manage multiple stakeholder i,e. UCCSO, AS, UCMO, UCPO etc)</strong>
									</div>
									<div class="col-md-2">
										<select name="c2_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->c2_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->c2_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->c2_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-2.1
									</div>
									<div class="col-md-10">
										Listens actively and respectfully responds to the queries raised by CHWs, community and other relevant stakeholders regarding the vaccinations as well as preventive care. 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>C-3: Resilience (e.g. motivated, can keep going despite refusals)</strong>
									</div>
									<div class="col-md-2">
										<select name="c3_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->c3_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->c3_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->c3_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-3.1
									</div>
									<div class="col-md-10">
										Ensures to meet targets and deadlines in most challenging situations.
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>C-4: Detail Orientation (enter accurate data, is able to identify discrepancies in data, enters complete data etc)</strong>
									</div>
									<div class="col-md-2">
										<select name="c4_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->c4_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->c4_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->c4_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-4.1
									</div>
									<div class="col-md-10">
										Always paying attention to the detail for the assigned task as well as reporting requriements 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightgrey;">
										<strong>C-5: Teamwork (can work in collaboration with other team members to achieve goals, assists team members)</strong>
									</div>
									<div class="col-md-2">
										<select name="c5_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->c5_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->c5_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->c5_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-5.1
									</div>
									<div class="col-md-10">
										Participate actively in all team activities. 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										C-5.2
									</div>
									<div class="col-md-10">
										Always collaborate with relevant stakeholders to make polio and routine immunization a success. 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10 text-center" style="background: lightblue;">
										<i>Sub Total of Section C with 30% performance weightage</i>
									</div>
									<div class="col-md-2">
										<input type="text" name="sub_total" class="form-control input-sm" readonly="" value="<?php if(!empty(@$edit)){ echo @$edit->c1_record + @$edit->c2_record + @$edit->c3_record + @$edit->c4_record + @$edit->c5_record; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12" style="background: khaki;">
										<strong>Section D: Admin (3= Meets requirements, 2= Needs Improvement, 1= Does not meet requirements)</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>D-1: Attendance and Late Coming</strong>
									</div>
									<div class="col-md-2">
										<select name="d1_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->d1_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->d1_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->d1_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										D-1.1
									</div>
									<div class="col-md-10">
										Follow the official duty hours and observe puntuality in his timing 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										D-1.2
									</div>
									<div class="col-md-10">
										Follow leave policy and participation in the scheduled meetings and Trainings 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>D-2: Previous Adminstrative History in past year (Disciplinary Issues) </strong>
									</div>
									<div class="col-md-2">
										<select name="d2_record" class="form-control input-sm" required="">
											<option value="">Select Score</option>
											<option value="1" <?php if(!empty(@$edit AND @$edit->d2_record == '1')){ echo 'selected'; } ?>>1</option>
											<option value="2" <?php if(!empty(@$edit AND @$edit->d2_record == '2')){ echo 'selected'; } ?>>2</option>
											<option value="3" <?php if(!empty(@$edit AND @$edit->d2_record == '3')){ echo 'selected'; } ?>>3</option>
										</select>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-2">
										D-2.1
									</div>
									<div class="col-md-10">
										Improved performance (No disciplinary issues reported) 
									</div>
									<div class="col-md-2"></div>
								</div><hr>
								<div class="row">
									<div class="col-md-10" style="background: lightblue;">
										<i>Sub Total of Section D with 10% performance weightage </i>
									</div>
									<div class="col-md-2">
										<input type="text" name="sub_total" class="form-control input-sm" readonly="" value="<?php if(!empty(@$edit)){ echo @$edit->d1_record + @$edit->d2_record; } ?>">
									</div>
								</div><hr>
								<div class="row" style="background: lightblue;">
									<div class="col-md-10 text-center">
										<strong>TOTAL WEIGHTED SCORE</strong>
									</div>
									<div class="col-md-2">
										<input type="text" name="total_score" class="form-control input-sm" readonly="">
									</div>
								</div><hr>
								<div class="row" style="background: lightblue;">
									<div class="col-md-10 text-center" style="background: lightblue;">
										<strong>TOTAL APPRAISAL SCORE</strong>
									</div>
									<div class="col-md-2">
										<input type="text" name="" class="form-control input-sm" readonly="">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>Disciplinary Action</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Date of Issue</th>
													<th>Warning</th>
													<th>Reason</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<input type="date" name="date_of_issue" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_issue_date; } ?>">
													</td>
													<td>
														<input type="text" name="warning" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_warning; } ?>">
													</td>
													<td>
														<select name="reason" class="form-control input-sm">
															<option value="<?php if(!empty(@$edit AND @$edit->disc_reason != NULL)){ echo 'selected'; } ?>"><?php echo @$edit->disc_reason; ?></option>
															<option value="Kinship">Kinship</option>
															<option value="Locality">Locality</option>
															<option value="Political Involvement">Political Involvement</option>
															<option value="Dual Job">Dual Job</option>
															<option value="Regular Studies">Regular Studies</option>
															<option value="Financial Embezzlement">Financial Embezzlement</option>
															<option value="Insubordination">Insubordination</option>
															<option value="Data Fudging">Data Fudging</option>
															<option value="Fake Finger Marking">Fake Finger Marking</option>
															<option value="Misuse of Authority">Misuse of Authority</option>
															<option value="Sexual Harassment">Sexual Harassment</option>
															<option value="Bullying and Intimdating attitude">Bullying and Intimdating attitude</option>
															<option value="Impersonation">Impersonation</option>
															<option value="Lobbying, grouping, instigation">Lobbying, grouping, instigation</option>
															<option value="Absenteeism during campaign days">Absenteeism during campaign days</option>
															<option value="Fake document submission">Fake document submission</option>
															<option value="Unprofessional Attitude">Unprofessional Attitude</option>
															<option value="Absenteeism during data validation">Absenteeism during data validation</option>
															<option value="Absenteeism">Absenteeism</option>
															<option value="Professional Misconduct">Professional Misconduct</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Non serious or casual attitude">Non serious or casual attitude</option>
															<option value="Absenteeism during ordinary days">Absenteeism during ordinary days</option>
															<option value="Tardiness and Late comer">Tardiness and Late comer</option>
															<option value="Weak monitoring or supervision skills">Weak monitoring or supervision skills</option>
															<option value="Missed Children">Missed Children</option>
															<option value="Weak communication skills">Weak communication skills</option>
															<option value="Absenteeism during single day in campaign">Absenteeism during single day in campaign</option>
															<option value="Absenteeism during training">Absenteeism during training</option>
															<option value="Neglect of duty">Neglect of duty</option>
															<option value="Absenteeism during evening meeting">Absenteeism during evening meeting</option>
															<option value="Professional Negligence">Professional Negligence</option>
															<option value="UC Split">UC Split</option>
															<option value="Address Change">Address Change</option>
															<option value="Relocation">Relocation</option>
															<option value="Health Issues">Health Issues</option>
															<option value="Marriage">Marriage</option>
															<option value="Further Studies">Further Studies</option>
															<option value="Maternity">Maternity</option>
															<option value="Domestic">Domestic</option>
															<option value="Outside COMNet">Outside COMNet</option>
															<option value="Within COMNet">Within COMNet</option>
															<option value="Outside CBV">Outside CBV</option>
															<option value="Within CBV">Within CBV</option>
															<option value="Promotion">Promotion</option>
															<option value="Inadequate Pay">Inadequate Pay</option>
															<option value="Security Concerns">Security Concerns</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Workload">Workload</option>
															<option value="Family Pressure">Family Pressure</option>
															<option value="Inappropriate Behaviour of Supervisor">Inappropriate Behaviour of Supervisor</option>
															<option value="Specified Reason">Specified Reason</option>
															<option value="Non Renewal of Contract">Non Renewal of Contract</option>
															<option value="Other">Other</option>
														</select>
													</td>
												</tr>
												<tr>
													<td>
														<input type="date" name="date_of_issue1" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_date_1; } ?>">
													</td>
													<td>
														<input type="text" name="warning1" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_warning_1; } ?>">
													</td>
													<td>
														<select name="reason1" class="form-control input-sm">
															<option value="<?php if(!empty(@$edit AND @$edit->disc_reason_1 != NULL)){ echo 'selected'; } ?>"><?php echo @$edit->disc_reason_1; ?></option>
															<option value="Kinship">Kinship</option>
															<option value="Locality">Locality</option>
															<option value="Political Involvement">Political Involvement</option>
															<option value="Dual Job">Dual Job</option>
															<option value="Regular Studies">Regular Studies</option>
															<option value="Financial Embezzlement">Financial Embezzlement</option>
															<option value="Insubordination">Insubordination</option>
															<option value="Data Fudging">Data Fudging</option>
															<option value="Fake Finger Marking">Fake Finger Marking</option>
															<option value="Misuse of Authority">Misuse of Authority</option>
															<option value="Sexual Harassment">Sexual Harassment</option>
															<option value="Bullying and Intimdating attitude">Bullying and Intimdating attitude</option>
															<option value="Impersonation">Impersonation</option>
															<option value="Lobbying, grouping, instigation">Lobbying, grouping, instigation</option>
															<option value="Absenteeism during campaign days">Absenteeism during campaign days</option>
															<option value="Fake document submission">Fake document submission</option>
															<option value="Unprofessional Attitude">Unprofessional Attitude</option>
															<option value="Absenteeism during data validation">Absenteeism during data validation</option>
															<option value="Absenteeism">Absenteeism</option>
															<option value="Professional Misconduct">Professional Misconduct</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Non serious or casual attitude">Non serious or casual attitude</option>
															<option value="Absenteeism during ordinary days">Absenteeism during ordinary days</option>
															<option value="Tardiness and Late comer">Tardiness and Late comer</option>
															<option value="Weak monitoring or supervision skills">Weak monitoring or supervision skills</option>
															<option value="Missed Children">Missed Children</option>
															<option value="Weak communication skills">Weak communication skills</option>
															<option value="Absenteeism during single day in campaign">Absenteeism during single day in campaign</option>
															<option value="Absenteeism during training">Absenteeism during training</option>
															<option value="Neglect of duty">Neglect of duty</option>
															<option value="Absenteeism during evening meeting">Absenteeism during evening meeting</option>
															<option value="Professional Negligence">Professional Negligence</option>
															<option value="UC Split">UC Split</option>
															<option value="Address Change">Address Change</option>
															<option value="Relocation">Relocation</option>
															<option value="Health Issues">Health Issues</option>
															<option value="Marriage">Marriage</option>
															<option value="Further Studies">Further Studies</option>
															<option value="Maternity">Maternity</option>
															<option value="Domestic">Domestic</option>
															<option value="Outside COMNet">Outside COMNet</option>
															<option value="Within COMNet">Within COMNet</option>
															<option value="Outside CBV">Outside CBV</option>
															<option value="Within CBV">Within CBV</option>
															<option value="Promotion">Promotion</option>
															<option value="Inadequate Pay">Inadequate Pay</option>
															<option value="Security Concerns">Security Concerns</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Workload">Workload</option>
															<option value="Family Pressure">Family Pressure</option>
															<option value="Inappropriate Behaviour of Supervisor">Inappropriate Behaviour of Supervisor</option>
															<option value="Specified Reason">Specified Reason</option>
															<option value="Non Renewal of Contract">Non Renewal of Contract</option>
															<option value="Other">Other</option>
														</select>
													</td>
												</tr>
												<tr>
													<td>
														<input type="date" name="date_of_issue2" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_date_2; } ?>">
													</td>
													<td>
														<input type="text" name="warning2" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->disc_warning_2; } ?>">
													</td>
													<td>
														<select name="reason2" class="form-control input-sm">
															<option value="<?php if(!empty(@$edit AND @$edit->disc_reason_2 != NULL)){ echo 'selected'; } ?>"><?php echo @$edit->disc_reason_2; ?></option>
															<option value="Kinship">Kinship</option>
															<option value="Locality">Locality</option>
															<option value="Political Involvement">Political Involvement</option>
															<option value="Dual Job">Dual Job</option>
															<option value="Regular Studies">Regular Studies</option>
															<option value="Financial Embezzlement">Financial Embezzlement</option>
															<option value="Insubordination">Insubordination</option>
															<option value="Data Fudging">Data Fudging</option>
															<option value="Fake Finger Marking">Fake Finger Marking</option>
															<option value="Misuse of Authority">Misuse of Authority</option>
															<option value="Sexual Harassment">Sexual Harassment</option>
															<option value="Bullying and Intimdating attitude">Bullying and Intimdating attitude</option>
															<option value="Impersonation">Impersonation</option>
															<option value="Lobbying, grouping, instigation">Lobbying, grouping, instigation</option>
															<option value="Absenteeism during campaign days">Absenteeism during campaign days</option>
															<option value="Fake document submission">Fake document submission</option>
															<option value="Unprofessional Attitude">Unprofessional Attitude</option>
															<option value="Absenteeism during data validation">Absenteeism during data validation</option>
															<option value="Absenteeism">Absenteeism</option>
															<option value="Professional Misconduct">Professional Misconduct</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Non serious or casual attitude">Non serious or casual attitude</option>
															<option value="Absenteeism during ordinary days">Absenteeism during ordinary days</option>
															<option value="Tardiness and Late comer">Tardiness and Late comer</option>
															<option value="Weak monitoring or supervision skills">Weak monitoring or supervision skills</option>
															<option value="Missed Children">Missed Children</option>
															<option value="Weak communication skills">Weak communication skills</option>
															<option value="Absenteeism during single day in campaign">Absenteeism during single day in campaign</option>
															<option value="Absenteeism during training">Absenteeism during training</option>
															<option value="Neglect of duty">Neglect of duty</option>
															<option value="Absenteeism during evening meeting">Absenteeism during evening meeting</option>
															<option value="Professional Negligence">Professional Negligence</option>
															<option value="UC Split">UC Split</option>
															<option value="Address Change">Address Change</option>
															<option value="Relocation">Relocation</option>
															<option value="Health Issues">Health Issues</option>
															<option value="Marriage">Marriage</option>
															<option value="Further Studies">Further Studies</option>
															<option value="Maternity">Maternity</option>
															<option value="Domestic">Domestic</option>
															<option value="Outside COMNet">Outside COMNet</option>
															<option value="Within COMNet">Within COMNet</option>
															<option value="Outside CBV">Outside CBV</option>
															<option value="Within CBV">Within CBV</option>
															<option value="Promotion">Promotion</option>
															<option value="Inadequate Pay">Inadequate Pay</option>
															<option value="Security Concerns">Security Concerns</option>
															<option value="Poor Performance">Poor Performance</option>
															<option value="Workload">Workload</option>
															<option value="Family Pressure">Family Pressure</option>
															<option value="Inappropriate Behaviour of Supervisor">Inappropriate Behaviour of Supervisor</option>
															<option value="Specified Reason">Specified Reason</option>
															<option value="Non Renewal of Contract">Non Renewal of Contract</option>
															<option value="Other">Other</option>
														</select>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>TO BE COMPLETED BY STAFF MEMBER</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>Continues Learning</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<p>Describe atleast one learing activity that you have pursued during the reporting period and also the activity you would like to carry out during the next reporting period</p>
										<textarea name="learing" class="form-control" rows="5"><?php if(!empty(@$edit)){ echo @$edit->cont_learning; } ?></textarea>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>Career Development</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<p>Describe your future career aspirations indicating newly acquired skills and competencies as well as development needs (Optional)</p>
										<textarea name="career" class="form-control" rows="5"><?php if(!empty(@$edit)){ echo @$edit->career_development; } ?></textarea>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-10">
										<strong>Comments of the staff member</strong>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<textarea name="staff_comments" class="form-control" rows="5"><?php if(!empty(@$edit)){ echo @$edit->staff_comments; } ?></textarea>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-4">
										<input type="text" name="staff_name" class="form-control input-sm" placeholder="Staff member name..." value="<?php if(!empty(@$edit)){ echo @$edit->staff_name; } ?>">
									</div>
									<div class="col-md-4">
										<input type="text" name="staff_sign" class="form-control input-sm" placeholder="Signature" value="<?php if(!empty(@$edit)){ echo @$edit->staff_sign; } ?>">
									</div>
									<div class="col-md-4">
										<input type="date" name="staff_date" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->staff_date; } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<strong>TO BE COMPLETED BY First, Second Reporting Officer,  and CTC district/Town Coordinator</strong>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<strong>First Reporting Officer- Area Supervisor</strong><br><br>
										Would you consider the staff member for a contract extension? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="town_comments" value="Yes" <?php if(!empty(@$edit AND @$edit->first_sec_rep_officer == 'Yes')){ echo 'checked'; } ?>> YES &nbsp;&nbsp;&nbsp;
										<input type="radio" name="town_comments" value="No" <?php if(!empty(@$edit AND @$edit->first_sec_rep_officer == 'No')){ echo 'checked'; } ?>> NO <br><br>
										Is the staff Member more suited for some other type of work/promotion other than that in which he/she is employed? If so, state the functions which are suited to his/her ability <br>
										<strong>Remarks: </strong>
										<textarea name="remarks" class="form-control" rows="4"><?php if(!empty(@$edit)){ echo @$edit->first_sec_remarks; } ?></textarea>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-3">
										<label>Name of second reporting officer: </label>
									</div>
									<div class="col-md-3">
										<input type="text" name="second_officer" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->sec_off_name; } ?>">
									</div>
									<div class="col-md-3">
										<label>Title: </label>
									</div>
									<div class="col-md-3">
										<input type="text" name="second_title" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->sec_off_title; } ?>">
									</div>
								</div><br>
								<div class="row">
									<div class="col-md-3">
										<label>Signature: </label>
									</div>
									<div class="col-md-3">
										<input type="text" name="second_sign" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->sec_off_sign; } ?>">
									</div>
									<div class="col-md-3">
										<label>Date: </label>
									</div>
									<div class="col-md-3">
										<input type="text" name="second_date" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->sec_off_date; }else{ echo date('Y-m-d'); } ?>">
									</div>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<strong>CTC District/Town Coordinator</strong><br>
										Would you consider the staff member for a contract extension? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="ctc_coord" value="Yes" <?php if(!empty(@$edit AND @$edit->ctc_coord_com == 'Yes')){ echo 'checked'; } ?>> YES &nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="ctc_coord" value="No" <?php if(!empty(@$edit AND @$edit->ctc_coord_com == 'No')){ echo 'checked'; } ?>> NO <br><br>
										<strong>Remarks: </strong>
										<textarea name="ctc_coord_remarks" class="form-control" rows="4"><?php if(!empty(@$edit)){ echo @$edit->ctc_coord_remarks; } ?></textarea>
									</div>
								</div><hr>
								<div class="row">
										<div class="col-md-3">
											<label>Name of CTC Staff: </label>
										</div>
										<div class="col-md-3">
											<input type="text" name="ctc_name" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->ctc_coord_name; } ?>">
										</div>
										<div class="col-md-3">
											<label>Title: </label>
										</div>
										<div class="col-md-3">
											<input type="text" name="ctc_title" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->ctc_coord_title; } ?>">
										</div>
									</div><br>
									<div class="row">
										<div class="col-md-3">
											<label>Signature: </label>
										</div>
										<div class="col-md-3">
											<input type="text" name="ctc_sign" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->ctc_coord_sign; } ?>">
										</div>
										<div class="col-md-3">
											<label>Date: </label>
										</div>
										<div class="col-md-3">
											<input type="text" name="ctc_date" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->ctc_coord_date; }else{ echo date('Y-m-d'); }?>">
										</div>
									</div><hr>
									<div class="row">
										<div class="col-md-2">
											Category: 
										</div>
										<div class="col-md-4">
											<input type="text" name="cat_a" class="form-control input-sm" readonly="">
										</div>
									</div><br>
									<div class="row">
										<div class="col-md-2">
											<label>Filled by: </label>
										</div>
										<div class="col-md-4">
											<input type="text" name="filler_name" class="form-control input-sm" value="<?php if(!empty(@$edit)){ echo @$edit->filler_name; } ?>">
										</div>
									</div><br>
									<div class="row">
										<div class="col-md-2">
											<label>Designation:</label>
										</div>
										<div class="col-md-4">
											<select name="filler_desig" class="form-control input-sm" required="">
												<option value="">Select Designation</option>
												<option value="Regional Manager" <?php if(!empty(@$edit AND @$edit->filler_desig == 'Regional Manager')){ echo 'selected'; } ?>>Regional Manager</option>
												<option value="District Manager" <?php if(!empty(@$edit AND @$edit->filler_desig == 'District Manager')){ echo 'selected'; } ?>>District Manager</option>
												<option value="Town Manager" <?php if(!empty(@$edit AND @$edit->filler_desig == 'Town Manager')){ echo 'selected'; } ?>>Town Manager</option>
												<option value="Project Officer" <?php if(!empty(@$edit AND @$edit->filler_desig == 'Project Manager')){ echo 'selected'; } ?>>Project Officer</option>
												<option value="Project Associate" <?php if(!empty(@$edit AND @$edit->filler_desig == 'Project Associate')){ echo 'selected'; } ?>>Project Associate</option>
												<option value="Data Entry Operator" <?php if(!empty(@$edit AND @$edit->filler_desig == 'Data Entry Operator')){ echo 'selected'; } ?>>Data Entry Operator</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-10">
											<div class="submitBtn">
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</div>
							</form>
							<!-- General and PTPP holder's different skills, ends here... -->
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
</section>
<!-- Select employee and his/her address will populate itself in the dropdown list. -->
<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('select[name="emp_name"]').on('change', function(){
	// 		var empID = $(this).val();
	// 		if(empID){
	// 			$.ajax({
	// 				url: '<?php echo base_url("Performance_evaluation/get_address_ucpos/"); ?>'+empID,
	// 				type: 'post',
	// 				dataType: 'json',
	// 				success: function(data){
	// 					console.log(data); // Log data to the console.
	// 					$('select[name="duty_province"]').empty();
	// 					$('select[name="duty_distt"]').empty();
	// 					$('select[name="duty_tehsil"]').empty();
	// 					$('select[name="duty_province"]').append('<option value="'+ data.province +'">'+ data.province +'</option>');
	// 					$('select[name="duty_distt"]').append('<option value="'+ data.district +'" selected>'+ data.district +'</option>');
	// 					$('select[name="duty_tehsil"]').append('<option value="'+ data.tehsil +'" selected>'+ data.tehsil +'</option>');
	// 				}
	// 			});
	// 		}else{
	// 			$('select[name="duty_province"]').empty();
	// 			$('select[name="duty_distt"]').empty();
	// 			$('select[name="duty_tehsil"]').empty();
	// 		}
	// 	});
	// });
</script>