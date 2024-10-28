
    
<?php
include('dbconnection/connection.php');
$state = $_GET['state'];
echo "<script>
alert('Appointment Category Not Updated! Please Update Appointment Category to Download PDF!');
window.location.href='al_list.php?state=$state';
</script>";
?>
