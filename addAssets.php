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
              <div class="row">
                  <div class="col-lg-8 mx-auto">
                      <div class="card">
                          <div class="card-body">
                          <?php
                              $asset_name=$asset_code=$asset_image="";
                              if(isset($_POST['send_assets'])){

                                  if($_POST['asset_name'] == ""){
                                      $asset_name="<p class='text-danger'>Asset Name field required</p>";
                                  }
                                  elseif($_POST['asset_code'] == ""){
                                      $asset_code="<p class='text-danger'>Asset Code field required</p>";
                                  }
                                
                                  elseif($_FILES['asset_image']== ""){
                                      $asset_image="<p class='text-danger'>Asset Image field required</p>";
                                  }
                                  else{

                                  
                                  $dp=$_FILES['asset_image']['name'];
                                  $tmp_file=$_FILES['asset_image']['tmp_name'];
                                  
                                  move_uploaded_file($tmp_file,"images/$dp");
                                  $data=[
                                      'assets_name'=>$_POST['asset_name'],
                                      'assets_code'=>$_POST['asset_code'],
                                      'assets_type'=>$_POST['asset_type'],
                                      'status'=>$_POST['status'],
                                      'assets_image'=>$dp
                                      
                                      
                                  ];
                                  insertData("asset",$data);
                                  refresh();
                                }
                              }
                              ?>
                              <form action="" method="post" enctype="multipart/form-data">
                                  <div class="mb-3">
                                      <label for="">Asset name</label>
                                      <input type="text" name="asset_name" class="form-control">
                                      <?= $asset_name?>
                                  </div>
                                  <div class="mb-3">
                                      <label for="">Asset code</label>
                                      <input type="text" name="asset_code" class="form-control">
                                      <?= $asset_code ?>
                                  </div>
                                  <div class="mb-3">
                                      <label for="">Asset type</label>
                                      <select name="asset_type" class="form-select">
                                          <option value="">Select Assets type</option>
                                          <?php
                                          $call=callingData("asset_type");
                                          foreach($call as $val){
                                              $id=$val['id'];
                                              $name=$val['asset_type_name'];
                                              echo "<option value='$id'>$name</option>";
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="mb-3">
                                      <label for="">Asset Image</label>
                                      <input type="file" name="asset_image" class="form-control">
                                      <?= $asset_image ?>
                                  </div>
                                 
                                 <div class="mb-3">
                                     <label for="" class="d-block">Status</label>
                                     <input type="radio" name="status" value="0" class="me-2" checked>Activate
                                     <input type="radio" name="status" value="1" class="me-2">disabled
                                 </div>
                                 <div class="mb-3">
                                     <input type="submit" name="send_assets" class="btn btn-success">
                                 </div>
                              </form>
                             
                          </div>
                      </div>
                  </div>
              </div>
           </div>
        </div>
    </div>
</body>
</html>