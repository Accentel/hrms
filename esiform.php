<?php //include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('dbconnection/connection.php');
?>

<p><span>&nbsp;</span></p>
<p><center><strong><span>DECLARATION FORM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FORM - 1</span></strong></center></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><img width="83" src="data:image/png;base64,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" alt="image"></span>Employer&apos;s&nbsp;Code&nbsp;No. 
<img src="https://myfiles.space/user_files/225061_551f7d6c833e7327/225061_custom_files/img1719998289.png" width="650" height="41">

</p>
<p>&nbsp;</p>
<table class="table">
            <tbody>
                <tr>
                    <td style="width: 99.5pt;">
                        <p class="header-text"><strong>1 Insurance No.</strong></p>
                    </td>
                    <td colspan="3" style="width: 233pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99.5pt;">
                        <p class="header-text"><strong>2 Name</strong></p>
                        <p class="header-text"><strong>(** block capital)</strong></p>
                    </td>
                    <td colspan="3" style="width: 233pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99.5pt;">
                        <p class="header-text"><strong>3 Father's/ Husband's Name</strong></p>
                    </td>
                    <td colspan="3" style="width: 233pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width: 99.5pt;">
                        <p><strong>&nbsp;</strong></p>
                        <p class="header-text"><strong>4 Date of Birth</strong></p>
                    </td>
                    <td rowspan="2" style="width: 83.3pt;">
                        <p class="header-text"><strong>DD&nbsp;** YY</strong></p>
                    </td>
                    <td style="width: 77.9pt;">
                        <p class="header-text"><strong>5. Martial Status</strong></p>
                    </td>
                    <td style="width: 71.8pt;">
                        <p class="header-text"><strong>M / U / W</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 77.9pt;">
                        <p class="header-text"><strong>6. Sex</strong></p>
                    </td>
                    <td style="width: 71.8pt;">
                        <p class="header-text"><strong>M / F</strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 182.8pt;">
                        <p class="header-text"><strong>7 Present Address</strong></p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class="header-text"><strong>Pin :</strong></p>
                        <p class="header-text"><strong>e-mail address</strong></p>
                    </td>
                    <td colspan="2" style="width: 149.7pt;">
                        <p class="header-text"><strong>8. Permanent Address</strong></p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class="header-text"><strong>Pin :</strong></p>
                        <p class="header-text"><strong>e-mail address</strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 182.8pt;">
                        <p class="header-text"><strong>Branch office:</strong></p>
                    </td>
                    <td colspan="2" style="width: 149.7pt;">
                        <p class="header-text"><strong>********** :</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td rowspan="2" style="width: 94.1pt;">
                        <p><strong>&nbsp;</strong></p>
                        <p class="header-text"><strong>10. Date of Appointment</strong></p>
                    </td>
                    <td style="width: 117.4pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 117.4pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 211.5pt;">
                        <p class="header-text"><strong>11. Name &amp; ******* ** *** employer</strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 211.5pt;">
                        <p class="header-text"><strong>12. ** case ** any previous employment&nbsp;please ****** *** details as under:-</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 94.1pt;">
                        <p class="header-text"><strong>Previous Ins. No.</strong></p>
                    </td>
                    <td style="width: 117.4pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 94.1pt;">
                        <p class="header-text"><strong>Emplrs. Code No.</strong></p>
                    </td>
                    <td style="width: 117.4pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 211.5pt;">
                        <p class="header-text"><strong>11. **** &amp; Address of the employer</strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 211.5pt;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </tbody>
        </table>
    

</span><strong><span>(A)&nbsp;Insured&nbsp;Person&apos;s&nbsp;Particulars&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;(B) Employer&apos;s&nbsp;Particulars</span></strong>
<p></p>
<p><br></p>
<p><br></p>
<p>(c) Details of the nominee u/s 71 of ESI Act1948 / Rule 56(2) of *** (Central) Rules 1950 for ******* ** **** ******* in *** ***** of death</p>
<table>
    <tbody>
        <tr>
            <td>
                <p><strong><span>**** ** the Nominee</span></strong></p>
            </td>
            <td>
                <p><strong><span>Relationship with insured person</span></strong></p>
            </td>
            <td>
                <p><strong><span>Address</span></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p><span>&nbsp;</span></p>
<h2>I&nbsp;hereby&nbsp;declare&nbsp;that&nbsp;the&nbsp;above&nbsp;particulars&nbsp;have&nbsp;been&nbsp;given&nbsp;by&nbsp;me&nbsp;and&nbsp;are&nbsp;correct&nbsp;to&nbsp;the&nbsp;best&nbsp;of&nbsp;my&nbsp;knowledge&nbsp;and&nbsp;I&nbsp;belief.&nbsp;I&nbsp;also&nbsp;under&nbsp;take&nbsp;** intimate&nbsp;to&nbsp;the&nbsp;corporation&nbsp;any&nbsp;change&nbsp;in&nbsp;the&nbsp;membership&nbsp;of&nbsp;my&nbsp;family&nbsp;within&nbsp;15&nbsp;days&nbsp;of&nbsp;such&nbsp;change&nbsp;having&nbsp;occured.</h2>
<p><strong><span>******* Signature ** *** Employer</span></strong></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><strong><span>Signature&nbsp;with&nbsp;Seal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Signature / T.I. of I&nbsp;P</span></strong></p>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>FAMILY *********** ** INSURED&nbsp;PERSON</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<table>
    <tbody>
        <tr>
            <td>
                <p><strong><span>Sl.</span></strong></p>
                <p><strong><span>No.</span></strong></p>
            </td>
            <td>
                <p><strong><span>Name</span></strong></p>
            </td>
            <td>
                <p><strong><span>Date ** Birth</span></strong></p>
            </td>
            <td>
                <p><strong><span>************ with</span></strong></p>
                <p><strong><span>insured person</span></strong></p>
            </td>
            <td>
                <p><strong><span>Whether ******** with</span></strong></p>
                <p><strong><span>him/*** or not</span></strong></p>
            </td>
            <td colspan="2">
                <p><strong><span>If No, State place of</span></strong></p>
                <p><strong><span>Residence</span></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><strong><span>YES / NO</span></strong></p>
            </td>
            <td>
                <p><strong><span>TOWN</span></strong></p>
            </td>
            <td>
                <p><strong><span>STATE</span></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>1</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>2</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>3</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>4</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>5</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>6</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>7</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span><br>&nbsp;</span></p>
<p><strong><span>ESI CORPORATION</span></strong></p>
<p><strong><span>Temporary Identity Card</span></strong></p>
<p><span><br>&nbsp;</span></p>
<p><strong><span>Valid for 3 months from the **** ** appointment</span></strong></p>
<p><span><br>&nbsp;</span></p>
<p><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span><br>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<h2>Validity&nbsp;Dated</h2>
<p><span><br>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><br></p>
<p><strong><span>Signature&nbsp;/&nbsp;T.I.&nbsp;of&nbsp;I&nbsp;P&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Signature of B.M. with&nbsp;Seal</span></strong></p>
<p><span><br>&nbsp;</span></p>
<p><strong><span>INSTRUCTIONS</span></strong></p>
<p><span>&nbsp;</span></p>
<p>&nbsp;</p>
<div>
    <ol>
        <li><strong><span>Submission&nbsp;of&nbsp;Form&nbsp;1&nbsp;is&nbsp;governed&nbsp;by&nbsp;regulations&nbsp;11&nbsp;&amp;&nbsp;12&nbsp;of&nbsp;ESI&nbsp;(General)&nbsp;Regulations,&nbsp;1950</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<ol>
    <li><strong><span>*Family*&nbsp;means&nbsp;all&nbsp;or&nbsp;any&nbsp;one&nbsp;of&nbsp;the&nbsp;following&nbsp;relatives&nbsp;of&nbsp;an&nbsp;insured&nbsp;person&nbsp;namely:-</span></strong>
        <ol>
            <li><strong><span>a&nbsp;Spouse&nbsp;(ii)&nbsp;a&nbsp;minor&nbsp;legitimate&nbsp;or&nbsp;adopted&nbsp;child&nbsp;dependent&nbsp;upon&nbsp;the&nbsp;I.P.:&nbsp;(iii)&nbsp;a&nbsp;child&nbsp;who&nbsp;is&nbsp;wholly&nbsp;dependent&nbsp;on&nbsp;the&nbsp;earnings&nbsp;** the&nbsp;I.P&nbsp;and&nbsp;who&nbsp;is&nbsp;(a)&nbsp;receiving&nbsp;education,&nbsp;till&nbsp;he&nbsp;or&nbsp;she&nbsp;attains&nbsp;the&nbsp;age&nbsp;of&nbsp;21&nbsp;years&nbsp;(b)&nbsp;an&nbsp;un&nbsp;married&nbsp;daughter;&nbsp;(iv)&nbsp;a&nbsp;child&nbsp;who&nbsp;is&nbsp;infirm by&nbsp;reason&nbsp;of&nbsp;any&nbsp;physical&nbsp;or&nbsp;mental&nbsp;abnormality&nbsp;or&nbsp;injury&nbsp;and&nbsp;is&nbsp;wholly&nbsp;dependent&nbsp;on&nbsp;the&nbsp;earnings&nbsp;of&nbsp;the&nbsp;I.P.&nbsp;so&nbsp;long&nbsp;as&nbsp;the&nbsp;infirmly continues; (v) dependent&nbsp;Parents</span></strong></li>
        </ol>
    </li>
</ol>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>Identity Card ** *** -&nbsp;Transferable</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>Loss&nbsp;of&nbsp;Identity&nbsp;Card&nbsp;be&nbsp;reported&nbsp;to&nbsp;Employer&nbsp;/&nbsp;Branch&nbsp;manager&nbsp;immediately</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>Submission&nbsp;of&nbsp;false&nbsp;information&nbsp;attracts&nbsp;penal&nbsp;action&nbsp;under&nbsp;section&nbsp;84&nbsp;of&nbsp;ESI&nbsp;Act,&nbsp;1948</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>This&nbsp;form&nbsp;dully&nbsp;filled&nbsp;in&nbsp;must&nbsp;reach&nbsp;the&nbsp;concerned&nbsp;Branch&nbsp;office&nbsp;within&nbsp;10&nbsp;Days&nbsp;of&nbsp;appointment&nbsp;of&nbsp;an&nbsp;employee.&nbsp;Delay&nbsp;attracts&nbsp;penal action&nbsp;under&nbsp;section&nbsp;85&nbsp;of&nbsp;the&nbsp;Act,&nbsp;against&nbsp;the&nbsp;employer</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>As&nbsp;an&nbsp;insured&nbsp;person&nbsp;you&nbsp;and&nbsp;your&nbsp;dependent&nbsp;family&nbsp;members&nbsp;are&nbsp;entitled&nbsp;to&nbsp;full&nbsp;medical&nbsp;benefit&nbsp;from&nbsp;today&nbsp;itself.&nbsp;The&nbsp;other&nbsp;******** in&nbsp;cash&nbsp;include&nbsp;(1)&nbsp;Sickness&nbsp;Benefit&nbsp;(2)&nbsp;Temporary&nbsp;Disablement&nbsp;Benefit&nbsp;(3)&nbsp;Permanent&nbsp;Disablement&nbsp;Benefit&nbsp;(4)&nbsp;Dependents&nbsp;Benefit&nbsp;and</span></strong></li>
    </ol>
</div>
<p>(5) Maternity Benefit (in case of ***** employees) subject to fulfillment of contributory conditions</p>
<p><span>&nbsp;</span></p>
<div>
    <ol>
        <li><strong><span>For&nbsp;more&nbsp;details&nbsp;contact&nbsp;website&nbsp;of&nbsp;ESIC&nbsp;at&nbsp;</span></strong><a href="http://www.esic.org.in/"><strong><span>www.esic.org.in&nbsp;or&nbsp;cont</span></strong></a><strong><span>act&nbsp;Regional&nbsp;office&nbsp;or&nbsp;Branch&nbsp;office</span></strong></li>
    </ol>
</div>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
            <td><br></td>
        </tr>
    </tbody>
</table>
<p><br></p>
<p>&nbsp;</p>
<p><br></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<table>
    <tbody>
        <tr>
            <td>
                <p><strong><span>Sl.</span></strong></p>
                <p><strong><span>No.</span></strong></p>
            </td>
            <td>
                <p><strong><span>Name</span></strong></p>
            </td>
            <td>
                <p><strong><span>Date of Birth</span></strong></p>
            </td>
            <td>
                <p><strong><span>Relationship with</span></strong></p>
                <p><strong><span>insured person</span></strong></p>
            </td>
            <td>
                <p><strong><span>Whether residing with</span></strong></p>
                <p><strong><span>him/her or not</span></strong></p>
            </td>
            <td colspan="2">
                <p><strong><span>If No, ***** place of</span></strong></p>
                <p><strong><span>Residence</span></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><strong><span>YES / NO</span></strong></p>
            </td>
            <td>
                <p><strong><span>TOWN</span></strong></p>
            </td>
            <td>
                <p><strong><span>STATE</span></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>1</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>2</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>3</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>4</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>5</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>6</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong><span>7</span></strong></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
            <td>
                <p><span>&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>