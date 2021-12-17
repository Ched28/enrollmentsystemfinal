<?php 
require('../../FPDF/fpdf.php');
include_once("dbcon.php");
include_once("enrollconfig.php");
$stid = $_GET['id'];

function selectYear($con, $stid){
    
    $selectyr = "SELECT * FROM `student_year` WHERE `student_year`.`StudentID` = '$stid';";
    $run_yr = mysqli_query($con, $selectyr);
    if($run_yr){
        if($run_yr && mysqli_num_rows($run_yr) > 0){
        while($row = mysqli_fetch_array($run_yr)){
            $year = $row['year'];
    
             return $year;
        }
    }else{
        $year22 = "error";
            return $year22;
    }
    }
    }
    function selectYearwith($con, $year1){
    
        $selectyr1 = "SELECT * FROM `year_tbl` WHERE `year_tbl`.`year` = $year1;";
        $run_yr1 = mysqli_query($con, $selectyr1);
        if($run_yr1){
            if($run_yr1 && mysqli_num_rows($run_yr1) > 0){
            while($row1 = mysqli_fetch_array($run_yr1)){
                $yearwith = $row1['yearwith'];
        
                 return $yearwith;
            }
        }else{
            $year22 = "error";
            return $year22;
        }

        }
        }
    
        function selectcourseShort($con, $coursecode){
            $select_course = "SELECT * FROM `course` WHERE course_code = '$coursecode';";
                    $run_course = mysqli_query($con, $select_course);
                    if($run_course){
                        if($run_course && mysqli_num_rows($run_course) > 0){
                            while($row2 = mysqli_fetch_array($run_course)){
                                $course = $row2['courseshort'];
        
                                return $course;
                            }
                        }
                    }
          
        }
        function selectsection($con, $stid){
            $select_section = "SELECT * FROM `student_sections` WHERE `StudentID` = '$stid';";
                    $run_section = mysqli_query($con, $select_section);
                    if($run_section){
                        if($run_section && mysqli_num_rows($run_section) > 0){
                            while($row2 = mysqli_fetch_array($run_section)){
                                $section = $row2['sectionname'];
        
                                return $section;
                            }
                        }
                    }
          
        }

class RegFormPdf extends FPDF{
    function header1($con, $stid){
        $selecteninfo = "SELECT * FROM `studentenrollmentinfo` WHERE `StudentID` = '$stid';";
        $run_eninfo = mysqli_query($con, $selecteninfo);
        if($run_eninfo){
            if($run_eninfo && mysqli_num_rows($run_eninfo)){
                $this->Image('../qcu.png', 10, 6, 15);
     
                $this->setFont('Arial', 'B', 11);
                $this->Cell(135, 12, 'QUEZON CITY UNIVERSITY', 0, 0, 'C');
                $this->Ln();
                $this->setFont('Arial', '', 9);
                $this->Cell(135, 0, '(Formerly Quezon City Polytechnic University)', 0, 0, 'C');
                $this->Ln();
                $this->setFont('Arial', 'B', 11);
                $this->Cell(135, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');
                $this->Ln();
                while($row1 = mysqli_fetch_array($run_eninfo)){
                    $campus = $row1['campus'];
                    
                    $this->setFont('Arial', '', 11);
                    $this->Cell(250, -33, 'Campus:', 0, 0, 'C');
                    $this->Ln();
                    $this->setFont('Arial', '', 11);
                    $this->Cell(300, 33, $campus, 0, 0, 'C');
                    $this->Ln();
                    $this->setFont('Arial', '', 11);
                    $this->Cell(250, -15, 'StudNo:', 0, 0, 'C');
                    $this->Ln();
                    $this->setFont('Arial', '', 11);
                    $this->Cell(300, 15, $stid , 0, 0, 'C');
                    $this->Ln();
                }
                
            }
        }
      
        
        
    }
    function footer(){
        $this->SetY(-15);
        $this->setFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' .$this->PageNo().'/{nb}', 0, 0, 'C');
        $this->Ln();
    }
    function headertop($con, $stid){
        $selecteninfo = "SELECT * FROM `studentenrollmentinfo` WHERE `StudentID` = '$stid';";
        $run_eninfo = mysqli_query($con, $selecteninfo);
        if($run_eninfo){
            if($run_eninfo && mysqli_num_rows($run_eninfo)){
                while($row1 = mysqli_fetch_array($run_eninfo)){
                    $year1 = selectYear($con, $stid);
                    $year = selectYearwith($con, $year1);
                    $section = selectsection($con, $stid);
                    $fullsecyr = "$year Year/ $section";
                    $coursecode = substr($section, 2,2);
                    $courseshort = strtoupper(selectcourseShort($con, $coursecode));
                    
                $this->setFont('Arial', 'B', 10);
                $this->Cell(60, 12, 'Course/Year/Section', 0, 0, 'C');
                $this->Ln();
                $this->setFont('Arial', '', 10);
                $this->Cell(120, -12, $courseshort, 0, 0, 'C');
                $this->Cell(-70, -12, $fullsecyr , 0, 0, 'C');
                    $category = $row1['category'];
                    if($category == "REGULAR"){
                        $this->Cell(150, -12, '/ Regular Student', 0, 0, 'C');
                        $this->Cell(-70, -12, '__ Irregular Student', 0, 0, 'C');
                        $this->Ln();


                    }else{
                        $this->Cell(150, -12, '__ Regular Student', 0, 0, 'C');
                        $this->Cell(-70, -12, '/ Irregular Student', 0, 0, 'C');
                        $this->Ln();
                    }
                    $selectinfo = "SELECT * FROM `studentinfo` WHERE `StudentID` = '$stid';";
                    $run_info = mysqli_query($con, $selectinfo);
                    if($run_info){
                        if($run_info && mysqli_num_rows($run_info)){
                            while($row2 = mysqli_fetch_array($run_info)){
                                $lastname = $row2['FullName-Last'];
                                $firstname = $row2['FullName-First'];
                                $middlename = $row2['FullName-Middle'];
                                $this->setFont('Arial', '', 10);
                                $this->Cell(60, 25, $lastname, 0, 0, 'C');
                                $this->Ln();
                                $this->setFont('Arial', '', 10);
                                $this->Cell(115, -25, $firstname, 0, 0, 'C');
                                $this->Cell(-60, -25, $middlename, 0, 0, 'C');
                            }
                        }
                    }
                $this->Cell(110, -25, '__ NEW', 0, 0, 'C');
                $this->Cell(-60, -25, '__ OLD', 0, 0, 'C');
                $this->Cell(110, -25, '__ RET', 0, 0, 'C');
                $this->Cell(-60, -25, '__ TRA', 0, 0, 'C');
                $this->Ln();
            }
        }
    }
    }
    function headertop1(){
        $this->setFont('Arial', 'B', 8);
        $this->Cell(60, 40, 'SUBJECT CODE', 0, 0, 'C');   
        $this->Cell(10, 40, 'DESCRIPTION', 0, 0, 'C'); 
        $this->Cell(100, 40, 'UNIT', 0, 0, 'C');   
        $this->Cell(-70, 40, '', 0, 0, 'C');    
        $this->Cell(100, 40, 'DAY', 0, 0, 'C');
        $this->Cell(-27, 40, 'SCHEDULE', 0, 0, 'C');
        $this->Ln();
    }
    function headerbody($con,$stid,$sem1){
        $sectionname = selectsection($con, $stid);
        $coursecode = substr($sectionname, 2,2);
        $course = selectcourseShort($con,$coursecode);
        $year = selectYear($con, $stid);
        $course_leg = "_subject";
        $coursefinal = $course . $course_leg;
        $select_genacc = "SELECT `$coursefinal`.`subjectcode`, `$coursefinal`.`subjecttitle`, `$coursefinal`.`units`, `schedule_table`.`day`, `schedule_table`.`timestart`, `schedule_table`.`timestop`, `schedule_table`.`schedule_cat` FROM `schedule_table` INNER JOIN `$coursefinal` ON `schedule_table`.`subjectcode` = `$coursefinal`.`subjectcode` WHERE `schedule_table`.`sectionname` = '$sectionname' AND `$coursefinal`.`year` = '$year' AND `$coursefinal`.`sem` = '$sem1';";
        $run_selectgenacc = mysqli_query($con, $select_genacc);
        if($run_selectgenacc){

            if($run_selectgenacc && mysqli_num_rows($run_selectgenacc) > 0){
                $i = 2;
                while($row4 = mysqli_fetch_array($run_selectgenacc)){
                   
                    $subjectcode = $row4['subjectcode'];
                    $subjecttitle = $row4['subjecttitle'];
                    $units = $row4['units'];
                    $day = $row4['day'];
                    $timestart = $row4['timestart'];
                    $timestop = $row4['timestop'];
                    $schedule_cat = $row4['schedule_cat'];
                    $schedule = "$timestart - $timestop";
                    $this->setFont('Arial', '', 8);
                   
                        $this->Cell(60, 3, $subjectcode, 0, 0, 'C');   
                        $this->Cell(10, 3, $subjecttitle, 0, 0, 'C'); 
                        $this->Cell(100, 3, $units, 0, 0, 'C');   
                        $this->Cell(-70, 3, $schedule_cat, 0, 0, 'C');    
                        $this->Cell(100, 3, $day, 0, 0, 'C');
                        $this->Cell(-27, 3, $schedule, 0, 0, 'C');
                        $this->Ln();
                   
                    
                    
                     }
                     $select1 = "SELECT `genacc_year`.`subjectcode`, `genacc_subject`.`subjecttitle`, `genacc_subject`.`units`, `schedule_table`.`day`, `schedule_table`.`timestart`, `schedule_table`.`timestop`, `schedule_table`.`schedule_cat` FROM `schedule_table` INNER JOIN `genacc_subject` ON `schedule_table`.`subjectcode` = `genacc_subject`.`subjectcode` INNER JOIN `genacc_year` ON `genacc_subject`.`subjectcode` = `genacc_year`.`subjectcode` WHERE `schedule_table`.`sectionname` = '$sectionname' AND `genacc_year`.`year` = '$year' AND `genacc_year`.`sem` = '$sem1';";
                     $run_select = mysqli_query($con, $select1);
                     if($run_select){
                         if($run_select){
                             while($row5 = mysqli_fetch_array($run_select)){
                                $subjectcode = $row5['subjectcode'];
                                $subjecttitle = $row5['subjecttitle'];
                                $units = $row5['units'];
                                $day = $row5['day'];
                                $timestart = $row5['timestart'];
                                $timestop = $row5['timestop'];
                                $schedule_cat = $row5['schedule_cat'];
                                $schedule = "$timestart - $timestop";
                                $this->setFont('Arial', '', 8);
                               
                                    $this->Cell(60, 3, $subjectcode, 0, 0, 'C');   
                                    $this->Cell(10, 3, $subjecttitle, 0, 0, 'C'); 
                                    $this->Cell(100, 3, $units, 0, 0, 'C');   
                                    $this->Cell(-70, 3, $schedule_cat, 0, 0, 'C');    
                                    $this->Cell(100, 3, $day, 0, 0, 'C');
                                    $this->Cell(-27, 3, $schedule, 0, 0, 'C');
                                    $this->Ln();

                             }
                         }
                     }
                     
                     
                   
                }
                
            }
        }
        function listofInfo(){
            
        }
    
}

$pdf = new RegFormPdf();
$pdf->AliasNbPages();
$pdf->SetMargins(0.2,0.2,0.2);
$pdf->AddPage('P', 'A4', 0);

$pdf->header1($con,$stid);
$pdf->headertop($con, $stid);
$pdf->headertop1();

$pdf->headerbody($con,$stid,$sem1);
//$pdf->headerbody1($con,$stid,$sem1);
$pdf->Output();

//SELECT `genacc_year`.`subjectcode`, `genacc_subject`.`subjecttitle`, `genacc_subject`.`units`, `schedule_table`.`day`, `schedule_table`.`timestart`, `schedule_table`.`timestop`, `schedule_table`.`schedule_cat` FROM `schedule_table` INNER JOIN `genacc_subject` ON `schedule_table`.`subjectcode` = `genacc_subject`.`subjectcode` INNER JOIN `genacc_year` ON `genacc_subject`.`subjectcode` = `genacc_year`.`subjectcode` WHERE `schedule_table`.`sectionname` = '$sectionname' AND `genacc_year`.`year` = '$year' AND `genacc_year`.`sem` = '$sem';"
?>