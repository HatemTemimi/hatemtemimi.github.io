<?php
  require('recaptcha/autoload.php');
  if(isset($_POST['submitpost'])) {
    if(isset($_POST['g-recaptcha-response'])) {
      $recaptcha = new \ReCaptcha\ReCaptcha('6LffYp8UAAAAAHZdmtm41YB32JAtIJXBENYlnBHu');
      $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
      if ($resp->isSuccess()) {
          var_dump('Captcha Valide');
          header('Location:signin.php');
      } else {
          $errors = $resp->getErrorCodes();
          var_dump('Captcha Invalide');
          var_dump($errors);
      }
    } else {
      var_dump('Captcha non rempli');
    }
  }
?>


<!--
<html>

  <head>
    <title>reCAPTCHA demo: Simple page</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>


  <body>
    <form method="POST">
      <div class="g-recaptcha" data-sitekey="6LfNcpsUAAAAAHWFqgQXf35WestWzPTQj8a9ke2k"></div>
      <br/>
      <input type="submit" value="Valider" name="submitpost">
    </form>
  </body>
</html>
-->

<!-------------------------------------------------------------------------------------->

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <title>Valider</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">

                <div class="card-body">

                    <form method="POST">


                        <div>
                             <div class="g-recaptcha" data-sitekey="6LffYp8UAAAAACbyqwwZmrtZ3RNqOcPer31a48CW"></div>
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submitpost">Confirmer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
