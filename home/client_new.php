<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";

$client = new Clients;


if(isset($_POST['new_client'])){

    $name           =   cleaninput($_POST['name']);
    $code           =   cleaninput($_POST['code']);
    $picture        =   cleaninput($_POST['picture']);
    $city           =   cleaninput($_POST['cityhidden']);

    if($name==""){
        $errormsg .= "Sorry name cant be empty<br>";
    }
    if($code==""){
        $errormsg .= "Sorry code cant be empty<br>";
    }
    if($picture==""){
        $errormsg .= "Sorry picture cant be empty<br>";
    }
    if($city==""){
        $errormsg .= "Sorry city cant be empty<br>";
    }

    if( $errormsg==""){
       
        $client->setvalues($name, $code,$picture,$city);

        $isinsert = $client->insert();

       

        if($isinsert){
            $infomesg = "Client Created.";
        }
    }

    $name       = "";
    $code       = "";
    $picture    = "";
    $city       = "";
            
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
                <div class="card-header">Create Client</div>
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
                   <form method="POST" action="" id="create_client" autocomplete="off">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" required="" autofocus="">                              

                                                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control " name="code" required="" autofocus="">                              

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="text" class="form-control " name="picture" required="" autofocus="">                              

                                                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                

                                <input id="cityhidden" type="hidden" class="form-control " name="cityhidden"  value="" required>  
                                <input id="city" type="text" class="form-control " name="city"  required="" autofocus="">                              
                                <div id="suggestions"></div>
                             </div>
                        </div>
                     


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="new_client"  class="btn btn-primary">
                                    Create Client
                                </button>
                                <a href="<?php echo url('clients'); ?>"   class="btn btn-success colorwhite">
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
                name: "required",
                code: "required",
                picture: "required",
                city: "required",
                cityhidden:"required"
            },
            messages: {
                name: "Please enter a name",
                code: "Please enter a code",
                picture: "Please select a picture",
                city: "Please select a city",
                cityhidden: "Please select a city from the suggestion list"
    
            },
            submitHandler: function(form) {
                var city=$("#cityhidden").val();
                if(city==""){
                    alert("Please Please select a city from the suggestion list");
                    $("#city").val("");
                    $("#city").focus();
                }
                else{
                    form.submit();
                }
                
            }
    
        });
    
    </script>

</body>
</html>