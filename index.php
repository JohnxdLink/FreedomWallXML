<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./views/css/style.css">
   <link rel="stylesheet" href="./views/css/w3-animation.css">
   <title>Login and Registration Form</title>
</head>

<body class="whole-content">
   <header class="header-content">
      <section class="header-content__logo">
         <img class="jc-logo--layout" src="./public/images/JC Logo.png" alt="jc-logo">
      </section>
      <section class="header-content__login-buttons">
         <div>
            <button onclick="open_login_content()">Login</button>
         </div>
         <div>
            <button onclick="open_register_content()">Register</button>
         </div>
      </section>
   </header>

   <main class="main-content">
      <section id="main-content-landing-content" class="main-content__landing-content">
         <section>
            <img class="main-content__login-image--layout" src="./public/images/Vision statement-bro.png" alt="">
         </section>

         <section>
            <div>
               <p>Content About Freedom-Wall</p>
            </div>
         </section>
      </section>
      <section id="main-content-login" class="main-content__login-content">

         <section class="main-content__login-image w3-animate-left">
            <img class="main-content__login-image--layout" src="./public/images/Bug fixing-rafiki.png" alt="">
         </section>

         <section class="w3-animate-right">
            <div>
               <form action="controllers/controller.php" method="post">
                  <div>
                     <input type="hidden" name="action" value="login">
                  </div>
                  <div>
                     <h1>Login</h1>
                  </div>
                  <div>
                     <div>
                        <label for="login_username">Username:</label>
                     </div>
                     <div>
                        <input type="text" name="login_username" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="login_password">Password:</label>
                     </div>
                     <div>
                        <input type="password" name="login_password" required>
                     </div>
                  </div>
                  <div>
                     <button type="submit">Login</button>
                  </div>
               </form>
            </div>
         </section>
      </section>

      <section id="main-content-register" class="main-content__register-content">

         <section class="main-content__login-image w3-animate-left">
            <img class="main-content__login-image--layout" src="./public/images/Bibliophile-rafiki.png" alt="">
         </section>

         <section class="w3-animate-right">
            <div>
               <form action="controllers/controller.php" method="post">
                  <div>
                     <input type="hidden" name="action" value="register">
                  </div>

                  <div>
                     <h1>Register</h1>
                  </div>

                  <div>
                     <div>
                        <label for="register_id">ID:</label>
                     </div>
                     <div>
                        <input type="text" name="register_id" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="register_username">Username:</label>
                     </div>
                     <div>
                        <input type="text" name="register_username" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="register_password">Password:</label>
                     </div>
                     <div>
                        <input type="password" name="register_password" required>
                     </div>
                  </div>


                  <div>
                     <div>
                        <label for="register_firstname">First Name:</label>
                     </div>
                     <div>
                        <input type="text" name="register_firstname" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="register_lastname">Last Name:</label>
                     </div>
                     <div>
                        <input type="text" name="register_lastname" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="register_email">Email:</label>
                     </div>
                     <div>
                        <input type="email" name="register_email" required>
                     </div>
                  </div>

                  <div>
                     <div>
                        <label for="register_address">Address:</label>
                     </div>
                     <div>
                        <input type="text" name="register_address" required>
                     </div>
                  </div>

                  <div>
                     <button type="submit">Register</button>
                  </div>
               </form>
            </div>
         </section>
      </section>
   </main>
   <script src="./views/js/script.js"></script>
</body>

</html>