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
                            <h2 class="h5">Manage Assets Type(<?= countData("asset_type");?>)</h2>
                       </div>
                     
                     <div class="col-3"><a href="addAssetsType.php" class="btn btn-success float-end">Add Assets type</a></div>
                     
                   </div>
               </div>
              <table class="table">
                  <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Action</th>
                  </tr>
                  <?php
                  $data=callingData("asset_type");
                  foreach($data as $value){
                      ?>
                      <tr>
                          <td><?= $value['id'];?></td>
                          <td><?= $value['asset_type_name'];?></td>
                          <td><?= $value['asset_type_descr'];?></td>
                          <td>
                              <a href="manageAssetsType.php?id=<?= $value['id'];?>" class="btn bg-success btn-sm">Delete</a>
                              <a href="" class="btn bg-danger btn-sm">Edit</a>
                              
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
    deleteData("asset_type","id='$id'");
    refresh("manageAssetsType.php");
}
?>