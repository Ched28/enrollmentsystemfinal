<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");

?>
<div class="content">
    <div class="enrollees">
    <div class="head">
    <h1>LIST OF ENROLLEES</h1>
    <br>
    <div class="filter-drawer">
        <p> Filter: </p>
    <select name="firstcourse" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                </select>
    
   
    <select name="category" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="REGULAR">Regular</option>
                        <option value="TRANSFEREE">Transferee</option>
                        <option value="RETURNEE">Returnee</option>
                     
                    </select>
    
   
    <select name="approval" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="APPROVED">Approved</option>
                        <option value="TO BE APPROVED">To be Approved</option>
                     
          
                    </select>
    
    </div>
    </div>
    <div class="con">
<table>

    
        

<tr>
    <th>Student ID</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Category</th>
    <th>Course</th>
    <th>Status</th>
    <th>Remarks</th>
</tr>
<tbody id="enrollees_data">

</tbody>
</table>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function (){
        $.ajax({
            type: "POST",
            url: "config/select_enrollees.php",
            dataType: "html",
            success: function(data){
                $('#enrollees_data').html(data);
            }
        });
    });
</script>