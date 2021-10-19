# enrollmentsystem
 For SIA Project


 Parts of Enrollment System Final

1. Header 
2. Main // This is has a background image
3. Content // This is has a white background // display: flex din toh 
4. Footer


Database Design 

Admin 
- Username
- Password

StudentApprovals
- ID 
- StudentID
- Approval

StudentInfo 
 - ID 
 - FullName-Last 
 - FullName-First 
 - FullName-Middle 
 - Age 
 - birthday
 - birthplace
 - civilstatus
 - gender
 - contactno
 - email
 - address-name
 - address-brgy
 - address-district
 - mothername
 - motherjob
 - fathername
 - fatherjob
 - guardianname
 - relationship
 - guardiancontactno

StudentEducationalInfo
- ID 
- StudentID
- schoollastattended
- schoollastattendedaddress
- schoollastattendedlevel

StudentEnrollmentInfo
- ID
- StudentID
- category 
- firstcourse
- secondcourse 
- thirdcourse

RegularDocumentsNeed
- ID
- StudentID
- PSA
- Form137
- Form138
- Diploma
- GoodMoral
- BarangayClearance
- MedicalClearance
- IDPicture


ReturneesDocumentsNeed
- ID 
- StudentID
- GeneralClearance
- Form137
- TrueCopyofGrades
- BarangayClearance
- MedicalClearance

TransfeeesDocumentsNeed
- ID 
- StudentID
- PSA
- TOR
- CertificateofTransferCredential
- SubjectDescription
- BarangayClearance
- MedicalClearance
- IDPicture

-StudentAccount
- ID
- StudentID
- Username
- Password

NEW UPDATE: 

    StudentExamResultsTemp

    - ID 
    - ExamNo
    - ExamDate
    - Email
    - Vcode //Verification Code

DONE! 
tables

ADMIN ->
    admin, StudentApprovals (Read&Write), 

    Other Table For Read Only.. 



    