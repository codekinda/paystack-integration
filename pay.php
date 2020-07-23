<?php
/*Attention : 
I have a more indepth course on paystack integration where I built projects using paystack like:
1. Donation application
2. User subscription etc 
CONTACT Me now if you want it: thelordofapps@gmail.com
*/
$amount = 1500;
//Sanitize form inputs from harmful data
 $sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);
 
 //Collect form data into regular post variables
 $first_name = $sanitizer['first_name'];
 $last_name = $sanitizer['last_name'];
 $phone = $sanitizer['phone'];
 $email = $sanitizer['email'];
 $product_name = "PHP Savvy E-book";

if(empty($first_name) || empty($last_name) || empty($phone) || empty($email)){
header("Location: index.php");
}else{
 session_start();
$_SESSION['first_name'] =  $first_name;
$_SESSION['last_name'] =  $last_name;
$_SESSION['phone']  = $phone;
$_SESSION['email']  = $email;
$_SESSION['product_name']  = $product_name;
$_SESSION['price']  = $amount;

//echo $first_name;
//echo $email;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paystack pay page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Hi, <?php echo $email; ?></h2>
<form action="" method="POST">
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button name="sub" type="button" onclick="payPageWithPaystack()"> Proceed </button> 
</form>
 
<script>
  function payPageWithPaystack(){
const api = "Add_Your_Puplic_Key_Here";
    var handler = PaystackPop.setup({
      key: api,
      email: "<?php echo $email; ?>",
      amount: <?php echo $amount*100; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: "<?php echo". $first_name."; ?>",
      lastname: "<?php echo $last_name; ?>",
      phone: "<?php echo $phone; ?>",
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "First Name:",
                variable_name: "first_name",
                value: "<?php echo $first_name; ?>"
            },
             {
                display_name: "Last Name:",
                variable_name: "last_name",
                value: "<?php echo $last_name; ?>"
            },
             {
                display_name: "Phone Number:",
                variable_name: "phone_number",
                value: "<?php echo $phone; ?>"
            },
             {
                display_name: "Product Name",
                variable_name: "product_name",
                value: "<?php echo $product_name; ?>"
            }
         ]
      },
      callback: function(response){
           const referenced = response.reference;
		  window.location.href='success.php?successfullypaid='+ referenced;
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
</body>
</html>