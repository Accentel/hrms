<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state=$_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    include 'dbfiles/iqry_emp.php';
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
                                <a href="#">Tools</a>
                            </li>
                            <li>
                                <a href="#">Purchase Tools</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>


                    <div style="margin-bottom:20px;">
                        <?php if (($tsname == "8919765662") or ($tsname == "9985744288") or ($tsname == "9985894749") or ($tsname == "9959419056") or ($tsname == "9182198721") or ($tsname == "9666466368")) {
                        } else { ?>
                            <button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_ptinv.php?state=<?php echo $state ?>'" id="bsearch"> Add New </button>
                        <?php } ?>
                    </div>
                    <div class="row">

                        <?php
                        $datatable = "tool_phr_master";
                        $results_per_page = 20;
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"];
                        } else {
                            $page = 1;
                        };
                        $start_from = ($page - 1) * $results_per_page;
                        $sql = "SELECT * FROM tool_phr_master join  add_tool_phr on tool_phr_master.id1=add_tool_phr.id where add_tool_phr.state = '$state' ORDER BY tool_phr_master.id ASC LIMIT $start_from, " . $results_per_page;
                        $rs_result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        ?>
                        <div class="col-xs-12">
                            <div class="table-header">
                                Tool Purchase List
                            </div>
                            <div style="height:15px;"></div>
                            <form method="post" action="" class="form-horizontal">

                                <div class="form-group">



                                    <div class="col-sm-8">

                                        <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Tool Name or Invoice Number or Supplier Name">
                                    </div>
                                    <div class="col-sm-2">

                                        <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                            Search
                                        </button>
                                    </div>
                                    <div class="col-sm-2">
                                        <b><a href="ptoollist_excel.php?state=<?php echo $state; ?>" class="btn btn-primary btn-xs">XL Download</a></b></div>

                                </div>
                                </div>

                            </form>
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th class="detail-col">S No</th>
                                        <th>Tool Name</th>
                                        <th>Tool Price</th>
                                        <th>Supplier Name</th>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>                                        
                                        <th class="hidden-480">Quantity</th>

                                        <th class="hidden-480">Action</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_POST['bsearch'])) {
                                        $bsearch = $_POST['search'];
                                        $y = "SELECT * FROM tool_phr_master join add_tool_phr on tool_phr_master.id1=add_tool_phr.id where add_tool_phr.state = '$state' and (tool_phr_master.toolname like  '%$bsearch%' or add_tool_phr.inv_no like '%$bsearch%' or add_tool_phr.supname like '%$bsearch%')";

                                        
                                        $t = mysqli_query($link, $y) or die(mysqli_error($link));
                                        $i = 1;
                                        while ($t1 = mysqli_fetch_array($t)) {


                                    ?>

                                            <tr>

                                                <td><?php echo $i; ?></td>


                                                <td>
                                                    <?php echo $t1['toolname']; ?>
                                                </td>
                                                <td><?php echo $t1['rate']; ?></td>
                                                <td> <?php echo $t1['supname']; ?></td>
                                                <td> <?php echo $t1['inv_no']; ?></td>
                                                <td> <?php echo $t1['inv_date']; ?></td>


                                                <td>
                                                    <?php echo $t1['qty']; ?>
                                                </td>


                                                <td class="hidden-480">
                                                    <!--<a href="editemp.php?id=<?php echo $t1['empid']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>-->
                                                    &nbsp;&nbsp;
                                                    <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deletetoolpurchase.php?id=<?php echo $t1['id1']; ?>&state=<?php echo $state?>"><img src="images/Icon_Delete.png"></a>
                                                </td>






                                            </tr>




                                        <?php $i++;
                                        }
                                    } else { ?>

                                        <?php

                                        $i = 1;
                                        while ($rs1 = mysqli_fetch_array($rs_result)) {

                                        ?>
                                            <tr>

                                                <td><?php echo $i; ?></td>

                                                <td>
                                                    <?php echo $rs1['toolname']; ?>
                                                </td>
                                                <td><?php echo $rs1['rate']; ?></td>
                                                <td> <?php echo $rs1['supname']; ?></td>
                                                <td> <?php echo $rs1['inv_no']; ?></td>
                                                <td> <?php echo $rs1['inv_date']; ?></td>
                                                <td><?php echo $rs1['qty']; ?></td>
                                                <td class="hidden-480">
                                                    <!--<a href="editemp.php?id=<?php echo $rs1['empid']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>-->
                                                    &nbsp;&nbsp;
                                                    <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deletetoolpurchase.php?id=<?php echo $rs1['id1']; ?>&state=<?php echo $state?>"><img src="images/Icon_Delete.png"></a>
                                                </td>
                                            </tr>
                                    <?php $i++;
                                        }
                                    } ?>


                                </tbody>
                            </table>
                            <div align="center">
                                <?php
                                
                                $sql = "SELECT COUNT(*) AS total FROM " . $datatable ." where state = '$state'";
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

                                echo "<ul class='pagination'>";
                                echo "<li><a href='ptoollist.php?state=$state&page=" . ($page - 1) . "' class='button'>Previous</a></li>";

                                echo "<li><a>" . $page . "</></li>";

                                echo "<li><a href='ptoollist.php?state=$state&page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
                                echo "</ul>";
                                ?>

                            </div>
                        </div><!-- /.span -->
                    </div>

                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
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
            $(document).ready(function() {

                $("#success-alert").hide();
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#success-alert").alert('close');
                    window.location.href = window.location.href;
                });
                //$( '#validation-form' ).reset();


                $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    })
                    //show datepicker when clicking on the icon
                    .next().on(ace.click_event, function() {
                        $(this).prev().focus();
                    });

                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization










            });
        </script> <!-- inline scripts related to this page -->
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