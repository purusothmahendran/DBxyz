<?php

$certification=$_GET['cert'];
$recid=$_GET['recid'];
$recloc=$_GET['recloc'];
$recdate=$_GET['recdate'];
$jid=$_GET['jid'];
$jname=$_GET['jname'];
$jloc=$_GET['jloc'];
$eid=$_GET['eid'];

$host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="employee";
    $tbl_phone="employee_phone_numbers";
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");
    
    $sql_check="(SELECT employee_id FROM manager WHERE employee_id='$eid')UNION(SELECT employee_id FROM financier WHERE employee_id='$eid')"
            . "UNION(SELECT employee_id FROM marketing_group WHERE employee_id='$eid')";
     $result_check=  mysql_query($sql_check,$con);
     $answer_check=  mysql_fetch_row($result_check);
             if($answer_check){
                 
                 echo "Cannot Register The employee already belongs to another group";
             }
             
             else{
                 $sql_fin="SELECT employee_id from hr WHERE employee_id=$eid";
                  $result_fin=mysql_query($sql_fin,$con);
                    $answer_fin=  mysql_fetch_row($result_fin);
                        if($answer_fin)
                        {
                            $sql_upd="UPDATE hr SET certification='$certification' WHERE employee_id='$eid'";
                            $res_upd=mysql_query($sql_upd,$con);
                        }
                        
                        else{
                            
                            $sql_upd="INSERT INTO hr VALUES('$eid','$certification')";
                            $res_upd=mysql_query($sql_upd,$con);
                        }
                 
                         $sql1="INSERT INTO job VALUES('$jid','$jloc','$jname')";
                         $result1=mysql_query($sql1,$con);
                         $sql2="INSERT INTO recruitment VALUES('$recid','$recloc','$recdate','$eid')";
                         $result2=mysql_query($sql2,$con);
                         $sql3="INSERT INTO hires VALUES('$eid','$recid','$jid')";
                         $result3=mysql_query($sql3,$con);
                         
                         echo"ALL INSERTS SUCCESSFUL";
                         
                 
                 
             }
?>