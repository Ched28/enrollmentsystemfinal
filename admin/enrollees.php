<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");

?>
<div class="content">
    <div class="enrollees">
    <div class="head">
    <h1>LIST OF ENROLLEES</h1>
    <br>
    <div class="filter-drawer">
        <!--- Modals -->
            <div class="modal-bg">
                <div class="modal full-bg">
                <div class="footer-title modal-footer">
                <img src="<?php  echo $iconsite;?>" alt=""> &nbsp;
                <h2>ENROLLEE INFORMATION</h2> 

                </div>
            <div class="modal-p">
                <div id="studentinfo"></div>
            <table style="width:100%;">
              <tr>
                
                <td colspan="2"><button type="submit" name="submit" class="submit" style="background-color: #00AC17;color: white;" > Submit </button> </td>
                <td colspan="2"><button type="button" name="cancel_btn" class="cancel_btn" style="background-color: #e82048;color: white;" > Go Back </button></td>
              </tr>
            </table>



              </div>
            </div>
            </div>
            <!---End of Modal-->
        <form action="" class="searchbox">
        <input type="text" name="search-text" placeholder="Search...">
    <select name="firstcourse" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="Bachelor of Science in Information Technology">BSIT</option>
                        <option value="Bachelor of Science in Entrepreneurship">BSEntrep</option>
                        <option value="Bachelor of Science in Industrial Engineering">BSIE</option>
                        <option value="Bachelor of Science in Electronics Engineering">BSECE</option>
                        <option value="Bachelor of Science in Accountancy">BSA</option>
          
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
                  <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
    
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
    <th></th>
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