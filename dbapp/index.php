<?php
/**
 * Created by IntelliJ IDEA.
 * User: hieuvt
 * Date: 05/10/2015
 * Time: 09:27
 */

if (isset($_GET['addjoke'])) {
    include 'form.html.php';
    exit();
}

include 'db.inc.php';

if (isset($_POST['joketext'])) {
    $joketext = mysqli_real_escape_string($link, $_POST['joketext']);
    $addedText = addJoke($joketext);
    header('Location: .');
    exit();
}

if (isset($_GET['deletejoke']))
{
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $delete_joke = deleteJoke($id);
    header('Location: .');
    exit();
}

$jokes = takeAllJokes();
include 'jokes.html.php';

?>

