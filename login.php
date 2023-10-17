<?php
require "./header.php";
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
  <script type="text/javascript">
    location.replace("index.php"); // منتقل شود index.php به صفحه
  </script>
<?php
}
?>
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