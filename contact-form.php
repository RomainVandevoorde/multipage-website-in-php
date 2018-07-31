<?php

require __DIR__.'/includes/contact-form-validation.fct.php';

// if(
//   isset($_POST['titreRadio']) &&
// isset($_POST['nom']) &&
// isset($_POST['prenom']) &&
// isset($_POST['email']) &&
// isset($_POST['objet']) &&
// isset($_POST['message']) &&
// isset($_POST['file'])) {
//   echo '<pre>'.print_r($_POST, TRUE).'</pre>';
// }

function oldValue($valId) {
  return ((isset($_POST[$valId])) ? $_POST[$valId] : "");
}


// $dataInputs = array('titreRadio', 'nom', 'prenom', 'email', 'objet', 'message', 'file');

$titles = array('Mr', 'Melle', 'Mme');
$objets = array("Demande d'informations", "Demande de rendez-vous", "Autre");

if($_SERVER['REQUEST_METHOD'] === 'POST') $errors = validateData($_POST);

require __DIR__.'/templates/header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  require __DIR__.'/includes/contact-form.class.php';

  $form = new contactForm();

  if(isset($_POST['titreRadio'])) $form->title = $_POST['titreRadio'];
  $form->name = $_POST['nom'];
  $form->firstname = $_POST['prenom'];
  $form->email = $_POST['email'];
  $form->object = $_POST['objet'];
  $form->message = $_POST['message'];
  if(isset($_POST['formatRadio'])) $form->format = $_POST['formatRadio'];

  $res = $form->validate();

  echo '<p>'.($res ? "true" : "false").'</p>';
  echo '<pre>'.print_r($form->errors, TRUE).'</pre>';
}

?>
<div class="container">

  <form enctype="multipart/form-data" action="" method="post">
    <div class="row">
      <div class="col-sm-2">Titre</div>
      <div class="col-sm-10">
        <!-- <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="titreRadio" id="titreRadio1" value="Mme">
          <label class="form-check-label" for="titreRadio1">
            Mme
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="titreRadio" id="titreRadio2" value="Melle">
          <label class="form-check-label" for="titreRadio2">
            Melle
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="titreRadio" id="titreRadio3" value="Mr">
          <label class="form-check-label" for="titreRadio3">
            Mr
          </label>
        </div> -->
        <?php
        foreach($titles as $key => $titre) {
          $checked = (isset($_POST['titreRadio']) && $_POST['titreRadio'] === $titre) ? "checked" : "";
          // $default = (!isset($_POST['titreRadio']) || (isset($_POST['titreRadio']) && $_POST['titreRadio']))
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
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nomInput" name="nom" placeholder="Votre nom" value="<?php echo oldValue('nom'); ?>">
        <?php
        if(isset($_POST['nom'])) {
          if(count($errors['nom']) > 0) {
            ?>
            <div class="invalid-feedback" style="display:block">
              <?php echo $errors['nom'][0]; ?>
            </div>
            <?php
          }
        }
        ?>
      </div>
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


<?php
$current_data = json_decode(file_get_contents(__DIR__.'/storage/logs.json'));
echo '<pre>'.print_r($current_data, TRUE).'</pre>';

echo '<div style="border:1px solid blue">';
echo isset($_FILES['file']) ? "true" : "false";
$accepted_types = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
$type = exif_imagetype($_FILES['file']['tmp_name']);
if(!$type) echo '<p>Type de fichier invalide !</p>';
else {
  echo '<p>'.$type.'</p>';
  if(in_array($type, $accepted_types)) {
    echo '<p>Chill</p>';
    require __DIR__.'/vendor/verot/class.upload.php/src/class.upload.php';
    $handle = new Upload($_FILES['file']);
    if($handle->uploaded) {
      $handle->Process(__DIR__.'/storage/img-uploads/');
      if($handle->processed) {
        echo '<p>Upload réussi !</p>';
      }
      else {
        echo '<p>Upload failed</p>';
      }
      $handle->Clean();
    }
  }
  else {
    echo '<p>noooo</p>';
  }
}
echo '</div>';

echo '<pre>'.print_r($_FILES, TRUE).'</pre>';
echo '<pre>'.print_r($_POST, TRUE).'</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // validateData($_POST);
  echo '<p>'.$errors.'</p>';
  echo '<pre>'.print_r(validateData($_POST), TRUE).'</pre>';
}

?>

</div>

<?php

require __DIR__.'/templates/footer.php'

?>
