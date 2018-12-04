<?php
/**
 * Created by PhpStorm.
 * User: paulfinamore
 * Date: 4/8/17
 * Time: 1:23 PM
 */

if($_GET['state'] == 3)
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: confirm.php?state=3");
    exit();
}
else{
    session_start();
    session_unset();
    session_destroy();
    header("Location: confirm.php?state=1");
    exit();

}
?>