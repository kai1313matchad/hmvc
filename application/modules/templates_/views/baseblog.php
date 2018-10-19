<!DOCTYPE html>
<html>
<head>
	<!-- Page Title -->
  <title>Matchadonline</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/frontend/images/icons/favicon.png"/>

  <!-- Basic Css -->
  <?php
  	if($basic_css)
  	{
  		$this->load->view('basic_css'); 
  	}  	
  ?>

  <!-- Addon Css -->
  <?php
  	if(isset($addon_css))
  	{
  		foreach ($addon_css as $addon)
  		{
  			$this->load->view($module.'/'.$addon);	
  		}  		
  	}
  ?>

  <!-- custom css -->
  <?php
  	if($blog_css)
  	{
  		$this->load->view('blog_css'); 
  	}
  ?>
</head>
<body class="animsition">
	<?php $this->load->view('blog_header'); ?>

	<?php $this->load->view($module.'/'.$content); ?>

	<?php $this->load->view('blog_footer'); ?>

	<?php $this->load->view('blog_js'); ?>

	<!-- Addon JS -->
  <?php
  	if(isset($addon_js))
  	{
  		foreach ($addon_js as $addon)
  		{
  			$this->load->view($module.'/'.$addon);	
  		}  		
  	}
  ?>

  <?php $this->load->view('blog_custmainjs'); ?>

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