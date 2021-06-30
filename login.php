<?php
//fungsi base url
function base_url($url=null){
	$base_url = "http://localhost/ksp2020";
	if($url !=null){
		return $base_url."/".$url;
	}
	else{
		return $base_url;
	}
}
if(isset($_SESSION['user'])){
	echo"<script>window.location='".base_url()."';</script>";
}
else{
	
}
?>

<html>
<head>
	<title>Form Login KSP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body>
<div class="container ">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please <span class="font-weight-bold text-success">LOGIN</span></h5></div>
            <div class="card-body">
              <form action="proses.php" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Login" class="btn btn-success btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>