<?php
require "./header.php";
require "./db.php";
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
  <script type="text/javascript">
    location.replace("index.php"); // منتقل شود index.php به صفحه
  </script>
<?php
}
?>
<?php
try {
  $form_message = "";
  if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['username']) &&
    isset($_POST['fullname']) &&
    isset($_POST['password'])
  ) {
    if (
      !empty($_POST['username']) &&
      !empty($_POST['fullname']) &&
      !empty($_POST['password'])
    ) {
      $username = $_POST['username'];
      $fullname = $_POST['fullname'];
      $password = $_POST['password'];
      $query = "INSERT INTO user (username,fullname,password) VALUES ('$username','$fullname','$password')";
      $result = mysqli_query($link, $query);
      echo $result;
      mysqli_close($link);
      if ($result) {
        $form_message = "Registration is successful";
      } else {
        $form_message = "Registration is not successful";
      }
    } else {
      $form_message = "fill out the form completely";
    }
    $_SERVER['REQUEST_METHOD'] = "";
  }
} catch (Exception $e) {
  $message = $e->getMessage();
  if (strpos($message, 'Duplicate') !== false && strpos($message, 'username') !== false) {
    $form_message = "please select a unique username";
  }
}
?>
<div class="container d-flex justify-content-center align-items-center flex-column h-100 mt-5">
  <p class="text-capitalize font-waight-bold h1 mb-5">sign up</p>
  <form action="./signup.php" method="post">
    <div class="form-group">
      <label for="username">username</label>
      <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="fullname">fullname</label>
      <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary  btn-block">Submit</button>
  </form>
  <p class='font-waight-bold  mt-2'>
    <?php
    echo $form_message;
    ?>
  </p>
</div>

<?php
require "./footer.php";
?>