<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$id = $_GET['id'];
$dec = qcu_decrypt($id);

?>
<div class="content">
    <div class="approval-form">
        <div class="headapp">
            <h1> STUDENT INFORMATION SUMMARY </h1>
        </div>
        <div class="appbody">
                <table>
                    <tr>
                        <td colspan="2"> <h1> Student ID: </h1></td>
                        <td colspan="2"> <h1> 21-0001</h1></td>
                    </tr>
                    <tr>
                        <td>  LAST NAME:</td>
                        <td> </td>
                        <td>  SECTION:</td>
                        <td> </td>
                        
                    </tr>
                    <tr>
                        <td>  FIRST NAME:</td>
                        <td> </td>
                        <td>  CATEGORY:</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>  MIDDLE NAME:</td>
                        <td> </td>
                        <td>  CAMPUS:</td>
                        <td> </td>
                        
                    </tr>
                    <tr>
                    <td>  YEAR:</td>
                        <td> </td>
                    <td>  COURSE:</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td></td>
                        
                    </tr>
                    <tr>
                        
                    </tr>

                </table>
        </div>
    </div>
</div>