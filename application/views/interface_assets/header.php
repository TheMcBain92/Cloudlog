<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/general.css">

    <!-- Maps -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/leaflet/leaflet.css" />

    <?php if ($this->uri->segment(1) == "search" && $this->uri->segment(2) == "filter") { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/query-builder.default.min.css" />
	<?php } ?>

	<?php if ($this->uri->segment(1) == "notes" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit") ) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/quill/quill.snow.css" />
	<?php } ?>

	<?php if ($this->uri->segment(1) == "qrz") { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/loading.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/ldbtn.min.css" />
	<?php } ?>

      <?php if ($this->uri->segment(2) == "was") { ?>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrapdialog/css/bootstrap-dialog.min.css" />
      <?php } ?>

 	<?php if ($this->uri->segment(1) == "adif") { ?>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
  	<?php } ?>
    <!--<link rel="icon" href="<php echo base_url(); ?>/favicon.ico">-->
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url(); ?>/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">	

    <title><?php if(isset($page_title)) { echo $page_title; } ?> - McBainSite-Cloudlog</title>
  </head>
  <body>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light main-nav">
<div class="container">
		<a class="navbar-brand" href="<?php echo site_url(); ?>">Cloudlog</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

		<div class="collapse navbar-collapse" id="navbarNav">
    
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('logbook');?>">Logbook</a>

        <?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
        	<!-- QSO Menu Dropdown -->
        	<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">QSO</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo site_url('qso?manual=0');?>" title="Log Live QSOs">Live QSO</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo site_url('qso?manual=1');?>" title="Log QSO made in the past">Post QSO</a>
						</div>
        	</li>

        	<!-- Notes -->
        	<a class="nav-link" href="<?php echo site_url('notes');?>">Notes</a>
 
        	<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Analytics</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo site_url('statistics');?>" title="Statistics">Statistics</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo site_url('gridsquares');?>" title="Gridsquares">Gridsquares</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('distances');?>" title="Distances">Distances worked</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('dayswithqso');?>" title="Dayswithqso">Days with QSOs</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('timeline');?>" title="Dxcctimeline">DXCC Timeline</a>
				</div>
        	</li>

        	<a class="nav-link" href="<?php echo site_url('awards/dxcc');?>">Awards</a>

        	
        	<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
				
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo site_url('user');?>" title="Accounts"><i class="fas fa-user"></i> Accounts</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('api/help');?>" title="API Interface"><i class="fas fa-key"></i> API</a>
					
					<div class="dropdown-divider"></div>					
					
					<a class="dropdown-item" href="<?php echo site_url('station');?>" title="Station Profiles"><i class="fas fa-home"></i> Station Profiles</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('mode');?>" title="QSO Modes"><i class="fas fa-broadcast-tower"></i> QSO Modes</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('radio');?>" title="External Radios"><i class="fas fa-broadcast-tower"></i> Radio Interface</a>
					
					<div class="dropdown-divider"></div>	
					
					<a class="dropdown-item" href="<?php echo site_url('adif');?>" title="ADIF Import/Export"><i class="fas fa-sync"></i> ADIF Import/Export</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('lotw');?>" title="LoTW Import"><i class="fas fa-sync"></i> Logbook of the World</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('eqsl/import');?>" title="eQSL Import/Export"><i class="fas fa-sync"></i> eQSL</a>
					
					<div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?php echo site_url('qrz/export');?>" title="QRZ.com Export"><i class="fas fa-sync"></i> QRZ Logbook</a>

                    <div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('qslprint');?>" title="Print Requested QSLs"><i class="fas fa-print"></i> Print Requested QSLs</a>

					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('backup');?>" title="Backup Cloudlog"><i class="fas fa-save"></i> Backup</a>

					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="<?php echo site_url('update');?>" title="Update Country Files"><i class="fas fa-sync"></i> Update Country Files</a>
				</div>
        	</li>
        <?php } ?>
    </ul>

     <?php if($this->config->item('public_search') == TRUE || $this->session->userdata('user_type') >= 2) { ?>
		<form method="post" action="<?php echo site_url('search'); ?>" class="form-inline">
		<input class="form-control mr-sm-2" id="nav-bar-search-input" type="search" name="callsign" placeholder="Search Callsign" aria-label="Search">
		
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
		</form>
	<?php } ?>

	<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
    	<!-- Logged in Content-->
    <?php } else { ?>
    <!-- Not Logged In-->
	<form method="post" action="<?php echo site_url('user/login'); ?>" style="padding-left: 5px;" class="form-inline">
			<input class="form-control mr-sm-2" type="text" name="user_name" placeholder="Username" aria-label="Username">
			<input class="form-control mr-sm-2" type="password" name="user_password" placeholder="Password" aria-label="Password">
			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>" />
      <button class="btn btn-outline-success mr-sm-2" type="submit">Login</button>
	</form>
	<?php } ?>

		<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
        <ul class="navbar-nav">
        <!-- Logged in As -->
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logged in as <?php echo $this->session->userdata('user_callsign'); ?></a>
			
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?php echo site_url('user/profile');?>" title="Profile"><i class="far fa-user"></i> Profile</a>
				
				<div class="dropdown-divider"></div>
				
				<a class="dropdown-item" target="_blank" href="https://github.com/magicbug/Cloudlog/wiki" title="Help"><i class="fas fa-question"></i> Help</a>
				
				<div class="dropdown-divider"></div>

				<a class="dropdown-item" target="_blank" href="https://forum.cloudlog.co.uk" title="Forum"><i class="fas fa-question"></i> Forum</a>
				
				<div class="dropdown-divider"></div>
				
				<a class="dropdown-item" href="<?php echo site_url('user/logout');?>" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
			</div>
        </li>
    	</ul>

        <?php } ?>

  </div>
</div>
</nav>