<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><input type="image" src="images/Logo.png" width="200px" ></a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <?php
               // Hanya tampilkan link orders.php jika user sudah login
               if(isset($user_id) && $user_id !== NULL) {
                  echo '<a href="orders.php">orders</a>';
               }
            ?>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>

            <?php
               // Hanya tampilkan icon user jika user sudah login
               if(isset($user_id) && $user_id !== NULL) {
                  echo '<div id="user-btn" class="fas fa-user"></div>';
               }
            ?>

            <?php
               // Jika user_id ada, tampilkan jumlah keranjang
               if(isset($user_id) && $user_id !== NULL) {
                  $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  $cart_rows_number = mysqli_num_rows($select_cart_number); 
                  echo '<a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(' . $cart_rows_number . ')</span> </a>';
               }
            ?>
         </div>

         <?php
         if(isset($user_id) && $user_id !== NULL) {
            // Jika user_id ada, tampilkan informasi pengguna
            echo '
            <div class="user-box">
               <p>username : <span>' . $_SESSION['user_name'] . '</span></p>
               <p>email : <span>' . $_SESSION['user_email'] . '</span></p>
               <a href="logout.php" class="delete-btn">logout</a>
            </div>
            ';
         } else {
            // Jika user_id tidak ada, tampilkan tombol Login dan Register
            echo '
            <div class="auth-buttons">
               <a href="login.php" class="btn">Login</a>
               <a href="register.php" class="btn">Register</a>
            </div>
            ';
         }
         ?>
      </div>
   </div>
</header>
