<?php 
include_once("enrollmentform/config/dbcon.php");
include_once("enrollmentform/config/enc_dec.php");
$studentint = 1;
$year = 1;
$code = 'A';
$enrollmentyear = date("y");
$studentid = "$enrollmentyear-000$studentint";

    $enrollnumber = '2021-0000001';
   $select_enrollmentinfo = "SELECT * FROM `studentenrollmentinfo` WHERE studentenrollmentinfo.enrollnumber = '$enrollnumber';";

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
                                                     echo "success";
                                                 }else{
                                                     echo "insert error";
                                                 }

                                           }
                                       }
                                   }
                       }
                   }
               }
           }
       }else{
           echo 'problem select';
           echo $studentid;
       }
   }
/// with has a student number na sa table
$select_enrollmentinfo = "SELECT studentenrollmentinfo.firstcourse, studentenrollmentinfo.campus FROM  `studentenrollmentinfo` WHERE studentenrollmentinfo.enrollnumber = '$enrollnumber'";

$select_eninrun = mysqli_query($con, $select_eninrun);
if($select_eninrun){
    if($select_eninrun && mysqli_num_rows($select_eninrun) > 0){
        while($row2 = mysqli_fetch_array($select_eninrun)){
            $firstcourse = $row2['firstcourse'];
            $campus = $row2['campus'];
            //select firstcourse course code to coursetable
            $select_course = "SELECT * FROM `course` WHERE course.coursename = '$firstcourse'";
            $select_runcourse = mysqli_query($con, $select_course);
            if($select_course){
                if($select_runcourse && mysqli_num_rows($select_runcourse) > 0){
                    while($row3 = mysqli_fetch_array($select_runcourse)){
                        $course_code = $row3['course_code'];
                        //compare course code in current code to the course code base on the enrollmentinfo first choice of course
                        if($coursecode == $course_code){
                            //success now select the campus
                            $select_campus = "SELECT * FROM `campus` WHERE campus.`campus` = '$campus'";
                            $run_campus = mysqli_query($con, $run_campus);
                            if($run_campus){
                                if($run_campus && mysqli_num_rows($run_campus) > 0){
                                    while($row4 = mysqli_fetch_array($run_campus)){
                                        $campus_code = $row4['campus_code'];
                                        //compare now the current campus code to the campus code base on the enrollmentinfo campus
                                        if($campus_code == $campus_code){
                                            //success now for the year and code 
                                            $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode' AND course_code = '$coursecode' AND `year` = '$year' AND section_letter = '$code'";
                                            $select_newrun = mysqli_query($con, $select_newsection);
                                            if($select_newrun){
                                                if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                                    while($row5 = mysqli_fetch_array($select_newrun)){
                                                        $studentcount = $row5['studentcount'];
                                                        $section_code = $row5['section_letter'];
                                                        // condition if the studentcount exceed to 31 or not
                                                        if($studentcount <= 30){
                                                            $studentcount = $studentcount + 1;
                                                            $section_name = "$campus_code$course_code-$year$code";
                                                            $insertstudentsection = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name')";
                                                            mysqli_query($con, $insertstudentsection);

                                                            

                                                        }else{
                                                            $new_section_code = ++$section_code;
                                                            $student_count = 1; 
                                                            $insertsection1 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$new_section_code','$student_count');";
                                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";

                                                            $query1 = $insertsection1;
                                                            $query1 .= $insertsection2;
                                                            $con->multi_query($query1);

                                                        }

                                                    }
                                                }else{
                                                    $studentcount = 1; 
                                                    $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$code','$studentcount');";
                                                    $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";
                                                    
                                                    
                                                    $query2 = $insertsection3;
                                                    $query2 .= $insertsection2;
                                                    $con->multi_query($query2);
                                                }
                                            }
                                        }
                                        else{
                                            $campuscode = $campus_code;
                                            $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode' AND course_code = '$coursecode' AND `year` = '$year' AND section_letter = '$code'";
                                            $select_newrun = mysqli_query($con, $select_newsection);
                                            if($select_newrun){
                                                if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                                    while($row5 = mysqli_fetch_array($select_newrun)){
                                                        $studentcount = $row5['studentcount'];
                                                        $section_code = $row5['section_letter'];
                                                        // condition if the studentcount exceed to 31 or not
                                                        if($studentcount <= 30){
                                                            $studentcount = $studentcount + 1;
                                                            $section_name = "$campus_code$course_code-$year$code";
                                                            $insertstudentsection = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name')";
                                                            mysqli_query($con, $insertstudentsection);

                                                            

                                                        }else{
                                                            $new_section_code = ++$section_code;
                                                            $student_count = 1; 
                                                            $insertsection1 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$new_section_code','$student_count');";
                                                            $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";

                                                            $query1 = $insertsection1;
                                                            $query1 .= $insertsection2;
                                                            $con->multi_query($query1);

                                                        }

                                                    }
                                                }else{
                                                    $studentcount = 1; 
                                                    $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$code','$studentcount');";
                                                    $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";
                                                    
                                                    
                                                    $query2 = $insertsection3;
                                                    $query2 .= $insertsection2;
                                                    $con->multi_query($query2);
                                                }
                                            }

                                        }
                                    }
                                }
                            }
                        }else{
                             $coursecode = $course_code;
                             $select_campus = "SELECT * FROM `campus` WHERE campus.`campus` = '$campus'";
                             $run_campus = mysqli_query($con, $run_campus);
                             if($run_campus){
                                 if($run_campus && mysqli_num_rows($run_campus) > 0){
                                     while($row4 = mysqli_fetch_array($run_campus)){
                                         $campus_code = $row4['campus_code'];
                                         //compare now the current campus code to the campus code base on the enrollmentinfo campus
                                         if($campus_code == $campus_code){
                                             //success now for the year and code 
                                             $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode' AND course_code = '$coursecode' AND `year` = '$year' AND section_letter = '$code'";
                                             $select_newrun = mysqli_query($con, $select_newsection);
                                             if($select_newrun){
                                                 if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                                     while($row5 = mysqli_fetch_array($select_newrun)){
                                                         $studentcount = $row5['studentcount'];
                                                         $section_code = $row5['section_letter'];
                                                         // condition if the studentcount exceed to 31 or not
                                                         if($studentcount <= 30){
                                                             $studentcount = $studentcount + 1;
                                                             $section_name = "$campus_code$course_code-$year$code";
                                                             $insertstudentsection = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name')";
                                                             mysqli_query($con, $insertstudentsection);

                                                             

                                                         }else{
                                                             $new_section_code = ++$section_code;
                                                             $student_count = 1; 
                                                             $insertsection1 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$new_section_code','$student_count');";
                                                             $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";

                                                             $query1 = $insertsection1;
                                                             $query1 .= $insertsection2;
                                                             $con->multi_query($query1);

                                                         }

                                                     }
                                                 }else{
                                                     $studentcount = 1; 
                                                     $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$code','$studentcount');";
                                                     $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";
                                                     
                                                     
                                                     $query2 = $insertsection3;
                                                     $query2 .= $insertsection2;
                                                     $con->multi_query($query2);
                                                 }
                                             }
                                         }
                                         else{
                                             $campuscode = $campus_code;
                                             $select_newsection = "SELECT * FROM `sections` WHERE campus_code = '$campuscode' AND course_code = '$coursecode' AND `year` = '$year' AND section_letter = '$code'";
                                             $select_newrun = mysqli_query($con, $select_newsection);
                                             if($select_newrun){
                                                 if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                                     while($row5 = mysqli_fetch_array($select_newrun)){
                                                         $studentcount = $row5['studentcount'];
                                                         $section_code = $row5['section_letter'];
                                                         // condition if the studentcount exceed to 31 or not
                                                         if($studentcount <= 30){
                                                             $studentcount = $studentcount + 1;
                                                             $section_name = "$campus_code$course_code-$year$code";
                                                             $insertstudentsection = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name')";
                                                             mysqli_query($con, $insertstudentsection);

                                                             

                                                         }else{
                                                             $new_section_code = ++$section_code;
                                                             $student_count = 1; 
                                                             $insertsection1 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$new_section_code','$student_count');";
                                                             $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";

                                                             $query1 = $insertsection1;
                                                             $query1 .= $insertsection2;
                                                             $con->multi_query($query1);

                                                         }

                                                     }
                                                 }else{
                                                     $studentcount = 1; 
                                                     $insertsection3 = "INSERT INTO `sections`(`campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES ('$campuscode','$coursecode','$year','$code','$studentcount');";
                                                     $insertsection2 = "INSERT INTO `student_sections`(`StudentID`, `sectionname`) VALUES ('$studentid','$section_name');";
                                                     
                                                     
                                                     $query2 = $insertsection3;
                                                     $query2 .= $insertsection2;
                                                     $con->multi_query($query2);
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
}
//firsttime
$select_enrollmentinfo = "SELECT * FROM `studentenrollmentinfo` WHERE studentenrollmentinfo.enrollnumber = '$enrollnumber';";

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
                                                  echo "success";
                                              }else{
                                                  echo "insert error";
                                              }

                                        }
                                    }
                                }
                    }
                }
            }
        }
    }else{
        echo 'problem select';
        echo $studentid;
    }
} 
?>