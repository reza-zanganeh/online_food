<?php
require "./db.php";
require "./helper.php";
if (isLogIn()) {
?>
  <script type="text/javascript">
    location.replace("index.php"); // منتقل شود index.php به صفحه
  </script>
  <?php
}
try {
  $form_message = "";
  if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['username']) &&
    isset($_POST['password'])
  ) {
    if (
      !empty($_POST['username']) &&
      !empty($_POST['password'])
    ) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result = mysqli_query($link, $query);
      mysqli_close($link);
      if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
          $_SESSION["state_login"] = true;
          $_SESSION["fullname"] = $row['fullname'];
          $_SESSION["username"] = $row['username'];
          if ($row["role"] == 0)
            $_SESSION["user_role"] = "public";
          elseif ($row["role"] == 1) {
            $_SESSION["user_role"] = "admin";
  ?>
            <script type="text/javascript">
              location.replace("index.php");
            </script>

<?php
          }
        }
      } else {
        $form_message = "Login is not successful";
      }
    } else {
      $form_message = "fill out the form completely";
    }
    $_SERVER['REQUEST_METHOD'] = "";
  }
} catch (Exception $e) {
  $message = $e->getMessage();
  echo $message;
} ?>
<div class="container d-flex justify-content-center align-items-center flex-column h-100 mt-5">
  <p class="text-capitalize font-waight-bold h1 mb-5">sign up</p>
  <form action="./signup.php">
    <div class="form-group">
      <label for="username">username</label>
      <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary  btn-block">Submit</button>
  </form>
</div>

<?php
require "./footer.php";
?>