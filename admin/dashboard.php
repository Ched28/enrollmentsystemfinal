<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
session_start();
?>

<div class="content" id='sessions'> </div>
  <!--  <div class="content7">
     <h1> 100 Passers  <hr> </h1> 
     <span style="font-size: 1.3em;padding: 0;margin: 0;"> 500 Examinees </span>
         </div>
    <div class="content8"> 
        <h1> 1000  <hr> </h1> 
        <span style="font-size: 1.3em;padding: 0;margin: 0;"> New Enrollees </span>
    </div>
    <div class="content9"> 
        <h1> 500   <hr> </h1> 
        <span style="font-size: 1.3em;padding: 0;margin: 0;"> Officially Enrolled </span> 
    </div>-->
   

<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sessions").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("POST", "config/counting.php", true);
  xhttp.send();
}
setInterval(() => {
    loadXMLDoc();
}, 1000);

window.onload = loadXMLDoc;
</script>

<?php  //include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); <i class="fas fa-percentage"></i>  <span style="font-size: .3em;padding: 0;margin: 0;"> out of</span>?>