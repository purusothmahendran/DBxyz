<?php
$option=$_GET['options'];
$group=$_GET['group'];
$value=$_GET['value'];
$host="localhost";
$username="root";
$password="";
$db_name="employee_db";
$tbl_name;
$count;
$con=mysql_connect("$host", "$username", "$password","$db_name")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB"); 
if($option==1)
{
$tbl_name=$group;
$sql="SELECT COUNT(*) FROM $tbl_name";
$result=mysql_query($sql,$con);
if($result)
{
$value=mysql_fetch_row($result);
$count=$value[0];
}
else{
echo "ERROR";
}
echo"<b>THE NUMBER OF EMPLOYEES IN THIS GROUP IS $count</b>";
}
else if($option==2)
{
$tbl_name="employee";
$sql="SELECT COUNT(*) FROM $tbl_name WHERE title='$group'";
$result=mysql_query($sql,$con);
if($result)
{
$value=mysql_fetch_row($result);
$count=$value[0];
}
else{
echo "ERROR";
}
echo"<b>THE NUMBER OF EMPLOYEES WHO HOLD THIS TITLE ARE $count</b>";
}
else if($option==3)
{
$tbl_name="employee";
$sql= "SELECT last_name,employee_id,rank FROM $tbl_name WHERE rank=7";
$result=mysql_query($sql,$con);
if(mysql_num_rows($result)>0)
    {
        echo "<table class='table table-striped' border='2'>
            <tr>
                <th>LAST NAME</th>
                <th>EMPLOYEE ID</th>
                <th>RANK</th>
               
            </tr>";
    }
	while($row = mysql_fetch_array($result))
    {
        $Employee_ID = $row['employee_id'];
        
        echo "<tr>";
		echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $Employee_ID . "</td>";
        echo "<td>" . $row['rank'] . "</td>";
		echo "</tr>";
		}
		echo"</table>";
}

else if($option==4)
{
$tbl_name="employee";
$sql= "SELECT last_name,employee_id,rank,title FROM $tbl_name WHERE rank>=6&&gender='female'";
$result=mysql_query($sql,$con);
if(mysql_num_rows($result)>0)
    {
        echo "<table class='table table-striped' border='2'>
            <tr>
                <th>LAST NAME</th>
                <th>EMPLOYEE ID</th>
                <th>RANK</th>
				<th>TITLE</th>
               
            </tr>";
    }
	while($row = mysql_fetch_array($result))
    {
        $Employee_ID = $row['employee_id'];
        
        echo "<tr>";
		echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $Employee_ID . "</td>";
        echo "<td>" . $row['rank'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "</tr>";
		}
		echo"</table>";
}

else if($option==5)
{
$tbl_name="employee";
$sql="SELECT employee_id FROM $tbl_name WHERE street_name LIKE  '%Campbell Road%' ";
$result=mysql_query($sql,$con);
if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
</tr>";

}
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['employee_id'] . "</td>";
echo "</tr>";
}
echo "</table>";
}

else if($option==6)
{

$sql="SELECT employee_id ,amount FROM salary WHERE pay_date LIKE '%$group%-%'AND employee_id=$value";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE ID</th>
<th> AMOUNT</th>
</tr>";

}
else{
    
    echo"NO SALARY RECORD FOUND";
}
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['employee_id'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "</tr>";
}
echo "</table>";

}


else if($option==7)
{
$tbl_one="employee";
$tbl_two="employee_phone_numbers";
$sql="SELECT p.employee_id, e.first_name,p.phone_number
FROM employee e,employee_phone_numbers p
WHERE e.employee_id=p.employee_id AND p.employee_id 
IN (

SELECT employee_id
FROM employee_phone_numbers
GROUP BY employee_id
HAVING COUNT( employee_id ) >1
) ";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
<th> FIRST NAME</th>
<th>PHONE NUMBER</th>
</tr>";

}
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['employee_id'] . "</td>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['phone_number']. "</td>";
echo "</tr>";
}
echo "</table>";

}
else if($option==8)
{
$tbl_one="employee";
$tbl_two="employee_phone_numbers";
$sql="SELECT p.employee_id, e.last_name,p.phone_number
FROM employee e,employee_phone_numbers p
WHERE e.rank=8 AND e.employee_id=p.employee_id AND p.employee_id 
IN (

SELECT employee_id
FROM employee_phone_numbers WHERE phone_number LIKE '972%'
)";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
<th> LAST NAME</th>
<th>PHONE NUMBER</th>
</tr>";

}
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['employee_id'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['phone_number']. "</td>";
echo "</tr>";
}
echo "</table>";

}
else if($option==9)
{
$tbl_one="marketing_group";
$tbl_two="view_marketing_information";
$sql="SELECT site_id,site_name FROM marketing_site WHERE site_name IN(SELECT site_name
FROM view_marketing_information
GROUP BY site_name
HAVING COUNT( employee_id ) >=5)";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>SITE_ID</th>
<th> SITE NAME</th>
</tr>";

}
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['site_id'] . "</td>";
echo "<td>" . $row['site_name'] . "</td>";
echo "</tr>";
}
echo "</table>";

}

else if($option==10)
{

$sql="SELECT p.Employee_ID,e.First_Name, p.Product_ID,p.Name,p.Description FROM product_details p ,employee e WHERE e.employee_id=p.employee_id AND p.Product_ID IN

(SELECT Product_ID FROM product_sells WHERE employee_id IN(SELECT employee_id FROM sells_at WHERE site_id='$value'))";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
<th>FIRST NAME</th>
<th>PRODUCT ID</th>
<th>PRODUCT NAME</th>
<th>DESCRIPTION</th>
</tr>";


while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Employee_ID'] . "</td>";
echo "<td>" . $row['First_Name'] . "</td>";
echo "<td>" . $row['Product_ID'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "</tr>";
}
echo "</table>";

}
else
{
echo "NO RECORDS FOUND";
}
}
else if($option==11)
{

$sql="(SELECT s.employee_id,s.site_id,n.site_name FROM sells_at s, marketing_site n WHERE s.employee_id=$value AND s.site_id=n.site_id ) 
UNION (SELECT s.employee_id,s.site_id,n.site_name FROM belongs_to s, marketing_site n WHERE s.employee_id=$value AND s.site_id=n.site_id )";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
<th>SITE_ID</th>
<th> SITE NAME</th>
</tr>";


while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['employee_id'] . "</td>";
echo "<td>" . $row['site_id'] . "</td>";
echo "<td>" . $row['site_name'] . "</td>";
echo "</tr>";
}
echo "</table>";

}
else
{
echo "NO RECORDS FOUND";
}
}


else if($option==12)
{

$sql="(SELECT * 
FROM  `view_administrators_information` 
WHERE employee_id
IN (

SELECT supervisor_id
FROM employee
WHERE employee_id =$value
))UNION (SELECT employee_id ,first_name,last_name FROM employee WHERE title='CEO' or employee_id IN (SELECT employee_id FROM hr))";

$result=mysql_query($sql,$con);

if(mysql_num_rows($result)>0)
{
echo "<table class='table table-striped' border='2'>
<tr> 
<th>EMPLOYEE_ID</th>
<th>FIRST NAME</th>
<th>LAST NAME</th>
</tr>";


while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Employee_ID'] . "</td>";
echo "<td>" . $row['First_Name'] . "</td>";
echo "<td>" . $row['Last_Name'] . "</td>";
echo "</tr>";
}
echo "</table>";

}
else
{
echo "NO RECORDS FOUND";
}
}

?>