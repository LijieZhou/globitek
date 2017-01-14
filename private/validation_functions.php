<?php

  // is_blank('abcd')
  function is_blank($value='') {

    return !isset($value) || trim($value) == '';

  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    //get the length of the string
    $length = strlen($value);
    //check that its less than max and greater than min
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }


  //has_valid_name_format
  function has_valid_name_format($value){
    return preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/ ", $value);
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    //use regrex to validate email
    return preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/ ", $value);
  }

  // has_valid_username_format
  function has_valid_username_format($value){
    //use regrex to validate username
    return preg_match("/^[A-Za-z_]+$/ ", $value);
  }

?>

