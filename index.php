<?php

include "config.php";
loginRequired();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assets Trackers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <?php include "include/header.php";?>
   <div class="container-fluid">
        <div class="row">
   <?php include "include/side.php";?>
  
           
           <div class="col-10">
               <div class="row mt-2">
                   <div class="col-4">
                       <div class="card bg-success text-white">
                           <div class="card-body">
                                <h3><?= countData("asset_type"); ?></h3>
                                <h4>Total Assets tracker</h4>
                           </div>
                           
                       </div>
                   </div>
                   <div class="col-4">
                       <div class="card bg-danger text-white">
                           <div class="card-body">
                                <h3><?= countData("asset");?></h3>
                                <h4>Total Assets</h4>
                           </div>
                           
                       </div>
                   </div>
                   <div class="col-4">
                       <div class="card bg-warning text-white">
                           <div class="card-body">
                                <h3>1+</h3>
                                <h4>Accounts</h4>
                           </div>
                           
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</body>
</html>

