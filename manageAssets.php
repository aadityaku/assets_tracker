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
           <div class="container my-4">
                   <div class="row">
                       <div class="col-9">
                            <h2 class="h5">Manage Asset(<?= countData("asset");?>)</h2>
                       </div>
                     
                     <div class="col-3"><a href="addAssets.php" class="btn btn-success float-end">Add Asset</a></div>
                     
                   </div>
               </div>
             <table class="table">
                 <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Code</th>
                     <th>Type</th>
                     <th>Image</th>
                     <th>status</th>
                     <th>Action</th>
                 </tr>
                 <?php
                 $call=callingData("asset");
                 foreach($call as $val){
                 ?>
                 <tr>
                     <td><?= $val['assets_id'];?></td>
                     <td><?= $val['assets_name'];?></td>
                     <td><?= $val['assets_code'];?></td>
                     <td><?= $val['assets_type'];?></td>
                     <td><img src="images/<?= $val['assets_image'];?>" width="50px" alt=""></td>
                     <td><?= $val['status'];?></td>
                     <td>
                         <a href="manageAssets.php?id=<?= $val['assets_id'];?>" class="btn btn-danger">Delete</a>
                         <a href="" class="btn btn-success">Edit</a>
                     </td>
                 </tr>
                 <?php }?>
             </table>
           </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    deleteData("asset","assets_id='$id'");
    refresh("manageAssets.php");
}
?>