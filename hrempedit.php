<?php //include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('dbconnection/connection.php');
$state=$_GET['state'];
if($state == "TS")
{
	$esic_number = "52530163390010607";
}elseif($state == "KN"){
	$esic_number = "53000163390000607";
}else{
	$esic_number = "Unknown";
}
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    include 'dbfiles/uqry_hremp.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'template/headerfile.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong {
            color: red;
        }
    </style>
    <script>
        function ConfirmDialog() {
            var x = confirm("Are you sure to delete record?")
            if (x) {
                return true;
            } else {
                return false;
            }
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
    </script>

    <body class="no-skin">

        <?php include 'template/logo.php'; ?>

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
                <?php include 'template/sidemenu.php' ?>
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
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Edit Employee Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="#">
                            <center style="color:#192436"><u><b>
                                        <h1>EDIT EMPLOYEE</h1>
                                    </b></u></center>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">

                                    </div>
                                    <?php $id = $_GET['id'];

                                    //include('config.php');

                                    $res = mysqli_query($link, "select * from emps where empid='$id'") or die(mysqli_error());
                                    $rw = mysqli_fetch_array($res) or die(mysqli_error());
                                    //$to=$rw['btype'];
                                    //$msg=$rw['msg'];
                                    $employeeId = $rw['employeeid'];
                                    //echo($employeeId);
                                    $certquery = mysqli_query($link, "select * from certificates where employeeid = '$employeeId' order by id asc");
                                    $crows = mysqli_num_rows($certquery);
                                    //echo($check_num_rows);
$state=$rw['state'];

                                    ?>

                                    <form name="frm" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="hidden" name="ses" value="<?php echo $name; ?>">
                                        <table class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <td align="right">State:</td>
                                                <td><input type="text" readonly  value="<?php echo $rw['state'] ?>"  name="state" id="state" class="form-control"></td>
                </tr>

                                            <tr>
                                                <td align="right">ESIC Number</td>
                                                <td><input type="text" readonly  value="<?php echo $rw['esic_number'] ?>"  name="esic_number" id="esic_number" class="form-control"></td>
                                        </tr>

                <tr>
                                                <td align="right">Employee ID</td>
                                                <td><input type="text" readonly value="<?php echo $rw['employeeid'] ?>"  name="eid" id="eid" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Name of Employee </td>
                                                <td><input type="text" class="form-control" value="<?php echo $rw['emp_name'] ?>"  name="empname" id="empname"></td>
                                                </tr>
                <tr>
                                                <td align="right">DOB</td>
                                                <td><input type="date" value="<?php echo date('Y-m-d', strtotime($rw["DOB"])) ?>"  name="dob" id="dob" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Gender</td>
                                                <td align="left">


                                                    <label><input type="radio" name="gender" value="Male" <?php if (strtolower($rw['gender']) == "male") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>Male</label>
                                                    <label><input type="radio" name="gender" value="female" <?php if (strtolower($rw['gender']) == "female") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>feMale</label>

                                                </td>

                                                </tr>
                                                <tr>


                                                <td align="right">Marital Status</td>
                                                <td>
                                                    <input type="radio" id="married" onchange="showchildren(this)" name="marstatus" value="married" <?php if (strtolower($rw['maritalstatus']) == "married") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                    <label for="married">Married</label>
                                                    <input type="radio" id="unmarried" name="marstatus" onchange="showchildren(this)" value="unmarried" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                    <label for="unmarried">unmarried</label>
                                                </td>
                                            </tr>
                                            <tr id="childrenblock" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                        echo 'hidden';
                                                                    } ?>>

                                                <td align="right">Wife Name</td>
                                                <td align="left">
                                                    <input type="text" value="<?php echo $rw['wname'] ?>" class="form-control" name="wname" id="wname" placeholder="Enter your Wife name">
                                                </td>
                                                </tr>
                                                <tr id="nokblock" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                            echo 'hidden';
                                                                        } ?>>
                                                <td align="right">No of kids</td>
                                                <td align="left">
                                                    <input type="number" name="nok" id="nok" value="<?php echo $rw['nok'] ?>" placeholder=" enter your number of kids " class="form-control" />
                                                </td>
</tr>

                                            
                                            <tr id="childrennameblock" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                            echo 'hidden';
                                                                        } ?>>
                                                <td align="right">Children Names</td>
                                                <td align="left">
                                                    <textarea name="childname" id="childname" value="<?php echo $rw['childname'] ?>" class="form-control"><?php echo $rw['childname'] ?></textarea>
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">Blood Group </td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['bg'] ?>" id="bg" name="bg">

                                                </td>
                                            </tr>
                                            <tr>

                                                <td align="right">Father Name</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['fname'] ?>" name="fname" id="fname">
                                                </td>

                                                </tr>
                                                <tr>
                                                <td align="right">Mother Name </td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['mname'] ?>" id="mname" name="mname">

                                                </td>
                                            </tr>
                                            <tr>

                                                <td align="right">Contact No.</td>
                                                <td align="left">
                                                    <input type="number" readonly value="<?php echo $rw['contactno'] ?>" class="form-control" name="conno" id="conno">
                                                </td>
                                                </tr>
                                                <tr>

                                                <td align="right">Alternate Contact No. </td>
                                                <td align="left">
                                                    <input type="number" class="form-control" value="<?php echo $rw['alternateno'] ?>" id="aconno" name="aconno">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Family Member Contact No. </td>
                                                <td align="left">

                                                    <select name="relation" >
                                                        <option value="<?php echo $rw['relation']; ?>"><?php echo $rw['relation']; ?></option>
                                                        <option value="">Relation</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Wife">Wife</option>
                                                    </select>
                                                    <input type="text" class="text" style="width:75% !important;" value="<?php echo $rw['rno']; ?>" name="rno" id="rno" ="" />

                                                
                                            </td>
                                            </tr>
                <tr>
                                                <td align="right">Email Id</td>
                                                <td>
                                                    <input type="text"  name="email" id="email" value="<?php echo $rw['emp_email'] ?>" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right">Aadhar No</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['adharcardno'] ?>" name="adhar" id="adhar">
                                                </td>
                                                </tr>

                                               <tr>
                                                <td align="right"> Adhar Photo(Front)</td>
                                                <td align="left">
                                                    <input type="file" name="adharimg" id="adharimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
                                                    <?php
                                                    if ($rw['adharphoto'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['adharphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right"> Adhar Photo(Back)</td>
                                                <td align="left">
                                                    <input type="file" name="adharphotoback" id="adharphotoback" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
                                                    <?php
                                                    if ($rw['adharphotoback'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['adharphotoback'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            
                                            <tr>
                                                <td align="right">PAN No.</td>
                                                <td>
                                                    <input type="text"  name="pan" value="<?php echo $rw['pan'] ?>" id="pan" class="form-control photo-upload" accept=".jpg, .jpeg, .png">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right"> PAN Card Photo</td>
                                                <td align="left">
                                                    <input type="file" name="panimg" id="panimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
                                                    <?php
                                                    if ($rw['panphoto'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['panphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">UAN No.</td>
                                                <td align="left">
                                                    <input type="text"  name="uan" value="<?php echo $rw['uan'] ?>" id="uan" class="form-control">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">PF No.</td>
                                                <td>
                                                    <input type="text"  name="pf" value="<?php echo $rw['PFNO'] ?>" id="pf" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">ESI No.</td>
                                                <td align="left">
                                                    <input type="text"  name="esi" id="esi" value="<?php echo $rw['ESI_NO'] ?>" class="form-control">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">DOJ</td>
                                                <td align="left">
                                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["DOJ"])) ?>"  name="doj" id="doj" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
    <td align="right">Status</td>
    <td align="left">
        <select name="stat" id="stat" class="form-control">
            <option value="UNBLOCKED" <?php echo ($rw["stat"] == "UNBLOCKED") ? 'selected' : ''; ?>>UNBLOCKED</option>
            <option value="BLOCKED" <?php echo ($rw["stat"] == "BLOCKED") ? 'selected' : ''; ?>>BLOCKED</option>
        </select>
    </td>
</tr>
                                            <tr>
                                                <td align="right">Qualification</td>
                                                <td align="left">
                                                    <input type="text"  name="qua" value="<?php echo $rw['qualification'] ?>" id="qua" class="form-control">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">Experience</td>
                                                <td>
                                                    <input type="text"  name="exp" value="<?php echo $rw['experience'] ?>" id="exp" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right"> Designation</td>
                                                <td>
                                                    <input type="text" name="des" id="des" value="<?php echo $rw['designation'] ?>"  class="form-control">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">Photo</td>
                                                <td align="left">
                                                    <input type="file" name="empimg" id="empimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />

                                                    <?php
                                                    if ($rw['photo'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['photo'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Address</td>
                                                <td align="left">

                                                    <textarea  name="address" id="address" value="<?php echo $rw['address'] ?>" class="form-control"><?php echo $rw['address'] ?></textarea>
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">City</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['city'] ?>" name="city" id="city">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right">Emp ID Card(Front)</td>
                                                <td align="left">
                                                    <input type="file" name="empidcardfront" id="empidcardfront" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />

                                                    <?php
                                                    if ($rw['empidcardfront'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['empidcardfront'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right">Emp ID Card(Back)</td>
                                                <td align="left">
                                                    <input type="file" name="empidcardback" id="empidcardback" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />

                                                    <?php
                                                    if ($rw['empidcardback'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['empidcardback'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>


                                            <tr>
													    <td align="right"> Select Wiremen License Status</td>
                                                         <td><select name="licensestatus" id="licensestatus" required class="form-control">
																<option value="NA" <?php echo ($rw["licensestatus"] == "NA") ? 'selected' : ''; ?>>NA</option>
																<option value="Available" <?php echo ($rw["licensestatus"] == "Available") ? 'selected' : ''; ?>>Available</option>
																<option value="Need to Apply" <?php echo ($rw["licensestatus"] == "Need to Apply") ? 'selected' : ''; ?>>Need to Apply</option>
																<option value="Acknowledgement Available" <?php echo ($rw["licensestatus"] == "Acknowledgement Available") ? 'selected' : ''; ?>>Acknowledgement Available</option>
																
															</select> </td> 

</tr>
<tr>
														<td align="right">License Photo</td>
														<td align="left">
															<input type="file" name="licimg" id="licimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
															<?php
                                                    if ($rw['licimg'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['licimg'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
														</td>
													</tr>

                                                    <!-- <tr>
													    <td align="right">Office Uniform</td>
                                                        <td>
                                                        <input type="text" class="form-control"  value="<?php echo $rw['uniform'] ?>" id="uniform" name="uniform" placeholder="Enter User Name">
			
															</select> 
                                                        </td> 
                                                    </tr> -->

                                                            <!-- <tr>
                                                <td align="right">Uniform Issue Date</td>
                                                <td align="left">
                                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["uniformisdate"])) ?>"  name="uniformisdate" id="uniformisdate" class="form-control">
                                                </td>
                                            </tr> -->
                                            <tr>

</tr>
                                                    
                                                    <tr>
                                                <td align="right">Site Name</td>
                                                <td align="left">
                                                    <input type="text" class="form-control"  value="<?php echo $rw['sitename'] ?>" id="sitename" name="sitename" placeholder="Enter User Name">
                                                </td>
                                                </tr>

                                                <tr>
                                                <td align="right">Employee Fingerprint</td>
                                                <td align="left">
                                                    <input type="file" name="empfingerprint" id="empfingerprint" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />

                                                    <?php
                                                    if ($rw['empfingerprint'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['empfingerprint'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right">User Name</td>
                                                <td align="left">
                                                    <input type="text" class="form-control"  value="<?php echo $rw['username'] ?>" id="uname" name="uname" placeholder="Enter User Name">
                                                </td>
                                                </tr>
                <tr>
                                                <td align="right">Password</td>
                                                <td>
                                                    <input type="text" class="form-control"  value="<?php echo $rw['password'] ?>" id="pwd" name="pwd" placeholder="Enter Password">
                                                </td>
                                            </tr>
</table>

<table class="table table-striped table-bordered table-hover">
                                                        <center style="color:#192436"><u><b>
                                                                    <h1>Uniform Details</h1>
                                                                </b></u></center>
                                                        <br />
                                                        <tr>
                                                            <td align="right">Shirt</td>
                                                            <td align="left">
                                                                <select name="ushirt" id="ushirt" class="form-control">
                                                                    <option value="T-Shirt Block" <?php echo ($rw["ushirt"] == "T-Shirt Block") ? 'selected' : ''; ?>>T-Shirt Block</option>
                                                                    <option value="T-Shirt Blue" <?php echo ($rw["ushirt"] == "T-Shirt Blue") ? 'selected' : ''; ?>>T-Shirt Blue</option>
                                                                    <option value="White Shirt" <?php echo ($rw["ushirt"] == "White Shirt") ? 'selected' : ''; ?>>White Shirt</option>
                                                                    <option value="Brown Shirt" <?php echo ($rw["ushirt"] == "Brown Shirt") ? 'selected' : ''; ?>>Brown Shirt</option>
                                                                    <option value="Knight frank" <?php echo ($rw["ushirt"] == "Knight frank") ? 'selected' : ''; ?>>Knight frank</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                <tr>
                                                            <td align="right">Shirt Size</td>
                                                            <td align="left">
                                                                <input type="text" class="form-control"  id="shirtsize" name="shirtsize" value="<?php echo $rw['shirtsize'] ?>" placeholder="Enter Enter Shirt Size">
                                                            </td>
                                                            </tr>

                                                            <tr>
                                                            <td align="right">Pant</td>
                                                            <td align="left">
                                                                <select name="upant" id="upant" class="form-control">
                                                                    <option value="pant" <?php echo ($rw["upant"] == "Jeans Pant") ? 'selected' : ''; ?>>Jeans Pant</option>
                                                                    <option value="pant" <?php echo ($rw["upant"] == "Block Pant") ? 'selected' : ''; ?>>Block Pant</option>
                                                                    <option value="pant" <?php echo ($rw["upant"] == "Regular Pant") ? 'selected' : ''; ?>>Regular Pant</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="right">Pant Size</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="pantsize" name="pantsize" value="<?php echo $rw['pantsize'] ?>" placeholder="Enter Pant Size">
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="right">Shoe</td>
                                                            <td align="left">
                                                                <select name="ushoe" id="ushoe" class="form-control">
                                                                    <option value="pant" <?php echo ($rw["ushoe"] == "Fiber") ? 'selected' : ''; ?>>Fiber</option>
                                                                    <option value="pant" <?php echo ($rw["ushoe"] == "Metal") ? 'selected' : ''; ?>>Metal</option>
                                                                    <option value="pant" <?php echo ($rw["ushoe"] == "Steel") ? 'selected' : ''; ?>>Steel</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="right">Shoe Size</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="shoesize" name="shoesize" value="<?php echo $rw['shoesize'] ?>" placeholder="Enter Shoe Size">
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                <td align="right">Uniform Issue Date</td>
                                                <td align="left">
                                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["uniformisdate"])) ?>"  name="uniformisdate" id="uniformisdate" class="form-control">
                                                </td>
                                            </tr>

                                            

                                                    </table>

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <center style="color:#192436"><u><b>
                                                                    <h1>Employee Address</h1>
                                                                </b></u></center>
                                                        <br />
                                                        <tr>

                                                            <td align="right"> Permanent Address</td>
                                                            <td>
                                                                <input type="text" name="permaddress" id="permaddress"  class="form-control" value="<?php echo $rw['permaddress'] ?>" placeholder="Enter Permanent Address">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">Local Address</td>
                                                            <td align="left">
                                                                <input type="text" class="form-control"  id="localaddress" name="localaddress" value="<?php echo $rw['localaddress'] ?>" placeholder="Enter Local Address">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">Reference Address</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="refeaddress" name="refeaddress" value="<?php echo $rw['refeaddress'] ?>" placeholder="Enter Reference Address">
                                                                </td>
                                                        </tr>

                                                    </table>

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <center style="color:#192436"><u><b>
                                                                    <h1>Nominee Details</h1>
                                                                </b></u></center>
                                                        <br />
                                                        <tr>

                                                            <td align="right">Name</td>
                                                            <td>
                                                                <input type="text" name="nname" id="nname"  class="form-control" value="<?php echo $rw['nname'] ?>" placeholder="Enter Nominee Name">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">Relationship</td>
                                                            <td align="left">
                                                                <input type="text" class="form-control"  id="nrelation" name="nrelation" value="<?php echo $rw['nrelation'] ?>" placeholder="Enter Nominee Relationship">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">Address</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="naddress" name="naddress" value="<?php echo $rw['naddress'] ?>" placeholder="Enter Nominee Address">
                                                                </td>
                                                        </tr>

                                             <tr>
                                                <td align="right">Nominee DOB</td>
                                                <td><input type="date" value="<?php echo date('Y-m-d', strtotime($rw["ndob"])) ?>"  name="ndob" id="ndob" class="form-control"></td>
                                            </tr>

                                            <tr>
                                                            <td align="right">Amount</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="namount" name="namount" value="<?php echo $rw['namount'] ?>" placeholder="Enter Amount">
                                                                </td>
                                                        </tr>

                                                        <tr>
													    <td align="right"> PF Scheme</td>
                                                         <td><select name="pfscheme" id="pfscheme" required class="form-control">
																<option value="Yes" <?php echo ($rw["pfscheme"] == "Yes") ? 'selected' : ''; ?>>Yes</option>
																<option value="No" <?php echo ($rw["pfscheme"] == "No") ? 'selected' : ''; ?>>No</option>
															</select> </td> 

</tr>

<tr>
													    <td align="right"> Pension Scheme</td>
                                                         <td><select name="pensionscheme" id="pensionscheme" required class="form-control">
																<option value="Yes" <?php echo ($rw["pensionscheme"] == "Yes") ? 'selected' : ''; ?>>Yes</option>
																<option value="No" <?php echo ($rw["pensionscheme"] == "No") ? 'selected' : ''; ?>>No</option>
																
															</select> </td> 

</tr>

                                                    </table>

                                           

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <center style="color:#192436"><u><b>
                                                                    <h1>BANK DETAILS</h1>
                                                                </b></u></center>
                                                        <br />
                                                        <tr>

                                                            <td align="right"> Bank Name.</td>
                                                            <td>
                                                                <input type="text" name="banknm" id="banknm"  class="form-control" value="<?php echo $rw['bname'] ?>">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">Branch of Bank</td>
                                                            <td align="left">
                                                                <input type="text" class="form-control"  id="bb" name="bb" value="<?php echo $rw['branch'] ?>">
                                                            </td>
                                                            </tr>
                <tr>
                                                            <td align="right">IFSC Code</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="ifsc" name="ifsc" value="<?php echo $rw['ifsc'] ?>">
                                                                </td>
                                                        </tr>

                                                        <tr>

                                                            <td align="right"> Account No.</td>
                                                            <td>
                                                                <input type="text" name="acno" id="acno"  class="form-control" value="<?php echo $rw['accno'] ?>">
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                            <td align="right">Photo of Passbook/ Cancelled Cheque</td>
                                                            <td align="left">
                                                                <input type="file" name="bankimg" id="bankimg" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
                                                                <?php
                                                                if ($rw['bphoto'] != "") {
                                                                ?>
                                                                    <a href='<?php echo $rw['bphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                                                    </table>

                                                    

                                                    
                                                    

                                
                                                    <table class="table">
        <center style="color:#192436">
            <u><b><h1>CERTIFICATE DETAILS</h1></b></u>
        </center>
        <br />
        <?php
        $i = 1;
        while ($i < 7) {
            if ($i <= $crows) {
                $certRes = mysqli_fetch_array($certquery) or die(mysqli_error($link));
            } else {
                $certRes = ["id" => "", "cername" => "", "cerno" => ""];
            }
        ?>
            <tr>
                <!-- <td><b><?php echo $i; ?>.</b></td> -->
                <input type="hidden" name="<?php echo 'certid' . $i ?>" value="<?php echo $certRes['id'] ?>">
                <td align="right">Name.</td>
                <td>
                    <input type="text" name="<?php echo 'cname' . $i ?>" id="<?php echo 'cname' . $i ?>" value="<?php echo $certRes['cername'] ?>" class="form-control">
                </td>
                </tr>
                <tr>
                <td align="right">Certificate No.</td>
                <td align="left">
                    <input type="text" class="form-control" id="<?php echo 'cno' . $i ?>" value="<?php echo $certRes['cerno'] ?>" name="<?php echo 'cno' . $i ?>">
                </td>
                </tr>
                <tr>
                <td align="right">Photo</td>
                <td align="left">
                    
                    <input type="file" name="<?php echo 'img' . $i ?>" id="<?php echo 'img' . $i ?>" class="form-control photo-upload" accept=".jpg, .jpeg, .png" />
                    	<?php
                                                    if ($certRes['cerphoto'] != "") {
                                                    ?>
                                                        <a href='<?php echo $certRes['cerphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                </td>
            </tr>

                                                          
        <?php
            $i++;
        }
        ?>

                                                        <!-- <tr>
                                                            <td align="right">Employee Signature</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control"  id="empsign" name="empsign" value="<?php echo $rw['empsign'] ?>">
                                                                </td>
                                                        </tr> -->


                                                        <tr>

                                                            <td align="right">Employee Signature</td>

                                                                <td align="left">

                                                                    <canvas id="signatureCanvas" width="300" height="150" style="border: 2px solid black;"></canvas><br>
                                                            <button type="button" id="clearSignature">Clear</button><br><br>
                                                            <?php
                                                            if ($rw['empsign'] != "") {
                                                            ?>
                                                            <a href='<?php echo $rw['empsign'] ?>' target="_blank" style="color:blue;">view sign</a>
                                                            <?php
                                                            }
                                                            ?>

                                                            <input type="hidden" id="signatureData" name="signatureData">    

                                                                </td>

                                                            </tr>

                                                                </table>





                                        

                                        


                                            <div class="form-group">
                                                <div class="col-md-offset-4 col-md-8">


                                                    <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                        <i class="ace-icon fa fa-save bigger-110"></i>
                                                        Save
                                                    </button>





                                                    &nbsp; &nbsp; &nbsp;
                                                    <a href="employeelist.php?state=<?php echo $state; ?>"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                            <i class="ace-icon fa fa-close bigger-110"></i>
                                                            Close
                                                        </button></a>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->



                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
        </div><!-- /.main-content -->

        <?php include('template/footer.php'); ?>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
        </div><!-- /.main-container -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>


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
  var ctx = canvas.getContext('2d');
    const signatureDataInput = document.getElementById('signatureData');
    const clearButton = document.getElementById('clearSignature');

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

 <!-- This is the code for compress the size of photo End here -->
  

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
</script>  -->

    </body>
    <?php mysqli_close($link); ?>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>