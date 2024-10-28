<?php //include('config.php');
session_start();
include 'dbconnection/connection.php';
require_once __DIR__ . '/vendor/autoload.php';

if ($_SESSION['user']) 
{
    $name = $_SESSION['user'];
//include('org1.php');

    include 'dbfiles/org.php';
    include 'dbfiles/uqry_emp.php';
    ?>
     <?php


$id = isset($_GET['id']) ? mysqli_real_escape_string($link, $_GET['id']) : '';
$query = "select * from emp where empid='$id' ORDER BY id DESC";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Error: " . mysqli_error($link));
}

$r = mysqli_fetch_array($result, MYSQLI_ASSOC);


ob_start(); // Start output buffering
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'template/headerfile.php';?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
        table, th, td {
  border: 1px solid black;

}
table{
     width:100%;
}

body {
            background-color: white; /* Sets the background color of the entire page */
            margin: 0; /* Removes default margin */
            padding: 0; /* Removes default padding */
        }

		.numbered-box {
            border: 2px solid black;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            width: 50px; /* Adjust width as needed */
            background-color: white; /* Optional background color */
        }


.box {
            border: 2px solid black;
            padding: -10px 50px;
            text-align: center;
            font-weight: bold;
            display: inline-block;
            margin: 30px 550px;
			width: 270px;
            font-family: Arial, sans-serif;
            font-size: 5px; /* Adjust this size according to your preference */
        }

		.box-small {
            padding: -50px 10px; /* Reduced padding for smaller box */
            font-size: 16px;
			width: 270px;
			margin-top: 20px;
			
        }

		h2 {
            margin: 2px 0; /* Decrease the margin to reduce the gap */
            font-size: 18px; /* Ensure the font size is consistent with the box */
        }

		table, th, td {
        border: 1px solid black;
 
        }

        table{
        /* width:-100%; */
		margin: 10px 350px; /* Up and side */
		
        }




    </style>
	
    <body class="no-skin">

         
	



                      <?php $id = $_GET['id'];

//include('config.php');

    $res = mysqli_query($link, "select * from emp where empid='$id'") or die(mysqli_error());
    $rw = mysqli_fetch_array($res) or die(mysqli_error());
//$to=$rw['btype'];
//$msg=$rw['msg'];
//     $employeeId = $rw['employeeid'];
// //echo($employeeId);
//     $certquery = mysqli_query($link, "select * from certificates where employeeid = '$employeeId'");
//     $crows = mysqli_num_rows($certquery);
//echo($check_num_rows);
    $address = $rw['address'];

	
	

    ?>

                                <div style=" text-align: center;" class="box">
								        <p><h2 style="font-weight: bold;">Form "Q"</h2>
                                   		<h2 style="font-weight: bold;">SEE RULE 24 (9A)</h2></p>
								</div>

								<div class="box box-small">
									<h2 style="font-weight: bold;">APPOINTMENT ORDER</h2>
								</div> 
							 <br/>

							 <table   style="border:1px solid black;width:50%;" >
							 
							        <tr style="border:1px solid black;">
									<td class="numbered-box">1</td>
											    <td style="border:2px solid black; bold;"><P><b>NAME & ADDRESS OF THE ESTABLISHMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['address']; ?></td>
											</tr>
											<tr style="border:1px solid black;">
											<td class="numbered-box">2</td>
											    <td style="border:2px solid black; bold;" ><P><b>NAME & ADDRESS OF THE EMPLOYER</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">3</td>
											    <td style="border:2px solid black; bold;" ><P><b>NAME OF THE EMPLOYEE</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['emp_name']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">4</td>
											    <td style="border:2px solid black; bold;" ><P><b>HIS/HER POSTAL ADDRESS</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">5</td>
											    <td style="border:2px solid black; bold;" ><P><b>HIS/HER PERMANENT ADDRESS</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['permaddress']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">6</td>
											    <td style="border:2px solid black; bold;" ><P><b>PARENT/SPOUSE NAME</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">7</td>
											    <td style="border:2px solid black; bold;" ><P><b>DATE OF BIRTH</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['DOB']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">8</td>
											    <td style="border:2px solid black; bold;" ><P><b>DATE OF HIS/HER ENTRY IN TO EMPLOYEMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">9</td>
											    <td style="border:2px solid black; bold;" ><P><b>DESIGNATION</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['designation']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">10</td>
											    <td style="border:2px solid black; bold;" ><P><b>NATURE OF WORK ENSTRUSTED TO HIM/HER</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">11</td>
											    <td style="border:2px solid black; bold;" ><P><b>HIS/HER SERIAL NUMBER IN THE REGISTER OF EMPLOYMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['empid']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">12</td>
    <td style="border:2px solid black; font-weight: bold;">
        <p><b>RATE OF WAGES PAYABLE TO HIM/HER</b></p>
    </td>
    <td style="border:2px solid black;">
        <div style="display: flex; flex-direction: column;">
            <div style="margin-bottom: 5px;">
                <b>Basic + DA:</b> <?php echo $rw['basic_da']; ?>
            </div>
            <div style="margin-bottom: 5px;">
                <b>Other Allowances:</b> <?php echo $rw['other_allowances']; ?>
            </div>
            <div>
                <b>Total:</b> <?php echo $rw['total']; ?>
            </div>
        </div>
    </td>
</tr>
							 </table>

							 <div class="acknowledgement-container">
							   <!-- <p class="place" style="margin-left:300px; font-weight:bold;">Place: Bangalore</p> -->
							   <h3 style="text-align: right; margin-right: 835px;">Place: Bangalore.</h3>
							   <h3 style="text-align: right; margin-right: 947px;">Date:</h3>
							   <h3 style="text-align: right; margin-right: 660px; margin-top: 45px;">Acknowledgement by the employee:</h3>
							   <h3 style="text-align: right; margin-right: 380px; margin-top: -70px;">Seal of the Establishment</h3>
                             </div>
							 <br><br><br><br>

							 <button class="btn btn-info" type="submit" name="download" id="download"  onclick="javascript:location.href='download1.php?state=<?php echo $id ?>'"style="float: right; margin-right: 560px;">Download PDF</button>

							

							 <br><br><br><br><br><br><br>

							 
												   
							                 


		<!-- inline scripts related to this page -->
</body>
<?php mysqli_close($link);?>
</html>

<?php

    $body = ob_get_clean();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($body);

// Output PDF with dynamically generated filename
    $filename = 'Employee -' . date('d-m-Y') . '.pdf';
    $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);

	echo "<script type=\"text/javascript\">


    location.href = 'download.php?qt=$qtno';
   setTimeout(\"DoTheRedirect('employeelist.php?state=$state')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
}else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');

}

?>
	?>