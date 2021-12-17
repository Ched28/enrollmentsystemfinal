<?php
session_start();
include_once("dbcon.php");
include_once("enc_dec.php");
include_once("enrollconfig.php");
$id = $_GET['stid'];

function selectYear($con, $studentid){
    
$selectyr = "SELECT `student_year`.`year` FROM `student_year` WHERE = `student_year`.`StudentID` = '$studentid';";
$run_yr = mysqli_query($con, $selectyr);
if($run_yr){
    while($row = mysqli_fetch_array($run_yr)){
        $year = $row['year'];

         return $year;
    }
}
}

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
function selectcourseID($con, $firstcourse){
    $select_course = "SELECT * FROM `course` WHERE course_code = '$firstcourse';";
            $run_course = mysqli_query($con, $select_course);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0){
                    while($row2 = mysqli_fetch_array($run_course)){
                        $courseid = $row2['id'];

                        return $courseid;
                    }
                }
            }
  
}
function selectcampusID($con, $campus){
    $select_campus = "SELECT * FROM `campus` WHERE campus_code = '$campus';";
    $run_campus = mysqli_query($con, $select_campus);
            if($run_campus){
                if($run_campus && mysqli_num_rows($run_campus) > 0){
                    while($row4 = mysqli_fetch_array($run_campus)){
                        $campusid = $row4['id'];

                        return $campusid;
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
function update_count($con, $studentid){
    $selecteninfo = "SELECT * FROM `studentenrollmentinfo` WHERE StudentID = '$studentid';";
    $run_eninfo = mysqli_query($con, $selecteninfo);
    if($run_eninfo){
        if($run_eninfo && mysqli_num_rows($run_eninfo) > 0){
            while($row6 = mysqli_fetch_array($run_eninfo)){
                $updatecount = $row6['updatecount'];
                return $updatecount;
            }
        }
    }
} 
function countStudent($con, $firstcourse_code, $secondcourse_code, $thirdcourse_code, $campus_code, $year, $updatecount, $countstudentcourse){
    $selectsum = "SELECT SUM(sections.studentcount) as 'totalcount' FROM sections WHERE sections.campus_code = '$campus_code' AND sections.course_code = '$firstcourse_code' AND sections.`year` = '$year';";
    $run_sum1 = mysqli_query($con, $selectsum);
    if($run_sum1){
        if($run_sum1 && mysqli_num_rows($run_sum1) > 0){
            while($row = mysqli_fetch_array($run_sum1)){
                $totalcount = $row['totalcount'];
                if($totalcount >= $countstudentcourse){
                    $selectsum1 = "SELECT SUM(sections.studentcount) as 'totalcount' FROM sections WHERE sections.campus_code = '$campus_code' AND sections.course_code = '$secondcourse_code' AND sections.`year` = '$year';";
                    $run_sum2 = mysqli_query($con, $selectsum1);
                    if($run_sum2 && mysqli_num_rows($run_sum2) > 0){
                        while($row = mysqli_fetch_array($run_sum2)){
                            $totalcount1 = $row['totalcount'];
                            if($totalcount1 >=$countstudentcourse){
                                $selectsum2 = "SELECT SUM(sections.studentcount) as 'totalcount' FROM sections WHERE sections.campus_code = '$campus_code' AND sections.course_code = '$thirdcourse_code' AND sections.`year` = '$year';";
                                $run_sum3 = mysqli_query($con, $selectsum2);
                                if($run_sum3 && mysqli_num_rows($run_sum3) > 0){
                                    while($row = mysqli_fetch_array($run_sum3)){
                                        $totalcount2 = $row['totalcount'];
                                        if($totalcount2 >= 500){
                                            if($updatecount == 1){
                                                return $firstcourse_code;
                                            }else{
                                                $msg1 = "count error";
                                                return $msg1;
                                            }
                                            
                                        }else{
                                            return $thirdcourse_code;
                                        }
                            }
                }
            }else{
                return $secondcourse_code;
            }
            
        }
    }
    
}else{
    return $firstcourse_code;
}
}
}
}
}
function update_status($con, $status, $studentid){

    $selectenrollnumber = "SELECT * FROM `student_examresult` WHERE `StudentID` = '$studentid'";
    $run_select = mysqli_query($con, $selectenrollnumber);
    if($run_select){
        if($run_select && mysqli_num_rows($run_select)){
            while($row = mysqli_fetch_array($run_select)){
                $approval = 'TO BE APPROVED';
                $enrollnumber = $row['enrollnumber'];
                $update1 = "UPDATE `studentinfo` SET `StudentID` = ' ' WHERE `studentinfo`.`enrollnumber` = '$enrollnumber';";
                $update2 = "UPDATE `studentenrollmentinfo` SET `StudentID` = ' '  WHERE `studentenrollmentinfo`.`enrollnumber` = '$enrollnumber';";
                $update3 = "UPDATE `studenteducationalinfo` SET `StudentID` = ' ' WHERE `studenteducationalinfo`.`enrollnumber` = '$enrollnumber';";
                $update4 = "UPDATE `studentapprovals` SET `StudentID`= ' ',`Approval`='$approval',`remarks`='$status' WHERE `studentapprovals`.`enrollnumber` = '$enrollnumber';";
                $update5 = "UPDATE `student_examresult` SET `StudentID`= ' ' WHERE `student_examresult`.`enrollnumber` = '$enrollnumber';";
                $query = $update1;
                $query .= $update2;
                $query .= $update3;
                $query .= $update4;
                $query .= $update5;
    
    
                $updatequeries = $con->multi_query($query);

                if($updatequeries){
                    
                    
                    return $updatequeries;
                }
            }
        }
    } 
}
$studentid = qcu_decrypt($id);
$year = selectYear($con, $studentid);
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
                        $secondcourse = $row['secondcourse'];
                        $thirdcourse = $row['thirdcourse'];
                        $campus = $row['campus'];


                        //$firstcourse = countStudent($con, $firstcourse1, $secondcourse, $thirdcourse, $campus);

                        $firstcourse_code = selectcourse($con, $firstcourse);
                        $secondcourse_code = selectcourse($con, $secondcourse);
                        $thirdcourse_code = selectcourse($con, $thirdcourse);
                        $campus_code = selectcampus($con, $campus);
                        $updatecount = update_count($con, $studentid);

                        $course_code = countStudent($con, $firstcourse_code, $secondcourse_code, $thirdcourse_code, $campus_code, $year, $updatecount, $countstudentcourse);
                        
                        if($course_code == "count error"){
                            $status = "Sorry all of choices of course are all exceed in its capacity...";
                            update_status($con, $status, $studentid);
                          echo "<script>location.replace('../enrollees.php');</script>";

                           

                        }else{
                        $campuscode_new = compareCampusCode($campuscode, $campus_code);

                        $coursecode_new = compareCourseCode($coursecode, $course_code);
                        
                        $courseid = selectcourseID($con, $coursecode_new);
                        $campusid = selectcampusID($con, $campuscode_new);
                        
                        $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode_new' AND course_code = '$coursecode_new' AND `year` = '$year' AND section_letter = '$code'";
                        $select_newrun = mysqli_query($con, $select_newsection);
                        if($select_newrun){
                            if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                while($row5 = mysqli_fetch_array($select_newrun)){
                                    $studentcount = $row5['studentcount'];
                                    $section_code = $row5['section_letter'];
                                    echo $studentcount;
                                    if($studentcount <= $countstudentsection){
                                        $studentcount_new = $studentcount + 1;
                                        $studentcount = $studentcount_new;
                    
                                        $insertcount = "UPDATE `sections` SET `studentcount` = $studentcount_new WHERE campus_code = '$campuscode_new' AND course_code = '$coursecode_new' AND `year` = '$year' AND section_letter = '$code';";
                                        $insertrun = mysqli_query($con, $insertcount);
                    
                                        if($insertrun){       
                                            $sectionname = "$campuscode_new$coursecode_new-$year$section_code";               
                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";
                                            $insertstudentschoolinfo = "INSERT INTO `studentschoolinfo`(`StudentID`, `Course`, `year`, `campus`) VALUES ('$studentid','$courseid','$year','$campusid');";              
                                            
                                            $query4 = $insertsection2;
                                            $query4 .= $insertstudentschoolinfo;

                                            $con->multi_query($query4);
                                          // echo "<script>location.replace('../select_status.php?id=$id');</script>";
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
                                            $insertstudentschoolinfo = "INSERT INTO `studentschoolinfo`(`StudentID`, `Course`, `year`, `campus`) VALUES ('$studentid','$courseid','$year','$campusid');";              
                                            
                                            $query4 = $insertsection2;
                                            $query4 .= $insertstudentschoolinfo;

                                            $con->multi_query($query4);
                                      //     echo "<script>location.replace('../select_status.php?id=$id');</script>";
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
                                            $insertstudentschoolinfo = "INSERT INTO `studentschoolinfo`(`StudentID`, `Course`, `year`, `campus`) VALUES ('$studentid','$courseid','$year','$campusid');";              
                                            
                                            $query4 = $insertsection2;
                                            $query4 .= $insertstudentschoolinfo;

                                            $con->multi_query($query4);
                         //         echo "<script>location.replace('../select_status.php?id=$id');</script>";
                                }
                            }
                        }

                        }
                        

                        
                        
                    }
            }
        }
        }
    }else{


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
                                            $courseid = selectcourseID($con, $coursecode);
                                            $campusid = selectcampusID($con, $campuscode);
                                            $sectionname = "$campus_code$coursecode-$year$code";
                                            $studentcount = 1;
                                            $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campus_code','$coursecode','$year','$code',$studentcount);";

                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$sectionname');";
                                            $insertstudentschoolinfo = "INSERT INTO `studentschoolinfo`(`StudentID`, `Course`, `year`, `campus`) VALUES ('$studentid','$courseid','$year','$campusid');";   
                                                         
                                                         
                                              $query2 = $insertsection3;
                                              $query2 .= $insertsection2;
                                              $query2 .= $insertstudentschoolinfo;
                                              $insertqueries = $con->multi_query($query2);

                                              if($insertqueries){
                                 //               echo "<script>location.replace('../select_status.php?id=$id');</script>";
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