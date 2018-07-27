<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/frontend/images/icons/favicon.png"/>

    <title>Signin Form</title>

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

  <body class="login">
    <?php $this->load->view($module.'/'.$content); ?>
  </body>
</html>
