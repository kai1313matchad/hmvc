<!DOCTYPE html>
<html>
<head>
	<!-- Page Title -->
  <title>Match Ad Online</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Addon Meta -->
  <?php 
    if(isset($meta_add))
    {
      foreach ($meta_add as $meta)
      {
        echo $meta."\n";
      }
    }
  ?>

  <!-- Icon -->
  <link rel="icon" href="<?php echo base_url();?>assets/frontend/images/icons/favicon.png"/>

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
  	if($shop_css)
  	{
  		$this->load->view('shop_css'); 
  	}
  ?>
</head>
<body class="animsition">
	<?php $this->load->view('shop_header'); ?>

	<?php $this->load->view($module.'/'.$content); ?>

	<?php $this->load->view('shop_footer'); ?>

	<?php $this->load->view('shop_js'); ?>

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

  <?php $this->load->view('shop_custmainjs'); ?>

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