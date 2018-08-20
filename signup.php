<?php  
include_once 'header.php';
?>
  <link rel="stylesheet" href="assets/css/compiledSass/sassCompiled.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<div class="container">

<div class="main-wrapper">
<h2>Sign Up</h2>

<form class="singnup" action="includes/signup.inc.php" method="POST">
<input type="text" name="first" placeholder="FirstName">
<input type="text" name="last" placeholder="LastName">
<input type="text" name="email" placeholder="email">
<input type="text" name="uid" placeholder="username">
<input type="password" name="pwd" placeholder="Password">
<button type="submit" name="submit">Sign Up</button>
</form>

</div>



</div>
</div>
<?php  
include_once 'footer.php';
?>
