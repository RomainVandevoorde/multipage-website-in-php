<?php

// if(!file_exists(__DIR__.'/includes/gmail.id.php')) {
//   echo "<p>Le fichier 'includes/gmail.id.php' est introuvable.</p>";
//   if(file_exists(__DIR__.'/includes/gmail.id.example.php')) {
//     echo "<p>Le fichier 'includes/gmail.id.example.php' est présent. Suivez les instructions qui se trouvent dedans pour permettre au script de fonctionner.</p>";
//   }
//   exit;
// }


// Nécessaire pour Heroku, un peu capillotracté mais rétro-compatible
if(getenv('GMAIL_ID') && getenv('GMAIL_PW')) {
  define("GMAIL_ID", getenv('GMAIL_ID'));
  define("GMAIL_PW", getenv('GMAIL_PW'));
}

// Legacy: inclusion des identifiants GMail
if(file_exists(__DIR__.'/includes/gmail.id.php')) {
  require __DIR__.'/includes/gmail.id.php';
}

if(!defined("GMAIL_ID") || !defined("GMAIL_PW")) {
  echo "<p>Constantes manquantes. (GMAIL_ID ou GMAIL_PW)</p>";
  exit;
}

require __DIR__.'/includes/contact-form.class.php';

require __DIR__.'/vendor/verot/class.upload.php/src/class.upload.php';
require __DIR__.'/vendor/autoload.php';

// ********************
// Script
// ********************

function oldValue($valId) {
  return ((isset($_POST[$valId])) ? $_POST[$valId] : "");
}

$form = new contactForm;

$titles = $form::titles;
$objets = $form::objects;

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_POST['titreRadio'])) $form->title = $_POST['titreRadio'];
  $form->name = $_POST['nom'];
  $form->firstname = $_POST['prenom'];
  $form->email = $_POST['email'];
  $form->object = $_POST['objet'];
  $form->message = $_POST['message'];
  if(isset($_POST['formatRadio'])) $form->format = $_POST['formatRadio'];
  if(isset($_FILES['file']) && $_FILES['file']['error'] === 0) $form->file = $_FILES['file'];

  $res = $form->process();

  // There are errors
  if(!$res) {
    $feedback = '<div class="alert alert-danger" role="alert">';
    $feedback .= '<h3>Échec</h3>';
    foreach($form->errors as $errors) {
      foreach($errors as $error) {
        $feedback .= '<p>'.$error.'</p>';
      }
    }
    $feedback .= '</div>';
  }
  else $feedback = '<div class="alert alert-success" role="alert">Votre message a été envoyé avec succès !</div>';
}

require __DIR__.'/templates/header.php';

?>
<div class="container">

  <?php if(isset($feedback)) echo $feedback; ?>

  <form enctype="multipart/form-data" action="" method="post">
    <div class="row">
      <div class="col-sm-2">Titre</div>
      <div class="col-sm-10">
        <?php
        foreach($titles as $key => $titre) {
          $checked = (isset($_POST['titreRadio']) && $_POST['titreRadio'] === $titre) ? "checked" : "";
          ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="titreRadio" id="titreRadio<?php echo $key; ?>" value="<?php echo $titre; ?>" <?php echo $checked; ?>>
            <label class="form-check-label" for="titreRadio<?php echo $key; ?>">
              <?php echo $titre; ?>
            </label>
          </div>
          <?php
        }
        ?>
      </div>
    </div>

    <div class="form-group row">
      <label for="nomInput" class="col-sm-2">Votre nom</label>
      <input type="text" class="form-control col-sm-10" id="nomInput" name="nom" placeholder="Votre nom" value="<?php echo oldValue('nom'); ?>">
    </div>

    <div class="form-group row">
      <label for="prenomInput" class="col-sm-2">Votre prénom</label>
      <input type="text" class="form-control col-sm-10" id="prenomInput" name="prenom" placeholder="Votre prénom" value="<?php echo oldValue('prenom'); ?>">
    </div>

    <div class="form-group row">
      <label for="emailInput" class="col-sm-2">Votre adresse mail</label>
      <input type="email" class="form-control col-sm-10" id="emailInput" name="email" placeholder="example@gmail.com" value="<?php echo oldValue('email'); ?>">
    </div>


    <div class="form-group row">
      <label for="objetSelect" class="col-sm-2">Objet</label>
      <select class="form-control col-sm-10" id="objetSelect" name="objet">
        <!-- <option>Demande d'informations</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option> -->
        <?php
        foreach($objets as $objet) {
          $selected = (isset($_POST['objet']) && $_POST['objet'] === $objet) ? "selected" : "";
          echo "<option ".$selected.">".$objet."</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group row">
      <label for="messageTextarea" class="col-sm-2">Message</label>
      <textarea class="form-control col-sm-10" id="messageTextarea" rows="3" name="message"><?php echo oldValue('message'); ?></textarea>
    </div>

    <div class="form-group row">
      <label for="documentFile" class="col-sm-2">Document</label>
      <input type="file" class="form-control-file col-sm-10" id="documentFile" name="file">
    </div>

    <div class="row">
      <div class="col-sm-2">Format de réponse souhaité</div>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="formatRadio" id="formatRadio1" value="html" <?php echo (isset($_POST['formatRadio']) && $_POST['formatRadio'] !== "html") ? "" : "checked" ?>>
          <label class="form-check-label" for="formatRadio1">
            HTML
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="formatRadio" id="formatRadio2" value="text" <?php echo (isset($_POST['formatRadio']) && $_POST['formatRadio'] === "text") ? "checked" : "" ?>>
          <label class="form-check-label" for="formatRadio2">
            Texte
          </label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <input type="submit" value="Contactez-moi">
      </div>
    </div>

  </form>

</div>

<?php

require __DIR__.'/templates/footer.php'

?>
