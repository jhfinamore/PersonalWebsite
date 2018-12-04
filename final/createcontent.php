<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/18/17
 * Time: 12:00 PM
 */
$showform = 1;
$_pageTitle = "Create a page";
$errormsg = 0;
$errorcreator = $errortitle = $errorcontent = "";
require_once "_header.php";
if(!isset($_SESSION['ID']))
{
    echo "<p>This page requires authenication. Please log in.</p>";
    require_once "_footer.php";
    exit();
}
if(isset($_POST['submit']))
{
    $formfield['creator'] = trim($_POST['creator']);
    $formfield['title'] = trim($_POST['title']);
    $formfield['content'] = trim($_POST['content']);

    if(empty($formfield['creator']))
    {
        $errorcreator = "Your name is empty";
        $errormsg = 1;
    }
    if(empty($formfield['title']))
    {
        $errortitle = "The title is empty";
        $errormsg = 1;
    }
    if(empty($formfield['content']))
    {
        $errorcontent = "Content is required";
        $errormsg = 1;
    }
    if($errormsg < 1)
    {
        try{
            $sql = "INSERT INTO finalcontent_jhfinamor(creator, title, content)
                VALUES(:creator, :title, :content)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':creator',$formfield['creator']);
            $stmt->bindValue(':title',$formfield['title']);
            $stmt->bindValue(':content',$formfield['content']);
            $stmt->execute();

            $showform = 0;
            echo "Your page is created. Thank you!";
        }
        catch(PDOException $e)
        {
            echo "Error entering your page into the database." . $e->getMessage();
        }
    }
}
if($showform != 0) {
    ?>
    <p>This is the create a page page</p>
    <p class="error">* means a field that is required</p>
    <form method="post" action="createcontent.php" name="contentform" id="contentform" onsubmit="contentvalidate()">
        <table>
            <tr>
                <th><label for="creator">Please enter your name for recognition</label></th>
                <td><input type="text" name="creator" id="creator" value="<?php if(isset($formfield['creator'])) { echo $formfield['creator'];} ?>"/>
                <span class="error">* <?php if(isset($errorcreator)){echo $errorcreator;} ?></span></td>
            </tr>
            <tr>
                <th><label for="title">Please enter the title</label></th>
                <td><input type="text" name="title" id="title" value="<?php if(isset($formfield['title'])) { echo $formfield['title'];} ?>"/>
                    <span class="error">* <?php if(isset($errortitle)){echo $errortitle;} ?></span></td>
            </tr>
            <tr>
                <th><label for="content">Please enter the page's content</label></th>
                <td><textarea name="content" id="content"><?php if(isset($formfield['content'])) echo $formfield['content'];?></textarea><span class="error">* <?php if(isset($errorcontent)){echo $errorcontent;} ?></span></td>
            </tr>
            <tr>
                <th><label for="submit">Submit</label></th>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </table>
    </form>
    <?php
}
require_once "_footer.php";
?>
