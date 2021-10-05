<?php
$updatedId = filter_input(INPUT_GET, 'uid');
if(isset($updatedId)){
    $link = new PDO("mysql:host=localhost; dbname=nama_basis_data", "username", "password");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT id, name FROM genre WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $updatedId, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
}

$submitted = filter_input(INPUT_POST, 'btnUpdate');
if($submitted) {
    $link = new PDO("mysql:host=localhost; dbname=nama_basis_data", "username", "password");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'UPDATE genre SET name = ? WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $result['id'], PDO::PARAM_INT);
    $link->beginTranscation();
    if ($stmt->execute()){
        $link->comit();
        header("location:index.php?mn=genre")
} else {
    $link->rollBack();
}
$link = null;
}
?>

<form action="" method="post"></form>
    <label for="fieldId">Id</label>
    <input type="text" name="txtId" id="fieldId" readonly value="<?php echo $result['id'] ?>">
    <label for="nameId">Name</label>
    <input type="text" name="txtName" id="nameId" placeholder="Genre Name"
    maxlength="100" required value = "<?php echo $result['name'] ?>">
    <input type="submit" value="Update" name="btnUpdate">
</form>
