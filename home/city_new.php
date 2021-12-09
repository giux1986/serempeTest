<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";

$city = new Cities;


if(isset($_POST['new_city'])){

    $name           =   cleaninput($_POST['name']);

    if($name==""){
        $errormsg .= "Sorry name cant be empty<br>";
    }

    if( $errormsg==""){
       
        $city->setvalues($name);

        $isinsert = $city->insert();

       

        if($isinsert){
            $infomesg = "City Created.";
        }
    }

    $name       = "";
            
}


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
                <div class="card-header">Create City</div>
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

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" required="" autofocus="">                              

                                                            </div>
                        </div>

                     


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="new_city"  class="btn btn-primary">
                                    Create City
                                </button>
                                <a href="<?php echo url('cities'); ?>"   class="btn btn-success colorwhite">
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
                name: "required"
            },
            messages: {
                name: "Please enter a name"
    
            },
            submitHandler: function(form) {
                form.submit();
            }
    
        });
    
    </script>

</body>
</html>