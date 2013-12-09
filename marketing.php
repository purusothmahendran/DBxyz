<?php
$svol=$_GET['svol'];
$site=$_GET['site'];
$sname=$_GET['sname'];
$size=$_GET['size'];
$location=$_GET['loc'];
$pid=$_GET['pid'];
$price=$_GET['price'];
$name=$_GET['name'];
$desc=$_GET['desc'];
$eid=$_GET['eid'];
$flag=$_GET['flag'];


$host="localhost";
    $username="root";
    $password="";
    $db_name="employee_db";
    $tbl_name="employee";
    $tbl_phone="employee_phone_numbers";
    $con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");
    
    $sql_check="(SELECT employee_id FROM manager WHERE employee_id='$eid')UNION(SELECT employee_id FROM financier WHERE employee_id='$eid')"
            . "UNION(SELECT employee_id FROM hr WHERE employee_id='$eid')";
     $result_check=  mysql_query($sql_check,$con);
     $answer_check=  mysql_fetch_row($result_check);
             if($answer_check){
                 
                 echo "Cannot Register The employee already belongs to another group";
             }
             
             else{
                 $sql_fin="SELECT employee_id from marketing_group WHERE employee_id=$eid";
                  $result_fin=mysql_query($sql_fin,$con);
                    $answer_fin=  mysql_fetch_row($result_fin);
                        if($answer_fin)
                        {
                            $sql_upd="UPDATE marketing_group SET sales_volume='$svol' WHERE employee_id='$eid'";
                            $res_upd=mysql_query($sql_upd,$con);
                        }
                        
                        else{
                            
                            $sql_upd="INSERT INTO marketing_group VALUES('$eid','$svol')";
                            $res_upd=mysql_query($sql_upd,$con);
                        }
                        
                        if($flag==1){
                            
                           $sql1="INSERT INTO advertisers VALUES('$eid')";
                           $result= mysql_query($sql1,$con);
                           $sql3="INSERT INTO belongs_to VALUES('$site',$eid')";
                           $result= mysql_query($sql3,$con);
                           $sql2="INSERT INTO marketing_site VALUES ('$site','$sname','$size','$location')";
                           $result= mysql_query($sql2,$con);
                           
                        }
                        
                        else if($flag==2){
                            
                            $sql1="INSERT INTO sales VALUES('$eid')";
                           $result= mysql_query($sql1,$con);
                          
                           $sql2="INSERT INTO marketing_site VALUES ('$site','$sname','$size','$location')";
                           $result= mysql_query($sql2,$con);
                           
                           $sql3="INSERT INTO belongs_to VALUES('$site',$eid')";
                           $result= mysql_query($sql3,$con);
                           
                          
                           
                            $sql5="INSERT INTO sells_at VALUES('$site','$eid')";
                            
                             $result= mysql_query($sql5,$con);
                             
                             $sql6= "INSERT INTO product_details VALUES('$pid','$name','$price','$desc','$eid')";
                              $result= mysql_query($sql6,$con);
                               $sql4="INSERT INTO product_sells VALUES('$pid','$eid')";
                          
                           $result= mysql_query($sql4,$con);
                        }
                        
                        else if($flag==3){
                            
                             
                           $sql1="INSERT INTO advertisers VALUES('$eid')";
                           $result= mysql_query($sql1,$con);
                               $sql1="INSERT INTO sales VALUES('$eid')";
                           $result= mysql_query($sql1,$con);
                          $sql3="INSERT INTO belongs_to VALUES('$site',$eid')";
                           $result= mysql_query($sql3,$con);
                           $sql2="INSERT INTO marketing_site VALUES ('$site','$sname','$size','$location')";
                           $result= mysql_query($sql2,$con);
                           $sql4="INSERT INTO product_sells VALUES('$pid','$eid')";
                          
                           $result= mysql_query($sql4,$con);
                           
                            $sql5="INSERT INTO sells_at VALUES('$site','$eid')";
                            
                             $result= mysql_query($sql5,$con);
                             $sql6= "INSERT INTO product_details VALUES('$pid','$name','$price','$desc','$eid')";
                              $result= mysql_query($sql6,$con);
                            
                        }
                 
                       echo "ALL INSERTS SUCCESSFUL";
                 
                 
             }

?>
