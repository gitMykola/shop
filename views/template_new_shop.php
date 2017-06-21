<?php include_once 'views/header.php';
 if($data['id'] == '')
		echo '
		<div class="container" id="new">
			<form method="POST" action="/shop/create">
			  <div class="form-group">
				<label for="name">Shop name</label>
				<input type="text" class="form-control" name="name" id="name">
			  </div>
			  <div class="form-group">
				<label for="address">Shop Address</label>
				<input type="text" class="form-control" name="address" id="address">
			  </div>
			  <button type="submit" class="btn btn-default">Create</button>
			</form>
		</div>';
		else {
				if($data['error']['status'])echo "
						<div>
							<h1>Warning! Shop don't created.</h1>
							<h3>Error ".$data['error']['text']."</h3>
						</div>
						";
				else
						echo '
					<div>
						<h1>Congatulations! Shop created whit ID = '.$data['id'].'</h1>
					</div>
					';
			  }		
	 include_once 'views/footer.php';?>	