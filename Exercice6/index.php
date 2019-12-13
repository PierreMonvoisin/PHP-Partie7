<!DOCTYPE html>
<html lang='fr' dir='ltr'>
<head>
  <title>Exercice 6</title>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>

<body class='container-fluid bg-secondary'>
  <div class='row mt-5'>
    <div class='jumbotron shadow-lg mx-auto text-center'>
      <?php if (isset($_POST['firstname'])){ ?>
        <h2>- Accueil -</h2>
      <?php } else { ?>
        <h2>- Formulaire -</h2>
      <?php } ?>
      <?php
      // Check for gender
      if ($_POST['gender'] == 'homme'){
        $GLOBALS['article'] = 'un';
      } else if ($_POST['gender'] == 'femme'){
        $GLOBALS['article'] = 'une';
      }
      // Check for first and last name and displays the sentence
      if (isset($_POST['lastname']) && isset($_POST['firstname'])) { ?>
        <p><?= $_POST['firstname']. ' ' .$_POST['lastname'] ?> est <?= $article. ' ' .$_POST['gender'] ?></p>
      <?php } else { ?>
      <!-- Display form until submit -->
      <form class="form-inline" action="index.php" method="POST" autocomplete="on">
        <!-- Radio -->
        <div class="custom-control custom-radio mr-2">
          <input type="radio" id="radioHomme" name="gender" value="homme" class="custom-control-input">
          <label class="custom-control-label" for="radioHomme">Homme</label>
        </div>
        <div class="custom-control custom-radio mr-2">
          <input type="radio" id="radioFemme" name="gender" value="femme" class="custom-control-input">
          <label class="custom-control-label" for="radioFemme">Femme</label>
        </div>
        <!-- First Name -->
        <label class="sr-only" for="firstname">First Name</label>
        <input type="text" class="form-control mr-2" id="firstname" placeholder="Pierre" name="firstname">
        <!-- Last Name -->
        <label class="sr-only" for="lastname">Last Name</label>
        <input type="text" class="form-control mr-2" id="lastname" placeholder="Monvoisin" name="lastname">
        <!-- Submit button -->
        <button type="submit" class="btn btn-dark">Valider</button>
      </form>
    <?php } ?>
      <p class='text-right mt-1'>Un message de la direction</p>
    </div>
  </div>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
</body>
</html>
