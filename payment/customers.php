<?php
include_once("db.php");
$sql = "SELECT * FROM stack";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ebooks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<h2>My Customers</h2>
<table>
    <tr>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Email</th>
        <th>Phone </th>
        <th>Product Name </th>
         <th>Price</th>
        <th>Reference </th>
    </tr>
    <?php foreach($ebooks as $ebook): ?>
    <tr>
        <td><?= $ebook->first_name; ?> </td>
        <td><?= $ebook->last_name; ?> </td>
        <td><?= $ebook->email; ?> </td>
        <td><?= $ebook->phone; ?> </td>
        <td><?= $ebook->product_name; ?> </td>
        <td><?= $ebook->price; ?> </td>
        <td><?= $ebook->reference; ?> </td>
    </tr>
   <?php endforeach; ?>
</table>
</div>
</body>
</html>
