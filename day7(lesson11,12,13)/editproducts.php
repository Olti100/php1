<?php
include_once("config.php");

$id=$_GET ['id'];

$sql="SELECT * FROM products WHERE id=:id";

$prep=$conn->prepare($sql);

$prep->bindParam(':id',$id);
$prep->execute();

$data=$prep->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="updateproducts.php" method="POST">
        <input type="hidden" name="id" id="" value="<?php echo $data['id']?>"><br>
        <input type="text" name="title" id="" value="<?php echo $data['title']?>"><br>
        <input type="text" name="description" id="" value="<?php echo $data['description']?>"><br>
        <input type="text" name="quantity" id="" value="<?php echo $data['quantity']?>"><br>
        <input type="text" name="price" id="" value="<?php echo $data['price']?>"><br>

        <button type="submit" name="update">Update</button>


    </form>

    <a href="dashboard.php">Dashboard</a>
</body>
</html>
