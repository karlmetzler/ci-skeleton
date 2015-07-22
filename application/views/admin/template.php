<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?= $page_title;?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->

	<?= link_tag('css/admin.css');?>
	<?= link_tag('css/smoothness/jquery-ui-1.9.2.custom.min.css');?>
	<?= link_tag('css/lightbox.css');?>
	
	<?
		if(isset($styles))
		{
			foreach($styles as $style)
			{
				echo link_tag($style);
			}
		}
	?>
	

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<?= link_tag('images/icons/favicon.ico', 'shortcut icon', 'image/ico');?>
	<?= link_tag('images/icons/apple-touch-icon.png', 'apple-touch-icon');?>
	<?= link_tag('images/icons/apple-touch-icon-72x72.png', 'apple-touch-icon');?>
	<?= link_tag('images/icons/apple-touch-icon-114x114.png', 'apple-touch-icon');?>
	
	<?= script_tag('scripts/jquery-1.8.3.js');?>
	<?= script_tag('scripts/jquery-ui-1.9.2.custom.min.js');?>
	<?= script_tag('scripts/NFLightBox.js');?>
	
	<?
		if(isset($scripts))
		{
			foreach($scripts as $item)
			{
				echo script_tag($item);
			}
		}
	?> 


</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container_12" id="wrapper">
		<header class="grid_12">
			<div class="grid_3 alpha">
				<?= img(array('src'=>'images/'.$this->config->item('site_logo'),'alt'=>$this->config->item('site_name'),'style'=>'margin-top: 30px; width:220px;'));?>
			</div>
			<div class="grid_5">
				<h1 class="remove-bottom" style="margin-top: 40px"><?= $this->config->item('site_name');?></h1>
				<h5>Version <?= $this->config->item('version');?></h5>		
			</div>
			<div class="grid_4 omega">
				<p class="welcome">
					Welcome Back <span><?= $_SESSION['fname'];?></span>
				</p>
				<ul>
					<li><?= anchor('admin/dashboard','Dashboard');?> </li>
					<li><?= anchor(base_url(),'View Site',array('target'=>'_blank'));?></li>
					<li><?= anchor('admin/dashboard/logout','Log Out');?></li>
				</ul>

				
			</div>
		</header> 
		
		<div class="clear"></div>
		
		<div class="grid_9 push_3">
			<? if($this->session->flashdata('msg')):?>
				<div class="alert alert-success">
					<p><?= $this->session->flashdata('msg');?></p>
				</div>
			<? endif; ?>
			<? if($this->session->flashdata('error')):?>
				<div class="alert alert-error">
					<p><?= $this->session->flashdata('error');?></p>
				</div>
			<? endif; ?>
			<? if($this->session->flashdata('warning')):?>
				<div class="alert alert-message">
					<p><?= $this->session->flashdata('warning');?></p>
				</div>
			<? endif; ?>
			<? $this->load->view($main);?>
		</div>
		
		<div class="grid_3 pull_9" id="main_navigation">
			<h3>Modules</h3>
			<ul>
				
				<li class="gallery"><h4>Image Gallery</h4></li>
				<li><?= anchor('admin/gallery','Manage Image Gallery');?></li>
				<li><?= anchor('admin/gallery/upload','Add Images to Gallery');?></li>

				<li class="sponsors"><h4>Sponsors</h4></li>
				<li><?= anchor('admin/sponsors','Manage Sponsors');?></li>
				<li><?= anchor('admin/sponsors/add','Add Sponsor');?></li>
				
				<li class="outfitters"><h4>Outfitters</h4></li>
				<li><?= anchor('admin/outfitters','Manage Outfitters');?></li>
				<li><?= anchor('admin/outfitters/add','Add Outfitter');?></li>
				
				<li class="news"><h4>News</h4></li>
				<li><?= anchor('admin/news','Manage News Stories');?></li>
				<li><?= anchor('admin/news/add','Add News Story');?></li>
				
				<li class="videos"><h4>Videos</h4></li>
				<li><?= anchor('admin/videos','Manage Videos');?></li>
				<li><?= anchor('admin/videos/add','Add Videos');?></li>
				<li><?= anchor('admin/videos/sort','Sort Videos');?></li>
				
				<li class="settings"><h4>Settings</h4></li>
				<li><?= anchor('admin/settings','Site Settings');?></li>

				
				<li class="mail_list"><h4>Mailing List</h4></li>
				<li><?= anchor('admin/mail_list','Manage Mailing List');?></li>
				<li><?= anchor('admin/mail_list/export','Export Mailing List');?></li>
				
				<li class="users"><h4>Admin Users</h4></li>
				<li><?= anchor('admin/users','Manage Admin Users');?></li>
				<li><?= anchor('admin/users/add','Add Admin User');?></li>
			</ul>
		</div>
		

	</div><!-- container -->
	
	<div class="container_12" id="footer">
		<div class="grid_12">
			<p>copyright &copy; <?= dynamicCopyrightYear(2007);?> <?= $this->config->item('site_owner');?>. All Rights Reserved.</p>
		</div>
	</div>



<!-- End Document
================================================== -->
</body>
</html>