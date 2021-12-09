<?php
include_once("dbcon.php");
$sectionname = $_GET['id'];
$output = "";
if(isset($_POST['excelbtn'])){
$selectinfo = "SELECT student_sections.StudentID, `studentinfo`.`FullName-Last`, `studentinfo`.`FullName-First`, `studentinfo`.`FullName-Middle`, `studentinfo`.`birthday`, `studentinfo`.`gender`, `studentinfo`.`email`,  `studentinfo`.`guardianname`, `studentinfo`.`guardiancontactno` FROM student_sections INNER JOIN studentinfo ON student_sections.StudentID = studentinfo.StudentID WHERE student_sections.sectionname = '$sectionname';";
$run_select = mysqli_query($con, $selectinfo );
if($run_select){
    if($run_select && mysqli_num_rows($run_select) > 0){
        $output = "<table>";
        $output .= "<tr>";
        $output .= "<td colspan='6'><h3 style='text-align:center;'> QUEZON CITY UNIVERSITY </h3></td>";
        $output .= "<td colspan='1'><p style='text-align:center;'> SY: 2021-2022 </p></td>";
        $output .= "<td colspan='2'><p style='text-align:center;'> Semester: 1 </p></td>";
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<td colspan='9'><h1 style='text-align:center;'> $sectionname </h1></td>";
        $output .= "</tr>";
        $output .= "<style>";
        $output .= "th, td{border:1px solid black;}";
        $output .= "</style>";
        $output .= "<tr>";
        $output .= "<th> Student ID </th>";
        $output .= "<th> Last Name  </th>";
        $output .= "<th> First Name </th>";
        $output .= "<th> Middle Name</th>";
        $output .= "<th> Birthdate  </th>";
        $output .= "<th> Gender</th>";
        $output .= "<th> Email Address </th>";
        $output .= "<th> Guardian Name </th>";
        $output .= "<th> Guardian Contact Number</th>";
        $output .= "</tr>";
        while($row = mysqli_fetch_array($run_select)){
            $studentid = $row['StudentID'];
            $lastname = $row['FullName-Last'];
            $firstname = $row['FullName-First'];
            $middlename = $row['FullName-Middle'];
            $birthday = $row['birthday'];
            $gender = $row['gender'];
            $email = $row['email'];
            $guardianname = $row['guardianname'];
            $guardiancontact = $row['guardiancontactno'];

            $output .= "<tr>";
            $output .= "<td>$studentid</td>";
            $output .= "<td>$lastname</td>";
            $output .= "<td>$firstname</td>";
            $output .= "<td>$middlename</td>";
            $output .= "<td>$birthday</td>";
            $output .= "<td>$gender</td>";
            $output .= "<td>$email</td>";
            $output .= "<td>$guardianname</td>";
            $output .= "<td>$guardiancontact</td>";
            $output .= "</tr>";
                   

        }
        $output .= "</table>";    
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=$sectionname.xls");
        echo $output;

        
    }else{
        echo "<script>alert('No Data Found!');</script>";
        

    }
}
}
echo "<script>location.replace('../masterlist.php?sec=$sectionname');</script>";
?>