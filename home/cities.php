<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";
$city = new Cities;


if(isset($_GET["did"]) && $_GET["did"]!=""){
    $city->Query("DELETE  FROM cities WHERE id='". $_GET["did"]."' ");
    $infomesg = "City Deleted.";
}


$city->Query("Select * FROM cities");
$all_cities= $city-> FetchAll();




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

    
    



     <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cities List</div>
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
                <div class="col-12 text-right" style="margin-top:20px">
                        <a href="<?php echo url("cities/create");?>" class="btn btn-small btn-success colorwhite">Create City</a>
                </div>
                <div class="card-body">


                    <table id="clients" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_cities as $city){

                            ?>
                            <tr>
                                <td><?php echo $city->name;?></td>
                                <td class="text-right">
                                    <a href="<?php echo url("cities/".$city->id."/edit");?>" class="btn btn-small btn-success colorwhite">Edit</a>
                                    <a href="<?php echo url("cities/".$city->id."/delete");?>" class="btn btn-small btn-danger colorwhite">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>





     
    <?php

    include '../includes/footer.inc.php';

    ?>
    <script>
        $(document).ready(function() {
            $('#clients').DataTable( {
                "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]]
            } );
        } );
    </script>

</body>
</html>