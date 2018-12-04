<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/21/17
 * Time: 1:47 PM
 */
$inputdate = time();
$_pageTitle = "Update User Password";
$formshow = 1;
$erroruname = $errorpassword = $errorconfpassword= $errorpwdmatch = $erroremail = $errormsg = "";
require_once "_header.php";

if(!isset($_SESSION['ID']))
{
    echo "<p>This page requires authenication. Please log in.</p>";
    require_once "_footer.php";
    exit();
}
if(isset($_POST['submit']))
{
    $formfield['password'] = trim($_POST['userpassword']);
    $formfield['confpassword'] = trim($_POST['confpassword']);
    $formfield['uname'] = trim(strtolower($_POST['uname']));
    $formfield['email'] = trim(strtolower($_POST['useremail']));

    if(empty($formfield['uname'])) {$erroruname = "Username is required."; $errormsg = 1;}
    if(empty($formfield['password'])) {$errorpassword = "Password is required."; $errormsg = 1;}
    if(empty($formfield['confpassword'])) {$errorconfpassword = "Confirmation Password is required."; $errormsg = 1;}
    if(empty($formfield['email'])){$erroremail = "Email is required."; $errormsg = 1;}
    if($formfield['password'] != $formfield['confpassword'])
    {
        $errorpwdmatch = "Passwords must match";
        $errormsg = 1;
    }
    if($errormsg != 0)
    {
        echo "<p class='error'>THERE ARE ERRORS! OH NO!</p>";
    }
    else
    {
        try
        {
            //INSERT DATA INTO THE DATABASE
            $sql = "UPDATE finaluser_jhfinamor SET `password` = :password WHERE uname = :uname AND email = :email AND ID = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':uname',$formfield['uname']);
            $stmt->bindValue(':email', $formfield['email']);
            $stmt->bindValue(':ID', $_SESSION['ID']);
            $stmt->bindValue(':password',password_hash($formfield['password'], PASSWORD_BCRYPT));
            $stmt->execute();

            $_SESSION['ID'] = $row['ID'];
            $_SESSION['fname'] = $row['uname'];
            $showform = 0;
            header("Location: logout.php?state=3");
            //print confirmation
            echo "<p class='success'>SUCCESS! Updating your password!</p>";
            $formshow = 0;
        }
        catch (PDOException $e)
        {
            echo "<p class='error'>ERROR inserting into the database table! " .$e->getMessage() . "</p>";
            exit();
        }
    }

}//submit
if($formshow == 1) {
    ?>

    <form method="post" name="changepassword" id="changepassord" action="updatepassword.php">
        <table>
            <tr>
                <th><label class="main" for="uname">Username</label></th>
                <td><input type="text" id="uname" name="uname" value="<?php if (isset($formfield['uname'])) {
                        echo $formfield['uname'];
                    } ?>"/>
                    <span class="error">* <?php if (isset($erroruname)) {
                            echo $erroruname;
                        } ?></span></td>
            </tr>
            <tr>
                <th><label class="main" for="useremail">Email</label></th>
                <td><input type="email" id="useremail" name="useremail" size="20" value="<?php if(isset($formfield['email'])) {echo $formfield['email'];} ?>"/>
                    <span class="error">* <?php if(isset($erroremail)) {echo $erroremail;} ?></span></td>
            </tr>
            <tr>
                <th><label class="main" for="userpassword">Password</label></th>
                <td><input type="password" id="userpassword" name="userpassword" size="20"
                           value="<?php if (isset($formfield['password'])) {
                               echo $formfield['password'];
                           } ?>"/>
                    <span class="error">* <?php if (isset($errorpassword)) {
                            echo $errorpassword;
                        } ?></span></td>
            </tr>
            <tr>
                <th><label class="main" for="confpassword">Confirmation Password</label></th>
                <td><input type="password" id="confpassword" name="confpassword" size="20"
                           value="<?php if (isset($formfield['confpassword'])) {
                               echo $formfield['confpassword'];
                           } ?>"/>
                    <span class="error">* <?php if (isset($errorconfpassword)) {
                            echo $errorconfpassword;
                        }
                        if (isset($errorpwdmatch)) {
                            echo $errorpwdmatch;
                        } ?></span></td>
            </tr>
            <tr>
                <th><label class="main" for="submit">Submit</label></th>
                <td><input type="submit" id="submit" name="submit"/></td>
            </tr>
        </table>
    </form>

    <?php
}
require_once "_footer.php";
?>