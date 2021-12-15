DROP TABLE admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `admin_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO admin VALUES("1","admin","YnKak4qw","0");
INSERT INTO admin VALUES("2","Registar","rey","");



DROP TABLE bsa_subject;

CREATE TABLE `bsa_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE bsece_subject;

CREATE TABLE `bsece_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE bsentrep_subject;

CREATE TABLE `bsentrep_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE bsie_subject;

CREATE TABLE `bsie_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE bsit_subject;

CREATE TABLE `bsit_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO bsit_subject VALUES("1","CC101","Introduction to Computing","3","2","3","None","1","1");
INSERT INTO bsit_subject VALUES("2","CC102 ","Fundamentals of Programming ","3","2","3","None","1","1");
INSERT INTO bsit_subject VALUES("3","WS101","Web Systems and Technologies 1 (Electives)","3","2","3","None","1","1");
INSERT INTO bsit_subject VALUES("9","CC103","Intermediate Programming","3","2","3","CC101, CC102","1","2");
INSERT INTO bsit_subject VALUES("10","PT101","Platform Technologies (Electives)","3","3","2","CC101, CC102","1","2");
INSERT INTO bsit_subject VALUES("11","NET101","Networking 1","3","3","2","None","1","2");
INSERT INTO bsit_subject VALUES("13","HCI101","Introduction to Human Computer Interaction","3","2","3","None","2","2");
INSERT INTO bsit_subject VALUES("14","SE101","Software Engineering","3","2","3","CC105, PF101, IS104","2","2");
INSERT INTO bsit_subject VALUES("15","IPT101","Integrative Programming and Technologies 1","3","2","3","PT101, PF101","2","2");
INSERT INTO bsit_subject VALUES("16","IM101","Advanced Database Systems","3","2","3","CC105, PF101, IS104","2","2");



DROP TABLE campus;

CREATE TABLE `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus_name` varchar(100) NOT NULL,
  `campus_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO campus VALUES("1","SAN BARTOLOME","SB");
INSERT INTO campus VALUES("2","BATASAN","BA");
INSERT INTO campus VALUES("3","SAN FRANCISCO","SF");



DROP TABLE course;

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `courseshort` varchar(10) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO course VALUES("1","BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY","IT","BSIT","bsitlogo.png");
INSERT INTO course VALUES("2","BACHELOR OF SCIENCE IN ENTREPRENEURSHIP","EN","BSEntrep","entreplogo.png");
INSERT INTO course VALUES("3","BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING","IE","BSIE","ielogo.png");
INSERT INTO course VALUES("4","BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING","EE","BSECE","ecelogo.png");
INSERT INTO course VALUES("5","BACHELOR OF SCIENCE IN ACCOUNTANCY","AC","BSA","aclogo.png");



DROP TABLE enrollmentconfiguration;

CREATE TABLE `enrollmentconfiguration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `switchconfig` varchar(10) NOT NULL,
  `countstudentsection` int(11) NOT NULL,
  `countstudentcourse` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO enrollmentconfiguration VALUES("1","2021-2022","1","1","39","999");



DROP TABLE genacc_subject;

CREATE TABLE `genacc_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO genacc_subject VALUES("1","MATH 1","Mathematics in the Modern World","3","3","0","None");
INSERT INTO genacc_subject VALUES("2","GEE 1 ","Philosophy of the Good Life","3","3","0","None");
INSERT INTO genacc_subject VALUES("3","GEE 2","Fundamentals of Creativity and Innovation ","3","3","0","None");
INSERT INTO genacc_subject VALUES("4","PE 1","Physical Fitness and Wellness","2","2","0","None");
INSERT INTO genacc_subject VALUES("5","NSTP 1","National Service Training Program 1 ","3","3","0","None");
INSERT INTO genacc_subject VALUES("6","SCI 1","Science, Technology and Society","3","3","0","NONE");
INSERT INTO genacc_subject VALUES("7","ENG 1","Purposive Communication","3","3","0","NONE");
INSERT INTO genacc_subject VALUES("8","GEE 3","Creative Practice: Tools, Methods and Techniques","3","3","0","GEE 2");
INSERT INTO genacc_subject VALUES("9","PE 2","Rhythmic Activities","2","2","0","PE 1");
INSERT INTO genacc_subject VALUES("10","NSTP 2","National Service Training Program 2","3","3","0","NSTP 1");
INSERT INTO genacc_subject VALUES("11","HUM 1","Art Appreciation","3","3","0","None");
INSERT INTO genacc_subject VALUES("12","PE 3","Individual and Dual Sports","2","2","0","PE 1");
INSERT INTO genacc_subject VALUES("13","SOCSCI 1","Understanding the Self","3","3","0","None");
INSERT INTO genacc_subject VALUES("17","SOCSCI 2","Readings in Philippine History","3","3","0","None");
INSERT INTO genacc_subject VALUES("18","PE4","Team Sports","2","2","0","PE 1");
INSERT INTO genacc_subject VALUES("19","SCI 2","Science, Technology and Society 2","3","3","0","SCI 1");



DROP TABLE genacc_year;

CREATE TABLE `genacc_year` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(11) NOT NULL,
  `units` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `sem` int(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO genacc_year VALUES("1","MATH 1","3","1","1","IT");
INSERT INTO genacc_year VALUES("2","GEE 1 ","3","1","1","IT");
INSERT INTO genacc_year VALUES("3","GEE 2","3","1","1","IT");
INSERT INTO genacc_year VALUES("4","PE 1","2","1","1","IT");
INSERT INTO genacc_year VALUES("5","NSTP 1","3","1","1","IT");



DROP TABLE important_key;

CREATE TABLE `important_key` (
  `ID` varchar(100) NOT NULL,
  `KEY_ENC_DEC` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO important_key VALUES("this_shall_pass","siaprojectqcutempkeyforenc_20212022_YnKak4qw");



DROP TABLE regulardocumentsneed;

CREATE TABLE `regulardocumentsneed` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `PSA` text NOT NULL,
  `Form137` text NOT NULL,
  `Form138` text NOT NULL,
  `Diploma` text NOT NULL,
  `GoodMoral` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO regulardocumentsneed VALUES("1","2021-0000002","ROWY_PSA.docx","ROWY_FORM137.pdf","ROWY_FORM138.pdf","ROWY_DIPLOMA.pdf","ROWY_GOODMORAL.pdf","ROWY_BARANGAYCERTIFICATE.pdf","ROWY_MEDICALCERTIFICATE.pdf","ID_PICTURE.jpg");



DROP TABLE returneesdocumentsneed;

CREATE TABLE `returneesdocumentsneed` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `GeneralClearance` text NOT NULL,
  `Form137` text NOT NULL,
  `TrueCopyofGrades` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE schedule_table;

CREATE TABLE `schedule_table` (
  `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sectionname` varchar(50) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL,
  `timestart` varchar(20) NOT NULL,
  `timestop` varchar(20) NOT NULL,
  `schedule_cat` varchar(50) NOT NULL DEFAULT 'lec',
  PRIMARY KEY (`Schedule_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO schedule_table VALUES("1","SBIT-1A","CC101","M","8:00 am","10:00 am","lec");
INSERT INTO schedule_table VALUES("2","SBIT-1A","CC101","M","12:00 pm","3:00 pm","lab");
INSERT INTO schedule_table VALUES("3","SBIT-1A","WS101","T","7:00 am","9:00 am","lec");
INSERT INTO schedule_table VALUES("4","SBIT-1A","WS101","T","11:00 am","2:00 pm","lab");



DROP TABLE sections;

CREATE TABLE `sections` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `campus_code` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `section_letter` char(2) NOT NULL,
  `studentcount` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO sections VALUES("1","SB","IT","1","A","3");



DROP TABLE sections_subjects;

CREATE TABLE `sections_subjects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sectionname` varchar(50) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `student_category` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE student_classification;

CREATE TABLE `student_classification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(11) NOT NULL,
  `classification` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE student_examresult;

CREATE TABLE `student_examresult` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(11) NOT NULL,
  `ExamCode` varchar(50) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_examresult VALUES("1","21-0001","211823","2021-0000001");
INSERT INTO student_examresult VALUES("2","21-0002","211821","2021-0000002");
INSERT INTO student_examresult VALUES("3","","211822","2021-0000003");



DROP TABLE student_sections;

CREATE TABLE `student_sections` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(11) NOT NULL,
  `sectionname` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_sections VALUES("1","21-0001","SBIT-1A");
INSERT INTO student_sections VALUES("2","21-0001","SBIT-1A");
INSERT INTO student_sections VALUES("3","21-0002","SBIT-1A");



DROP TABLE studentaccount;

CREATE TABLE `studentaccount` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `user_status` varchar(10) NOT NULL DEFAULT 'NEW USER',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentaccount VALUES("1","21-0001","juanitarowy_21","4184441972","NEW ACCOUN");
INSERT INTO studentaccount VALUES("2","21-0002","quezonuniversity_21","2673958903","NEW ACCOUN");



DROP TABLE studentapprovals;

CREATE TABLE `studentapprovals` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `Approval` varchar(50) NOT NULL DEFAULT 'TO BE APPROVED',
  `remarks` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentapprovals VALUES("1","2021-0000001","21-0001","APPROVED"," Information has been recorded");
INSERT INTO studentapprovals VALUES("2","2021-0000002","21-0002","APPROVED"," DOCUMENTS HAS BEEN PASSED // TO BE APPROVED/CORRUPTED  FILE(\')/");
INSERT INTO studentapprovals VALUES("3","2021-0000003","","TO BE APPROVED","Information has been recorded");



DROP TABLE studenteducationalinfo;

CREATE TABLE `studenteducationalinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `schoollastattended` varchar(100) NOT NULL,
  `schoollastattendedaddress` varchar(100) NOT NULL,
  `schoollastattendedlevel` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO studenteducationalinfo VALUES("1","2021-0000001","21-0001","JUANITA FOLLERO ROWY","RAJAH SOLIMAN ST.","GRADE 12 ");
INSERT INTO studenteducationalinfo VALUES("2","2021-0000002","21-0002","QUEZON CITY UNIVERSITY","SAN BARTOLOME, NOVALICHES, Q. C.","GRADE 12 ");
INSERT INTO studenteducationalinfo VALUES("3","2021-0000003","","QUEZON CITY UNIVERSITY","RAJAH SOLIMAN ST.","GRADE 12 ");



DROP TABLE studentenrollmentinfo;

CREATE TABLE `studentenrollmentinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `firstcourse` varchar(50) NOT NULL,
  `secondcourse` varchar(50) NOT NULL,
  `thirdcourse` varchar(50) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `updatecount` int(11) NOT NULL DEFAULT 0,
  `needupdate` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentenrollmentinfo VALUES("1","2021-0000001","21-0001","TRANSFEREE","BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY","BACHELOR OF SCIENCE IN ENTREPRENEURSHIP","BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING","SAN BARTOLOME","0","0");
INSERT INTO studentenrollmentinfo VALUES("2","2021-0000002","21-0002","REGULAR","BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY","BACHELOR OF SCIENCE IN ENTREPRENEURSHIP","BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING","SAN BARTOLOME","0","0");
INSERT INTO studentenrollmentinfo VALUES("3","2021-0000003","","TRANSFEREE","BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY","BACHELOR OF SCIENCE IN ENTREPRENEURSHIP","BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING","SAN BARTOLOME","0","0");



DROP TABLE studentexamresultstemp;

CREATE TABLE `studentexamresultstemp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ExamNo` int(11) NOT NULL,
  `ExamDate` varchar(50) NOT NULL,
  `Last-Name` varchar(50) NOT NULL,
  `First-Name` varchar(50) NOT NULL,
  `Middle-Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `vcode` varchar(50) NOT NULL,
  `verify_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentexamresultstemp VALUES("3","211821","11/28/2020","Rowy","Chedrick","Follero","chedrick.follero.rowy@gmail.com","255467","2021-10-21");
INSERT INTO studentexamresultstemp VALUES("4","211822","11/28/2020","Rowy","Juanita","Follero","8bougainvillea@gmail.com","139336","2021-10-21");
INSERT INTO studentexamresultstemp VALUES("5","211823","11/28/2020","ROWY","CHEDRICK","FOLLERO","rowyched28@gmail.com","293405","2021-11-14");
INSERT INTO studentexamresultstemp VALUES("7","211824","11/28/2020","Rowy","Ramil","Sace","rowyc.qcydoqcu@gmail.com","210595","2021-11-20");
INSERT INTO studentexamresultstemp VALUES("8","211825","11/28/2020","Rowy","Chester","Follero","ramilphoto0816@gmail.com","196577","2021-12-02");



DROP TABLE studentinfo;

CREATE TABLE `studentinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `FullName-Last` varchar(50) NOT NULL,
  `FullName-First` varchar(50) NOT NULL,
  `FullName-Middle` varchar(50) NOT NULL,
  `Age` varchar(11) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `civilstatus` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address-name` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `motherjob` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fatherjob` varchar(50) NOT NULL,
  `guardianname` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `guardiancontactno` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO studentinfo VALUES("1","2021-0000001","21-0001","ROWY","JUANITA","FOLLERO","21","2000-11-28","QUEZON CITY","SINGLE","MALE","09086689844","8bougainvillea@gmail.com","RAJAH SOLIMAN ST.","1117","JUANITA F. ROWY","HOUSE WIFE","RAMIL S. ROWY","PHOTOGRAPHER","RAMIL S. ROWY","FATHER","09282298587");
INSERT INTO studentinfo VALUES("2","2021-0000002","21-0002","UNIVERSITY","QUEZON","CITY","21","2000-11-28","MANILA CITY","SINGLE","MALE","09086689844","chedrick.follero.rowy@gmail.com","L4 BLK4 NATIVIDAD SUBD.","1117","JUANITA F. ROWY","HOUSE WIFE","RAMIL S. ROWY","PHOTOGRAPHER","RAMIL S. ROWY","FATHER","09282298587");
INSERT INTO studentinfo VALUES("3","2021-0000003","","UNIVERSITY","QUEZON","CITY","21","2000-11-28","MANILA CITY","SINGLE","MALE","09086689844","chedrick.follero.rowy@gmail.com","SAN BARTOLOME, NOVALICHES, Q. C.","1117","JUANITA F. ROWY","HOUSE WIFE","RAMIL S. ROWY","PHOTOGRAPHER","RAMIL S. ROWY","FATHER","09282298587");



DROP TABLE transfeeesdocumentsneed;

CREATE TABLE `transfeeesdocumentsneed` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollnumber` varchar(50) NOT NULL,
  `PSA` text NOT NULL,
  `TOR` text NOT NULL,
  `CertificateofTransferCredential` text NOT NULL,
  `SubjectDescription` text NOT NULL,
  `GoodMoral` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO transfeeesdocumentsneed VALUES("1","2021-0000001","ROWY_FORM138.pdf","","","","","","","");
INSERT INTO transfeeesdocumentsneed VALUES("2","2021-0000003","","ROWY_DIPLOMA.pdf.jpg","","","","","","");



