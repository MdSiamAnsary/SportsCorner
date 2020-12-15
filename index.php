<?php

	session_start();
	include_once('dbcon.php');

	$errorlogin = false;
	

	if(isset($_POST['btn-login']))
	{
		$email = trim($_POST['email']);
    	$email = htmlspecialchars(strip_tags($email));

    	$password = trim($_POST['password']);
    	$password = htmlspecialchars(strip_tags($password));

    	if(empty($email))
    	{
        	$errorlogin = true;
        	$errorloginEmail = 'Please input email';
            $errorloginMsg = 'Invalid Email or Password';
    	}
    	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    	{
        	$errorlogin = true;
        	$errorloginEmail = 'Please enter a valid email address';
            $errorloginMsg = 'Invalid Email or Password';
    	}

    	if(empty($password)){
        	$errorlogin = true;
        	$errorloginPassword = 'Please enter password';
            $errorloginMsg = 'Invalid Email or Password';
    	}
    	elseif(strlen($password)< 6)
    	{
        	$errorlogin = true;
        	$errorloginPassword = 'Password at least 6 character';
            $errorloginMsg = 'Invalid Email or Password';
    	}

    	if(!$errorlogin)
    	{
        
        	$sql = "select * from userstable where email='$email' ";
        	$result = mysqli_query($conn, $sql);
        	$count = mysqli_num_rows($result);
        	$row = mysqli_fetch_assoc($result);

        	if($count==1 && $row['password'] == $password)
        	{
            	$_SESSION['username'] = $row['username'];
            	header('location: home.php');
        	}else
        	{
            	$errorloginMsg = 'Invalid Email or Password';
        	}
    	}
	}


	$error = false;

	if(isset($_POST['btn-register']))
	{

        $name = $_POST['registername'];
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

		$username = $_POST['registerusername'];
    	$username = strip_tags($username);
    	$username = htmlspecialchars($username);

    	$email = $_POST['registeremail'];
    	$email = strip_tags($email);
    	$email = htmlspecialchars($email);

    	$password = $_POST['registerpassword'];
    	$password = strip_tags($password);
    	$password = htmlspecialchars($password);

    	//validate

        if(empty($name)){
            $error = true;
            $errorName = 'Please input name';
            $regMsg = 'Registration unsuccessful';
        }

    	if(empty($username)){
        	$error = true;
			$errorUsername = 'Please input username';
			$regMsg = 'Registration unsuccessful';
    	}elseif(strlen($username) < 6){
            $error = true;
            $errorUsername = 'Username must be at least 6 characters';
            $regMsg = 'Registration unsuccessful';
        }
        elseif(strlen($username) > 10){
            $error = true;
            $errorUsername = 'Username must be at most 10 characters';
            $regMsg = 'Registration unsuccessful';
        }

    	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        	$error = true;
			$errorEmail = 'Please a valid input email';
			$regMsg = 'Registration unsuccessful';
    	}

        $sql = "select * from userstable where email='$email' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        $sql1 = "select * from userstable where password='$password' ";
        $result1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($result1);
        $row1 = mysqli_fetch_assoc($result1);

        if($count>=1)
        {
           $error = true;
		   $errorEmail = 'Email already exists; Please enter another one.';
		   $regMsg = 'Registration unsuccessful';
           
        }

        if($count1>=1)
        {
           $error = true;
		   $errorPassword = 'Password already exists; Please enter another one.';
		   $regMsg = 'Registration unsuccessful';
        }

        if($count>=1 AND $count1>=1)
        {
           $error = true;
           $errorEmail = 'Email already exists; Please enter another one.';
		   $errorPassword = 'Password already exists; Please enter another one.';
		   $regMsg = 'Registration unsuccessful';
        }

    	if(empty($password)){
        	$error = true;
			$errorPassword = 'Please password';
			$regMsg = 'Registration unsuccessful';
    	}elseif(strlen($password) < 6){
        	$error = true;
			$errorPassword = 'Password must be at least 6 characters';
			$regMsg = 'Registration unsuccessful';
    	}
        elseif(strlen($password) > 10){
            $error = true;
            $errorPassword = 'Password must be at most 10 characters';
            $regMsg = 'Registration unsuccessful';
        }

       
    	if(!$error){
			$sql = "insert into userstable(name, username, email ,password) values('$name', '$username', '$email', '$password')";
			
        	if(mysqli_query($conn, $sql))
        	{
            	$regSuccessfulMsg = 'Registered successfully. You can now log in';
        	}
        	else{
            	echo 'Error '.mysqli_error($conn);
        	}
    	}
	}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!DOCTYPE html>
<html lang="en">

	<title>Sports Corner</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<script src="jquery/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="icon" href="images/icon.png" type="image/x-icon" />	
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	</head>

	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">
				<BR>
				Sports Corner
			</h2>
			 
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
					
					<?php
						if(isset($regMsg))
						{
                 	?>
                        	<div class="alert alert-success">
								<p id="regunsuccessfulmsg" class="glyphicon glyphicon-info-sign">Registration unsuccessful</p>
                        	</div>
                	<?php
                    	}
                	?>

					<?php
						if(isset($regSuccessfulMsg))
						{
                 	?>
                        	<div class="alert alert-success">
								<p id="regsuccessfulmsg" class="glyphicon glyphicon-info-sign">Registration successful</p>
                        	</div>
                	<?php
                    	}
                	?>

						<fieldset>							
							<p class="text-uppercase pull-center" id="signuptext"> <STRONG>SIGN UP</STRONG> </p>	


                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" name="registername" id="registername" class="form-control" placeholder="Enter name" value="">
                                <span class="text-danger"><?php if(isset($errorName)) echo $errorName; ?></span>
                            </div>

							<div class="form-group">
								<label for="username" class="control-label">Username</label>
                    			<input type="text" name="registerusername" id="registerusername" class="form-control" placeholder="Enter username of length between 6 and 10" value="">
                    			<span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
							</div>

 							<div class="form-group">
								<label for="email" class="control-label">Email</label>
                    			<input type="email" name="registeremail" id="registeremail" class="form-control" autocomplete="off" placeholder="Enter email address" value="">
                    			<span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
							</div>

							<div class="form-group">
								<label for="password" class="control-label">Password</label>
                  				<input type="password" id="registerpassword" name="registerpassword" class="form-control" autocomplete="off" placeholder="Enter password of length between 6 and 10" value="">
                  				<span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
							</div>
							
 							<div>
 								<input type="submit" name="btn-register" class="btn btn-lg btn-primary" id="btn-register" value="Register">
 							</div>

						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					
				</div>
				
				<div class="col-md-5">
 				 		<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

 				 		<?php
                            if(isset($errorloginMsg))
                            {
                        ?>
                            <div class="alert alert-success">
                                <p id="loginunsuccessfulmsg" class="glyphicon glyphicon-info-sign">Log In unsuccessful</p>
                            </div>
                        <?php
                            }
                        ?>

						<fieldset>							
							<p class="text-uppercase" id="logintext"> <STRONG>Log In</STRONG></p>	
 								
							<div class="form-group">
								<label for="email" class="control-label">Email</label>
                    			<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email address" value="">
                    			<span class="text-danger"><?php if(isset($errorloginEmail)) echo $errorloginEmail; ?></span>
							</div>
							<div class="form-group">
								<label for="password" class="control-label">Password</label>
                    			<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter password" value="">
                    			<span class="text-danger"><?php if(isset($errorloginPassword)) echo $errorloginPassword; ?></span>
							</div>
							<div>
								<input type="submit" name="btn-login" id="btn-login" value="Login" class="btn btn-primary">
							</div>
								 
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
		<p class="text-center" id="paraabout">
			<br>
			This is created to do testing with Selenium by <strong>Md Siam Ansary ID 201103</strong>
		</p>
	</div>

	</body>
	 

</html>