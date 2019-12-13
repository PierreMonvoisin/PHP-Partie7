<!DOCTYPE html>
<html lang='fr' dir='ltr'>
<head>
  <title>Exercice 8</title>
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
        // Define articles
        $GLOBALS['articleIndef'] = 'un';
        $GLOBALS['articleDef'] = 'Il';
      } else if ($_POST['gender'] == 'femme'){
        $GLOBALS['articleIndef'] = 'une';
        $GLOBALS['articleDef'] = 'Elle';
      }
      // Check for first and last name and displays the sentence
      if (isset($_POST['lastname']) && isset($_POST['firstname'])) { ?>
        <p><?= $_POST['firstname']. ' ' .$_POST['lastname'] ?> est <?= $articleIndef. ' ' .$_POST['gender'] ?>.</p>
        <?php
        // Split file name into name and extension
        $file = explode('.', $_POST['file']);
        if ($file[1] == 'pdf'){ ?>
          <p><?= $articleDef ?> a bien envoyé un fichier PDF !.</p>
        <?php } else { ?>
          <p><?= $articleDef ?> n'a pas envoyé un fichier PDF ...</p>
        <?php }
        $file = explode('.', $_POST['file']);
        $fileName = $file[0];
        $fileExtension = $file[1];
        ?>
        <p><?= $articleDef ?> a envoyé "<?= $fileName ?>" au format <?= $fileExtension ?>.</p>
      <?php } else { ?>
        <!-- Display form until submit -->
        <form class="form" action="index.php" method="POST" autocomplete="on">
          <!-- Radio -->
          <div class="custom-control custom-radio mb-2">
            <input type="radio" id="radioHomme" name="gender" value="homme" class="custom-control-input">
            <label class="custom-control-label" for="radioHomme">Homme</label>
          </div>
          <div class="custom-control custom-radio mb-2">
            <input type="radio" id="radioFemme" name="gender" value="femme" class="custom-control-input">
            <label class="custom-control-label" for="radioFemme">Femme</label>
          </div>
          <!-- First Name -->
          <label class="sr-only" for="firstname">First Name</label>
          <input type="text" class="form-control mb-2" id="firstname" placeholder="Pierre" name="firstname">
          <!-- Last Name -->
          <label class="sr-only" for="lastname">Last Name</label>
          <input type="text" class="form-control mb-2" id="lastname" placeholder="Monvoisin" name="lastname">
          <!-- File -->
          <div class="custom-file mb-2">
            <input type="file" class="custom-file-input" id="file" name="file">
            <label class="custom-file-label" for="file">Votre fichier</label>
          </div>
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
