<?php

    $emp_id = $_GET['empid'];// get the first name
    $salary = $_GET['sal'];
    $trans = $_GET['date'];

    $host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="salary";

    // make DB connections
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");
     $query="SELECT MAX(Transaction_Number) from $tbl_name";
    $res=mysql_query($query,$con);
    $value=mysql_fetch_row($res);
    $id=$value[0];
    $trans_id=$id+1;

    // SQL Query
    $sql="INSERT INTO $tbl_name VALUES('$emp_id','$trans_id','$trans','$salary')";

    // run the query
    $result = mysql_query($sql,$con);
    if($result)
    {
        echo "A salary of $salary was paid for $emp_id on $trans and the transaction number is $trans_id";
    }



    mysql_close($con);      // close the connection
?>