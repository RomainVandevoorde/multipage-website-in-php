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
  // if(!isset($_POST[$valId])) return "";
  // else return $_POST[$valId];
  return ((isset($_POST[$valId])) ? $_POST[$valId] : "");
}


// $dataInputs = array('titreRadio', 'nom', 'prenom', 'email', 'objet', 'message', 'file');
//
// function checkData($array) {
//
//   if(!isset())
// }

$objets = array("Demande d'informations", "Demande de rendez-vous");

require __DIR__.'/templates/header.php';

echo '<pre>'.print_r($_FILES, TRUE).'</pre>';


echo '<pre>'.print_r($_POST, TRUE).'</pre>';

// echo '<pre>'.print_r(checkData($_POST, $dataInputs), TRUE).'</pre>';
//
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // validateData($_POST);
  echo '<pre>'.print_r(validateData($_POST), TRUE).'</pre>';
}

?>

<!-- // Adresse mail (txt)
// Nom (txt)
// Genre (radio)
// Objet du message (txt)
// HTML ou TXT (radio)
// Message (textarea) -->

<form enctype="multipart/form-data" action="" method="post">
  <div class="row">
    <div class="col-sm-2">Titre</div>
    <div class="col-sm-10">
      <div class="form-check form-check-inline">
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
      </div>
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
      <option>Demande d'informations</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
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

require __DIR__.'/templates/footer.php'

?>
