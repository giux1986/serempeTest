<?php

include 'session_home.php';




 $users = new Users;

$errormsg = "";
$infomesg = "";

if(isset($_POST['loginnow'])){


        $username           =   cleaninput($_POST['username']);
        $password           =   cleaninput($_POST['password']);




   if($users->Query("SELECT * FROM users WHERE username = ?", [$username])){

    if($users->CountRows() > 0){

        $row = $users->Single();
        $password_real   = decryptdata($row->password);
        $idis   = $row->uid;

        if($password_real == $password)
        {
             $infomesg .= "Password Matched<br>";
        }
        else
        {
             $errormsg .= "Wrong Username or Password<br>";
        }

    }
    else
        {
             $errormsg .= "Wrong Username or Password<br>";
        }

    }


   if($errormsg == ""){

            $infomesg .= "Logined";
            $_SESSION['idis'] = $idis;
            header("location: ".url("home"));
            exit();
            
     }

   }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Test Serempe</title>
	
	<?php
	
	include 'includes/header.inc.php';
	
	?>	
	
</head>
<body>


	<?php

	include 'includes/top.inc.php';

	?>

	
	
	 <!-------------------PAGE Content---------------------->



	 <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <?php if(isset($_SESSION['messeage_d'])){ ?>
                <div class="alert alert-success" style="text-align: center;">               
                  <?php 

                  		echo $_SESSION['messeage_d'];

                  		unset($_SESSION['messeage_d']);

                   ?>
                </div>
                <?php } ?>

                <?php if($infomesg != ""){ ?>
                <div class="alert alert-success" style="text-align: center;">               
                  <?php echo $infomesg; ?>        
                </div>
                <?php } ?>

                <?php if($errormsg != ""){ ?>
                <div class="alert alert-danger" style="text-align: center;">               
                  <?php echo $errormsg; ?>        
                </div>
                <?php } ?>
				                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control " name="username" value="" required="" autocomplete="username" autofocus="">

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required="" autocomplete="current-password">

                                                            </div>
                        </div>

                     
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="loginnow" class="btn btn-primary">
                                    Login
                                </button>

                                       
                                                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





	 
	<?php

	include 'includes/footer.inc.php';

	?>


</body>
</html>