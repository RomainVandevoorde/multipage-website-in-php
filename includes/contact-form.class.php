<?php

class contactForm
{
  const titles = ["Mme", "Melle", "Mr"];
  const objects = ["Demande d'informations", "Demande de rendez-vous", "Autre"];
  const formats = ["html", "text"];

  const accepted_types = [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG];

  public $errors = [];

  public $title = "";
  public $name = "";
  public $firstname = "";
  public $email = "";
  public $object = "";
  public $message = "";
  public $format = "";

  public $file;
  public $uploaded_file;

  public function process() {
    $this->validate();
    if($this->countErrors() !== 0) return FALSE;

    // Si le formulaire est valide et qu'il n'y a pas d'upload, c'est un succès
    if(is_null($this->file)) {
      $this->log();
      return TRUE;
    }

    $up_result = $this->setFile($this->file);
    if($up_result !== TRUE) {
      $this->errors['file'] []= $up_result;
      return FALSE;
    }

    $this->log();

    return TRUE;
  }

  public function validate() {
    $this->validateTitle();
    $this->validateName();
    $this->validateFirstName();
    $this->validateMail();
    $this->validateObject();
    $this->validateMessage();
    $this->validateFormat();
  }

  private function countErrors() {
    $count = 0;
    if(count($this->errors) < 1) return 0;
    foreach($this->errors as $error) {
      $count += count($error);
    }
    return $count;
  }

  private function validateTitle() {
    if(empty($this->title)) return;
    if(!in_array($this->title, self::titles)) $this->errors['title'] []= "Choisissez votre titre svp";
  }

  private function validateObject() {
    if(empty($this->object)) $this->object = "Autre";
    if(!in_array($this->object, self::objects)) $this->errors['object'] []= "Choisissez un objet svp";
  }

  private function validateFormat() {
    if(empty($this->format)) $this->format = "html";
    if(!in_array($this->format, self::formats)) $this->errors['format'] []= "Choisissez un format de réponse svp";
  }

  private function validateName() {
    if(empty($this->name)) return;

    if(!ctype_alpha($this->name)) $this->errors['name'] []= "Caractères invalides";
    $len = strlen($this->name);
    if($len === 1 || $len > 50) $this->errors['name'] []= "Merci d'entrer un nom valide";
  }

  private function validateFirstName() {
    if(empty($this->firstname)) return;

    if(!ctype_alpha($this->firstname)) $this->errors['firstname'] []= "Caractères invalides";
    $len = strlen($this->firstname);
    if($len === 1 || $len > 50) $this->errors['firstname'] []= "Merci d'entrer un prénom valide";
  }

  private function validateMail() {
    if(empty($this->email)) {
      $this->errors['email'] []= "Merci de fournir une adresse email";
      return;
    }

    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) $this->errors['email'] []= "Merci d'entrer une adresse mail valide";
  }

  private function validateMessage() {
    if(empty($this->message)) {
      $this->errors['message'] []= "Merci d'entrer un message";
      return;
    }

    $len = strlen($this->message);
    if($len < 10) $this->errors['message'] []= "Votre message est trop court";
    if($len > 1000) $this->errors['message'] []= "Votre message est trop long";
  }

  public function log() {
    $logger = new Logger(__DIR__.'/../storage/logs.json');
    $data = [
      'date' => date("d-m-Y_H-i-s"),
      'name' => $this->name,
      'firstname' => $this->firstname,
      'email' => $this->email,
      'format' => $this->format
    ];
    if(!is_null($this->uploaded_file)) $data['file'] = $this->uploaded_file;
    $logger->addData($data);
    return TRUE;
  }

  public function setFile($file) {
    if(gettype($file) !== 'array') throw new Exception('Invalid type');

    $type = exif_imagetype($file['tmp_name']);

    if(!$type) return "You can only upload images.";
    if(!in_array($type, self::accepted_types)) return "Invalid image type. (jpg, jpeg, png and gif are accepted)";

    $handle = new Upload($file);
    if(!$handle->uploaded) return "The file upload failed. Please try again.";

    $new_name = $this->generateImageName();
    $handle->file_new_name_body = $new_name;

    $handle->Process(__DIR__.'/../storage/img-uploads/');
    if(!$handle->processed) return "The file upload failed. Please try again.";

    // Image successfully processed
    $this->uploaded_file = $handle->file_dst_name;

    $handle->Clean();

    return TRUE;
  }

  private function generateImageName() {
    $string = "";
    if(!empty($this->firstname)) $string .= strtolower($this->firstname).'_';
    if(!empty($this->name)) $string .= strtolower($this->name).'_';
    $string .= $this->email.'_';
    $string .= date("d-m-Y_H-i-s");
    return $string;
  }
}

class Logger
{
  public $file;
  public $current_data;

  public function __construct($file_dest) {
    $this->file = $file_dest;
    $this->getCurrentData();
  }

  public function addData($data) {
    if(gettype($data) !== 'array') throw new Exception('Invalid data type');
    $this->current_data []= $data;
    file_put_contents($this->file, json_encode($this->current_data));
  }

  private function getCurrentData() {
    $this->current_data = json_decode(file_get_contents($this->file), TRUE);
  }

  public function getLastImageID() {

  }
}

// $form = new contactForm;
//
// echo $form->displayType();

// $logger = new Logger(__DIR__.'/../storage/logs.json');
// echo '<pre>'.print_r($logger->current_data, TRUE).'</pre>';

// $logger->addData(array('mouais'=>'bof', 'han'=>'ouais'));
// echo '<pre>'.print_r($logger->current_data, TRUE).'</pre>';
