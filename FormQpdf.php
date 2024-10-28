<?php //include('config.php');
session_start();
include 'dbconnection/connection.php';
// include('vendor/autoload.php');
require 'vendor/autoload.php';
// error_reporting(E_ALL);
// ini_set("display_error", 1);
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
//include('org1.php');

    include 'dbfiles/org.php';
    include 'dbfiles/uqry_emp.php';
    ?>
	<?php
	ob_start();
	?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'template/headerfile.php';?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>

body {
            background-color: white; /* Sets the background color of the entire page */
            margin: 0; /* Removes default margin */
            padding: 0; /* Removes default padding */
        }


        strong{
            color:red;
        }
        table, th, td {
  border: 1px solid black;

}
table{
     width:100%;
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
		td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
        .numbered-box {
            border: 2px solid black;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            width: 50px; /* Adjust width as needed */
            background-color: white; /* Optional background color */
        }



    </style>
    <body class="no-skin">

         <?php

    ob_start();?>
	
	



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

<body>
                                 
                                <div style=" text-align: center;" class="box">
								        <p><h2 style="font-weight: bold;">Form "Q"</h2>
                                   		<h2 style="font-weight: bold;">SEE RULE 24 (9A)</h2></p>
								</div>

								<div class="box box-small">
									<h2 style="font-weight: bold;">APPOINTMENT ORDER</h2>
								</div> 
							 <br/>

							 <form name="frm" method="post" action="">
							 <table   style="border:1px solid black;width:50%;" >
							 
							        <tr style="border:1px solid black;">
									<td class="numbered-box">1</td>
											    <td style="border:2px solid black;"><P><b>NAME & ADDRESS OF THE ESTABLISHMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['address']; ?></td>
											</tr>
											<tr style="border:1px solid black;">
											<td class="numbered-box">2</td>
											    <td style="border:2px solid black;" ><P><b>NAME & ADDRESS OF THE EMPLOYER</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">3</td>
											    <td style="border:2px solid black;" ><P><b>NAME OF THE EMPLOYEE</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['emp_name']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">4</td>
											    <td style="border:2px solid black;" ><P><b>HIS/HER POSTAL ADDRESS</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">5</td>
											    <td style="border:2px solid black;" ><P><b>HIS/HER PERMANENT ADDRESS</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['permaddress']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">6</td>
											    <td style="border:2px solid black;" ><P><b>PARENT/SPOUSE NAME</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">7</td>
											    <td style="border:2px solid black;" ><P><b>DATE OF BIRTH</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['DOB']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">8</td>
											    <td style="border:2px solid black;" ><P><b>DATE OF HIS/HER ENTRY IN TO EMPLOYEMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">9</td>
											    <td style="border:2px solid black;" ><P><b>DESIGNATION</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['designation']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">10</td>
											    <td style="border:2px solid black;" ><P><b>NATURE OF WORK ENSTRUSTED TO HIM/HER</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['state']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">11</td>
											    <td style="border:2px solid black;" ><P><b>HIS/HER SERIAL NUMBER IN THE REGISTER OF EMPLOYMENT</b></td></P>
											    <td style="border:2px solid black;"><?php echo $rw['empid']; ?></td>
											</tr>

											<tr style="border:1px solid black;">
											<td class="numbered-box">12</td>
    <td style="border:2px solid black; font-weight:">
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


							 <!-- <table style="width:100%; margin-top: 150px; margin-right:100px;">
                        <tr>   -->
                            <a href="download1.php?id=<?php echo $id;?>" class="btn btn-primary" style="margin-left:650px">Download PDF</a> 
                        <!-- </tr>
                    </table> -->

					<br><br><br>
	                         </form>
							 </body>
							 
						

							 
							 <!-- <table style="width:100%; margin-top: 10px;">
                        <tr>
                            <td style="margin-right:100px">
                            <a href="download1.php?id=<?php echo $id;?>" class="btn btn-primary" style="margin-right:100px">Download PDF</a>
                            </td> 
                        </tr>
                    </table> -->

					
					<!-- <a href="download1.php?id=<?php echo $id;?>" class="btn btn-success" style="margin-right:-100px">Print as PDF</a> -->


							 

							 
												   
							                 <!-- <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Employee Info</h1></p>
												   </div>
                                            <table  style="border:1px solid black;width:100%;" >
                                           <tr style="border:1px solid black;">
											    <td style="border:1px solid black; bold;" ><b>State</b></td>
											    <td style="border:1px solid black;"><?php echo $rw['state']; ?></td>
											    <td style="border:1px solid black;bold;" ><b>Employee ID</b></td>
											     <td style="border:1px solid black;"><?php echo $rw['employeeid'] ?></td>
											</tr>
											<tr style="border:1px solid black;">
											    <td style="border:1px solid black;" ><b>Name of Employee </b></td>
											    <td style="border:1px solid black;"><?php echo $rw['emp_name'] ?> </td>
											    <td style="border:1px solid black;" ><b>DOB</b></td>
											     <td style="border:1px solid black;"><?php echo date('Y-m-d', strtotime($rw["DOB"])) ?></td>
											</tr>
											  <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Gender</b></td><td style="border:1px solid black;" >


  <?php echo $rw['gender'] ?>


											</td>




                                        <td style="border:1px solid black;" ><b>Marital Status</b></td>
										<td style="border:1px solid black;">
										<?php echo $rw['maritalstatus'] ?>
										</td>
                                        </tr>
                                        <tr style="border:1px solid black;" >

										   <td style="border:1px solid black;" ><b>Wife  Name</b></td>
										   <td style="border:1px solid black;" >
											<?php echo $rw['wname'] ?></td>

										 <td style="border:1px solid black;" ><b>No of kids</b></td><td style="border:1px solid black;" >
											<?php echo $rw['nok'] ?></td>


										   </tr>
										   <tr style="border:1px solid black;">
										   <td style="border:1px solid black;" ><b>Children Names</b></td>
										 	<td style="border:1px solid black;" >
											   <?php echo $rw['childname'] ?>
											</td>
											</tr>
											   <tr style="border:1px solid black;">

											<td style="border:1px solid black;" ><b>Father  Name</b></td><td style="border:1px solid black;" >
											<?php echo $rw['fname'] ?></td>


											<td style="border:1px solid black;" ><b>Mother Name</b> </td><td style="border:1px solid black;" >
											<?php echo $rw['mname'] ?>

											</td>
</tr>
                                            <tr style="border:1px solid black;">

											<td style="border:1px solid black;" ><b>Contact No.</b></td><td style="border:1px solid black;" >
											<?php echo $rw['contactno'] ?></td>


											<td style="border:1px solid black;" ><b>Alternate Contact No.</b> </td><td style="border:1px solid black;" >
<?php echo $rw['alternateno'] ?>"

											</td>
</tr>
<tr style="border:1px solid black;">
<td style="border:1px solid black;" ><b>Family Member Contact No.</b> </td>
<td style="border:1px solid black;" >


     <?php echo $rw['relation']+"- "+$rw['rno']; ?>

</td>
<td style="border:1px solid black;" ><b>Email Id</b></td><td style="border:1px solid black;">
									<?php echo $rw['emp_email'] ?></td>
</tr>

                                          <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Adhar No</b></td><td style="border:1px solid black;" >
										<?php echo $rw['adharcardno'] ?></td>
										 <td style="border:1px solid black;" ><b> Adhar Photo</b></td><td style="border:1px solid black;" >

										</td>

                                        </tr>
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>PAN No</b>.</td><td style="border:1px solid black;">
										<?php echo $rw['pan'] ?></td>
										<td style="border:1px solid black;" ><b> PAN Card Photo</b></td><td style="border:1px solid black;" >

										</td>
										</tr>
										<tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>UAN No.</b></td><td style="border:1px solid black;">
									<?php echo $rw['uan'] ?></td>
                                         <td style="border:1px solid black;" ><b>PF No.</b></td><td style="border:1px solid black;">
										<?php echo $rw['PFNO'] ?></td>
                                        </tr>
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>ESI No.</b></td><td style="border:1px solid black;" >
										<?php echo $rw['ESI_NO'] ?></td>
                                     <td style="border:1px solid black;" ><b>DOJ</b></td><td style="border:1px solid black;" >
										<?php echo date('Y-m-d', strtotime($rw["DOJ"])) ?></td>
                                        </tr>
											 <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Qualification</b></td><td style="border:1px solid black;" >
									<?php echo $rw['qualification'] ?></td>
                                       <td style="border:1px solid black;" ><b>Experience</b></td><td style="border:1px solid black;">
									<?php echo $rw['experience'] ?></td>
                                        </tr>
                                         <tr style="border:1px solid black;">
                                          <td style="border:1px solid black;" ><b> Designation</b></td><td style="border:1px solid black;">
										 <?php echo $rw['designation'] ?>
										  <td style="border:1px solid black;" ><b>Photo</b></td><td style="border:1px solid black;" >

										    </td>
                                        </tr>
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Address</b></td><td style="border:1px solid black;" >

										<?php echo $rw['address'] ?></td>
										<td style="border:1px solid black;" ><b>City</b></td><td style="border:1px solid black;" >
										 <?php echo $rw['city'] ?></td>
										</tr>



										  <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>User Name</b></td><td style="border:1px solid black;" >
									<?php echo $rw['username'] ?>
										</td>

                                        </tr>

									   </table>

                                                  <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Bank Details</h1></p>
												   </div>
                                                   <table  style="border:1px solid black; width:100%;">

												   <tr style="border:1px solid black;">

                                          <td style="border:1px solid black;" > <b>Bank Name.</b></td><td style="border:1px solid black;">
										 <?php echo $rw['bname'] ?></td>
										  <td style="border:1px solid black;" ><b>Branch of Bank</b></td><td style="border:1px solid black;" >
										<?php echo $rw['branch'] ?>
										</td>
										  <td style="border:1px solid black;" ><b>IFSC Code</b></td><td style="border:1px solid black;" >
										<?php echo $rw['ifsc'] ?>
										</td>
                                        </tr>

                                        <tr style="border:1px solid black;">

                                          <td style="border:1px solid black;" ><b> Account No.</b></td><td style="border:1px solid black;">
										  <?php echo $rw['accno'] ?>

										  <td style="border:1px solid black;" ><b>Photo of Passbook/ Cancelled Cheque</b></td><td style="border:1px solid black;" >

										</td>
                                        </tr>

												   </table>


                                                  <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Uniform Details</h1></p>
												   </div>
                                                   <table  style="border:1px solid black; width:100%;">

												   <tr style="border:1px solid black;">

                                          <td style="border:1px solid black;" > <b>T-Shirt</b></td><td style="border:1px solid black;">
										 <?php echo $rw['tshirt'] ?></td>
										  <td style="border:1px solid black;" ><b>T-Shirt Size</b></td><td style="border:1px solid black;" >
										<?php echo $rw['tsize'] ?>
										</td>
										  <td style="border:1px solid black;" ><b>T-Shirt Issue Date</b></td><td style="border:1px solid black;" >
										<?php echo $rw['tshtdt'] ?>
										</td>
                                        </tr>

                                        <tr style="border:1px solid black;">

                                          <td style="border:1px solid black;" ><b> Account No.</b></td><td style="border:1px solid black;">
										  <?php echo $rw['accno'] ?>

										  <td style="border:1px solid black;" ><b>Photo of Passbook/ Cancelled Cheque</b></td><td style="border:1px solid black;" >

										</td>
                                        </tr>

												   </table>
												   <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Employee Position</h1></p>
												   </div>
												   <table  style="border:1px solid black; width:100%;" >


												   <tr  style="border:1px solid black;">

                                          <td style="border:1px solid black;" > <b>Level 1</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level1'] ?></td>
										   <td style="border:1px solid black;" > <b>Level 2</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level2'] ?></td>
										   <td style="border:1px solid black;" > <b>Level 3</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level3'] ?></td>
										  <td style="border:1px solid black;" > <b>Level 4</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level4'] ?></td>
                                        </tr>

                                        <tr style="border:1px solid black;">

                                          <td style="border:1px solid black;" > <b>Level 5</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level5'] ?></td>
										   <td style="border:1px solid black;"> <b>Level 6</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level6'] ?></td>
										   <td style="border:1px solid black;" > <b>Level 7</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level7'] ?></td>

                                        </tr>

												   </table> -->












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

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');

}

?>