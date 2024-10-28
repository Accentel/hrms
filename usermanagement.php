<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
      <?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
        .color{
            color:lightblue;
        }
        .color:hover{
            color:blue;
        }
    
    </style>
	<script>
        function ConfirmDialog() {
        var x=confirm("Are you sure to delete record?")
        if (x) {
            return true;
        } else {
            return false;
        }
            }
    </script>
    <body class="no-skin">
            <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
                    <script type="text/javascript">
                        try {
                            ace.settings.loadState('main-container')
                        } catch (e) {
                        }
                    </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div><!-- Exit Sidebar... -->

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                                <li>
                                <i class="ace-icon fa fa-user"></i>
                                <a href="#">User Management</a>
                            </li>
                            
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">Employee Details</h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                       <h3 class="box-title">Employee Details</h3>
                                    </div>
                        
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="user_insert.php">
                                        <div class="box-body">
                                            <!-- /Employee Photo-->
                                            <div class="form-group">			
                                                <label for="lblempfile" class="col-sm-2 control-label">Employee Name:</label>

                                                <div class="col-sm-4">
                                                    <input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />
                                                    <select class="form-control" name="empname" id="empname">
                                                        <option value="">Select Emp Name</option>
                                                    <?php 
                                                        $r=mysqli_query($link,"select * from employee") or die(mysqli_error($link));
                                                        while($r1=mysqli_fetch_array($r)){?>
                                                            
                                                            <option value="<?php echo $r1['empid'] ?>"><?php echo $r1['emp_name']; ?></option>
                                                    <?php	}?>
                                                    </select>
                                                </div>
                                    
                                            </div>	

                                            <div class="form-group">			
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="2" /><b>Settings</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" />Update Organization<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" />Tool Category<br/>	
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="23" />Usermanagement<br/>			    		    
                                                </div>


                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="3" /><b>AP Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="32" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="33" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="34" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="35" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="36" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="37" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="305" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="38" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="39" />Add Tool Purchase<br/>				  				  
                                                </div>
                                    
                                                
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="4" /><b>TS Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="405" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" />Add Tool Purchase<br/>				  				  
                                                </div>
                                                

                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="5" /><b>KL Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="505" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="58" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="59" />Add Tool Purchase<br/>				  				  
                                                </div>
                                                
                                                                
                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="6" /><b>TN Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="61" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="62" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="63" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="64" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="65" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="66" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="67" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="605" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="68" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="69" />Add Tool Purchase<br/>				  				  
                                                </div>
                                                

                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="7" /><b>KN Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="76" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="77" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="705" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="78" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="79" />Add Tool Purchase<br/>				  				  
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="8" /><b>OR Track Formats</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" />Appointment List<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" />Relieving List <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" />Add Employee<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" />Resigned Employees<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="86" />Assign Tools <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="87" />Expired Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="805" />Pending Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="88" />Add Tools<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="89" />Add Tool Purchase<br/>				  				  
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="checkbox" name="menu[]" value="9" /><b>Portfolio</b><br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="91" />Appointment Letter<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="92" />Tool Declaration <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="93" />NOC<br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="94" />Reliving Letter<br/>		  				  
                                                </div>    	
                                                        
                                                
                                            </div>				 
                                                <!-- /Employee Name< -->
                                    
                                                <!-- /Admission No -->
                                    
                                    
                                                    <!-- /Roll.No -->
                                            <div class="form-group">
                                                <div class="col-md-offset-4 col-md-8">
                                                    <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                        <i class="ace-icon fa fa-save bigger-110"></i>
                                                        Save
                                                    </button>

                                                    &nbsp; &nbsp; &nbsp;
                                                    <button class="btn" type="reset">
                                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                                        Reset
                                                    </button>
                                                    &nbsp; &nbsp; &nbsp;
                                                    <a href="usermanagement.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                        <i class="ace-icon fa fa-close bigger-110"></i>
                                                        Close
                                                    </button></a>
                                                </div>
                                                <br/>
                                                    <!-- /.box-body -->
                                            </div>              
                                        </div>           <!-- /.box-body -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- PAGE CONTENT ENDS -->
                                
                    <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        

                                        
                                        <div class="table-header">
                                            Users  List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
                                                            <label class="pos-rel">
                                                                <input type="checkbox" class="ace" />
                                                                <span class="lbl"></span>
                                                            </label>
                                                        </th>
                                                        <th>S No</th>
                                                            <th>Emp Name</th>
                                                            <th>User Name</th>
                                                            <th>Password</th>                                                   
                                                            <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                               $q="select a.user,a.empname,b.emp_name,b.password from admin_login a,employee b where a.empname=b.empid and a.user!='admin'";
                                                    $rs= mysqli_query($link,$q) or die(mysqli_error($link));
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs)){
                                                    
                                                    ?>
                                                    <tr>
                                                        
                                                        <td class="center">
                                                            <label class="pos-rel">
                                                                <input type="checkbox" class="ace" />
                                                                <span class="lbl"></span>
                                                            </label>
                                                        </td>
                                                        <td><?php echo $i; ?></td>
                                                        
                                                        <td class="hidden-480"><?php echo $rs1['emp_name']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['user']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['password']; ?></td>
                                                        
                                                                                            
                                                        <td class="hidden-480"><a href="edituser.php?id=<?php echo $rs1['empname']; ?>"><i class="color ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                            <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteuser.php?id=<?php echo $rs1['empname']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                        
                                                        
                                                        
                                                    </tr>
                                                    <?php $i++; }?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>					
                    </div><!-- /.row -->
                    
                </div><!-- ..main-content inner...-->
            </div><!-- /.main-content -->

            <?php include('template/footer.php'); ?>

                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
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
        <script src="assets/js/jquery-ui.custom.min.js"></script>

        <script src="assets/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/bootstrap-timepicker.min.js"></script>



        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script>
                        $(document).ready(function () {

                            $("#success-alert").hide();
                            $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                                $("#success-alert").alert('close');
                                window.location.href=window.location.href;
                            });
                            //$( '#validation-form' ).reset();


                            $('.date-picker').datepicker({
                                autoclose: true,
                                todayHighlight: true
                            })
                                    //show datepicker when clicking on the icon
                                    .next().on(ace.click_event, function () {
                                $(this).prev().focus();
                            });

                        

                            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                        });


        </script>		<!-- inline scripts related to this page -->
    </body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>