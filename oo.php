<?php
	include("connection.php");  
 session_start();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="icon" type="image/png" href="img/dbuicon.png"/>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="slideshow/imageslider.css" rel="stylesheet" type="text/css" />
<script src="slideshow/imageslider.js" type="text/javascript"></script>
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
<table  border="0" align="center" width="750px">
<!--Header-->
<tr>
<td width="650px"></td>
<td id="loginlink" align="center"><a href="login.php" id="log">Login</a></td>
</tr>
<tr>
<td width="700px" colspan="3" height="120px">
<p><a href="index.php"><img src="img/logo.png" align="left" width="150px" height="120px"></a>
<img style="border-radius:55px;box-shadow:1px 1px 12px black" src="img/dbudms.png" align="center" width="470px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li class="active"><a href="index.php">Home</a></li>
			<li ><a href="about.php">About Us</a></li>
			<li><a href="candidate.php">Candidates</a></li>
			<li><a href="vote.php">Vote</a></li>
			<li><a href="contacts.php">Contact Us</a></li>
			<li><a href="login.php">Login</a></li>
			<li>
			<style>
.dropbtn {
	width: 90px;
	height: 31px;
	padding-top: 16px;
	text-decoration: none;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	border-radius:13px;
	color:white;
    color: white;
    padding: 16px;
    border: none;
    cursor: pointer;
	background-color:#3C5581;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #3C5581;
    min-width: 110px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown:hover .dropdown-content {
    display: block;
}


</style>

<div class="dropdown">
  <button class="dropbtn">Language</button>
  <div class="dropdown-content">
    <a href="oromo/index.php">Afaan Oromoo</a>
    <a href="Ahmaric/index.php">Ahmaric</a>
  </div>
</div> 
			</li>
		</ul>
</td>
</tr>
<!--End of main menus-->
<!--Slide shows-->
<tr >
<td colspan="2" valign="top" height="200px">
<div id="sliderFrame">
        <div id="slider"> 		
            <img src="slideshow/images/image-slider-1.jpg" alt="Building One" />
            <img src="slideshow/images/image-slider-2.jpg" alt="Photo Two" />
            <img src="slideshow/images/image-slider-3.jpg" alt="Photo Three" />
            <img src="slideshow/images/image-slider-4.jpg" alt="Photo Four" />
            <img src="slideshow/images/image-slider-5.jpg" alt="Photo Five" />
			</div>
    </div>
</td>
</tr>
<!--End of Slide shows-->
<table align="center" id="insides" width="850px">
<tr>
<!--Sub menus-->
<td width="25%" height="500px" valign="top" id="insides">
<table  >
<tr>
<th align="center" width="250px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">DBU-DMS</font></th>
</tr>
<tr>
<td><br><br><center><img src="slideshow/images/DSC01751.JPG" width="150px" height="100px"></center></td>
</tr>
</table>
<br>
<br>
<br>
<table border="0">
<tr>
<th width="250px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="http://www.dbu.edu.et">DBU Site</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="site.php">Site Map</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="https://mail.google.com/a/dbu/edu.et">Web Mail</a></td>
</tr>
</table>
<br>
<br>
<br>


</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<br>
<br>
<p align="center"><font face="arial" size="3px" color="#336699">Debre Berhan University</font></p>
<p><font size="2px">&nbsp;&nbsp;&nbsp;DEBRE BERHAN UNIVERSITY (DBU) is one of the thirteen new Universities which was established in 
the year 1997 E.C by the Ethiopian government (MOE).DBU is located in the Northern part of Ethiopia, in Amhara Region, North Showa Zone, in
 Debre Berhan town which is 130 kms far from Addis Ababa to the North – East. The foundation of the University was laid down in May 1997 E.C. 
DBU started the teaching, learning Process on January 28, 1999 E.C (2008 G.C) with enrollment of 725 students in the faculty of education with 
two streams, namely Businesses Education and natural science. After four consecutive year’s i.e. 2003 E.C enrollment of DBU was 5387 Students.
 Currently the University runs over 31 departments in first degree and 5 postgraduate studies by the total of 10,000 students. In addition to 
 the academic service the university provides dining, health care, dormitory, community service and other services for the students and Debre
 Berhan town communities.
</font></p>
<br>
<br>
<p><font face="arial" size="3px" color="#336699">Announcements</font></p>
<p><font size="3px">Dear Regular Students of Debre Berhan University</font></p>
<font size="2px">You can view your dormitory information by clicking  <a href="viewdorm.php"> Here</a></font>
</td>
</tr>
</table>
<!--End Body of section-->
</table>
<!--Footer-->

<div id="sample">
      <footer>
	  <br>
	  <div align="right">
<a href="#top"><img src="img/arrow_up.png" width="40px" title="Scroll Back to Top"></a>
</div>
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2014 Debre Berhan University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="index.php">Home</a>&nbsp;|&nbsp;<a href="about.php">About Us</a>&nbsp;|&nbsp;<a href="contact.php">Contact Us</a>&nbsp;</font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
