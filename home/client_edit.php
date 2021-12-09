<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";
$client = new Clients;
$cityR = new Cities();


if(isset($_POST['edit_client'])){


    $id             =   $_REQUEST['cid'];
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
    
    if($city==""){
        $errormsg .= "Sorry city cant be empty<br>";
    }

    if( $errormsg==""){
       
        $client->setvalues($name, $code,$picture,$city);

        $isedit = $client->update($id);

       

        if($isedit){
            $infomesg = "Client Edited.";
        }
    }

    $name       = "";
    $code       = "";
    $picture    = "";
    $city       = "";
            
}
$client->Query("Select * FROM clients WHERE id='".$_REQUEST["cid"]."'");
$this_client= $client-> Single();

$cityR->Query("Select * FROM cities WHERE id='".$this_client->city."'");
$realCity= $cityR-> Single();

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
                <div class="card-header">Edit Client</div>
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
                        <input type="hidden" name="cid" value="<?php echo $_REQUEST["cid"];?>">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="<?php echo $this_client->name;?>" required="" autofocus="">                              

                                                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control " name="code" value="<?php echo $this_client->code;?>" required="" autofocus="">                              

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="text" class="form-control " name="picture" required="" value="<?php echo $this_client->picture;?>" autofocus="">                              

                                                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                 <input id="cityhidden" type="hidden" class="form-control " value="<?php echo $this_client->city;?>" name="cityhidden"  value="" required>  
                                <input id="city" type="text" class="form-control " name="city" value="<?php echo $realCity->name;?>"  required="" autofocus="">                        
                                <div id="suggestions"></div> 

                                                            </div>
                        </div>
                     


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="edit_client"  class="btn btn-primary">
                                    Update Client
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
                city: "required"
            },
            messages: {
                name: "Please enter a name",
                code: "Please enter a code",
                picture: "Please select a picture",
                citu: "Please enter a city"
    
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