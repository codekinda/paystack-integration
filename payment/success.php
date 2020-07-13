<?php
include_once("db.php");
session_start();
if(!$_GET["successfullypaid"]){
  header("Location: index.php");
  exit;
}else{
  $reference  =  $_GET["successfullypaid"];
}
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$phone = $_SESSION["phone"];
$email = $_SESSION["email"];
$amount = $_SESSION["price"];
$product_name = $_SESSION["product_name"];

//Insert into database
$sql ="INSERT INTO stack(first_name, last_name, phone, email, product_name, price, reference)
   VALUES(:first_name, :last_name, :phone, :email, :product_name, :amount, :reference)";
   if($stmt = $pdo->prepare($sql)){
  //Bind parameters
  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
   $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
    $stmt->bindParam(':reference', $reference, PDO::PARAM_STR);
    //Attempt to execute
    if($stmt->execute()){
     echo"<script>alert('Your payment went through!')</script>";
     $last_id = $pdo->lastInsertId();
     echo $last_id;
     //Prevent resubmission
     session_unset();
     session_destroy(); 
    }else{
        die("Sorry, something went!");
    }
    unset($stmt);
    //close connection
    unset($pdo);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<h2>Success, your payment went through. You can download your ebookk by clicking on the Download button below!</h2>
<table>
    <tr>
        <th> Summary </th>
    </tr>
    <tr>
        <td>First Name : <?php echo $first_name; ?> </td>
    </tr>
    <tr>
        <td>Last Name :  <?php echo $last_name; ?> </td>
    </tr>
    <tr>
        <td>Email :  <?php echo $email; ?> </td>
    </tr>
    <tr>
        <td>Phone : <?php echo $phone; ?> </td>
    </tr>
    <tr>
        <td>price :  <?php echo $amount; ?> </td>
    </tr>
    <tr>
        <td>Product Name :  <?php echo $product_name; ?> </td>
    </tr>
    <tr>
        <td>Reference Code :  <?php echo $reference; ?> </td>
    </tr>
    <tr>
        <td><a href="#">Download Now!</a> </td>
    </tr>
</table>
</div>
</body>
</html>
