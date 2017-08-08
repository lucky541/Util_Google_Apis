<?php 
// grab recaptcha library
require_once "recaptchalib.php";

  foreach ($_POST as $key => $value) {
//    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
  }

$secret = "secret_key_tdPxqeWYILOWk-mC99wy_c7QN4";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
print_r($response);

 if ($response != null && $response->success) {
    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
  } else {
  echo "ERROR: error";
}

?>
