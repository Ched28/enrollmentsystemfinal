<?php 
 include_once("enrollmentform/config/dbcon.php");

                        $select_newsection = "SELECT * FROM `sections` WHERE campus_code = 'SB' AND course_code = 'IT' AND `year` = '1' AND section_letter = 'A'";
                        $select_newrun = mysqli_query($con, $select_newsection);
                        if($select_newrun){
                            if($select_newrun && mysqli_num_rows($select_newrun) > 0){
                                while($row5 = mysqli_fetch_array($select_newrun)){
                                    $studentcount = $row5['studentcount'];
                                    $section_code = $row5['section_letter'];

                                    echo ++$section_code;
                                }
                            }
                        }
                    
?>