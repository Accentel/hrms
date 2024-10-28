<?php //include('config.php');
session_start();
include 'dbconnection/connection.php';
// error_reporting(E_ALL);
// ini_set("display_error", 1);
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
//include('org1.php');

    include 'dbfiles/org.php';
    include 'dbfiles/uqry_emp.php';
    ?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'template/headerfile.php';?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />

	 <style>

body {
            background-color: white; /* Sets the background color of the entire page */
            /* margin: 0; Removes default margin */
            padding: 0; /* Removes default padding */

			font-family: Arial, sans-serif;
            /* background-color: white; */
            margin: 20px;

        }

        .image-container {
            width: 500px;
            /* padding: 20px; */
            /* background-color: #f0f0f0; */
            /* border: 2px solid #ccc; */
            text-align: center;
            margin: 0 auto;
        }

		.form-container {
            width: 60%; /* Width of the table */
            margin: 0 auto;
            border-collapse: collapse; /* Collapse borders into one */
			margin-top:30px;
        }

        .form-container, .form-container th, .form-container td {
            border: 2px solid black;
        }

        .form-container th, .form-container td {
            padding: 5px;
            text-align: left;
        }

        .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            /* border-radius: 20px; */
        }

		.center-container {
            text-align: center; /* Centers text inside the div */
            margin-top: 20px; /* Optional: Adds space above the div */
        }

        .center-container h2 {
            font-weight: bold; /* Ensures the text is bold */
			text-decoration: underline; /* Adds an underline to the text */
        }

		.box {
            width: 60%; /* Adjust width as needed (percentage or fixed size) */
            height: 400px; /* Set a fixed height */
            background-color: #f8f8f8; /* Background color */
            border: 2px solid #333; /* Border around the box */
            padding: 20px; /* Space inside the box */
            margin: 20px auto; /* Center the box horizontally with margin */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Adds shadow for 3D effect */
        }

		/* .outer-box {
            width: 300px;
            padding: 20px; */
            /* background-color: #f0f0f0; */
            /* border: 2px solid #ccc;
            text-align: center;
        } */

        .inner-box {
            width: 820px;
            padding: 15px;
            /* background-color: #e0e0e0; */
            border: 1px solid #999;
            margin: 0 auto;
			border: 2px solid #333; /* Border around the box */
            /* text-align: center; */
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

                                   <div class="image-container">
                                       <img src="images/excel_logo.jpg" alt="" style="margin-top:30px">
                                   </div>
								   <div class="center-container">
									<h2 style="font-weight:bold">BIOMETRIC DATA</h2>
								</div>

								<table class="form-container">
									<tr>
										<th colspan="2">Date</th>
									</tr>
									<tr>
										<td colspan="5">12/07/2024</td>
									</tr>
									<tr>
										<th colspan="2">Emp. ID</th>
									</tr>
									<tr>
										<td colspan="5">981682</td>
									</tr>
									<tr>
										<th colspan="2">Emp. Name</th>
									</tr>
									<tr>
										<td colspan="5">Ananta Kiemer Malik</td>
									</tr>
									<tr>
										<th colspan="2">Right Hand finger prints</th>
									</tr>
									<tr>
										<td>Thumb</td>
										<td>Index Finger</td>
										<td>Middle Finger</td>
										<td>Ring Finger</td>
										<td>Small Finger</td>

									</tr>
									<tr>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
									</tr>
									<tr>
										<th colspan="2">Left Hand finger prints</th>
									</tr>
									<tr>
										<td>Thumb</td>
										<td>Index Finger</td>
										<td>Middle Finger</td>
										<td>Ring Finger</td>
										<td>Small Finger</td>
									</tr>
									<tr>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
										<td style="width: 100px; height: 120px;"></td>
									</tr>

								</table>


								<div class="acknowledgement-container">
								<h4 style="text-align: right; margin-right: 300px; margin-top: 70px;"><strong>Signature</strong></h4>
								</div>


                                 	<!-- <div style="border: 1px solid black; width: 20%; height:20px; margin-right:20px; margin-top:20px"></div> -->
								<!-- <div class="box"> -->

        								 <!-- <div class="inner-box" style="margin-left:-20px; margin-top:-20px">
										Inner Box
									</div> -->

									<!-- <div style="display: flex; flex-direction: row; align-items: center;">
										<div style="width: 200px; height: 30px; border: 1px solid black; margin-right:20px"></div>
										</div> -->

										<!-- <table class="table table-bordered mt-0 mb-0 custom-border-width">
                  <tr>
                    <td style="text-align: center;"></td>
                  </tr>
				  <tr>
                    <td style="border:1px solid black; width:188	px"></td>
                    <td colspan="3"></td>
                  </tr>
                </table>
																	   -->

							   </body>





							 <!-- <table style="width:100%; margin-top: 10px;">
                        <tr>
                            <td style="margin-right:100px">
                            <a href="download1.php?id=<?php echo $id; ?>" class="btn btn-primary" style="margin-right:100px">Download PDF</a>
                            </td>
                        </tr>
                    </table> -->


					<!-- <a href="download1.php?id=<?php echo $id; ?>" class="btn btn-success" style="margin-right:-100px">Print as PDF</a> -->


							 <br><br><br><br><br><br><br>



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

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
    $qtno = "managerapprove.pdf";

// Start output buffering
    ob_start();
    ?>
<?php
$body = ob_get_clean();
    $body = iconv("UTF-8", "UTF-8//IGNORE", $body);
    $mpdf = new mPDF(['format' => 'A4']);
    $mpdf->WriteHTML($body);
    $mpdf->Output($qtno, 'F');

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');

}

?>