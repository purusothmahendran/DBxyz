<?php
 
$tid=$_GET['tid'];
$tname=$_GET['tname'];
$eid=$_GET['eid'];

$host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_phone="employee_phone_numbers";
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");

    $sql_check="(SELECT employee_id FROM hr WHERE employee_id='$eid')UNION(SELECT employee_id FROM manager WHERE employee_id='$eid')"
            . "UNION(SELECT employee_id FROM marketing_group WHERE employee_id='$eid')";
     $result_check=  mysql_query($sql_check,$con);
     $answer_check=  mysql_fetch_row($result_check);
             if($answer_check){
                 
                 echo "Cannot Register The employee already belongs to another group";
             }
             else{
$sql_fin="SELECT employee_id from financier WHERE employee_id=$eid";
$result_fin=mysql_query($sql_fin,$con);
$answer_fin=  mysql_fetch_row($result_fin);
if($answer_fin)
{
    echo "This Employee already exists";
}

else{
    
    $sql_ins="INSERT INTO financier VALUES('$eid')";
    $result_ins=mysql_query($sql_ins,$con);
}
$sql_task="INSERT INTO task_details VALUES ('$tid','$tname')";
$sql_alloc="INSERT INTO task_allocation VALUES('$tid','$eid')";
$result_task=mysql_query($sql_task,$con);
$result_alloc=mysql_query($sql_alloc,$con);

echo "ALL INSERTS SUCCESSFUL";
             }
?>