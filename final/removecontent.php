<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/2/17
 * Time: 12:50 PM
 */
$_currentFile = basename($_SERVER['PHP_SELF']);
$_pageTitle = "Leaving Page";
$formshow = 1;
require_once "_header.php";
if(!isset($_SESSION['ID']))
{
    echo "<p>This page requires authenication. Please log in.</p>";
    require_once "_footer.php";
    exit();
}
if(isset($_POST['delete']))
{
    try
    {
        $sql = "DELETE FROM finalcontent_jhfinamor WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ID', $_POST['ID']);
        $stmt->execute();

        //print confirmation
        echo "<p class='success'>Sad to see this page go!</p>";
        $formshow = 0;

    }
    catch(PDOException $e)
    {
        echo "<p class='error'>Error deleting this page! Looks like it has to stick around " . $e->getMessage() . "</p>";
        require_once "_footer.php";
        exit();
    }
}//if submit

if($formshow == 1)
{
?>
<p>Confirm deletion of ID no. <?php echo $_GET['ID'];?> [Page Title <?php echo $_GET['title'];?>]</p>
<form id="contentremove" method="post" action="removecontent.php" name="contentremove">
    <input type="hidden" id="ID" name="ID" value="<?php echo $_GET['ID'];?>" />
    <input type="submit" id="delete" name="delete" value="YES" />
    <input type="button" id="nodelete" name="nodelete" value="NO" onClick="window.location='contentoptions.php'" />
</form>
<?php
}
require_once "_footer.php";
?>