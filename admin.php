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
					
					
					/*JavaScript for first name search*/
                      function getuser()
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
						xhr.open("GET","getEmpid.php?first_name="+str,true);
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
                                        
                                         function deluser()
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
						xhr.open("GET","delemp.php?first_name="+str,true);
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
                                        function saldisplay(){
                                            
                                            document.getElementById('display').innerHTML="<div class='control-group'>"+  
                                               "<label class='control-label' for='book'>SALARY: </label>"+  
                                                "<div class='controls'>"+  
                                                "<input type='text' id='value'>" +
                                                "</div> <br>"+
                                                "<div class='controls'>"+  
                                                "<input type='date' id='val2'>" +
                                                "</div> <br>"+
                                                                                                                                                                                            "<div class='controls'>"+  
                                                "<input type='button' value='Pay' class='btn btn-success' onclick='saluser()' >" +
                                                 "</div>"+												
                                                 "</div>";
                                        }
                                        
                                       
                                        
                                         function saluser()
                       {
						
						var str=document.getElementById("fname").value;
                                                var sal=document.getElementById("value").value;
                                                var date=document.getElementById("val2").value;
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
						xhr.open("GET","saluser.php?empid="+str+"&&sal="+sal+"&&date="+date,true);
						//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
						xhr.send();
						xhr.onreadystatechange=display_data;
						
						function display_data(){
							if(xhr.readyState == 4){
								if(xhr.status == 200) {
									document.getElementById("display").innerHTML = xhr.responseText;
									//document.write(xhr.responseText);
								}
								else {
									alert("there was something wrong with your request");
								}
							}
						}
					}
                                        
                                        function editdisplay(){
                                            
                                            document.getElementById("txtHint2").innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Computer ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='cid'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Computer Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='cname'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Start Date: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='date' id='start'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>End Date: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='date' id='end'>" +
                                                                                                                                    "</div> </div>"+
                                           "<label class='control-label' for='book'>Group:</label><div id='skillsSearch'>"+
                                                "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='manager' name='group' onclick='disp()'>Manager</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='hr' name='group' onclick='disp()'>HR</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='financier' name='group' onclick='disp()'>Finance</label>"+
												 "<label class='checkbox skillCheck'>"+
                                                "<input type='radio' value='marketing_group' name='group' onclick='disp()'>Marketing</label>"+

                                                
                                                "<div class='clear'></div>"+
                                           " </div>";                                                                               
                                            document.getElementById("txtHint5").innerHTML="<div class='control-group'>"+ 
                                                                                      "<div class='controls'>"+  
                                                                                    "<input type='button' value='Submit' class='btn btn-success' onclick='updateuser()' >" +
                                                                                      "</div>"+												
                                                                                     "</div>";
                                        }
					function disp(){
                                            
                                            var groups=document.getElementsByName("group");
                                                var str;
						for(var i = 0; i < groups.length; i++){
							if(groups[i].checked){
								str = groups[i].value;
							}
						}
                                            if(str=='manager'){
                                                document.getElementById("txtHint3").innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Stock Percentage: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='stock'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Designation: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='designation'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Project ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='pid'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Project Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='pname'>" +
                                                                                                                                    "</div> </div>";
                                            }
                                            else if(str=='hr'){
                                                
                                                document.getElementById("txtHint3").innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Certification: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='cert'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Recruitment ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='recid'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Recruitment Location: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='recl'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                     "<label class='control-label' for='book'>Recruitment Date: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='date' id='recdate'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Job ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='jid'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Job Location: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='jloc'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Job Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='jname'>" +
                                                                                                                                    "</div> </div>";;
                                                
                                                
                                            }
                                            
                                             else if(str=='financier'){
                                                 document.getElementById("txtHint3").innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Task ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='tid'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Task Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='tname'>" +
                                                                                                                                    
                                                                                                                                    "</div> </div>";
                                            }
                                            
                                             else if(str=='marketing_group'){
                                                 document.getElementById("txtHint3").innerHTML="<div class='control-group'>"+  
                                                                                                                                    "<label class='control-label' for='book'>Sales Volume: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='svol'>" +
                                                                                                                                    "</div> <br>"+ "<label class='control-label' for='book'>Team: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<label><input type='checkbox' id='chk1'>Advertiser</label>" +
                                                                                                                                         "<label><input type='checkbox' id='chk2'>Sales</label>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    
                                                                                                                                    "<label class='control-label' for='book'>Site ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='site'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Site Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='sname'>" +
																																		"<label class='control-label' for='book'>Size: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='number' id='size'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Location: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='loc'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Product_ID: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='pid'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                     "<label class='control-label' for='book'>Price: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='price'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                    "<label class='control-label' for='book'>Name: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='name'>" +
                                                                                                                                    "</div><label class='control-label' for='book'>Description: </label>"+  
                                                                                                                                    "<div class='controls'>"+  
                                                                                                                                        "<input type='text' id='desc'>" +
                                                                                                                                    "</div> <br>"+
                                                                                                                                     "</div>";
                                            }
                                        }
           function updateuser(){
           
              var eid=document.getElementById("fname").value;
           var groups=document.getElementsByName("group");
                                                var str;
						for(var i = 0; i < groups.length; i++){
							if(groups[i].checked){
								str = groups[i].value;
							}
						}
              var file;                                  
           if(str=='manager')
           {
           var cid=document.getElementById("cid").value;
           var cname=document.getElementById("cname").value;
           var start=document.getElementById("start").value;
           var end=document.getElementById("end").value;
           var stock=document.getElementById("stock").value;
           var designation=document.getElementById("designation").value;
           var projid=document.getElementById("pid").value;
           var projname=document.getElementById("pname").value;
        
           var file="manager.php?cid="+cid+"&&cname="+cname+"&&start="+start+"&&end="+end+"&&stock="+stock+"&&designation="+designation+"&&projid="+projid+"&&projname="+projname+"&&eid="+eid;
           
        }
        else if(str=='financier'){
            
            var task_id=document.getElementById("tid").value;
            var task_name=document.getElementById("tname").value;
            
            var file="finance.php?tid="+task_id+"&&tname="+task_name+"&&eid="+eid;
        }
        else if(str=='hr'){
        
            var certification=document.getElementById("cert").value;
            var rec_id=document.getElementById("recid").value;
            var rec_loc=document.getElementById("recl").value;
            var rec_date=document.getElementById("recdate").value;
            var jid=document.getElementById("jid").value;
            var jname= document.getElementById("jname").value;
            var jloc=document.getElementById("jloc").value;
            var argstr="?cert="+certification+"&&recid="+rec_id+"&&recloc="+rec_loc+"&&recdate="+rec_date+"&&jid="+jid+"&&jname="+jname+"&&jloc="+jloc+"&&eid="+eid;
            var file="hr.php"+argstr;
                    
                    
            
        }
        
        else if(str=='marketing_group'){
            var svol=document.getElementById('svol').value;
            var flag;
            var site=document.getElementById('site').value;
            var sname=document.getElementById('sname').value;
            var size=document.getElementById('size').value;
            var loc=document.getElementById('loc').value;
            var pid=document.getElementById('pid').value;
            var price=document.getElementById('price').value;
            var name=document.getElementById('name').value;
            var desc=document.getElementById('desc').value;
            var chk1=document.getElementById('chk1');
            var chk2=document.getElementById('chk2');
            if(chk1.checked){
                var flag=1;
            }
            else if(chk2.checked){
                var flag=2;
            }
            else if((chk1.checked)&&(chk2.checked)){
                var flag=3;
                
                
            }
            var argstr1="?site="+site+"&&sname="+sname+"&&loc="+loc+"&&pid="+pid+"&&price="+price+"&&name="+name+"&&desc="+desc+"&&size="+size+"&&svol="+svol+"&&eid="+eid+"&&flag="+flag;
            var file="marketing.php"+argstr1;
        }
           
           //alert("values:"+cid+cname+start+end+stock+designation+projid+projname);
           
           if (window.XMLHttpRequest)
						  {
						  xhr=new XMLHttpRequest();
						  }
						else if(window.ActiveXObject)
						  {
						  xhr=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  
						//var data = "first_name" + str;
                                               
						xhr.open("GET",file,true);
						//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
						xhr.send();
						xhr.onreadystatechange=display_data;
						
						function display_data(){
							if(xhr.readyState == 4){
								if(xhr.status == 200) {
									document.getElementById("txtHint4").innerHTML = xhr.responseText;
									//document.write(xhr.responseText);
								}
								else {
									alert("there was something wrong with your request");
								}
							}
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
                    <div class="menuItem"><a href="home.php">Home</a></div>
                    <div class="menuItem"><a href="add.php">Add/Register an Employee</a></div>
                    <div class="menuItem"><a href="admin.php" class="selected">Edit Details</a></div>
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
<?php 
if($_SESSION['activeUser']==0){
    
    echo "Please Log in";
    
} 
else
{
?>
		<div id="container">
			<div id="content">
				<div id="mainContent">
                                    <center> <h3>EDIT EMPLOYEE DETAILS</h3></center> <br>
						
					<form class="well-home span6 form-horizontal" name="ajax-demo" id="ajax-demo">  
                                            
<!-- Div for search of Defined Queries -->                                          
                                           
												
                                            
                                            

                                            <br>
                                           
<!-- Div for Search By FirstName -->        <div class="control-group">  
                                                <label class="control-label" for="book">Employee-ID: </label>  
                                                <div class="controls">  
                                                    <input type="text" id="fname">  
                                                </div>  
                                            </div>  

<!-- Div for Search by Group starts here -->
                                           <!--<h4>Search by Group</h4> -->
                                             <br>
                                            <div class="control-group">  
                                                <label class="control-label" for="book">
                                                <div class="controls">  
                                                      <input type="button"  value="Submit" class="btn btn-success" onclick="getuser()" />  
                                                </div>  
                                             </div>

                                        </form>
                                    <div id="display"></div>				<!-- Div for Display starts here -->
                                            <div  id="txtHint"></div>
<!-- End of Main Content -->	</div>
                            <div id="txtHint2" style="margin:0 0 0 30px;"></div>
                            <div id="txtHint3" style="margin: 0 0 30px 30px;"></div>
                            <div id="txtHint4" style="margin: 0 0 30px 30px;"></div>
                            <div id="txtHint5" style="margin: 0 0 30px 30px;"></div>
			</div>
		</div>
<?php } ?>
		<div id="footer">Copyright © 2013 XYZinC</div>

		<script src="./home/jquery-latest.js"></script>
		<script src="./home/bootstrap.min.js"></script>
		<script src="./home/jquery.tablesorter.min.js"></script>
		<script src="./home/global.js"></script>
	
</body></html>