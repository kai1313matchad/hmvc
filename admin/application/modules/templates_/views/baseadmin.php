<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/frontend/images/icons/favicon.png"/>

    <title>Admin Mode</title>
    <!-- Basic CSS -->
    <?php
      if($basic_css)
      {
        $this->load->view('admbasic_css'); 
      }   
    ?>

    <!-- Addon CSS -->
    <?php
    if(isset($addon_css))
      {
        foreach ($addon_css as $addon)
        {
          $this->load->view($module.'/'.$addon);  
        }
      }
    ?>

    <!-- Main CSS -->
    <?php
    if($admin_css)
      {
        $this->load->view('admmain_css'); 
      }
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('adm_header'); ?>

        <?php $this->load->view($module.'/'.$content); ?>

        <?php $this->load->view('adm_footer'); ?>
      </div>
    </div>

    <?php $this->load->view('admbasic_js'); ?>

    <!-- Base JS -->
    <?php
    if(isset($addon_js))
      {
        foreach ($addon_js as $addon)
        {
          $this->load->view($module.'/'.$addon);  
        }     
      }
    ?>
    
    <!-- Main JS -->
    <?php $this->load->view('admmain_js'); ?>

    <!-- Addon Custom JS -->
    <?php
      if(isset($addon_custjs))
      {
        foreach ($addon_custjs as $addoncust)
        {
          $this->load->view($module.'/'.$addoncust);  
        }
      }
    ?>
  </body>
</html>