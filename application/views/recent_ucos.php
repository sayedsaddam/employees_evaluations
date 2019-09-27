<?php 
/*
* Filename: recent_ucos.php
* Filepath: views / recent_ucos.php
* Author: Saddam
*/
?>
<style type="text/css">
.ui-datepicker {
    display: none !important;
}

.form-control.ddfield {
    height: 36px !important;
    width: 300px;
    border: 1px solid #ccc;
}

.inputfield {
    width: 300px;
    margin-top: -6px;
    padding: 10px;
    line-height: 1rem;
    background-color: #f6f7f8;
    border: 1px solid #e1e4e7;
}

.datefldset {
    background: none !important;
    border: 0px !important;
}

.lablewidth {
    width: 180px;
    text-align: right;
    font-size: 15px;
}
</style>
<style type="text/css">
.breadcrumb.no-bg {
    display: none;
}

h4 {
    display: none;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('#contact_list1').DataTable();
});
$(document).ready(function() {
    $('#contact_list2').DataTable();
});
</script>
<br><br>
<div class="container-fluid">
  <section class="secMainWidth" style="padding: 0px;margin-top: -40px;">
    <section class="secIndexTable">
      <div class="mainTableWhite">
        <div class="row">
          <div class="col-md-8">
            <div class="tabelHeading">
              <h3><?php if(empty($search_results)): ?> recently added UCO evaluations | <?php else: ?>
                search results | <?php endif; ?>
                <small>
                  <a href="javascript:history.go(-1);" class="btn btn-warning btn-xs">
                      <i class="fa fa-angle-double-left"></i> back
                  </a>
                  <a href="<?= base_url('uco_evaluations'); ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-plus"></i> add new evaluation
                  </a>
                  <a href="<?php echo base_url('uco_evaluations/export_excel'); ?>" class="btn btn-success btn-xs">
                    Export to Excel
                  </a>
                </small>
              </h3>
            </div>
          </div>
          <div class="col-md-4">
            <form action="<?php echo base_url('uco_evaluations/search_ucos'); ?>" method="get" style="margin-top: 14px; padding-right: 12px;">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by CNIC" autocomplete="off" required="" name="search_record">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
        <?php if($success = $this->session->flashdata('success')): ?>
        <div class="row text-center">
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success">
              <p class="text-center"><?php echo $success; ?></p>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-12">
            <div class="tableMain">
              <div class="table-responsive">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>emp iD</th>
                      <th>name</th>
                      <th>CNIC</th>
                      <th>father name</th>
                      <th>job title</th>
                      <th>district</th>
                      <th>joining date</th>
                      <th>period covered</th>
                      <th>purpose</th>
                      <th>sec-B sub total</th>
                      <th>sec-C sub total</th>
                      <th>sec-D sub total</th>
                      <th>supervisor</th>
                      <th>evaluation date</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <?php if(empty($search_results)): ?>
                  <tbody id="filter_results">
                    <?php foreach($recent_ucos as $rec_evals): ?>
                    <tr>
                      <td>
                        <?php echo $rec_evals->emp_id; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->emp_name; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->emp_cnic; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->emp_fname; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->job_title; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->emp_district; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->doj; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->period_covered; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->rep_purpose; ?>
                      </td>
                      <td>
                        <?php echo $total =  $rec_evals->b1_record + $rec_evals->b2_record + $rec_evals->b3_record + $rec_evals->b4_record + $rec_evals->b5_record + $rec_evals->b6_record; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->c1_record + $rec_evals->c2_record + $rec_evals->c3_record + $rec_evals->c4_record + $rec_evals->c4_record; ?>
                      </td>
                      <td>
                        <?php echo $rec_evals->d1_record + $rec_evals->d2_record; ?>
                      </td>
                      <td>
                      <?php echo $rec_evals->sup_name_desig; ?>
                      </td>
                      <td>
                        <?php echo date('M d, Y', strtotime($rec_evals->created_at)); ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>uco_evaluations/edit_uco/<?php echo $rec_evals->uco_id; ?>" class="btn btn-primary btn-xs">Edit</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <?php elseif(!empty($search_results)): ?>
                  <tbody id="filter_results">
                    <tr>
                      <td>
                        <?php echo $search_results->emp_id; ?>
                      </td>
                      <td>
                        <?php echo $search_results->emp_name; ?>
                      </td>
                      <td>
                        <?php echo $search_results->emp_cnic; ?>
                      </td>
                      <td>
                        <?php echo $search_results->emp_fname; ?>
                      </td>
                      <td>
                        <?php echo $search_results->job_title; ?>
                      </td>
                      <td>
                        <?php echo $search_results->emp_district; ?>
                      </td>
                      <td>
                        <?php echo $search_results->doj; ?>
                      </td>
                      <td>
                        <?php echo $search_results->period_covered; ?>
                      </td>
                      <td>
                        <?php echo $search_results->rep_purpose; ?>
                      </td>
                      <td>
                        <?php echo $total =  $search_results->b1_record + $search_results->b2_record + $search_results->b3_record + $search_results->b4_record + $search_results->b5_record + $search_results->b6_record; ?>
                      </td>
                      <td>
                        <?php echo $search_results->c1_record + $search_results->c2_record + $search_results->c3_record + $search_results->c4_record + $search_results->c4_record; ?>
                      </td>
                      <td>
                        <?php echo $search_results->d1_record + $search_results->d2_record; ?>
                      </td>
                      <td>
                      <?php echo $search_results->sup_name_desig; ?>
                      </td>
                      <td>
                        <?php echo date('M d, Y', strtotime($search_results->created_at)); ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>uco_evaluations/edit_uco/<?php echo $search_results->uco_id; ?>" class="btn btn-primary btn-xs">Edit</a>
                      </td>
                    </tr>
                  </tbody>
                <?php endif; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 text-center">
            <?php if(empty($search_results)){ echo $this->pagination->create_links(); } ?>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </section>
  </section>
</div>

