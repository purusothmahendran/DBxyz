<?php

    $first_name = $_GET['first_name'];      // get the first name

    $host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="employee";

    // make DB connections
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");

    // SQL Query
    $sql="DELETE FROM $tbl_name WHERE employee_id='$first_name'";

    // run the query
    $result = mysql_query($sql,$con);
if($result)
{
    echo "$result";
    echo "Employee record with ID $first_name is deleted";
}
    mysql_close($con);      // close the connection
?>