<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";
$user = new Users;


if(isset($_POST['edit_user'])){


    $id                 =   $_REQUEST['cid'];
    $username           =   cleaninput($_POST['username']);
    $password           =   cleaninput($_POST['password']);

    if($username==""){
        $errormsg .= "Sorry username cant be empty<br>";
    }
    
    
   
    if( $errormsg==""){
       
        $user->setvalues($username, $password);

        $isedit = $user->update($id);

       

        if($isedit){
            $infomesg = "User Edited.";
        }
    }

    $username       = "";
    $password       = "";
            
}
$user->Query("Select * FROM users WHERE uid='".$_REQUEST["cid"]."'");
$this_user= $user-> Single();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Serempe | Dashboard</title>
    
    <?php
    
    include '../includes/header.inc.php';
    
    ?>  
    
</head>
<body>


    <?php

    include '../includes/top.inc.php';

    ?>

    
    
     <!-------------------PAGE Content---------------------->



     <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
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
                   <form method="POST" action="" id="create_client">
                        <input type="hidden" name="cid" value="<?php echo $_REQUEST["cid"];?>">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control " name="username" value="<?php echo $this_user->username;?>" required="" autofocus="">                              

                                                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control " name="password"   autofocus="">                              

                                                            </div>
                        </div>

                     


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="edit_user"  class="btn btn-primary">
                                    Update User
                                </button>
                                <a href="<?php echo url('users'); ?>"   class="btn btn-success colorwhite">
                                    Go Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>





     
    <?php

    include '../includes/footer.inc.php';

    ?>
    <script>
        $('#create_client').validate({
            rules: {
                username: "required"
            },
            messages: {
                username: "Please enter a name"
    
            },
            submitHandler: function(form) {
                form.submit();
            }
    
        });
    
    </script>

</body>
</html>