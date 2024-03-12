<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="language" content="English">
   <meta name="title" content="Green Archive">
   <meta name="description" content="This webpage is all about Freedom Wall XML Content">
   <meta name="robots" content="index, follow">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Castro John Christian">
   <title>Freedom Wall | Welcome</title>
   <link rel="stylesheet" href="./views/css/style.css">
</head>

<body class="whole-content" data-page="main-index">
   <header class="header-content">
      <section class="header-content__logo">
         <img class="jc-logo--layout" src="./public/images/JC Logo.png" alt="jc-logo">
      </section>
      <section class="header-content__login-buttons">
         <div>
            <button class="login-btn--layout" onclick="open_login_content()">Login</button>
         </div>
         <div>
            <button class="register-btn--layout" onclick="open_register_content()">Register</button>
         </div>
      </section>
   </header>

   <main class="main-content">
      <section id="main-content-landing-content" class="main-content__landing-content">
         <section class="main-content__login-image-content">
            <img class="main-content__login-image--layout" src="./public/images/Breaking barriers-amico.png" alt="">
         </section>

         <section class="main-content__landing-content-text">
            <div>
               <h1 class="main-content__landing-content-header">Freedom-Wall-XML</h1>
            </div>
            <div>
               <p class="main-content__landing-content-body">Immerse yourself in the dynamic world of my Freedom Wall XML, where users can seamlessly navigate through a user-friendly interface, experiencing the convenience of secure login and registration processes. This innovative platform empowers users with a robust CRUD system, enabling the creation of personalized Freedom Wall entries that are seamlessly saved to an XML file, ensuring a rich and interactive user experience.</p>
            </div>
         </section>
      </section>

      <!-- Section Login -->
      <section id="main-content-login" class="main-content__login-content">

         <section class="main-content__login-image w3-animate-left">
            <img class="main-content__login-image--layout" src="./public/images/Tablet login-amico.png" alt="">
         </section>

         <section class="main-content__login-form w3-animate-right">
            <div class="login-form-content">
               <form class="sub-form-content" action="controllers/controller.php" method="post">
                  <div>
                     <input class="form-input-body" type="hidden" name="action" value="login">
                  </div>
                  <div>
                     <h1 class="form__header">SIGN IN</h1>
                     <h1 class="form__sub-header">Please input your credentials</h1>
                  </div>
                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" class="form-lbl-header" for="login_username">Username:</label>
                     </div>
                     <div>
                        <input class="form-input-body" class="form-input-body" type="text" name="login_username" placeholder="Username" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" class="form-lbl-header" for="login_password">Password:</label>
                     </div>
                     <div>
                        <input class="form-input-body" class="form-input-body" type="password" name="login_password" placeholder="Password" required>
                     </div>
                  </div>
                  <div>
                     <button class="form-btn-submit" type="submit">Login</button>
                  </div>

                  <div class="other-form-login">
                     <div>
                        <p class="other-form__or-text">Other</p>
                     </div>
                     <div class="other-form__btn-content">
                        <button class="other-form__login-btn">Login with Facebook</button>
                     </div>
                     <div class="other-form__btn-content">
                        <button class="other-form__login-btn">Login with Google</button>
                     </div>
                     <div class="other-form__btn-content">
                        <button class="other-form__login-btn">Login with Microsoft</button>
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </section>

      <!-- Section Register -->
      <section id="main-content-register" class="main-content__register-content">

         <section class="main-content__login-image w3-animate-left">
            <img class="main-content__login-image--layout" src="./public/images/Mobile login-pana.png" alt="">
         </section>

         <section class="main-content__register-form w3-animate-right">
            <div class="login-form-content">
               <form class="sub-form-content" action="controllers/controller.php" method="post">
                  <div>
                     <input class="form-input-body" type="hidden" name="action" value="register">
                  </div>

                  <div>
                     <h1 class="form__header">SIGN UP</h1>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_id">ID:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="text" name="register_id" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_username">Username:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="text" name="register_username" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_password">Password:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="password" name="register_password" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_firstname">First Name:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="text" name="register_firstname" required>
                     </div>
                  </div class="form__content">

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_lastname">Last Name:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="text" name="register_lastname" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_email">Email:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="email" name="register_email" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <div>
                        <label class="form-lbl-header" for="register_address">Address:</label>
                     </div>
                     <div>
                        <input class="form-input-body" type="text" name="register_address" required>
                     </div>
                  </div>

                  <div class="form__content">
                     <button class="form-btn-submit" type="submit">Register</button>
                  </div>
               </form>
            </div>
         </section>
      </section>
   </main>
   <script src="./views/js/script.js"></script>
</body>

</html>