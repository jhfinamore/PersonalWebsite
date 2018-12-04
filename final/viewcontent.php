<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/18/17
 * Time: 4:25 PM
 */
$_pageTitle = $_GET['header'];
require_once "_header.php";
try {
    $sql = "SELECT * FROM finalcontent_jhfinamor WHERE ID = :ID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':ID', $_GET['ID']);
    $stmt->execute();
    $row = $stmt->fetch();

    echo "<h2>" . $row['title'] . "</h2>";
    echo "<br />";
    echo "<p>" . $row['content'] . "</p>";
    echo "<br />";
    echo "<br />";
    echo "<h5>This page was created by " . $row['creator'] . ".</h5>";
}
catch(PDOException $e)
{
    echo "<p>Error pulling data from the database!."  . $e->getMessage() . "</p>";
}
require_once "_footer.php";
?>