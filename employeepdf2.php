<?php //include('config.php');
session_start();
include 'dbconnection/connection.php';
require_once __DIR__ . '/vendor/vendor/autoload.php';
if ($_SESSION['user']) 
{
    $name = $_SESSION['user'];
//include('org1.php');

    include 'dbfiles/org.php';
    include 'dbfiles/uqry_emp.php';
    ?>
     <?php

ob_start();?>
<!DOCTYPE html>
<html lang="en">
    <?php
//  include'template/headerfile.php';
    ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
        table, th, td {
  border: 1px solid black;

}




		h2 {
            margin: -2px 0;
            font-size: 16px;
            text-align: center;
            
            
             
        }
       
        .outer-box {
    width: 190px;
    height: 15px;
    padding: 10px;
    border: 3px solid black;
    display: flex;
    align-items: center;
    text-align: center;
    margin-left: 250px;
    
    
}

.inner-box {
    width: 160px;
    height: 10px;
    padding: 10px;
    border: 1px solid black;   
    

}

table {
    width: 100%;
    /* margin-left: 220px; */
    border-collapse: collapse; /* Ensures no gaps between table cells */
    margin-top: 20px;
    text-align: center;
}

th, td {
    /* padding: 10px; */
    text-align: center;
}

th {
    font-weight: lighter ;
    font-size: 17px;
}

td {
    font-size: 13px;
}

    </style>
    <body class="no-skin">

        



                      <?php $id = $_GET['id'];

//include('config.php');
    $query = "select * from emp where empid='$id'";
    $res = mysqli_query($link,$query) or die("Error: " . mysqli_error($link));
    $rw = mysqli_fetch_array($res) or die("Error: " . mysqli_error($link));
//$to=$rw['btype'];
//$msg=$rw['msg'];
    $employeeId = $rw['employeeid'];
//echo($employeeId);
    $query1 = "select * from certificates where employeeid = '$employeeId'";
    $certquery = mysqli_query($link, $query1);
    $crows = mysqli_num_rows($certquery);
//echo($check_num_rows);
    $state = $rw['state'];



    $nominee_name = ''; // Default empty value
$nominee_relation = ''; // Default relation

if ($gender == 'Male' && $marital_status == 'Married') {
    $nominee_name = $rw['wname'];  // Display wife's name
    $nominee_relation = 'Wife';  // Relation is Wife
} elseif ($gender == 'Female' && $marital_status == 'Married') {
    $nominee_name = $rw['husband_name'];  // Display husband's name
    $nominee_relation = 'Husband';  // Relation is Husband
} else {
    // Unmarried Male or Female will show father's name
    $nominee_name = $rw['fname'];
    $nominee_relation = 'Father';  // Relation is Father
}

    ?>

    
                                <div class="outer-box">
        <div class="inner-box">
           <h2>FORM 2 (Revised)</h2> 
        </div>
    </div>

<h2 style="text-align: center; margin-top: 30px;">NOMINATION AND DECLARATION FORM FOR UNEXEMPTED/<br>EXEMPTED ESTABLISHMENT</h2>

<p style="text-align: center; font-weight: bold; ">Declaration and Nomination form under the Employees' Provident Funds and<br> Employees' Pension Scheme</p>

<p style="text-align: center; font-size:small;">(Paragraphs 33 & 61 (1) of the Employees Provident Fund Scheme, 1952 and paragraphs 18 of the Employees' Pension Scheme, 1995)</p>

<p>1.<span style="margin-left:10px"> Name (in Block letters)<span style="margin-left: 130px;">:<span style="margin-left:20px"> <?php echo $rw['emp_name']?></p>

<p>2.<span style="margin-left:10px"> Father's/Husband's Name<span style="margin-left: 58px;"></span>:<span style="margin-left:20px"></span> <?php echo $rw['fname'] ?></p>

<p>3.<span style="margin-left:10px"> Date of Birth<span style="margin-left: 136px;"></span>: <span style="margin-left:20px"><?php echo date('d-m-Y',strtotime($rw["DOB"])) ?></p>

<p>4.<span style="margin-left:10px"> Sex<span style="margin-left: 198px;"></span>: <span style="margin-left:20px"></span><?php echo $rw['gender'] ?></p>

<p>5.<span style="margin-left:10px"> Marital Status<span style="margin-left: 130px;"></span>: <span style="margin-left:20px"></span><?php echo $rw['maritalstatus'] ?></p>

<p>6.<span style="margin-left:10px"> EPE Account Number<span style="margin-left: 79px;"></span>: <span style="margin-left:20px"></span><?php echo $rw['accno'] ?></p>

<p>7.<span style="margin-left:10px"> Address<span style="margin-left: 170px;"></span>: <span style="margin-left:20px"> Permanent :</span><?php echo $rw['address'] ?></p>

<p style="margin-left: 65px; margin-top: 60px;">Temporary :</p>


<h2 style="margin-top: 50px;">PART - A (EPF)</h2>


 <p>I hereby nominate the person (s) /cancel the nomination made by me previously and nominate the person (s) mentioned below to receive the amount standing to my credit in the Employee's Provident Fund in the event of my death :</p>
 
<table>
        <thead>
            <tr>
                <th>Name of nominee/ <br> nominees</th>
                <th>Address</th>
                <th>Nominee's relationship<br> with the member</th>
                <th>Date of Birth</th>
                <th>Total amount of share of Accumulations in Provident Fund to be paid to each nominee</th>
                <th>If the nominee is a minor, name & relationship & address of the guardian who may receive the amount during the minority of nominee</th>
            </tr>
        </thead>
        <tbody>
            <tr>
    <td>
        <?php echo $nominee_name; ?>
    </td>
                <td><?php echo $rw['address']?></td>
                <td>
        <?php echo $nominee_relation; ?>
    </td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <hr style="border:1px solid black; margin-top: 150px; margin-left: 220px;margin-right:160px">

    <p>1.<span style="margin-left: 10px;">* Certified that i have no family as defined in no para 2(g) of the Employee's Provident Fund Scheme,1952 and should<br><span style="margin-left: 35px;">I Acquire a family here after, the above nomination should be deemed as cancelled </p>

    <p>2.<span style="margin-left: 10px;"></span>*Certified that my father/mother is/are dependent upon me.</p>

    <p style="margin-left:300px; font-weight:bold; margin-top: 30px;">Signature or thumb impression of subscriber.</p>



    <h2 style="margin-top: 50px;">PART - B (EPS) (Para 18)</h2>

    <p>I hereby below particulars of the members of my family who would be eligible to receive widow/children pension in the event of my death.</p>

    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name of the<br> family member</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Relationship with the member</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

<p>1.</p>
<p>2.</p>
<p>3.</p>
<p>4.</p>
<p>5.</p>
<p>6.</p>

<hr style="border:1px solid black; margin-top: 20px; margin-left: 220px;margin-right:160px">

<p>**Certified that i have no family, as defined in para 2(vii) of Employee's Pension Scheme , 1995 and should I acquire a family here after I shall furnish particulars there on in the above form.</p>

<p>I hereby nominate the following person for receiving the monthly widow pension(admissible under para 16 2 (a)(i) and (ii)in the event of my death without leaving any eligible family member for receiving Pension.</p>

<table>
        <thead>
            <tr>
                <th>Name and Address of the Nominee</th>
                <th>Date of Birth</th>
                <th>Relationship with the member</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                
            </tr>
        </tbody>
    </table>

<p>1</p>
<p>2</p>
<p>3</p>
<p>4</p>

<hr style="border:1px solid black; margin-top: 20px; margin-left: 220px;margin-right:160px">

<p>Date <span style="margin-left: 15px;"></span>:</p>

<p style="margin-left:300px; font-weight:bold">Signature or thumb impression of subscriber.</p>

<p style="margin-top: 20px;">Place <span style="margin-left: 15px;"></span>: Bangalore</p>

<p style="margin-top: 20px;">**Strike out whichever is not applicable </p>

<h2>CERTIFICATE BY EMPLOYER</h2>

<p>Certified that above declaration and nomination has been signed/thumb impressed before me by shri/smt./kum <span style="text-decoration: underline; text-decoration-style: dotted;"><?php echo $rw['emp_name']?></span></p>

<p>employed in my establishment after he/she read the entries have been read over to him/her by me and got confirmed by him/her.</p>

<p>Place <span style="margin-left: 15px;"></span>: Bangalore</p>

<p style="margin: 30px 0 0 350px; font-weight:bold">Signature of the employer or other </p>
<p style="margin: 0 0 0 350px; font-weight:bold">Authorized officers of the Establishment.</p>

<p style="margin-left: 350px; font-weight:bold">Designation</p>

<p style=" margin-top: 20px;">Dated <span style="margin-left: 15px;"></span>:</p>

<p style="margin: 30px 0 0 350px; font-weight:bold">Name & Address of the factory/</p>
<p style="margin: 0 0 0 350px; font-weight:bold">Establishment or Rubber Stamp</p>

<?php
// echo $rw['relation']+"- "+$rw['rno'];
    ?>
                                  
                                    	
</body>
<?php mysqli_close($link);?>
</html>
<?php

    $body = ob_get_clean();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($body);

// Output PDF with dynamically generated filename
    $filename = 'Form 2 /' . date('d-m-Y') . '.pdf';
    $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);

    

}else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');

}

?>