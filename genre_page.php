<?php
$cmdDel = filter_input(INPUT_GET, 'tok');
if (isset($cmdDel)&& $cmdDel == 'del'){
    $deletedId = filter_input(INPUT_GET, 'did');
    if(isset($deletedId)){
        $link = new PDO("mysql:host=localhost; dbname=nama_basis_data", "username", "password");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'DELETE FROM genre WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $link->beginTranscation();
        if ($stmt->execute()){
        $link->comit();
    } else {
        $link->rollBack();
    }
    $link = null;
    }
}
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if ($submitted){
    $name = filter_input(INPUT_POST, 'txtName');
    $link = new PDO("mysql:host=localhost; dbname=nama_basis_data", "username", "password");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'INSERT INTO genre(name) VALUES(?)';
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $link->beginTranscation();
    if ($stmt->execute()){
    $link->comit();
} else {
    $link->rollBack();
}
$link = null;
}
?>
<h1>Genre Page</h1>
<form action="" method="POST">
    <label for="nameId">Name</label>
    <input type="text" name="txtName" id="nameId" placeholder="Name"
    maxlength="100">
    <input type="submit" value="Submit" name="btnSubmit">
</form>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
</thead>
<tbody>
    <?php
    $link = new PDO("mysql:host-localhost; dbname=nama_basis_data", "username", "password");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT id, name FROM genre ORDER BY name';
    $genres = $link->query($query);
    foreach($genres as $genre){
        echo '<tr>';
        echo '<td>' . $genre['id'] . '</td>';
        echo '<td>' . $genre['name'] . '</td>';
        echo '<td><button onclick="editGenre(' . $genre['id'] . ')">Edit</button></td>';
        echo '<td><button onclick="deleteGenre(' . $genre['id'] . ')">Delete</button></td>';
        echo '</tr>';
    }
    $link = null;
    ?>
    </tbody>
</table>
