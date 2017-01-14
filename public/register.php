<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $first_name = '';
  $last_name = '';
  $username = '';
  $email = '';
  


  // if this is a POST request, process the form
  // Hint: private/functions.php can help

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    // echo "post";
    
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] :'';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    echo $first_name;
    echo $last_name;
    


    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php
    
    $errors = [];
     
    
    if (is_blank($first_name)){
      $errors[] = "First name cannot be blank.";
      echo "post";
      
    }if (!has_length($first_name,['min' => 2, 'max'=> 255])) {
      $errors[] = "First name must be between 2 and 20 characters.";
    }
    if (is_blank($last_name)) {
    $errors[] = "Last name cannot be blank.";
  } if (!has_length($last_name, ['min' => 2, 'max' => 255])) {
    $errors[] = "Last name must be between 2 and 30 characters.";
  }
    if(!has_valid_email_format($email)){
      $errors[] = "Email m!ust contain @.";
    }
    if(is_blank($username)){
      $errors[] = "Username cannot be blank";
      echo "Hello";
    }if (!has_length($username,['min' => 8])) {
      $errors[] = "Username must be at least 8 characters";
    }
    echo $errors[1];
    
  }//This is the end of POST request
  

    

    // if there were no errors, submit data to database
    
      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
  if(!empty($errors)){
    echo display_errors($errors); 
  }
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
    <input type="submit" value="Submit">
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
