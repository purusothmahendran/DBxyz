<?php
    session_start();
    if($_SESSION['activeUser'] != 0)
        echo $_SESSION['activeUser'];
    else
        echo "Not Logged In";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
    </head>
    
    <body bgcolor="#aabbcc">
                <div id="id_Login_Div">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="text" class="input-small" placeholder="Employee_ID" name="txt_Employee_ID" required><p>
                        <input type="password" class="input-small" placeholder="Password" name="txt_Password" required><p></p>
                        <input type="submit" class="btn" name="submit_Sign_In" value="Login">
                    </form>
                </div>
                    <?php
                        if($_SESSION['activeUser'] != 0)
                        {
                            ?>
                            <script type="text/javascript">
                                 document.getElementById("id_Login_Div").style.visibility = 'hidden';
                            </script>
                            <?php
                        }
                    ?>
    </body>
</html>