<?php

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $sup_id=$_POST['sid'];
    $pass=$_POST['pass'];
    $rank=$_POST['rank'];
    $title=$_POST['title'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $street=$_POST['street'];
    $apt=$_POST['aptno'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $grad=$_POST['grad'];
    $sid=$_POST['sid'];
    $primary=$_POST['priphone'];
    $secondary=$_POST['secphone'];
    $group=$_POST['group'];
   

    $host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="employee";
    $tbl_phone="employee_phone_numbers";
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");

    $query="SELECT MAX(Employee_id) from $tbl_name";
    $res=mysql_query($query,$con);
    $value=mysql_fetch_row($res);
    $emp=$value[0];
    $emp_id=$emp+1;
	if($sid=='')
			$sql="INSERT INTO $tbl_name(Employee_ID,First_Name,Last_Name,Rank,Title,Gender,DOB,Street_name,Apartment_number,City,State,ZipCode,Graduate_School) VALUES('$emp_id','$first_name','$last_name','$rank','$title','$gender','$dob','$street','$apt','$city','$state','$zip','$grad')";
	else
	 $sql="INSERT INTO $tbl_name VALUES('$emp_id','$first_name','$last_name','$rank','$title','$gender','$dob','$street','$apt','$city','$state','$zip','$grad','$sid')";
	 
     $result=mysql_query($sql, $con);

     if($primary!=NULL)
     {
        $sql_phone="INSERT INTO $tbl_phone VALUES('$primary','$emp_id')";
        $result_phone=mysql_query($sql_phone,$con);
    }
    if($secondary!=NULL)
    {
        $sql_phone="INSERT INTO $tbl_phone VALUES('$secondary','$emp_id')";
        $result_phone=mysql_query($sql_phone,$con);
    }
	
	if($group=="manager")
	{
	$tbl_group="manager";
	}
	
	else if($group=="hr")
	{
	$tbl_group="hr";
	}
	
	else if($group=="marketing_group")
	{
	$tbl_group="marketing_group";
	}
	
	else if($group=="financier")
	{
	$tbl_group="financier";
	}
	$sql_group="INSERT INTO $tbl_group(Employee_ID) VALUES ('$emp_id')";
	$result_group=mysql_query($sql_group,$con);
    // if successfully insert data into database, displays message "Successful". 
        $tbl_login='login';
        $sql_login="INSERT INTO $tbl_login VALUES('$emp_id','$pass')";
        $result_login=  mysql_query($sql_login,$con);
    if($result){
        echo "Successful";
        echo "<BR>";
        echo "your employee id / User Name is $emp_id and $pass";
        echo "<p><a href='home.php'>Back to main page</a></p>";
    }

    else {
        echo "ERROR";
    }
    mysql_close($con);
?> 
