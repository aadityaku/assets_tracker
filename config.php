<?php
$connect=mysqli_connect('localhost','root','','assets');
session_start();
//insert data
function insertData($table,$data){
   global $connect;
  
   $col=implode(",",array_keys($data));
   $value=implode("','",array_values($data));
   $sql=mysqli_query($connect,"insert into $table($col) value('$value')");
   return $sql;
}

//calling data
function callingData($table,$cond=null){
    global $connect;
    if($cond==NULL){
        $query="select * from $table";

    }
    else{
        $query="select * from $table WHERE $cond";
    }
    $data=[];
    $run=mysqli_query($connect,$query);
    while($row=mysqli_fetch_array($run)){
        $data[]=$row;
    }
    return $data;
}
function refresh($page="index.php"){

    echo "<script>window.open('$page','_self')</script>";
}
function deleteData($table,$cond){
    global $connect;
    $query=mysqli_query($connect,"delete from $table where $cond");
    return $query;
}
function singleCalling($table,$cond){
    global $connect;
    $query = "select * from $table where $cond";
    $run=mysqli_query($connect,$query);
    $data=mysqli_fetch_array($run);
    return $data;
}
function loginRequired(){
    if(!isset($_SESSION['admin'])){
        refresh("login.php");
    }
}
//count data
function countData($table){
    global $connect;
    $query = "select * from $table";
    $run=mysqli_query($connect,$query);
    $count=mysqli_num_rows($run);
    return $count;
}
?>