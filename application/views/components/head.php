<?php 
/*
* Filename: head.php
* Filepath: views / components / head.php
* Author: Saddam
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:400,700,800|Roboto:400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/select2/dist/css/select2.min.css'); ?>">
	<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/DataTables/js/jquery.dataTables.min'); ?>"></script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:void(0)">Employees Evaluations</a>
    </div>
    <?php // $ucpo_session = $this->session->userdata('ucpo_cnic'); ?>
    <?php // $tcsp_session = $this->session->userdata('tcsp_cnic'); ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php //if($tcsp_session): ?><?php // endif; ?>>
          <a href="<?php echo base_url('chws_evaluations'); ?>">CHW's Evaluation</a>
        </li>
        <li>
          <a href="<?php echo base_url('chws_evaluations/as_evaluation'); ?>">AS's Evaluation</a>
        </li>
        <li>
          <a href="<?php echo base_url('uco_evaluations'); ?>">UCO's Evaluation</a>
        </li>
        <li>
          <a href="<?php echo base_url('dhcso_evaluations'); ?>">DHCSO's Evaluation</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

