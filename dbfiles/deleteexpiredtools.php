
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../dbconnection/connection.php';


$parentid = $_REQUEST['id'];
$state = $_REQUEST['state'];
//$img=$_GET['img'];
//unlink('../photos/'.$img);
$query = "delete from employeetoollist where id='$parentid'";
echo $query;
$rst = mysqli_query($link, $query) or die(mysqli_error($link));
if ($rst) {
    print "<script>";
    print "alert('Successfully Uploaded ');";
    print "self.location='../expiredtoollist.php?state=$state';";
    print "</script>";
}
?>