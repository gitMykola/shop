	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	  <div class="navbar-header">
	  <div class="dateStamp">
	  <?php
		  echo "<h3>".date("d").'</h3><h5>'.date("M Y")."</h5>";
		  ?>
	  </div>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
			</button>
		  <a class="navbar-brand text-center" href="javascript:void(0);"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav navbar-right">
		  <li id="loginBlock">
			<a class="" href="javascript:void(0);"
			onclick="$(this.parentNode.getElementsByClassName('slideForm')[0]).slideToggle();">
			<?php echo $placeholders['menu_login'];?>
			<span class="glyphicon glyphicon-log-in"></span></a>
			<form class="slideForm text-left" method=post action="" onsubmit="validForm(this)">
				<label for="loginName" class="col-sm-12"><?php echo $placeholders['slideForm_login'];?></label>
							<input type="text" id="loginName" name=login>
				<label for="loginPass" class="col-sm-12"><?php echo $placeholders['slideForm_password'];?></label>
							<input type="password" id="loginPass" name=passcode>	
				<label class="text-center"><button type=submit >
				<span class="glyphicon glyphicon-ok"></span>
				<?php echo $placeholders['slideForm_apply'];?></button></label>
				<div class="slideFormClose" onclick="$(this.parentNode).slideToggle();"><span class="glyphicon glyphicon-off"></span></div>				
			</form>
		  </li>
		  <li><a href="javascript:void(0);"><?php echo $placeholders['menu_search'];?>
		  <span class="glyphicon glyphicon-search"></span></a></li>
		  
		<ul class="nav navbar-nav navbar-right nav-menu">
		  <li class=""><a href="#"><?php echo $placeholders['menu_home'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		  <li class=""><a href="#infoSlide"><?php echo $placeholders['menu_info'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		  <li class=""><a href="#"><?php echo $placeholders['menu_about'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		  <li class=""><a href="#"><?php echo $placeholders['menu_forum'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		  <li class=""><a href="#"><?php echo $placeholders['menu_blog'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		  <li class=""><a href="#"><?php echo $placeholders['menu_contacts'];?>
		  <div><div></div><div></div><div></div><div></div></div></a></li>
		</ul>
		
		</ul>
		
		</div>
	  </div>
	</nav>
