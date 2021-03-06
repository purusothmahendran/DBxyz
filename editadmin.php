<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>Register/Add an Employee</title>
      <link href="./files/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"> 
        <link rel="stylesheet" type="text/css" href="./home/main.css">
    </head>
    
    <body style="">
	<div class="row">
	<center><h1>XYZ Inc</h1>
	</div>
        <div id="menu">
            <div class="menuItem"><a href="home.php">Home</a></div>
            <div class="menuItem"><a href="add.php" class="selected">Add/Register an Employee</a></div>
            <div class="menuItem"><a href="admin.php">Edit Details</a></div>
            
             <label class="nav-list" id="id_label_Name" style="margin-left: 1050px; margin-top: -25px; position: absolute;">
                            <?php
                                if($_SESSION['activeUser'] != '0')
                                    echo "Welcome ".$_SESSION['activeUser_LastName'];
                            ?>
               </label>
        </div>
        <div id="container">
            <div id="content">
                <div id="mainContent">
                    <h3>Add/Register an Employee</h3>

                    <div class="form">
                        <form action="db.php" method="post">
                            <div class="infoInput">
                                <label>First Name</label>
                                <input type="text" name="first_name" required>
                                <label>Last Name</label>
                                <input type="text" name="last_name" required>
                                
				<label>Supervisor ID</label>
                                <input type="text" name="sid">
                                <label>Password</label>
                                <input type="text" name="pass">
                                <p><label><b>Address</label></p>
								<label>Street Address</label>
                                <input type="text" name="street">
                                <label>Apartment Number</label>
                                <input type="text" name="aptno">
								<label>City</label>
                                <input type="text" name="city">
                                <label>State</label>
                                <select class="span3" id="state" name="state">
									<option value=""></option>
									<option value="AL">Alabama</option>
									<option value="AK">Alaska</option>
									<option value="AZ">Arizona</option>
									<option value="AR">Arkansas</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DE">Delaware</option>
									<option value="DC">District Of Columbia</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="IA">Iowa</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="ME">Maine</option>
									<option value="MD">Maryland</option>
									<option value="MA">Massachusetts</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MS">Mississippi</option>
									<option value="MO">Missouri</option>
									<option value="MT">Montana</option>
									<option value="NE">Nebraska</option>
									<option value="NV">Nevada</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NY">New York</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VT">Vermont</option>
									<option value="VA">Virginia</option>
									<option value="WA">Washington</option>
									<option value="WV">West Virginia</option>
									<option value="WI">Wisconsin</option>
									<option value="WY">Wyoming</option>
								</select>		
                                <label>Zip</label>
                                <input type="text" name="zip">
                                <label>Primary Phone</label>
                                <input type="text" name="priphone">
								<label>Secondary Phone</label>
								<input type="text" name="secphone">
								
                                <label>Graduate School</label>
                                <input type="text" name="grad">
                                
								<label>Title</label>
                                <select class="span3" id="title" name="title">
									<option value=""></option>
									<option value="team lead">Team Lead</option>
									<option value="senior manager">Senior Manager</option>
									<option value="VP">Vice President</option>
									<option value="ceo">CEO</option>
									<option value="trainee">Trainee</option>
									
								
								</select>
                                <label>Rank</label>
                                <select class="span1" id="rank" name="rank">
									<option value=""></option>
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
									
								
								</select>
								<label>Gender</label>
								<select class="span2" id="gender" name="gender">
									<option value=""></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									
								</select>

							
								
								<label>Date of Birth</label>
                                <input type="date" name="dob">
                                
                            </div>
                            <div class="rightFloat">
                                <h2>Group</h2>
                                <label class="radio"><input name="group" type="radio" value="manager">Manager</input></label><br><br>
								<label class="radio"><input name="group" type="radio" value="hr">HR</input></label><br><br>
								<label class="radio"><input name="group" type="radio" value="marketing_group">Marketing</input></label><br><br>
								<label class="radio"><input name="group" type="radio" value="financier">Finance</input></label><br><br>



								
								
								<div id="controls">
                                    <button type="submit" class="btn-primary btn btn-block"> REGISTER <i class="icon-plus-sign icon-white"></i>
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       <!-- <div id="footer">Copyright © 2013 XYZ Inc</div>-->
        <script src="./AppTrack - Add Applicant_files/jquery-latest.js"></script>
        <script src="./AppTrack - Add Applicant_files/bootstrap.min.js"></script>
        <script src="./AppTrack - Add Applicant_files/jquery.tablesorter.min.js"></script>
        <script src="./AppTrack - Add Applicant_files/global.js"></script>
    

</body></html>