<div>
<?php
	   foreach ($projects as $row)
	   {
	      echo $row->County.'<br>';
	      echo $row->Constituency.'<br>';
	      echo $row->Project_name.'<br>';
	   }

	   echo $title;
?>

</div>

		$this->load->view('/layout/libs');
		$this->load->view('/layout/header');
		$name = $this->input->post('county');
		$query =$this->commons_model->search($name);
		$data['projects']=$query->result();
		$data['title'] = "countyeye";
		$data['records']= $query->num_rows();

		if ($query->num_rows() > 0)
		{	
			$this->googlemaps->intialize();
			$data['maps']= $this->Googlemaps->create_map();
			$this->load->view('project_view',$data);
		}

		else{
			echo 'error';
		}


		<body onload="initialize()">
	<div class="navbar">
	    <div class="navbar-inner">
	        <div class="container">
	            <div class="navbar-item">
	                <a class="navbar-logo pull-left " title="Go to homepage" href="/">&nbsp;</a>
	            </div>
				<div class="nav-collapse in collapse" style="height: auto;">
				    <ul class="nav pull-right">			        
			            <li id="browse-collapsed"><a href="/browse">Browse icons</a></li>
			            <li class="divider"></li>
			            <li class="navbar-item"><a class="login-link" href="#">Log in</a></li>
			            <li class="navbar-item"><a class="signup-link" href="#">Sign up</a></li>
				        
				    </ul>
				</div>
	        </div>
	    </div>
	</div>

	<div class="custom-container">
		<div class="records-display">
			<p> <?php echo $records; ?> Projects Found</p>
		</div>
		<div class="info-display">

		</div>
		<div class="map-canvas" style="width:90%; height:80%">
			<?php echo $map['html']; ?>
		</div>

	</div>
</body>