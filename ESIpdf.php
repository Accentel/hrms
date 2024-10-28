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

		.table-container {
			display: flex; /* Use flexbox to align the tables side by side */
			justify-content: flex-start; /* Align the tables to the left */
			gap: 20px; /* Space between the tables */
			margin-top: 20px; /* Space from the top */
			margin-left: 200px; /* Space from the left */
	}

		.form-container {
			width: 73%; /* Width of each table */
			border-collapse: collapse; /* Collapse borders into one */
	}

		.form-container, .form-container th, .form-container td {
   			 border: 2px solid black;
	}

		.form-container th, .form-container td {
			padding: 5px;
			text-align: left;
	}

	.table-wrapper {
    width: 50%; /* Ensure that each table-wrapper takes full width of the container */
}


        .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 550%;
            height: auto;
            /* border-radius: 20px; */
        }

		.center-container {
            text-align: center; /*Centers text inside the div */
            margin-top: 30px; /* Optional: Adds space above the div */
			/* margin-left: 235px; */
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

	  .top-aligned {
    vertical-align: top; /* Aligns text to the top of the cell */
    padding: 20px; /* Optional: add padding if needed */
    text-align: center; /* Optional: center-align text horizontally */
}


/* Ensure other cells have consistent alignment */
th, td {
    vertical-align: middle; /* Default alignment for other cells */
    padding: 10px; /* Optional: add padding to other cells */
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

                                   <!-- <div class="image-container">
                                       <img src="images/headeresi1.jpg" alt="" style="margin-top:50px; margin-left:1x; width:720px">
                                   </div> -->
								   <div class="center-container">
									<h2>DECLARATION FORM</h2>
								</div>
								<div class="center-container">
    <h6>
        <b>To be filled by employee after reading instruction overleaf. Two Postcard Size photographs to be attached with the</b>
    </h6>
    <h6  style="margin-left:-480px;">
        <b> form. This form is free of cost.</b>
    </h6>
</div>
	
                          
								 
								<div class="table-container">
								<div class="table-wrapper">
								<h5 style="margin-left:50px; margin-top:40px;"><b>(A) INSURED PERSON'S PARTICULARS</b></h5>
								<table class="form-container" style="margin-left:35px">
								
									<tr>
										<th colspan="1">1.Insurance No.</th>
										<td colspan="6"></td>
									</tr>

									<tr>
										<th colspan="1">2.Name in block letters</th>
										<td colspan="6"></td>
									</tr>

									<tr>
										<th colspan="1">3.Father's/Husband's Name</th>
										<td colspan="6"></td>
									</tr>

									<tr>
										<th rowspan="2" class="top-aligned" style="height:120px">4. Date of Birth</th>
											<th rowspan="1" class="top-aligned">Day</th>
											<th rowspan="1" class="top-aligned">Month</th>
											<th rowspan="1" class="top-aligned">Year</th>
											<th rowspan="1" class="top-aligned">5.Marital Status</th>
											<th rowspan="1" class="top-aligned">M/U/W</th>
									</tr>
									<tr>
										<th style="height:50px"></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>

									<tr>
										<th colspan="3" style="text-align: left; vertical-align: top;">7.Present Address <p>__________________<br>__________________<br>Pin Code [ ][ ][ ][ ][ ][ ]</p></th>
										<th colspan="4" style="text-align: left; vertical-align: top;">8. Permanent Address <p>__________________<br>__________________<br>Pin Code [ ][ ][ ][ ][ ][ ]</p></th>
									</tr>

									<tr>
										<th colspan="3" style="text-align: left; vertical-align: top;">Brance Office</th>
										<th colspan="4" style="text-align: left; vertical-align: top;">Dispensary</th>
									</tr>
								</table>
							</div>

								
								<div class="table-wrapper">
       								 <h5 style="margin-left:-125px; margin-top: 40px;"><b>(B) EMPLOYER'S PARTICULARS</b></h5>
								<table class="form-container" style="margin-left:-128px">
								    <tr>
										<th colspan="5">9. Employer's Code No.</th>
									</tr>

									<tr>
										<th rowspan="2" class="top-aligned" style="height:70px">10. Date of Appointment</th>
										<th rowspan="1" class="top-aligned">Day</th>
										<th rowspan="1" class="top-aligned">Month</th>
										<th rowspan="1" class="top-aligned">Year</th>
									</tr>

									<tr>
										<th style="height:50px"></th>
										<th></th>
										<th></th>
										
									</tr>
									
									 <tr>
									 <th colspan="4" style="text-align: left; vertical-align: top;">11. Name & Address of the Employer 
										<p>__________________________________________________<br>
										__________________________________________________<br>
										__________________________________________________<br>
										</p></th>
									 </tr>
									 <tr>
									 <th colspan="4" style="text-align: left; vertical-align: top;">12. In case of any previous employment please fill up the details as under.</th>
									 </tr>

									 <tr>
									 <th colspan="4" style="text-align: left; vertical-align: top;">(a) Previous Ins. No.</th>
									 </tr>

									 <tr>
									 <th colspan="4" style="text-align: left; vertical-align: top;">(b) Employer's code No</th>
									 </tr>

									 <tr>
									 <th colspan="4" style="text-align: left; vertical-align: top;">(c) Name & Address of the Employer<br><br>e-mail address</th>
									 </tr>
									
								</table>
							</div>
						</div>

						<div class="center-container">
							<h6 style="margin-right:95px; margin-top:25px"><b>(C) Details of Nominee u/s 71 of ESI Act 1948/Rule-56(2) of ESI (Central) Rules, 1950 for payment of cash benfit in the event of death.</b></h5>
						</div>

							<div class="table-wrapper">
								<table class="form-container" style="margin-left:235px;margin-top:25px; width:122%">
									<tr>
										<th style="text-align: center">Name</th>
										<th style="text-align: center">Relationship</th>
										<th style="text-align: center">Address</th>
									</tr>

									<tr>
										<th style="height:30px"></th>
										<th></th>
									</tr>
								</table>
							</div>

							<div class="center-container">
    <h6 style="margin-right:50px; margin-top: 25px;">
        <b>I hereby declare that the particulars given by me are correct to the best of my knowledge and belief. I undertake to intimate the corporation</b>
    </h6>
    <h6 style="margin-left:-415px;">
        <b>any changes in the membership of my family within 15 days of such change.</b>
    </h6>
</div>

                            <div class="acknowledgement-container">
							   <!-- <p class="place" style="margin-left:300px; font-weight:bold;">Place: Bangalore</p> -->
							   <h5 style="text-align: left; margin-left:230px; margin-top:40px"><b>Counter signature by the employer</b></h5>
							   <h5 style="text-align: right; margin-right:275px; margin-top:-20px"><b>Signature /T.I of IP.</b></h5>
							   <h5 style="text-align: left; margin-left:230px; margin-top:45px"><b>Signature of the seal</b></h5>
                             </div>


							 <div class="table-wrapper">
       								 <h5 style="margin-left:235px; margin-top: 40px;"><b>(D) Family Particulars of Insured person</b></h5>
								<table class="form-container" style="margin-left:235px; width:124%">
								    <tr>
										<th style="text-align:center">SI. No</th>
										<th style="text-align:center">Name</th>
										<th style="text-align:center">Date of Birth/Age as on date of filling form</th>
										<th style="text-align:center">Relationship with the Employee</th>
										<th colspan="2" style="text-align:center">Wheather resideing with him/her</th>
										<th colspan="2" style="text-align:center">If 'No' state place of Residence</th>
									</tr>

									<tr style="height: 25px">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th style="text-align:center">Yes</th>
										<th style="text-align:center">No</th>
										<th style="text-align:center">Town</th>
										<th style="text-align:center">State</th>
									</tr>

									<tr style="height: 25px">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>

									<tr style="height: 25px">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>

									<tr style="height: 25px">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</table>

								<div class="acknowledgement-container">
							   <!-- <p class="place" style="margin-left:300px; font-weight:bold;">Place: Bangalore</p> -->
							   <h5 style="text-align: left; margin-left:230px; margin-top:40px"><b>ESI Corporation Temporary Identity Card</b></h5>
							   <h5 style="text-align: right; margin-right:-300px; margin-top:-25px"><b>(Valid for 3 month from the date of appointment)</b></h5>
                             </div>

							 <div class="table-container">
								<div class="table-wrapper">
								<!-- <h5 style="margin-left:50px; margin-top:40px;"><b>(A) INSURED PERSON'S PARTICULARS</b></h5> -->
								<table class="form-container" style="margin-left:35px; width:240%">
								<tr>
									<th style="width: 100px">Name</th>
									<td style="width: 250px"></td>
									<td style="width: 300px"></td>
								</tr>

								<tr>
									<th style="width: 100px">Ins. No.</th>
									<td style="width: 250px"></td>
									<td style="width: 300px"><b>Date of Appointment</b></td>
								</tr>

								<tr>
									<th style="width: 100px">Branch Office</th>
									<td style="width: 250px"></td>
									<td style="width: 300px"><b>Dispensary</b></td>
								</tr>

								<tr>
									<th colspan="2">Employer's Code No. & Address</th>
									 	  
								</tr>
								<tr>
									<th colspan="2">JTechno Associates #177/2, 1st Cross, J.J Church Road, Ejipura, Bangalore-5600</th>	
									<!-- <td style="height:20px"><h2>53000163390000607</h2></td> -->
									<td style="height:20px"><h2><?php echo $rw['esic_number']; ?></h2></td> 
									  
								</tr>
	
								</table>
							</div>

							<div class="table-wrapper">
       								 <!-- <h5 style="margin-left:-125px; margin-top: 40px;"><b>(B) EMPLOYER'S PARTICULARS</b></h5> -->
								<table class="form-container" style="margin-left:390px; height:170px; width:210px">
								    
								<tr>
									<th style="text-align:center; font-weight:bold">Space for photograph</th>
								</tr>

								</table>
							</div>

						</div>

						<div class="acknowledgement-container">
							   <h5 class="place" style="margin-left:240px; font-weight:bold; margin-top:40px">Validity</h5>
							   <h5 style="text-align: left; margin-left:230px; margin-top:40px"><b>Dated</b></h5>
							   <h5 style="text-align: right; margin-right:30px; margin-top:-25px"><b>Signature/T.I. of I.P.</b></h5>
							   <h5 style="text-align: right; margin-right:-360px; margin-top:-25px"><b>Signature of B.M. with seal</b></h5>
                             </div>

						 
								
							
								<!-- <div class="acknowledgement-container">
								<h4 style="text-align: right; margin-right: 300px; margin-top: 70px;"><strong>Signature</strong></h4>
								</div> -->


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