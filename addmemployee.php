<?php //include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'dbconnection/connection.php';
$state = $_GET['state'];
if ($state == "TS") {
    $esic_number = "52530163390010607";
} elseif ($state == "KN") {
    $esic_number = "53000163390000607";
} else {
    $esic_number = "Unknown";
}
if ($_SESSION['user']) {
    $name = $_SESSION['user'];

    include 'dbfiles/org.php';
    include 'dbfiles/iqry_emp.php';
    ?>
	<!DOCTYPE html>
	<html lang="en">
	<style>
		.frmSearch {
			border: 1px solid #a8d4b1;
			background-color: #c6f7d0;
			margin: 2px 0px;
			padding: 40px;
			border-radius: 4px;
		}

		#country-list {
			float: left;
			list-style: none;
			margin-top: -3px;
			padding: 0;
			width: 190px;
			position: absolute;
		}

		#country-list li {
			padding: 10px;
			background: #f0f0f0;
			border-bottom: #bbb9b9 1px solid;
		}

		#country-list li:hover {
			background: #ece3d2;
			cursor: pointer;
		}
	</style>
	<?php include 'template/headerfile.php';?>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>


	<style>
		strong {
			color: red;
		}
	</style>


	<script>
		function deleteRow() {
			var rr = document.getElementById("rows1").value

			if (rr != 0) {
				// var oRow = rr.parentNode.parentNode;
				document.getElementById("dynamic-table1").deleteRow(rr);
				var row = document.getElementById("rows1").value
				document.getElementById("rows").value = row - 1;
				total();
			} else {
				alert('Please Select Atleast One Row');
				return false;
			}
		}

		function ConfirmDialog() {
			var x = confirm("Are you sure to delete record?")
			if (x) {
				return true;
			} else {
				return false;
			}
		}

		function s2() {
			var curval = document.getElementById("adhar").value;
			$.ajax({
				type: "GET",
				url: "checkAadharCard.php",
				data: {
					keyword: curval
				},
				success: function(data) {
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);

					if (data) {
						$("#submit").prop('disabled', true);
					}

					else {

						$("#submit").prop('disabled', false);
					}
					//$("#pname"+i).css("background","#FFF");
				}
			});
		}
	</script>

	<script>
		function showHint22(str){

			if (str.length == 0) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			}
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					var show = xmlhttp.responseText;
					var strar = show.split(":");
					//document.getElementById("supname").value=strar[2];

					//document.getElementById("state").value=strar[1];

					//document.getElementById("city").value=strar[2];
					document.getElementById("store_name").value = strar[1];
					document.getElementById("state").value = strar[2];
					document.getElementById("state_code").value = strar[3];
					//document.getElementById("addr").value=strar[4];
					document.getElementById("gst_in").value = strar[4];
					document.getElementById("store_type").value = strar[5];

					document.getElementById("supervisor").value = strar[6];
					document.getElementById("cordinator").value = strar[7];
					document.getElementById("afm").value = strar[8];
					document.getElementById("company").value = strar[9];
				}
			}
			xmlhttp.open("GET", "get-apdata3.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>

	<script>
	        function showchildren(z) {
            let childrenblock = document.getElementById("childrenblock");
            let childrennameblock = document.getElementById("childrennameblock");
            let noofkids = document.getElementById("nokblock");
            let hidden = childrenblock.getAttribute("hidden");
            if (z.value == "married") {
                childrenblock.removeAttribute("hidden");
                childrennameblock.removeAttribute("hidden");
                noofkids.removeAttribute("hidden");
            } else {
                childrenblock.setAttribute("hidden", "hidden");
                childrennameblock.setAttribute("hidden", "hidden");
                noofkids.setAttribute("hidden", "hidden");
                document.getElementById("nok").value = '';
                document.getElementById("wname").value = '';
                document.getElementById("childname").value = '';
                document.getElementById("container145").innerHTML = '';
            }
        }

		function changePartner(z) {
			let partnername = document.getElementById("partnername");
			let wname = document.getElementById("wname");
			if (z.value == "male") {
				partnername.textContent = "Wife Name";
				wname.placeholder = "Enter your Wife name"
			} else {
				partnername.textContent = "Husband Name";
				wname.placeholder = "Enter your Husband name"
			}
		}
	</script>


	<script>
		$(document).on('keyup', '.txt1', function() {
			var id = $(this).attr('data-row');

			var qty = document.getElementById('qty' + id).value;
			var price = document.getElementById('price' + id).value;


			bal = parseFloat(qty) * parseFloat(price);
			document.getElementById('amnt' + id).value = bal;
			calculateTotal1();
			calculateTotal1k();
			calculateTotal1kk();
			calculateTotal1kv();

		});


		$(document).on('keyup', '.txt20', function() {
			var id = $(this).attr('data-row');

			var amt = document.getElementById('amnt' + id).value;
			var sgst = document.getElementById('sgst' + id).value;
			var serv_amt = document.getElementById('serv_amt' + id).value;


			bal = (parseFloat(amt) * parseFloat(sgst)) / 100;
			alert(sgst);
			ser = (parseFloat(amt) * parseFloat(serv_amt)) / 100;
			document.getElementById('sgstamt' + id).value = bal;
			document.getElementById('serv_amnt' + id).value = ser;
			calculateTotal2();

		});

		$(document).on('keyup', '.txt21', function() {
			var id = $(this).attr('data-row');

			var amt = document.getElementById('amnt' + id).value;
			var cgst = document.getElementById('sgst' + id).value;


			bal = (parseFloat(amt) * parseFloat(cgst)) / 100;
			document.getElementById('cgstamt' + id).value = bal;
			calculateTotal3();

		});

		function calculateTotal1() {
			subTotal = 0;
			total = 0;
			$('.txt').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}


		function calculateTotal1kv() {
			subTotal = 0;
			total = 0;
			$('.txt7').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot_serv').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal1k() {
			subTotal = 0;
			total = 0;
			$('.txt4').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot_gst').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal1kk() {
			subTotal = 0;
			total = 0;
			$('.txt5').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#net').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal2() {
			subTotal = 0;
			total = 0;
			$('.txt50').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#sgsttotal').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal3() {
			subTotal = 0;
			total = 0;
			$('.txt51').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#cgsttotal').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}
	</script>

	<body class="no-skin">
		<?php include 'template/logo.php';?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.loadState('main-container')
				} catch (e) {}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try {
						ace.settings.loadState('sidebar')
					} catch (e) {}
				</script>

				<!-- /.sidebar-shortcuts -->

				<!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>


			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li>
								<i class="ace-icon fa fa-cog home-icon"></i>
								<!-- <a href="qot_list"> Settings</a> -->
							</li>
							<li>
								<a href=""> Add Employee</a>
							</li>

							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->
						<div class="#">
							<center style="color:#192436"><u><b>
										<h1>ADD EMPLOYEE</h1>
									</b></u></center>
						</div>

						<?php
$a = "select `count` as cnt from qutcount where state='AP' ";
    $ssq = mysqli_query($link, $a);
    $r = mysqli_fetch_array($ssq);
    $cnt1 = $r['cnt'];

    $cnt = 24250000 + 1 + $cnt1;

    ?>


						<!-- PAGE CONTENT BEGINS -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<form name="frm" method="POST" action="" enctype="multipart/form-data" id="employeeForm">
											<input type="hidden" name="id" value="<?php echo $id ?>">
											<input type="hidden" name="ses" value="<?php echo $name; ?>">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover">
													<tr>
														<td align="right">State:</td>
														<td>
															<input type="text" class="form-control" required  readonly  id="state" name="state" value="<?php echo $state; ?>">
														</td>

														<tr>
															<td align="right">ESIC Number:</td>
															<td>
																<input type="text" class="form-control" readonly id="esic_number" name="esic_number" value="<?php echo $esic_number; ?>">
															</td>
														</tr>


														<!-- <td><select name="state" id="state"  class="form-control">
																<option value="">Select State</option>
																<option value="AP">AP</option>
																<option value="TS">TS</option>
																<option value="KL">KL</option>
																<option value="TN">TN</option>
																<option value="KN">KN</option>
															</select> </td> -->
                                                            </tr>
                                                            <tr>
														<td align="right">Aadhar No</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="adhar" id="adhar" onkeyup='s2()'>
															<div id='suggesstion-box'></div>
														</td>

													</tr>

													<tr>
														<td align="right">Name</td>
														<td><input type="text" class="form-control"  required value=""  name="empname" id="empname"></td>
                                                        </tr>
                                                    <tr>
														<td align="right">DOB</td>
														<td><input type="date" value="<?php echo date('Y-m-d'); ?>"  name="dob" id="dob" class="form-control"></td>
													</tr>
													<tr>
														<td align="right">Gender</td>
														<td align="left">

															<input type="radio" id="male" name="gender" value="male" onchange="changePartner(this)">
															<label for="male">Male</label>
															<input type="radio" id="female" name="gender" value="female" onchange="changePartner(this)">
															<label for="female">Female</label>
														</td>

                                                        </tr>
                                                        <tr>
														<td align="right">Marital Status</td>
														<td>
															<input type="radio" id="married" name="marstatus" value="married" onchange="showchildren(this)">
															<label for="married">Married</label>
															<input type="radio" id="unmarried" name="marstatus" value="unmarried" onchange="showchildren(this)">
															<label for="unmarried">unmarried</label>
														</td>
													</tr>

													<tr id="childrenblock" hidden="hidden">

														<td align="right" id="partnername">Wife Name</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="wname" id="wname" placeholder="Enter your Wife name">
														</td>
                                                        </tr>
                                                        <tr id="nokblock" hidden="hidden">
														<td align="right">No of kids</td>
														<td align="left">
															<input type="number" name="nok" id="nok" placeholder=" enter your number of kids " class="form-control" />
														</td>


													</tr>
													<tr id="childrennameblock" hidden="hidden">
														<td align="right">Children Names</td>
														<td align="left">
															<textarea name="childname" id="childname" class="form-control"></textarea>
														</td>
													</tr>
													<tr>

														<td align="right">Father Name</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="fname" id="fname">
														</td>

                                                        </tr>
                                                        <tr>
														<td align="right">Mother Name </td>
														<td align="left">
															<input type="text" class="form-control" value="" id="mname" name="mname">

														</td>
													</tr>

													<tr>

														<td align="right">Contact No.</td>
														<td align="left">
															<input type="number" required value="" class="form-control" name="conno" id="conno">
														</td>

                                                        </tr>
                                                        <tr>
														<td align="right">Alternate No. </td>
														<td align="left">
															<input type="number" class="form-control" value="" id="aconno" name="aconno">

														</td>
													</tr>
													<tr>
														<td align="right">Family </td>
														<td align="left">

															<select name="rel" >
																<option value="">Relation</option>
																<option value="Father">Father</option>
																<option value="Mother">Mother</option>
																<option value="Spouse">Spouse</option>
															</select>
															<input type="text" class="text" style="width:75% !important;" name="fno" id="rno" />

														</td>
                                                        </tr>
                <tr>
														<td align="right">Email Id</td>
														<td>
															<input type="text"  name="email" id="email" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">Employee ID</td>
														<td><input type="text" readonly value=""  name="eid" id="eid" class="form-control"></td>
                                                        </tr>
                                                        <tr>
														<td align="right"> Adhar Photo(Front)</td>
														<td align="left">
															<input type="file" name="adharimg" id="adharimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png"  />
														</td>
													</tr>

													<tr>
														<td align="right"> Adhar Photo(Back)</td>
														<td align="left">
															<input type="file" name="adharphotoback" id="adharphotoback" class="form-control photo-upload" accept=".jpg, .jpeg, .png"  />
														</td>
													</tr>

													<tr>
														<td align="right">PAN No.</td>
														<td>
															<input type="text"  name="pan" id="pan" class="form-control">
														</td>
                                                        </tr>
                <tr>
														<td align="right"> PAN Photo</td>
														<td align="left">
															<input type="file" name="panimg" id="panimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
														</td>
													</tr>
													<tr>
														<td align="right">UAN No.</td>
														<td align="left">
															<input type="text"  name="uan" id="uan" class="form-control">
														</td>
                                                        </tr>
                <tr>
														<td align="right">PF No.</td>
														<td>
															<input type="text"  name="pf" id="pf" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">ESI No.</td>
														<td align="left">
															<input type="text"  name="esi" id="esi" class="form-control">
														</td>
                                                        </tr>
                              	 <tr>
														<td align="right">DOJ</td>
														<td align="left">
															<input type="date" value=" <?php
$t = strtotime($doj);
    echo date('d-m-Y', $t);
    //echo date_format($apdate,"d-m-Y"); ?> "  name="doj" id="doj" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">Qualification</td>
														<td align="left">
															<input type="text"  name="qua" id="qua" class="form-control">
														</td>
                                                        </tr>
                <tr>
														<td align="right">Experience</td>
														<td>
															<input type="text"  name="exp" id="exp" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right"> Designation</td>
														<td>
															<input type="text" name="des" id="des"  class="form-control" placeholder="Enter Designation">
														</td>
                                                        </tr>
                									<tr>
														<td align="right">Photo</td>
														<td align="left">
															<input type="file" name="empimg" id="empimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
														</td>
													</tr>
													<tr>
														<td align="right">Address</td>
														<td align="left">

															<textarea  name="address" id="address" class="form-control"></textarea>
														</td>
                                                        </tr>
                <tr>
														<td align="right">City</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="city" id="city">
														</td>
													</tr>


													<tr>
																	<td align="right">Emp ID Card(Front)</td>
																	<td align="left">
																		<input type="file" name="empidcardfront" id="empidcardfront" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>

																<tr>
																	<td align="right">Emp ID Card(Back)</td>
																	<td align="left">
																		<input type="file" name="empidcardback" id="empidcardback" class="form-control photo-upload" accept=".jpg, .jpeg, .png"  />
																	</td>
																</tr>

													<tr>
													    <td align="right"> Select Wiremen License Status</td>
                                                            <td><select name="licensestatus" id="licensestatus" required class="form-control">
																<option value="NA">NA</option>
																<option value="Available">Available</option>
																<option value="Need to Apply">Need to Apply</option>
																<option value="Acknowledgement Available">Acknowledgement Available</option>

															</select> </td>

</tr>

<tr>
														<td align="right">License Photo</td>
														<td align="left">
															<input type="file" name="licimg" id="licimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
														</td>
													</tr>


													<!-- <tr>
													    <td align="right"> Office Uniform</td>
      													<td>
														  <input type="text" name="uniform" id="uniform" class="form-control" / placeholder="Enter Uniform">
															<!-- <select name="uniform" id="uniform" required class="form-control"> -->
															    <!-- <option value="select" Disabled selected>Select Option</option> -->
																<!-- <option value="Tshirt">T-shirt</option>
																<option value="Shirt">Shirt</option> -->
				<!-- </select> -->
															 </td>

</tr>

													<!-- <tr>
														<td align="right">Uniform Issue Date</td>
														<td align="left">
															<input type="date" value=" <?php
$t = strtotime($uniformisdate);
    echo date('d-m-Y', $t);
    //echo date_format($apdate,"d-m-Y"); ?> "  name="uniformisdate" id="uniformisdate" class="form-control">
														</td>
													</tr> -->


													<tr>
														<td align="right">Site Name</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="sitename" id="sitename"placeholder="Enter Site Name">
														</td>
													</tr>

													<tr>
														<td align="right">Employee Fingerprint</td>
														<td align="left">
															<input type="file" name="empfingerprint" id="empfingerprint" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
														</td>
													</tr>

													<tr>
														<td align="right">User Name <br />
															<!-- <p style="color:red;">(Will be same as employee id)</p> -->
														</td>

														<td align="left">
															<input type="text" class="form-control"  id="uname" name="uname" placeholder="Enter User Name">
														</td>
                                                        </tr>
                <tr>
														<td align="right">Password<br />
															<!-- <p style="color:red;"> (Will be same as aadhar card no)</p> -->
														</td>
														<td>
															<input type="password" class="form-control"  id="pwd" name="pwd" placeholder="Enter Password">
														</td>
													</tr>

													<table class="table table-hover table-striped">
																<center style="color:#192436"><u><b>
																			<h1>Uniform Details</h1>
																		</b></u></center>
																<br />
																<tr>
													    <td align="right">Shirt</td>
                                                            <td><select name="ushirt" id="ushirt" required class="form-control">
																<option value="T-Shirt Block">T-Shirt Block</option>
																<option value="T-Shirt Blue">T-Shirt Blue</option>
																<option value="White Shirt">White Shirt</option>
																<option value="Brown Shirt">Brown Shirt</option>
																<option value="Knight frank">Knight frank</option>

															</select> </td>

</tr>
                <tr>
																	<td align="right">Shirt Size</td>
																	<td>
																		<input type="text" name="shirtsize" id="shirtsize" class="form-control" placeholder="Enter Shirt Size">
																	</td>
                                                                    </tr>

																	<td align="right">Pant</td>
                                                              <td><select name="upant" id="upant" required class="form-control">
															    <option value="NA">NA</option>
																<option value="Jeans Pant">Jeans Pant</option>
																<option value="Block-Pant">Block-Pant</option>
																<option value="Regular Pant">Regular Pant</option>

															</select> </td>
                <tr>
																	<td align="right">Pant Size</td>
																	<td>
																		<input type="text" name="pantsize" id="pantsize" class="form-control" placeholder="Enter Pant Size">
																	</td>
                                                                    </tr>
                <tr>

															<td align="right">Shoe</td>
                                                            <td><select name="ushoe" id="ushoe" required class="form-control">
																<option value="Fiber">Fiber</option>
																<option value="Metal">Metal</option>
																<option value="Steel">Steel</option>

															</select> </td>

															</select> </td>
                <tr>
																	<td align="right">Shoe Size</td>
																	<td>
																		<input type="text" name="shoesize" id="shoesize" class="form-control" placeholder="Enter Shoe Size">
																	</td>
                                                                    </tr>

															<tr>
														<td align="right">Uniform Issue Date</td>
														<td align="left">
															<input type="date" value=" <?php
$t = strtotime($uniformisdate);
    echo date('d-m-Y', $t);
    //echo date_format($apdate,"d-m-Y"); ?> "  name="uniformisdate" id="uniformisdate" class="form-control">
														</td>
													</tr>



															</table>


													<table class="table table-hover table-striped">
																<center style="color:#192436"><u><b>
																			<h1>Employee Address</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right">Permanent Address</td>
																	<td>
																		<input type="text" name="permaddress" id="permaddress" class="form-control" placeholder="Enter Permanent Address">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right">Local Address</td>
																	<td>
																		<input type="text" name="localaddress" id="localaddress" class="form-control" placeholder="Enter Local Address">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right">Reference Address</td>
																	<td>
																		<input type="text" name="refeaddress" id="refeaddress" class="form-control" placeholder="Enter Reference Address">
																	</td>
                                                                    </tr>
                <tr>


															</table>

															<table class="table table-hover table-striped">
																<center style="color:#192436"><u><b>
																			<h1> Nominee Details</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> Name</td>
																	<td>
																		<input type="text" name="nname" id="nname" class="form-control" placeholder="Enter Nominee Name">
																	</td>
                                                                    </tr>

																	<tr>
																	<td align="right"> Relationship</td>
																	<td>
																		<input type="text" name="nrelation" id="nrelation" class="form-control" placeholder="Enter Relationship">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Address</td>
																	<td>
																		<input type="text" name="naddress" id="naddress" class="form-control" placeholder="Enter Nominee Address">
																	</td>
                                                                    </tr>
                                                                 <tr>
																	<td align="right"> Nominee DOB</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d'); ?>" name="ndob" id="ndob" class="form-control">
																	</td>
                                                                    </tr>



																	<tr>
																	<td align="right"> Amount</td>
																	<td>
																		<input type="text" name="namount" id="namount" class="form-control" placeholder="Enter Amount">
																	</td>
                                                                    </tr>

																	<tr>
													    <td align="right"> PF Scheme</td>
                                                            <td><select name="pfscheme" id="pfscheme" required class="form-control">
																<option value="Yes">Yes</option>
																<option value="No">No</option>
															</select> </td>

</tr>

<tr>
													    <td align="right"> Pension Scheme</td>
                                                            <td><select name="pensionscheme" id="pensionscheme" required class="form-control">
																<option value="Yes">Yes</option>
																<option value="No">No</option>
															</select> </td>

</tr>

															</table>



													<div class="form-group row">
														<div class="control-label col-md-12">

															<table class="table table-hover table-striped">
																<center style="color:#192436"><u><b>
																			<h1> BANK DETAILS</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> Bank Name.</td>
																	<td>
																		<input type="text" name="banknm" id="banknm"  class="form-control">
																	</td>
                </tr>
                <tr>
																	<td align="right">Branch of Bank</td>
																	<td align="left">
																		<input type="text" class="form-control"  id="bb" name="bb">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right">IFSC Code</td>
																	<td align="left">
																		<input type="text" class="form-control"  id="ifcs" name="ifcs">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Account No.</td>
																	<td>
																		<input type="text" name="acno" id="acno"  class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Passbook</td>
																	<td align="left">
																		<input type="file" name="bankimg" id="bankimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>

															</table>
															<!-- <table class="table">
																<center style="color:#192436"><u><b>
																			<h1>Employee Position</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> Level 1</td>
																	<td>
																		<input type="text" name="level1" id="level1" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Level 2</td>
																	<td>
																		<input type="text" name="level2" id="level2" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Level 3</td>
																	<td>
																		<input type="text" name="level3" id="level3" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Level 4</td>
																	<td>
																		<input type="text" name="level4" id="level4" class="form-control">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Level 5</td>
																	<td>
																		<input type="text" name="level5" id="level5" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Level 6</td>
																	<td>
																		<input type="text" name="level6" id="level6" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right"> Level 7</td>
																	<td>
																		<input type="text" name="level7" id="level7" class="form-control">
																	</td>

																</tr>

															</table> -->


															<!-- <table class="table">
																<center style="color:#192436"><u><b>
																			<h1>Uniform Details</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> T-Shirt:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['tshirt']) == "yes") {
        echo 'checked';
    }?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['tshirt']) == "no") {
        echo 'checked';
    }?>>NO</label>
																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="tsize" id="tsize"></td>

																	<td align="right"> T-Shirt Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["tshtdt"])) ?>"  name="tshtdt" id="tshtdt" class="form-control">
																	</td>
																	<td align="right"> Phant:</td>
																	<td>
																		<label><input type="radio" name="phant" value="YES" <?php if (strtolower($rw['phant']) == "yes") {
        echo 'checked';
    }?>>YES</label>
																		<label><input type="radio" name="phant" value="NO" <?php if (strtolower($rw['phant']) == "no") {
        echo 'checked';
    }?>>NO</label>

																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="psize" id="psize"></td>

																	<td align="right"> Phant Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["phtdt"])) ?>"  name="phtdt" id="phtdt" class="form-control">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Safety Shoes:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['sshoes']) == "yes") {
        echo 'checked';
    }?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['sshoes']) == "no") {
        echo 'checked';
    }?>>NO</label>
																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="ssize" id="ssize"></td>
																	<td align="right"> Shoes Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["shoesdt"])) ?>"  name="shoesdt" id="shoesdt" class="form-control">
																	</td>
																	<td align="right"> ID Card:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['idcard']) == "yes") {
        echo 'checked';
    }?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['idcard']) == "no") {
        echo 'checked';
    }?>>NO</label>
																	<td align="right"> ID Card Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["idcarddt"])) ?>"  name="idcarddt" id="idcarddt" class="form-control">
																	</td>

																</tr>

															</table> -->
															<table class="table table-hover table-striped">
																<center style="color:#192436"><u><b>
																			<h1>CERTIFICATE DETAILS</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"><b>1.</b> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname1" id="cname1" class="form-control">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno1" name="cno1">
																	</td>
                                                                    </tr>
                <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img1" id="img1" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>

																<tr>

																	<td align="right"><b>2.</b> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname2" id="cname2" class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno2" name="cno2">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img2" id="img2" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>
																<tr>

																	<td align="right"> <b>3.</b>Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname3" id="cname3" class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno3" name="cno3">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img3" id="img3" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>
																<tr>

																	<td align="right"><b>4.</b> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname4" id="cname4" class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno4" name="cno4">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img4" id="img4" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>
																<tr>

																	<td align="right"><b>5.</b> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname5" id="cname5" class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno5" name="cno5">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img5" id="img5" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>
																<tr>

																	<td align="right"> <b>6.</b>Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname6" id="cname6" class="form-control">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno6" name="cno6">
																	</td>
                                                                    </tr>
                                                                    <tr>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="img6" id="img6" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
																	</td>
																</tr>

																<tr>
																<!-- <tr>
																	<td align="right">Employee Signature</td>
																	<td align="left">
																	<input type="text" value="" class="form-control" name="empsign" id="empsign"placeholder="Enter Signature">
																	</td>
																</tr> -->

																<tr>
                                                                    <td align="right">Employee Signature</td>
                                                                    <td align="left">
                                                              
                                                                  	<canvas id="signatureCanvas" width="300" height="150" style="border: 2px solid black;"></canvas><br>
                                                              		<button type="button" id="clearSignature">Clear</button><br><br>

      																<input type="hidden" id="signatureData" name="signatureData">                                                          
                                                                    </td>
																</tr>

																</tr>





															</table>
															<!-- <center><a onclick="window.open('add_stock.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"><b style="color:red;font-size:18px;">Assign Stores</b></a></center> -->

															<br />
														</div>

													</div>


												</table>
											</div>




											<?php
//$aa="select * from add_bill where id1='$id'";
    /*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
    sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
    from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
    //$/t=mysqli_query($link,$aa) or die(mysqli_error($link));
    ?>

											<!-- div.table-responsive -->

											<!-- div.dataTables_borderWrap -->

											<br />

											<div class="form-group">
												<div class="col-md-offset-4 col-md-8">
													<button class="btn btn-info" type="submit" name="submit" id="submit">
														<i class="ace-icon fa fa-save bigger-110"></i>
														Save
													</button>





													&nbsp; &nbsp; &nbsp;
													<a href="employeelist.php"><button class="btn btn-danger" type="button" name="button" id="Close">
															<i class="ace-icon fa fa-close bigger-110"></i>
															Close
														</button></a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <script>
// Validate file types for all photo uploads
document.querySelectorAll('.photo-upload').forEach(function(input) {
    input.addEventListener('change', function() {
        var file = this.files[0]; // Get the selected file
        if (file) { // Ensure a file is selected
            var fileType = file.type; // Get the file's MIME type

            // Only allow JPEG and PNG formats
            if (fileType !== 'image/jpeg' && fileType !== 'image/png') {
                alert('Only JPEG and PNG formats are allowed.');
                this.value = ''; // Clear the file input
            }
        }
    });
});
</script> -->


   <!-- This is the code for compress the size of photo starts from here -->
<script>
async function compressImage(file, fixedWidth = 500, fixedHeight = 500, initialQuality = 1) {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const img = new Image();

    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = function(event) {
            img.src = event.target.result;

            img.onload = async function() {
                // Set fixed width and height for all images
                canvas.width = fixedWidth;
                canvas.height = fixedHeight;

                // Force the image to fit the fixed width and height
                ctx.drawImage(img, 0, 0, fixedWidth, fixedHeight);

                // Initial attempt to convert the canvas image to a Blob with the initial quality
                let compressedBlob = await new Promise(resolveBlob => {
                    canvas.toBlob(resolveBlob, 'image/jpeg', initialQuality);
                });

                // If the file size is larger than 1MB, adjust the quality
                let quality = initialQuality;

                while (compressedBlob.size > 1 * 1024 * 1024 && quality > 0.1) { // 1MB = 1 * 1024 * 1024 bytes
                    quality -= 0.1; // Decrease quality
                    compressedBlob = await new Promise(resolveBlob => {
                        canvas.toBlob(resolveBlob, 'image/jpeg', quality);
                    });
                }

                resolve(compressedBlob);
            };
            img.onerror = reject;
        };
        reader.readAsDataURL(file);
    });
}

// Validate file types and compress images for all photo uploads
document.querySelectorAll('.photo-upload').forEach(function(input) {
    input.addEventListener('change', async function() {
        const file = this.files[0];
        if (file) {
            const fileType = file.type;

            // Allow only JPEG and PNG formats
            if (fileType !== 'image/jpeg' && fileType !== 'image/png') {
                alert('Only JPEG and PNG formats are allowed.');
                this.value = ''; // Clear the file input if the format is invalid
                return;
            }

            // Compress the image to the same fixed width and height
            const compressedBlob = await compressImage(file, 500, 500); // Fixed width and height: 500x500
            const newFile = new File([compressedBlob], file.name, { type: fileType });

            // Replace the selected file with the compressed one
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(newFile);
            this.files = dataTransfer.files; // Update the file input with the compressed file
        }
    });
});
</script>
 <!-- This is the code for compress the size of photo End here -->





			<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
			<script src="assets/js/jquery-2.1.4.min.js"></script>
			<script type="text/javascript">
				$(".delete").on('click', function() {
					$('.case:checkbox:checked').parents("tr").remove();
					$('#check_all').prop("checked", false);
					calculateTotal1();
					calculateTotal2();
					calculateTotal3();
				});
				var i = 100;

				$(".addmore").on('click', function() {
					i++;
					var data = "<tr>";
					data += "<td><input type='checkbox' class='case'/></td>";
					data += "<td>" + i + "</td>";
					// data +="<td><input type='hidden' name='id1[]'  id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";

					data += "<td><input type='text' name='pname[]'  id='pname" + i + "' data-row='" + i + "' style='width:150px;' class='form-control pname" + i + "' onkeyup='s2(" + i + ")' onclick='showUser(this.value," + i + ")'> <div id='suggesstion-box" + i + "'></div>";
					data += "</td>";

					data += "<td><input type='text' name='serv_num[]' data-row='" + i + "' value='' style='width:60px;'  class='' id='serv_num" + i + "' /> </td>";
					data += "<td><input type='text' name='brand[]'   value='' style='width:50px;'  id='brand" + i + "' />	   </td>";
					data += "<td> <input type='text' name='model[]'   data-row='" + i + "'  value='' style='width:60px;' class=''   id='model" + i + "' /></td>";

					data += "<td><input type='text' name='hsn[]'  value='' style='width:50px;'  id='hsn" + i + "' />	   </td>";
					data += "<td> <input type='text' name='gst[]'  data-row='" + i + "'  value='' style='width:60px;' class='txt20'   id='gst" + i + "' /></td>";

					data += "<td><input type='text' name='uom[]'  id='uom" + i + "' value='' style='width:70px;' data-row='" + i + "'></td>";
					data += "<td><input type='text' name='price[]'  data-row='" + i + "' id='price" + i + "' style='width:70px;' value=''   /></td>";
					data += "<td><input type='text' name='qty[]'  data-row='" + i + "' onkeyup='qval(this.value," + i + ")' value='' style='width:60px;' class='txt1' id='qty" + i + "'  /> </td>";


					data += "<td><input type='text' name='amnt[]' data-row='" + i + "' value='' style='width:60px;'  class='txt tx6' id='amnt" + i + "' /> </td>";
					data += "<td><input type='text' name='serv_amnt[]' data-row='" + i + "' value='' style='width:60px;' class='txt7 '   id='serv_amnt" + i + "' /> </td>";

					data += "<td><input type='text' name='gst_amnt[]' data-row='" + i + "' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt" + i + "' /> </td>";
					data += "<td><input type='text' name='serv_amt[]' data-row='" + i + "'  style='width:60px;'  class='' id='serv_amt" + i + "' value='6'/> </td>";
					data += "<td><input type='hidden' name='id[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='id" + i + "' /> </td>";
					data += "<td><input type='hidden' name='cap[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='cap" + i + "' /> </td>";

					data += "<td><input type='hidden' name='serv_code[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='serv_code" + i + "' /> </td>";


					data += "</tr>";
					$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');


				});

				function select_all() {
					$('input[class=case]:checkbox').each(function() {
						if ($('input[class=check_all]:checkbox:checked').length == 0) {
							$(this).prop("checked", false);
						} else {
							$(this).prop("checked", true);
						}
					});
				}
			</script>


			<!--<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script>

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script>

<script>
$(document).ready(function(){
$(".txt4").each(function(){
$(this).keyup(function(){
calculateSumk();
});
});
});
function calculateSumk(){
var sum=0;
$(".txt4").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot_gst").val(sum.toFixed(2));

}
</script> -->
			<script src="assets/js/jquery-2.1.4.min.js"></script>

			<!-- <![endif]-->

			<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
			<script type="text/javascript">
				if ('ontouchstart' in document.documentElement)
					document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
			</script>
			<script src="assets/js/bootstrap.min.js"></script>

			<!-- page specific plugin scripts -->
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
			<script src="assets/js/dataTables.buttons.min.js"></script>
			<script src="assets/js/buttons.flash.min.js"></script>
			<script src="assets/js/buttons.html5.min.js"></script>
			<script src="assets/js/buttons.print.min.js"></script>
			<script src="assets/js/buttons.colVis.min.js"></script>
			<script src="assets/js/dataTables.select.min.js"></script>

			<!-- ace scripts -->
			<script src="assets/js/ace-elements.min.js"></script>
			<script src="assets/js/ace.min.js"></script>
			<script type="text/javascript">
				function val(str, id) {
					cal = 0;
					cal1 = 0;
					cal12 = 0;
					//alert(id);
					var price = document.getElementById("price" + id).value;
					var qty = document.getElementById("qty" + id).value;
					var gst = document.getElementById("gst" + id).value;
					var serv_amt = document.getElementById("serv_code" + id).value;
					//var serv_amtk=document.getElementById("serv_amnt"+id).value;
					//alert(serv_amtk);

					//var cgst=document.getElementById("cgst"+id).value;
					//var gst=Math.abs(sgst)+Math.abs(cgst);
					cal = eval(price) * eval(qty);
					//alert(cal);
					//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);
					cal12 = eval(price) * eval(qty) * eval(serv_amt) / 100;
					//alert(cal12);
					calk = (cal) + (cal12);
					//alert(calk);
					cal1 = eval(calk) * eval(gst) / 100;






					//document.getElementById("gst_amnt"+id).value=cal1;
					//alert(cal12);
					document.getElementById("serv_amnt" + id).value = Math.abs(cal12);
					//document.getElementById("serv_amnt"+id).value=cal12;


					document.getElementById("gst_amnt" + id).value = Math.abs(cal1);



				}

				function qval(str, id) {
					cal = 0;
					cal1 = 0;
					cal12 = 0;
					//alert(id);
					var price = document.getElementById("price" + id).value;
					var qty = document.getElementById("qty" + id).value;
					var gst = document.getElementById("gst" + id).value;
					var serv_amt = document.getElementById("serv_amt" + id).value;
					//var serv_amtk=document.getElementById("serv_amnt"+id).value;
					//alert(serv_amtk);

					//var cgst=document.getElementById("cgst"+id).value;
					//var gst=Math.abs(sgst)+Math.abs(cgst);
					cal = eval(price) * eval(qty);
					document.getElementById("amnt" + id).value = cal;

					//alert(cal);
					//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);
					cal12 = eval(price) * eval(qty) * eval(serv_amt) / 100;
					//alert(cal12);
					calk = (cal) + (cal12);
					//alert(calk);
					cal1 = eval(calk) * eval(gst) / 100;
					//document.getElementById("gst_amnt"+id).value=cal1;
					//alert(cal12);
					document.getElementById("serv_amnt" + id).value = Math.abs(cal12);
					//document.getElementById("serv_amnt"+id).value=cal12;


					document.getElementById("gst_amnt" + id).value = Math.abs(cal1);

					calculateTotal1();
					calculateTotal1k();
					calculateTotal1kk();
					calculateTotal1kv();

				}
			</script>

<script>
		    (function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();
  
  var canvas = document.getElementById('signatureCanvas');
//   console.log(canvas);
  var ctx = canvas.getContext('2d');
//   console.log(ctx);
    const signatureDataInput = document.getElementById('signatureData');
	// console.log(signatureDataInput);
    const clearButton = document.getElementById('clearSignature');
	// console.log(clearButton);

  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  function preventScroll(event) {
            event.preventDefault();
        }

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    document.addEventListener('touchmove', preventScroll, { passive: false });
    window.addEventListener('wheel', preventScroll, { passive: false });
    lastPos = getMousePos(canvas, e);
  }, false);
  
  canvas.addEventListener("mouseup", function(e) {
    stopDrawing();
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
    stopDrawing();
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }
  function stopDrawing() {
       drawing = false;
       document.removeEventListener('touchmove', preventScroll);
       window.removeEventListener('wheel', preventScroll);
        // Update the hidden input with base64 signature data
        signatureDataInput.value = canvas.toDataURL();
    }

  // Set up the UI
 
  clearButton.addEventListener("click", function(e) {
    clearCanvas();
  }, false);

})();    
		</script>

	</body>

	</html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>