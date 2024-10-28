<?php 


if(isset($_POST['submit'])){
    $sq = "SELECT * FROM emp WHERE 'adhar' = '$adharcardno'";
    $result = mysqli_query($link,$sq)
    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            echo "<script> alert('wjrhgfjehbf')</script>";
        }
        else{
            header("location:iqry_emp.php");
        }


    }
}

?>