<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $first_name = '';
  $last_name = '';
  $username = '';
  $email = '';
  $errors = [];
  
  


  // if this is a POST request, process the form
  // Hint: private/functions.php can help

  if(is_post_request()){
  

    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php
    
    
     
    //First name validation
    if (is_blank($_POST['first_name'])){
      $errors[] = "First name cannot be blank.";
     
      
    }elseif(!has_length($_POST['first_name'],['min' => 2, 'max'=> 255])) {
      $errors[] = "First name must be between 2 and 20 characters.";
      
    }elseif(!has_valid_name_format){
      $errors[] = "First name cannot include special characters.";
      
    }
    else{
      $first_name = trim($_POST['first_name']);
    }

    //Last name validation 
    if (is_blank($_POST['last_name'])) {
      $errors[] = "Last name cannot be blank.";
      
    }elseif (!has_length($_POST['last_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 30 characters.";
      
    }elseif(!has_valid_name_format($_POST['last_name'])){
      $errors[] = "Last name cannot include special characters.";
      
    }
    else{
    $last_name = trim($_POST['last_name']);
    }
    
    //Email validation 
    if(is_blank($_POST['email'])){
      $errors[] = "Emails cannot be empty.";
      
    }elseif(!has_length($_POST['email'],['min' => 2, 'max' => 255])){
      $errors[] = "Email must be between 2 and 30 characters.";
     
    }elseif(!has_valid_name_format($_POST['email'])){
      $errors[] = "Last name cannot include special characters.";
      
    }
    else{
      $last_name = trim($_POST['email']);

    }

    
    
    //Username validation
    if(is_blank($username)){
      $errors[] = "Username cannot be blank";
      
    }elseif(!has_length($username,['min' => 8, 'max' =>255])) {
      $errors[] = "Username must be at least 8 characters";
      
    }elseif (!has_valid_username_format($_POST['username'])) {
      $errors[] = "Username cannot include special characters.";
      
    }else{
      $username = trim($_POST['username']);
    }
   
    
  echo $errors[0];
  echo $errors[1];
  

    

    // if there were no errors, submit data to database
  if(empty($errors)){
    
    
      // Write SQL INSERT statement
      $sql = sprintf("INSERT INTO users (first_name, last_name, email, username, created_at)
      VALUES ('%s','%s','%s','%s','%s'); ", $first_name, $last_name, $email, $username, date("Y-m-d H:i:s"));

      // For INSERT statments, $result is just true/false
      $result = db_query($db, $sql);
      if($result) {
        db_close($db);

      //   redirect user to success page
        redirect_to("registration_success.php");

      } else {
      // The SQL INSERT statement failed.
      //   Just show the error, not the form
        echo db_error($db);
        db_close($db);
        exit;
      }
  }
}//This is the end of POST request

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
  
    echo display_errors($errors); 
  
  
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="register.php" method="post">
    First name:<br>
    <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
    Last name:<br>
    <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
    Email:
    <input type="text" name="email" value="<?php echo $email; ?>"><br>
    Username:
    <input type="text" name="username" value="<?php echo $username; ?>"><br>
    <input type="submit" name="submit" value="Submit">
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
