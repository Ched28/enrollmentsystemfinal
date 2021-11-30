<?php
session_start();
include_once("dbcon.php");
include_once("enc_dec.php");
$id = $_GET['stid'];
$year = '1';

function selectcourse($con, $firstcourse){
    $select_course = "SELECT * FROM `course` WHERE coursename = '$firstcourse';";
            $run_course = mysqli_query($con, $select_course);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0){
                    while($row2 = mysqli_fetch_array($run_course)){
                        $coursecode = $row2['course_code'];

                        return $coursecode;
                    }
                }
            }
  
}
function selectcampus($con, $campus){
    $select_campus = "SELECT * FROM `campus` WHERE campus_name = '$campus';";
    $run_campus = mysqli_query($con, $select_campus);
            if($run_campus){
                if($run_campus && mysqli_num_rows($run_campus) > 0){
                    while($row4 = mysqli_fetch_array($run_campus)){
                        $campus_code = $row4['campus_code'];

                        return $campus_code;
                    }
                }
            }

}

function compareCampusCode($campuscode, $campus_code){
    if($campuscode == $campus_code){
        return $campuscode;
    }else{
        $campuscode = $campus_code;
        return $campuscode;
    }
}
function compareCourseCode($coursecode, $course_code){
    if($coursecode == $course_code){
        return $coursecode;
    }else{
        $coursecode = $course_code;
        return $coursecode;
    }
}

function AddSection($con, $campuscode_new, $coursecode_new, $year, $code){
    
    //success now for the year and code 
   
    

}


$studentid = qcu_decrypt($id);
$selectstudentid = "SELECT * FROM `student_sections` ORDER BY ID DESC LIMIT 1;";
$select_idrun = mysqli_query($con,$selectstudentid);
if($select_idrun){
    if($select_idrun && mysqli_num_rows($select_idrun) > 0){
        while($row = mysqli_fetch_array($select_idrun)){

            $tempsection = $row['sectionname'];
            //SBIT-2J
            $campuscode = substr($tempsection, 0,2);
            $coursecode = substr($tempsection, 2,2);
            $year = substr($tempsection, 5,1);
            $code = substr($tempsection, 6,1);
            $select_enrollmentinfo = "SELECT * FROM `studentenrollmentinfo` WHERE studentenrollmentinfo.StudentID = '$studentid';";
            $select_eninrun = mysqli_query($con, $select_enrollmentinfo);
            if($select_eninrun){
                if($select_eninrun && mysqli_num_rows($select_eninrun) > 0){
                    while($row = mysqli_fetch_array($select_eninrun)){
                        $firstcourse = $row['firstcourse'];
                        $campus = $row['campus'];

                        $course_code = selectcourse($con, $firstcourse);
                        $campus_code = selectcampus($con, $campus);

                        $campuscode_new = compareCampusCode($campuscode, $campus_code);

                        $coursecode_new = compareCourseCode($coursecode, $course_code);
                        $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode_new' AND course_code = '$coursecode_new' AND `year` = '$year' AND section_letter = '$code'";
                        $select_newrun = mysqli_query($con, $select_newsection);
                        if($select_newrun){
                            if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                while($row5 = mysqli_fetch_array($select_newrun)){
                                    $studentcount = $row5['studentcount'];
                                    $section_code = $row5['section_letter'];
                                    echo $studentcount;
                                    if($studentcount <= 29){
                                        $studentcount_new = $studentcount + 1;
                                        $studentcount = $studentcount_new;
                    
                                        $insertcount = "UPDATE `sections` SET `studentcount` = $studentcount_new WHERE campus_code = '$campuscode_new' AND course_code = '$coursecode_new' AND `year` = '$year' AND section_letter = '$code';";
                                        $insertrun = mysqli_query($con, $insertcount);
                    
                                        if($insertrun){       
                                            $sectionname = "$campuscode_new$coursecode_new-$year$section_code";               
                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";              
                                            mysqli_query($con, $insertsection2);
                                            echo "<script>location.replace('../select_status.php?id=$id');</script>";
                                        }
                    
                                    }else{
                                        $new_sectioncode = ++$section_code;
                                        $section_code = $new_sectioncode;
                                        $studentcount = 1;
                                        $sectionname = "$campuscode_new$coursecode_new-$year$section_code";   
                                        $insertsection = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode_new','$coursecode_new','$year','$section_code',$studentcount);";
                                        $insertsectionrun = mysqli_query($con, $insertsection);
                                        if($insertsectionrun){       
                                            $sectionname = "$campuscode_new$coursecode_new-$year$section_code";               
                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";              
                                            mysqli_query($con, $insertsection2);
                                            echo "<script>location.replace('../select_status.php?id=$id');</script>";
                                        }
                                        
                    
                                    }
                    
                                }
                            }else{
                                $section_code = 'A';
                                $studentcount = 1;   
                                $insertsection = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode_new','$coursecode_new','$year','$section_code',$studentcount);";
                                $insertsectionrun = mysqli_query($con, $insertsection);
                                if($insertsectionrun){       
                                    $sectionname = "$campuscode_new$coursecode_new-$year$section_code";               
                                    $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";              
                                    mysqli_query($con, $insertsection2);
                                    echo "<script>location.replace('../select_status.php?id=$id');</script>";
                                }
                            }
                        }

                        

                        
                        
                    }
            }
        }
        }
    }else{

    $year = 1;
    $code = 'A';
    $select_enrollmentinfo = "SELECT * FROM `studentenrollmentinfo` WHERE studentenrollmentinfo.StudentID = '$studentid';";

    $select_eninrun = mysqli_query($con, $select_enrollmentinfo);
    if($select_eninrun){
    if($select_eninrun && mysqli_num_rows($select_eninrun) > 0){
        while($row = mysqli_fetch_array($select_eninrun)){
            $firstcourse = $row['firstcourse'];
            $campus = $row['campus'];

            $select_course = "SELECT * FROM `course` WHERE coursename = '$firstcourse';";
            $run_course = mysqli_query($con, $select_course);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0){
                    while($row2 = mysqli_fetch_array($run_course)){
                        $coursecode = $row2['course_code'];
                        $select_campus = "SELECT * FROM `campus` WHERE campus_name = '$campus';";
                        $run_campus = mysqli_query($con, $select_campus);
                                if($run_campus){
                                    if($run_campus && mysqli_num_rows($run_campus) > 0){
                                        while($row4 = mysqli_fetch_array($run_campus)){
                                            $campus_code = $row4['campus_code'];

                                            $sectionname = "$campus_code$coursecode-$year$code";
                                            $studentcount = 1;
                                            $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campus_code','$coursecode','$year','$code',$studentcount);";

                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";
                                                         
                                                         
                                              $query2 = $insertsection3;
                                              $query2 .= $insertsection2;
                                              $insertqueries = $con->multi_query($query2);

                                              if($insertqueries){
                                                echo "<script>location.replace('../select_status.php?id=$id');</script>";
                                              }

                                        }
                                    }
                                }
                    }
                }
            }
        }
    }
    }
    } 
}
?>