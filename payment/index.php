<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<img src="images/phpback.jpg" alt="Cover Book">
<small>PHP Savvy Ebook</small>
<small>Price: N1500</small>
<form action="pay.php" method="POST">
<label>First Name</label>
<input type="text" placeholder="First Name" name="first_name" required><br>
<label>Last Name</label>
<input type="text" placeholder="Last Name" name="last_name" required><br>
<label>Email</label>
<input type="email" placeholder="Email" name="email" required><br>
<label>Phone Number</label>
<input type="tel" placeholder="Enter phone number" name="phone" required><br>
<button>Buy!</button> 
</form> 
</div>
</body>
</html>
