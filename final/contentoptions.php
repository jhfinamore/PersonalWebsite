<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/21/17
 * Time: 2:17 PM
 */
$inputdate = time();
$_pageTitle = "Options for content";
require_once "_header.php";
try{
    $sql = "SELECT * FROM finalcontent_jhfinamor";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stuff = $stmt->fetchAll();
    echo "<table>";
    echo "<tr>
              <th>Options</th>
              <th>ID</th>
              <th>Title</th>
          </tr>";
    echo "<tr><td colspan='3'><a href='createcontent.php'>New Page Creation</a></td></tr>";
    foreach ($stuff as $row)
    {
        echo "<tr>
                  <td><a href='viewcontent.php?ID=" . $row['ID'] . "'>VIEW</a> 
                      <a href='changecontent.php?ID=" . $row['ID'] . "'>UPDATE</a> 
                      <a href='removecontent.php?ID=" . $row['ID'] . "&title=" . $row['title'] . "'>DELETE</a></td>
                  <td>" . $row['ID'] . "</td>
                  <td>" . $row['title'] . "</td>
              </tr>";
    }
    echo "</table>";
}
catch(PDOException $e)
{
    echo "Error with the database!" . $e->getMessage();
}

require_once "_footer.php";
?>