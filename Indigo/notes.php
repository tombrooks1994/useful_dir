<?php
/**
 * Created by PhpStorm.
 * User: tbrooks
 * Date: 02/08/2017
 * Time: 14:54
 */

require_once("notes_class.php");

if (isset($_POST['notes_text'])) {
    $conn = new mysqli ("localhost", "tom", "notes", "notes");
    $written_note = $_POST['notes_text'];
    $notes_title = $_POST['title'];
    $date = date("Y-m-d");
    $query = "INSERT INTO notes_data (title, notes, `date`) VALUES(?, ?, ?)";
    $sql = $conn->prepare($query);
    $sql->bind_param("sss", $notes_title, $written_note, $date);
    $sql->execute();
}

$notes = new notes_class();

?>
    <style>



    </style>
<?php $notes->__header(); ?>
    <body>
    <div class="content">
    <h1>Create Notes</h1>
    <h4 style="color:red;">If you would like styling use HTML tags e.g. using a break tag for a new line</h4>
    <div class="nav">
    <a class="underline" href="read_notes.php">Read notes</a>
    </div><br/>
    <form method="post">
        <fieldset>
            <legend><strong>Create Notes</strong></legend>
            <label for="title">Notes Title: </label><br/>
            <input id="title" name="title" type="text"/><br/><br/>
            <label for="notes_text">Type in your notes here: </label><br/>
            <textarea name="notes_text"></textarea><br/><br/>
            <button type="submit">Submit Notes</button>
        </fieldset>
    </form>
    </div>
    <br/><br/>
    </body>

<?php $notes->__footer();