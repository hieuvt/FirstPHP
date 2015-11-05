<?php
/**
 * Created by IntelliJ IDEA.
 * User: hieuvt
 * Date: 05/10/2015
 * Time: 14:09
 */
$db_name = 'ijdb';

$link = mysqli_connect('localhost', 'phpuser', 'phppw');
if (!$link) {
    $output = 'Unable to connect to the database server.';
    include 'output.html.php';
    exit();
}
if (!mysqli_set_charset($link, 'utf8')) {
    $output = 'Unable to set database connection encoding.';
    include 'output.html.php';
    exit();
}

if (!mysqli_select_db($link, $db_name)) {
    $output = 'Unable to locate the joke database.';
    include 'output.html.php';
    exit();
}

function takeAllJokes()
{
    $mysqli = new mysqli('localhost', 'phpuser','phppw','ijdb');
    if (mysqli_connect_errno()) {
        echo("Failed to connect, the error message is : " .
            mysqli_connect_error());
        exit();
    }
    $result = $mysqli ->query("select * from joke");
    if (!$result)
    {
        $error = 'Database error counting jokes!';
        include 'error.html.php';
        exit();
    }
    while ($row = $result->fetch_object()) {
        $tmp_jokes[] = array('id' => $row->id, 'text' => $row->joketext);
    }
    return $tmp_jokes;
}

function addJoke($joketext) {
    global $link;
    $sql = 'INSERT INTO joke SET
            joketext="' . $joketext . '",
            jokedate=CURDATE()';
    $add_success = mysqli_query($link, $sql);
    if (!$add_success) {
        $error = 'Error adding submitted joke: ' . mysqli_error($link);
        include 'error.html.php';
        exit();
    }
    return $add_success;
}

function deleteJoke($id) {
    global $link;
    $sql = "DELETE FROM joke WHERE id='$id'";
    $delete_success = mysqli_query($link, $sql);
    if (!$delete_success)
    {
        $error = 'Error deleting joke: ' . mysqli_error($link);
        include 'error.html.php';
        exit();
    }
    return $delete_success;
}
?>