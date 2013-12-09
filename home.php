<?php
    session_start();
    if(!isset($_SESSION['activeUser']))
        $_SESSION['activeUser'] = 0;
    if(!isset($_SESSION['activeUser_LastName']))
        $_SESSION['activeUser_LastName'] = 0;
    
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta charset="UTF-8">
			<title>XYZ InC - Home</title>
			<link href="./files/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
			<link rel="stylesheet" type="text/css" href="./home/main.css">
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
                </script>
                <script>
                    $(document).ready(function() {
                       $("#id_Login_Button").click(function() {
                          $("#id_Login_Div").slideToggle();
                       });
                    });
                </script>
                <style>
                    #id_Login_Div
                    {
                        display: none;
                        position: absolute;
                        padding: 10px 20px 20px 20px;
                        width: 109px;
                        height: 115px;
                        /*background-color: #448B3D;*/
                        background-color: black;
                        margin-left: 1200px;
                    }
                </style>

					<script type="text/javascript">
					/*JavaScript Function for query 1*/
					function getcount(option)
					{
					
						var groups=document.getElementsByName("group");
						
						var str;
						for(var i = 0; i < groups.length; i++){
							if(groups[i].checked){
								str = groups[i].value;
							}
						}
                                                if(option==6)
                                                {
                                                  var val=document.getElementById("value").value;
                                                  var str=document.getElementById("month").value;
                                                }
						if(option==11||option==12||option==10)
						{
						var val=document.getElementById("value").value;
						}
						var xhr;
						if (str=="")
                                                  {
						  
						  document.getElementById("txtHint").innerHTML="";
						  return;
						  } 
						if (window.XMLHttpRequest)
						  {
						  xhr=new XMLHttpRequest();
						  }
						else if(window.ActiveXObject)
						  {
						  xhr=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  
						//var data = "first_name" + str;
						xhr.open("GET","getcount.php?options="+option+"&&group="+str+"&&value="+val,true);
						//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
						xhr.send();
						xhr.onreadystatechange=display_data;
						
						function display_data(){
							if(xhr.readyState == 4){
								if(xhr.status == 200) {
									document.getElementById("display2").innerHTML = xhr.responseText;
									//document.write(xhr.responseText);
								}
								else {
									alert("there was something wrong with your request");
								}
							}
						}
					
					}
					/*JavaScript for first name search*/
                      function showuser()
                       {
						
						var str=document.getElementById("fname").value;
						var xhr;
						if (str=="")
                                                  {
						  
						  document.getElementById("txtHint").innerHTML="";
						  return;
						  } 
						if (window.XMLHttpRequest)
						  {
						  xhr=new XMLHttpRequest();
						  }
						else if(window.ActiveXObject)
						  {
						  xhr=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  
						//var data = "first_name" + str;
						xhr.open("GET","getuser.php?first_name="+str,true);
						//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
						xhr.send();
						xhr.onreadystatechange=display_data;
						
						function display_data(){
							if(xhr.readyState == 4){
								if(xhr.status == 200) {
									document.getElementById("txtHint").innerHTML = xhr.responseText;
									//document.write(xhr.responseText);
								}
								else {
									alert("there was something wrong with your request");
								}
							}
						}
					}
					/* JavaScript for the select box of defined queries*/
                                        function setLabelForQueryChange(selectObject)
                                        {
                                            var labelArray = new Array("Select a Proper Option",
                                                                        "For certain group, list the number of employees in the group", 
                                                                        "For certain title, list the number of employees whohold it", 
                                                                        "List the Last Name, Employee_ID, and Rank of the employees whose Rank is exactly 7",
                                                                        "List the Last Name, Employee_ID, Rank, and Title of the female employees whose Rank is above 6 including 6",
                                                                        "For a certain street---Campbell Rd., find Employee_ID of all employees living in the street",
                                                                        "For a certain employee, find the salary he was paidin a certain month",
                                                                        "List Employee_ID, Phone numbers, and Name of employees who have two or more phone numbers",
                                                                        "For an employee one of whose phone numbers begins with972 and has Rank 8, list the employee’s Employee_ID, Last Name, and Phone Number",
                                                                        "Find  all  the  marketing  sites  which  have  at  least  5 employees",
                                                                        "List  the  information  of  products  in  a  certain  marketing site and list the Name and Employee_ID of the employees belonging to the products",
                                                                        "List  one  given  employee’s  Employee_ID  and Marketing  Sites  which  he  is  in  charge  of  in  the Marketing & Sales Department",
                                                                        "For  a  certain employee, find  the  employees who  can update his information in the system" );

                                            var selectedItem = selectObject[selectObject.selectedIndex];
											if(selectedItem.value==1)
											{
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display2').innerHTML="";

											document.getElementById('display').innerHTML="<div id='skillsSearch'>"+
                                                "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='manager' name='group' onclick='getcount(1)'>Manager</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='hr' name='group' onclick='getcount(1)'>HR</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='financier' name='group' onclick='getcount(1)'>Finance</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='marketing_group' name='group' onclick='getcount(1)'>Marketing</label>"+

                                                
                                                "<div class='clear'></div>"+
                                           " </div>";
										   
											}
											if(selectedItem.value==2)
											{
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display2').innerHTML="";

											document.getElementById('display').innerHTML="<div id='skillsSearch'>"+
                                                "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='CEO' name='group' onclick='getcount(2)'>CEO</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='VP' name='group' onclick='getcount(2)'>Vice President</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='SENIOR MANAGER' name='group' onclick='getcount(2)'>Senior Manager</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='TEAM LEAD' name='group' onclick='getcount(2)'>Team Lead</label>"+
												"<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='TRAINEE' name='group' onclick='getcount(2)'>Trainee</label>"+

                                                
                                                "<div class='clear'></div>"+
                                           " </div>";
										   
											}
											
											if(selectedItem.value==3)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="";
											getcount(3);
											
											}
											
											if(selectedItem.value==4)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="";
											getcount(4);
											}
											
											if(selectedItem.value==5)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value]; 
											document.getElementById('display').innerHTML="";
											getcount(5);
											}
											
											if(selectedItem.value==6)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Employee ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='value'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>MONTH&YEAR: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='month' placeholder='YYYY-MM'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                                                                            "<div class='controls'>"+  
                                                                                                                                        "<input type='button' value='search' class='btn btn-success' onclick='getcount(6)' >" +
                                                                                                                                    "</div>"+												
                                                                                                                                "</div>";
                                                                                        document.getElementById('display2').innerHTML="";

											}
											
											if(selectedItem.value==7)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value]; 
											document.getElementById('display').innerHTML="";
											getcount(7);
											}
											
											if(selectedItem.value==8)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="";
											getcount(8);
											}
											
											if(selectedItem.value==9)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="";
											getcount(9);
											}
											
											if(selectedItem.value==10)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value];
											document.getElementById('display').innerHTML="<div class='control-group'>"+  
                                                                                                                                        "<label class='control-label' for='book'>SITE ID: </label>"+  
                                                                                                                                        "<div class='controls'>"+  
                                                                                                                                            "<input type='text' id='value'>" +
                                                                                                                                        "</div> <br>"+
                                                                                                                                                                                                "<div class='controls'>"+  
                                                                                                                                            "<input type='button' value='search' class='btn btn-success' onclick='getcount(10)' >" +
                                                                                                                                        "</div>"+												
                                                                                                                                    "</div>";
											document.getElementById('display2').innerHTML="";
											
											}
											
											if(selectedItem.value==11)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value]; 
											document.getElementById('display2').innerHTML="";
											document.getElementById('display').innerHTML="<div class='control-group'>"+  
                                                                                                                                "<label class='control-label' for='book'>Employee ID: </label>"+  
                                                                                                                                "<div class='controls'>"+  
                                                                                                                                    "<input type='text' id='value'>" +
                                                                                                                                "</div> <br>"+
                                                                                                                                                                                        "<div class='controls'>"+  
                                                                                                                                    "<input type='button' value='search' class='btn btn-success' onclick='getcount(11)' >" +
                                                                                                                                "</div>"+												
                                                                                                                            "</div>";
											
											}
											
											if(selectedItem.value==12)
											{
											
											document.getElementById('id_displayLabel').innerHTML = labelArray[selectedItem.value]; 
											document.getElementById('display').innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Employee ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='value'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                                                                            "<div class='controls'>"+  
                                                                                                                                        "<input type='button' value='search' class='btn btn-success' onclick='getcount(12)' >" +
                                                                                                                                    "</div>"+												
                                                                                                                                "</div>";
											document.getElementById('display2').innerHTML="";
											

                                        }
										}
					</script>
	</head>
	
	<body style="">
        
            <?php
                    
                    if(isset($_POST['submit_Sign_In']))
                    {
                        $con = mysql_connect("localhost", "root", "","Employee_DB") or die("Cannot CONNECT to DB");
                        mysql_select_db("Employee_DB") or die("Cannot SELECT Database");
                        $queryLogin = "select * from Login where Employee_ID = '".$_POST['txt_Employee_ID']."'";
                        $resultSet = mysql_query($queryLogin);
                        $row = mysql_fetch_array($resultSet);
                        if($_POST['txt_Employee_ID'] == $row['Employee_ID'] && $_POST['txt_Password'] == $row['Password'] )
                        {
                            $_SESSION['activeUser'] = $_POST['txt_Employee_ID'];
                            
                            $queryName = "SELECT * FROM Employee WHERE Employee_ID = '".$_POST['txt_Employee_ID']."'";
                            $resultSet1 = mysql_query($queryName);
                            $row1 = mysql_fetch_array($resultSet1);
                            $_SESSION['activeUser_LastName'] = $row1['Last_Name'];
                        ?>

                        <script>
                           $(document).ready(function() {
                                    $("#id_Login_Button").hide();
                                    $("#id_Logout_Button").show();
                                    $("#id_label_Name").show();
                           });
                         </script>
                            <?php
                         }
                         else
                         { ?>
                         <script>
                                alert("INVALID LOGIN : USERNAME AND PASSWORD DID NOT MATCH")
                         </script>
<?php
                            $_SESSION['activeUser'] = 0;
                        }
                    }
                    else if (isset ($_POST['sub_Logout_Button']))
                    {
                        $_SESSION['activeUser'] = 0;
                         ?>
                         <script>
                         $(document).ready(function() {
                                    $("#id_Login_Button").show();
                                    $("#id_Logout_Button").hide();
                                    $("#id_label_Name").hide();
                           });
                         </script>
                            <?php
                    }
            ?>

        <div class="row">
	<center><h1>XYZ Inc</h1>
	</div>
		<div id="menu" class="navbar navbar-fixed">
                    <div class="menuItem"><a href="home.php" class="selected">Home</a></div>
                    <div class="menuItem"><a href="add.php">Add/Register an Employee</a></div>
                    <div class="menuItem"><a href="admin.php">Edit Details</a></div>
                        <label class="nav-list" id="id_label_Name" style="margin-left: 1050px; margin-top: -25px; position: absolute;">
                            <?php
                                if($_SESSION['activeUser'] != '0')
                                    echo "Welcome ".$_SESSION['activeUser_LastName'];
                            ?>
                        </label>
                    <div class="nav-list" style="margin-left: 1200px; margin-top: -32px; position: absolute;"><input type="button" class="btn btn-success" id="id_Login_Button" value="LOGIN" ></div>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="nav-list" style="margin-left: 1200px; margin-top: -38px; position: absolute;"><input type="submit" class="btn btn-success" name="sub_Logout_Button" id="id_Logout_Button" value="LOGOUT" ></div>
                        </form>
                </div>

                <div id="id_Login_Div" >
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="text" class="input-small" placeholder="Employee_ID" name="txt_Employee_ID" required><p></p>
                        <input type="password" class="input-small" placeholder="Password" name="txt_Password" required><p></p>
                        <input type="submit" class="btn" name="submit_Sign_In" value="Login">
                    </form>
                </div>
                <?php
                    if($_SESSION['activeUser'] != 0)
                    {
                        ?><script type="text/javascript">
                             document.getElementById("id_Login_Button").style.visibility = 'hidden';
                             document.getElementById("id_Logout_Button").style.visibility = 'visible';
                        </script><?php
                    }
                    else
                    {
                        ?><script type="text/javascript">
                             document.getElementById("id_Login_Button").style.visibility = 'visible';
                             document.getElementById("id_Logout_Button").style.visibility = 'hidden';
                        </script><?php
                    }
                ?>

		<div id="container">
			<div id="content">
				<div id="mainContent">
                                    <center> <h3>VIEW EMPLOYEE DETAILS</h3></center> <br>
						
					<form class="well-home span6 form-horizontal" name="ajax-demo" id="ajax-demo">  
                                            
<!-- Div for search of Defined Queries -->                                          
                                            <h4>Pre-Defined Queries</h4>
                                            <div class="control-group">
                                                <label class="control-label" for="book">Select Option:</label>  
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <select class="span3" name="queryNo" onchange="setLabelForQueryChange(this)">
                                                    <option value="0">-------</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select> 
                                               
                                                                                              
                                            </div><br>
											
											 <div id="id_displayLabel">
                                                </div> <br>
												<div id="display"></div><br>
												<div id="display2"></div><br>
												
                                            
                                            

                                            <br>
                                            <h4> Search by First Name</h4>
<!-- Div for Search By FirstName -->        <div class="control-group">  
                                                <label class="control-label" for="book">First Name: </label>  
                                                <div class="controls">  
                                                    <input type="text" id="fname" onkeyup="showuser()">  
                                                </div>  
                                            </div>  

<!-- Div for Search by Group starts here -->
                                           <!--<h4>Search by Group</h4> -->
                                             <br>
                                           

                                        </form>
										<!-- Div for Display starts here -->
                                            <div  id="txtHint"></div>
<!-- End of Main Content -->	</div>
			</div>
		</div>

		<div id="footer">Copyright © 2013 XYZinC</div>

		<script src="./home/jquery-latest.js"></script>
		<script src="./home/bootstrap.min.js"></script>
		<script src="./home/jquery.tablesorter.min.js"></script>
		<script src="./home/global.js"></script>
	
</body></html>