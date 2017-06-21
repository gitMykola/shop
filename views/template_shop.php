<?php include_once 'views/header.php';?>
<!--	<span class="test" style="position:fixed;color:#fff;background:#000;z-index:10;font-size:30px;">111</span> -->
  <?php include_once 'views/top_nav.php';?>
		<div class="container slide" id="startSlide">
			<div class="startText">
				<div class="light"></div>
				<h1 class="f16-red"><?php echo $placeholders['name_osbb'];?></h1>
				<p><?php echo $placeholders['number_osbb'];?></p>
			</div>		
			<h1 class="nameText"><?php echo $placeholders['text_osbb'];?></h1>
		</div>	
		<div class="container" id="infoSlide">
			 <h1><?php foreach($data['data'] as $datarow){
			 echo '<h1>'.$datarow['id'].'</h1><br>'.'<h1>'.$datarow['name'].'</h1><br>'.'<h1>'.$datarow['address'].'</h1><br><br>';}?></h1> 
			 <ul class="paginator">
			 <?php
			 $d = $data['paginator']['page_last'] - $data['paginator']['page_num'];
			 $p = $data['paginator']['page_num'];
			 if($p > 3)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=1#infoSlide\">".(1)."</a></li>";
			 if($p > 4)echo '<li>...</li>';
			 if($p > 2)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_num'] - 2)."#infoSlide\">".($data['paginator']['page_num'] - 2)."</a></li>";
			 if($p > 1)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_num'] - 1)."#infoSlide\">".($data['paginator']['page_num'] - 1)."</a></li>";
			 echo "<li class=\"active\"><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_num'])."#infoSlide\">".($data['paginator']['page_num'])."</a></li>";
			 if($d > 0)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_num'] + 1)."#infoSlide\">".($data['paginator']['page_num'] + 1)."</a></li>";
			 if($d > 1)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_num'] + 2)."#infoSlide\">".($data['paginator']['page_num'] + 2)."</a></li>";
			 if($d > 3)echo '<li>...</li>';
			 if($d > 2)echo "<li><a href=\"http://shop.f16.od.ua/en/shop/start/?page_num=".($data['paginator']['page_last'])."#infoSlide\">".($data['paginator']['page_last'])."</a></li>";
				 ?>
			 </ul>
		</div>
		<div class="container" id="aboutSlide">
		
		</div>
<?php include_once 'views/footer.php';?>