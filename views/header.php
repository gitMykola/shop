<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title><?php echo $placeholders['title'];?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $placeholders['site_url'];?>assets/css/f16.css">
		<link rel="stylesheet" href="<?php echo $placeholders['site_url'];?>assets/css/my.css">
		<link rel="stylesheet" href="<?php echo $placeholders['site_url'];?>assets/css/animation.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?php echo $placeholders['site_url'];?>assets/js/f16.js"></script>
		<script src="<?php echo $placeholders['site_url'];?>assets/js/my.js"></script>
</head>
	<body>
	
	<?/*
	'<li class="first">FIRST</li>';
			 if($data["paginator"]["page_num"] > 2)echo '<li>...Prev</li>';
			 echo '
			 <li><a href="'.$_SERVER["REQUEST_URI"].'?page_num='.($data["paginator"]["page_num"] - 1).'">'.($data["paginator"]["page_num"] - 1).'</a></li>
			 <li class="current"><a href="'.$_SERVER["REQUEST_URI"].'?page_num='.($data["paginator"]["page_num"]).'">'.($data["paginator"]["page_num"]).'</a></li>
			 <li><a href="'.$_SERVER["REQUEST_URI"].'?page_num='.($data["paginator"]["page_num"] + 1).'">'.($data["paginator"]["page_num"] + 1).'</a></li>';
			 if(($data["paginator"]["page_num"] + 2) < $data["paginator"]["last_page"])echo '<li>Next...</li>
			 <li class="last">LAST</li>' */