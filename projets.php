<?php

require __DIR__.'/templates/header.php';

 ?>

<!-- Projet-Acceuil : to redesign maybe to replace with a sidebar, inputs not responsive-->

 <div class="yellowBack">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
         <div class="card text-center">
            <div class="card-header">
              <h2 class="card-title">Nos projets</h2>
            </div>
            <div class="card-body">
              <p class="card-text">Notre approche vise à permettre à nos publics d’avoir plus de pouvoir d’action et d’influence sur leur environnement grâce à différents projets.</p>
              <a href="#permSoc" class="btn btn-primary">Permanence sociale</a>
              <a href="#modInfo" class="btn btn-primary">Modules informatiques</a>
              <a href="#" class="btn btn-primary">Vie citoyenne</a>
              <a href="#" class="btn btn-primary">Entreprendre au féminin</a>
              <p class="card-text"></br>Nos projets sont subsidiés par le Service public francophone bruxellois (COCOF).</p>
            </div>
          </div>
        </div>
       </div>
   </div>
 </div>

 <!-- Div-Permanence-Sociale +- responsive except col-sm with GoogleChrome -->

<div class="container proDiv" id="permSoc">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
      <div class="card proCard">
        <div class="card-body">
          <h2 class="card-title proTitle">Permanence sociale</h2>
          <p class="card-text">Nous proposons une permanence sociale généraliste sans rendez-vous, ouverte à tous et entièrement <b>gratuite</b>.</br></br>
            Un assistant social assure un accueil, une analyse des situations problématiques, un accompagnement social et en cas de nécessité, une orientation vers un service spécialisé.</p>
        </div>
      </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
       <img src="assets/img/image-perm.png" class="img-fluid proImg" alt="Schéma Permanence Sociale">
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
       <div class="card proCard">
         <div class="card-body">
           <h2 class="card-title proTitle">Horaire</h2>
           <p class="card-text permHor" id="">
            <b>Lundi</b>: 9h à 13h</br></br>
            <b>Mardi</b>: 9h à 13h et 14h à 16h</br></br>
            <b>Mercredi</b>: 9h à 13h</br></br>
            <b>Jeudi</b>: 9h à 13h et 14h à 16h</br></br>
            <b>Vendredi</b>: Permanence fermée</p>
         </div>
       </div>
     </div>
  </div>
</div>

<!-- Div-Module-Informatique -->

<div class="container proDiv" id="modInfo">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
      <div class="card proCard">
        <div class="card-body">
          <h2 class="card-title proTitle">Modules informatiques</h2>
          <p class="card-text">Depuis 2014, notre association propose des séances sous forme de cours pour apprendre, en petits groupes, les bases de l’informatique.</br></br> Nos formations courtes permettent de faire face aux démarches quotidiennes exigeants de plus en plus l’utilisation d’un ordinateur (création d’une adresse mail, services et inscription en ligne, utilisation d’un traitement de texte, …).</br></br>Nos cours sont <b>accessibles à tous</b>.</p>
        </div>
      </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
       <img src="assets/img/image-mi-1.png" class="img-fluid" alt="Responsive image">
       <img src="assets/img/image-mi-3.jpg" class="img-fluid" alt="Responsive image">
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
       <img src="assets/img/image-mi-2.jpg" class="img-fluid" alt="Responsive image">
     </div>
  </div>
</div>

<!-- Div-Vie-Citoyenne -->
<!-- Div-Entreprendre-au-féminin -->
