<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="<?php echo $this->config->item('site_keyword'); ?>">        
    <meta name="description" content="<?php echo $this->config->item('site_description'); ?>">    
    <title>Admin page - PANJI</title>

    <link rel="icon" href="<?php echo base_url()?>assets/backend/images/favicon.ico">

    <link href="<?php echo base_url()?>assets/backend/plugins/jQueryUI/jquery-ui.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/dist/css/skins/skin-rji.css">
    <!-- PNotify -->
    <link href="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/backend/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- MOntpicker -->
    <link href="<?php echo base_url()?>assets/backend/plugins/monthpicker/MonthPicker.css" rel="stylesheet">
        
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/apps/css/jquery.dataTable.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/apps/css/custom.css">     
    <style type="text/css">
        .wrap-table{
            overflow-x: scroll;
            overflow-y: hidden;
            white-space:nowrap;
        }
        .invalid-feedback{
          color: Red;
        }
        input.disabled, textarea.disabled {
            resize: none;
            pointer-events:none;
            border:none;
            background-color: #f5f5f5;
        }
        textarea.disabled {
            resize: none;
        }
        .verified, .active{
            color: #0000ff; 
        }
        .unverified, .inactive{
            color: #ff0000; 
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </head>
    <body class="hold-transition sidebar-mini skin-rji">
        <div class="wrapper" style="height: auto; min-height: 100%;">