<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



$errormsg = "";
$infomesg = "";
$user = new Users;


if(isset($_GET["did"]) && $_GET["did"]!=""){
    $user->Query("DELETE  FROM users WHERE uid='". $_GET["did"]."' ");
    $infomesg = "User Deleted.";
}


$user->Query("Select * FROM users");
$all_users= $user-> FetchAll();




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
                <div class="card-header">Users List</div>
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
                        <a href="<?php echo url("users/create");?>" class="btn btn-small btn-success colorwhite">Create User</a>
                </div>
                <div class="card-body">


                    <table id="clients" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_users as $user){

                            ?>
                            <tr>
                                <td><?php echo $user->username;?></td>
                                <td class="text-right">
                                    <a href="<?php echo url("users/".$user->uid."/edit");?>" class="btn btn-small btn-success colorwhite">Edit</a>
                                    <a href="<?php echo url("users/".$user->uid."/delete");?>" class="btn btn-small btn-danger colorwhite">Delete</a>
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