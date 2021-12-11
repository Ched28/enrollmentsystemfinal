<?php 
require('../../FPDF/fpdf.php');
include_once("dbcon.php");
$sectionname = $_GET['id'];
$campuscode = substr($sectionname, 0,2);
$coursecode = substr($sectionname, 2,2);
$year = substr($sectionname, 5,1);
$code = substr($sectionname, 6,1);
function selectcourse($con, $coursecode){
    $select_course = "SELECT * FROM `course` WHERE course_code = '$coursecode';";
            $run_course = mysqli_query($con, $select_course);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0){
                    while($row2 = mysqli_fetch_array($run_course)){
                        $course = $row2['coursename'];

                        return $course;
                    }
                }
            }
  
}
function selectcampus($con, $campuscode){
    $select_campus = "SELECT * FROM `campus` WHERE campus_code = '$campuscode';";
    $run_campus = mysqli_query($con, $select_campus);
            if($run_campus){
                if($run_campus && mysqli_num_rows($run_campus) > 0){
                    while($row4 = mysqli_fetch_array($run_campus)){
                        $campus = $row4['campus_name'];

                        return $campus;
                    }
                }
            }

}

function selectImageCourse($con, $coursecode){
    $select_course = "SELECT * FROM `course` WHERE course_code = '$coursecode';";
    $run_course = mysqli_query($con, $select_course);
    if($run_course){
        if($run_course && mysqli_num_rows($run_course) > 0){
            while($row3 = mysqli_fetch_array($run_course)){
                $courseimg = $row3['img'];

                return $courseimg;
            }
        }
    }
}
$campus = selectcampus($con, $campuscode);
$course = selectcourse($con, $coursecode);
$courseimg = selectImageCourse($con, $coursecode);

class MasterListPdf extends FPDF{
    function header1($courseimg){
        $this->Image('../qcu.png', 10, 6, 23);
        $this->setFont('Arial', 'B', 20);
        $this->Cell(190, 11, 'QUEZON CITY UNIVERSITY', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Times', '', 12);
        $this->Cell(190, 11, '673 Quirino Highway, San Bartolome, Novaliches, Quezon City', 0, 0, 'C');
        $this->Ln();
        $this->Image('img/'.$courseimg, 175, 6, 23);
        $this->setFont('Arial', 'B', 20);
    }
    function footer(){
        $this->SetY(-15);
        $this->setFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' .$this->PageNo().'/{nb}', 0, 0, 'C');
        $this->Ln();
    }
    function firstTableHeader($sectionname, $year){
        $this->setFont('Arial', 'B', 12);
        $this->Cell(30, 12, 'SECTION', 0, 0, 'C');
        $this->setFont('Arial', '', 12);
        $this->Cell(30, 12, $sectionname, 0, 0, 'L');
        $this->setFont('Arial', 'B', 12);
        $this->Cell(30, 12, 'YEAR', 0, 0, 'C');
        $this->setFont('Arial', '', 12);
        $this->Cell(30, 12, $year, 0, 0, 'L');
        $this->setFont('Arial', 'B', 12);
        $this->Cell(30, 12, 'SEM', 0, 0, 'C');
        $this->setFont('Arial', '', 12);
        $this->Cell(30, 12, '1', 0, 0, 'L');
        $this->Ln();
    }
    function firstTableHeader1($campus, $course){
        $this->setFont('Arial', 'B', 12);
        $this->Cell(30, 12, 'CAMPUS', 0, 0, 'C');
        $this->setFont('Arial', '', 12);
        $this->Cell(30, 12, $campus, 0, 0, 'L');
        $this->Ln();
        $this->setFont('Arial', 'B', 12);
        $this->Cell(30, 12, 'COURSE', 0, 0, 'C');
        $this->setFont('Arial', '', 12);
        $this->Cell(30, 12, $course, 0, 0, 'L');
        $this->Ln();
    }
    function secondTableHeader(){
        $this->setFont('Arial', 'B', 10);
        $this->Cell(30, 10, 'STUDENT ID', 0, 0, 'C');   
        $this->Cell(35, 10, 'LAST NAME', 0, 0, 'C'); 
        $this->Cell(35, 10, 'FIRST NAME', 0, 0, 'C');   
        $this->Cell(35, 10, 'MIDDLE NAME', 0, 0, 'C');    
        $this->Cell(45, 10, 'EMAIL', 0, 0, 'C');
        $this->Ln();

    }
    function secondTableBody($con, $sectionname){
        $selectinfo = "SELECT `student_sections`.`StudentID`, `studentinfo`.`FullName-Last`, `studentinfo`.`FullName-First`, `studentinfo`.`FullName-Middle`, `studentinfo`.`email` FROM `student_sections` INNER JOIN `studentinfo` ON `student_sections`.`StudentID` = `studentinfo`.`StudentID` WHERE `student_sections`.`sectionname` = '$sectionname' ORDER BY `studentinfo`.`FullName-Last` ASC";
        $run_select =  mysqli_query($con, $selectinfo);
        if($run_select){
            if($run_select && mysqli_num_rows($run_select) > 0){
                while($row = mysqli_fetch_array($run_select)){
                    $studentid = $row['StudentID'];
                    $lastname = $row['FullName-Last'];
                    $firstname = $row['FullName-First'];
                    $middlename = $row['FullName-Middle'];
                    $email = $row['email'];
                    $this->setFont('Arial', '', 10);
                    $this->Cell(30, 10, $studentid, 0, 0, 'C');   
                    $this->Cell(35, 10, $lastname, 0, 0, 'C'); 
                    $this->Cell(35, 10, $firstname, 0, 0, 'C');   
                    $this->Cell(35, 10, $middlename, 0, 0, 'C');    
                    $this->Cell(45, 10, $email, 0, 0, 'C');
                    $this->Ln();
                }
            }
        }
    }
}

$pdf = new MasterListPdf();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->header1($courseimg);
$pdf->firstTableHeader($sectionname, $year);
$pdf->firstTableHeader1($campus, $course);
$pdf->secondTableHeader();
$pdf->secondTableBody($con, $sectionname);
$pdf->Output();
?>