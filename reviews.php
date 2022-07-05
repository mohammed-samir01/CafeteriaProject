<?php
    require "connection.php";
    $data = $conn->query("select * from reviews");
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $value) {
?>

<form>
    <img src="photos/<?php echo $value['image']; ?>" height="100px" width="100px">
    <p> <?php echo $value['name']; ?></p>
    <p> <?php echo $value['comment']; ?></p>
</form>

<?php
    }
?>