<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 2/16/17
 * Time: 12:02 PM
 */
if(!isset($_SESSION['ID']))
{
    echo "<ul>
<li>User created content</li>
<li>Log in to view and create content</li>
</ul>";
}
else {
    echo "<ul><li>User created content</li>
          <li><a href='contentoptions.php'>Options for content</a></li>";

    $aside = "SELECT * FROM finalcontent_jhfinamor";
    $stmt = $pdo->prepare($aside);
    $stmt->execute();
    $row = $stmt->fetchAll();
    foreach($row as $result) {
        echo "<li><a href='viewcontent.php?ID=" . $result['ID'] . "'>" . $result['title'] . "</a></li>";
    }
    echo "</li>";
}
?>
