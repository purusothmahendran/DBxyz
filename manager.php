<?php

$cid=$_GET['cid'];
$cname=$_GET['cname'];
$stock=$_GET['stock'];
$designation=$_GET['designation'];
$projid=$_GET['projid'];
$projname=$_GET['projname'];
$empid=$_GET['eid'];
$start=$_GET['start'];
$end=$_GET['end'];
$tbl_group="manager";



        
    $host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="employee";
    $tbl_phone="employee_phone_numbers";
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");
    
    $sql_check="(SELECT employee_id FROM hr WHERE employee_id='$empid')UNION(SELECT employee_id FROM financier WHERE employee_id='$empid')"
            . "UNION(SELECT employee_id FROM marketing_group WHERE employee_id='$empid')";
     $result_check=  mysql_query($sql_check,$con);
     $answer_check=  mysql_fetch_row($result_check);
             if($answer_check){
                 
                 echo "Cannot Register The employee already belongs to another group";
             }

   else{
    $query="SELECT *from $tbl_group WHERE employee_id='$empid'";
    $res=mysql_query($query,$con);
    $value=mysql_fetch_row($res);
    
    if($value){
        $sql_update="UPDATE $tbl_group SET`Stock_Percentage`='$stock',`Designation`='$designation' WHERE Employee_id='$empid'";
        $result_up=  mysql_query($sql_update,$con);
        
    }
    
    else{
         $sql_insert="INSERT INTO $tbl_group VALUES('$empid','$stock','$designation')";
    $result = mysql_query($sql_insert,$con);
    }
    
    $sql_compche="SELECT * FROM computer_allocation WHERE employee_id='$empid'";
    $ans=  mysql_query($sql_compche,$con);
    $val=mysql_fetch_row($ans);
    if($val){
       echo "employee already has a computer and the computer id is  $val[0] \n";
        
    }
    else{
    $sql_compd="INSERT INTO computer_details VALUES('$cid','$cname')";
    $result2=  mysql_query($sql_compd,$con);
    $sql_compa="INSERT INTO computer_allocation VALUES('$cid','$empid','$start','$end')";
    $result3=mysql_query($sql_compa,$con);
    }
    
    $sql_proj="INSERT INTO project_details VALUES('$projid','$projname')";
    $res_proj=  mysql_query($sql_proj,$con);
    $sql_projalloc="INSERT INTO project_allocation VALUES('$projid','$empid')";
    $res_alloc=  mysql_query($sql_projalloc,$con);
        echo "Insert Succesful";
   }
    mysql_close($con);
?> 
