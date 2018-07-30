<?php

function validateData($array) {
  global $titles;
  global $objets;

  $errors = [];

  if(!isset($array['titreRadio'])) $errors['titreRadio'] = ['Information manquante'];
  else $errors ['titreRadio']= validateTitle($array['titreRadio'], $titles);

  if(!isset($array['nom'])) $errors['nom'] = ['Information manquante'];
  else $errors ['nom']= validateName($array['nom']);

  if(!isset($array['prenom'])) $errors['prenom'] = ['Information manquante'];
  else $errors ['prenom']= validateFirstName($array['prenom']);

  if(!isset($array['email'])) $errors['email'] = ['Information manquante'];
  else $errors ['email']= validateEmail($array['email']);

  if(!isset($array['objet'])) $errors['objet'] = ['Information manquante'];
  else $errors ['objet']= validateObject($array['objet'], $objets);

  if(!isset($array['message'])) $errors['message'] = ['Information manquante'];
  else $errors ['message']= validateMessage($array['message']);

  // if(!isset($array['file'])) $errors['file'] = ['Missing information'];
  // else $errors ['file']= validateFile($array['file']);

  if(!isset($array['formatRadio'])) $errors['formatRadio'] = ['Information manquante'];
  else $errors ['formatRadio']= validateFormat($array['formatRadio']);

  return $errors;

}

function validateTitle($value, $titles) {
  if(empty($value)) return ['Merci de choisir votre titre'];
  if(!in_array($value, $titles)) return ['Titre invalide'];
}

function validateName($value) {

  $errors = [];

  if(empty($value)) return ["Merci d'entrer votre nom"];
  $len = strlen($value);
  if($len < 2 || $len > 50) $errors []= "Merci d'entrer un nom valide";

  if(!ctype_alpha($value)) $errors []= "Caractères invalides";

  return $errors;

}

function validateFirstName($value) {

  $errors = [];

  if(empty($value)) return ["Merci d'entrer votre prénom"];

  $len = strlen($value);
  if($len < 2 || $len > 100) $errors []= "Merci d'entrer un prénom valide";

  if(!ctype_alpha($value)) $errors []= "Caractères invalides";

  return $errors;

}

function validateEmail($value) {

  if(empty($value)) return ["Merci d'entrer votre adresse mail"];

  if(!filter_var($value, FILTER_VALIDATE_EMAIL)) return ["Merci d'entrer une adresse mail valide"];

}

function validateObject($value, $objets) {

  if(empty($value)) return ["Merci de choisir un objet"];

  if(!in_array($value, $objets)) return ["Objet invalide"];

}

function validateMessage($value) {

  if(empty($value)) return ["Merci d'entrer un message"];

  $len = strlen($value);
  if($len < 10) return ["Message trop court"];
  if($len > 500) return ["Message trop long"];

}

function validateFile($value) {

}

function validateFormat($value) {

  if(empty($value)) return ["Merci de choisir un type de réponse"];

  if(!in_array($value, ['html', 'text'])) return ["Type de réponse invalide"];
}
