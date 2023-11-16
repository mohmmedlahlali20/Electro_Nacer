<?php include './tmp/head.php' ;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];
  $password= $_POST['password'];

  $sql = "SELECT * FROM users WHERE Email = '$email'";
  $query = mysqli_query($conn, $sql);
  
  if (!$query) {
      // Query failed
      die("Error: " . mysqli_error($conn));
  }
  
  $user = mysqli_fetch_assoc($query);

  if ($user != '') {
    if($user['password']==$password){
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      header('Location: product.php');
    }
  }
}
?>
<section>
   


    <h1>welcom to Electro Nacer</h1>
    <form action="" method="post">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input  type="email" id="form2Example1 " name="email" class="form-control" />
          <label style="color: rgb(0, 0, 0);" class="form-label" for="form2Example1">Email address</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="form2Example2" name="password" class="form-control" />
          <label style="color: rgb(0, 0, 0);" class="form-label" for="form2Example2">Password</label>
        </div>
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
              <label style="color: rgb(0, 0, 0);" class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
          </div>
      
          <div class="col">
            <!-- Simple link -->
           
        <!-- Submit button -->
        <button style="margin-top: 20px;" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      
        <!-- Register buttons -->
        
      </form>
    </section>
    <section>
        
    </section>
    <?php include './tmp/script.php' ?>