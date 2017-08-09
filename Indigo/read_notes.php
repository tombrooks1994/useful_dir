<?php
/**
 * Created by PhpStorm.
 * User: tbrooks
 * Date: 02/08/2017
 * Time: 15:11
 */

require_once("notes_class.php");
$notes = new notes_class();
$conn = new mysqli ("localhost", "tom", "notes", "notes");
$query = "SELECT id, title, notes, date FROM notes_data";
$sql = $conn->prepare($query);
$sql->execute();
$result = $sql->get_result();
$data = mysqli_fetch_all($result, MYSQL_ASSOC);
$notes->__header();
?>
<div class="content">
    <h1>Read Notes</h1>
    <h4>Titles highlighted in <strong style="color:red;">red</strong> has an <strong style="color:red;">URGENT</strong> tag they are important and need to be implemented
        <strong style="color:red;">ASAP</strong></h4>
    <div class="nav">
        <a class="underline" href="notes.php">Create Notes</a>
    </div>
    <br/>
    <fieldset>
        <legend><strong>Read Notes</strong></legend>

        <?php
        foreach ($data as $d) {
            echo "<form method=\"post\"><h3> Note " . $d['id'] . " <br/>Date: " . $d['date'] . "</h3>
<h4>Title: " . $d['title'] . "</h4>
<div class='note'>" . $d['notes'] . "</div><br/><br/>
<input type='submit' value='Remove' name='remove'/></form>";



        }
        ?>

    </fieldset>
</div><br/><br/>

<?php

$notes->__footer();

// change to soft delete
if (isset($_POST['remove'])) {
    if ($_POST['remove'] == "Remove") {
        $conn = new mysqli ("localhost", "tom", "notes", "notes");
        $query = "DELETE FROM notes_data WHERE id = ?";
        $sql = $conn->prepare($query);
//    print_r($_POST);
        $sql->bind_param("i", $d['id']);
        $sql->execute();
    }
}