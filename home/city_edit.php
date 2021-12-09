<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";
$city = new Cities();


if(isset($_POST['edit_city'])){


    $id             =   $_REQUEST['cid'];
    $name           =   cleaninput($_POST['name']);

    if($name==""){
        $errormsg .= "Sorry name cant be empty<br>";
    }
    if( $errormsg==""){
       
        $city->setvalues($name);

        $isedit = $city->update($id);

       

        if($isedit){
            $infomesg = "City Edited.";
        }
    }

    $name       = "";
            
}
$city->Query("Select * FROM cities WHERE id='".$_REQUEST["cid"]."'");
$this_city= $city-> Single();

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
                <div class="card-header">Edit City</div>
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="<?php echo $this_city->name;?>" required="" autofocus="">                              

                                                            </div>
                        </div>

                    
                     


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="edit_city"  class="btn btn-primary">
                                    Update City
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
                form.submit();
            }
    
        });
    
    </script>

</body>
</html>