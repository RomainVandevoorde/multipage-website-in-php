<?php

require __DIR__.'/templates/header.php';

 ?>

<!-- Top Scroll Button -->

<script type="text/javascript">
// When the user scrolls down 550px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 550 || document.documentElement.scrollTop > 550) {
      document.getElementById("myBtn").style.display = "block";
  } else {
      document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<!-- Projet-Acceuil : to redesign maybe to replace with a sidebar, inputs not responsive, -->

 <div class="yellowBack">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
         <div class="card text-center">
            <div class="card-header blueBackGrad">
              <h2 class="card-title whiteFont">Nos projets</h2>
            </div>
            <div class="card-body">
              <p class="card-text">Notre approche vise à permettre à nos publics d’avoir plus de pouvoir d’action et d’influence sur leur environnement grâce à différents projets.</p>
              <a href="#permSoc" class="btn btn-secondary">Permanence sociale</a>
              <a href="#modInfo" class="btn btn-secondary">Modules informatiques</a>
              <a href="#enFe" class="btn btn-secondary">Entreprendre au féminin</a>
              <a href="#viCi" class="btn btn-secondary">Vie citoyenne</a>
              <p class="card-text"></br>Nos projets sont subsidiés par le Service public francophone bruxellois (COCOF).</p>
            </div>
          </div>
        </div>
       </div>
   </div>
 </div>

 <!-- Div-Permanence-Sociale +- responsive except col-sm with GoogleChrome -->

<div class="container proDiv proDivSpace" id="permSoc">
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
       <img src="assets/img/image-perm.png" class="img-fluid proImgTop mx-auto d-block" alt="Schéma Permanence Sociale">
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

<div class="container proDiv proDivSpace" id="modInfo">
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
       <img src="assets/img/image-mi-1.png" class="img-fluid mx-auto d-block" alt="Responsive image">
       <img src="assets/img/image-mi-3.jpg" class="img-fluid mx-auto d-block" alt="Responsive image">
       <img src="assets/img/image-mi-4.jpg" class="img-fluid mx-auto d-block" alt="Responsive image">
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
       <img src="assets/img/image-mi-2.jpg" class="img-fluid mx-auto d-block" alt="Responsive image">
     </div>
  </div>
  <!-- to hidden --------------------------->
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/exercices-par-module/" class="whiteFont" target="_blank">Quelques exercices clavier-souris ici !</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/espace-public-numerique/" class="whiteFont" target="_blank">Liste de tous les espaces publics numériques de Bruxelles (matériel informatique mis à disposition gratuitement).</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/ordinateurs-doccasion/" class="whiteFont" target="_blank">Adresses pour trouver des ordinateurs d'occasion.</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <img src="assets/img/image-mi-5.png" class="img-fluid mx-auto d-block" alt="Responsive image">
    </div>
  </div>
</div>

<!-- Div-Entreprendre-au-féminin -->

<div class="container proDiv proDivSpace" id="enFe">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <div class="card proCard">
        <div class="card-body">
          <h2 class="card-title proTitle">Entreprende au féminin</h2>
          <p class="card-text">Solidarité Savoir soutient depuis 2014 les femmes qui souhaitent développer un projet social et/ou commercial sur la région bruxelloise.
          </br></br>Des rencontres et des formations courtes sont proposées chaque année sur diverses thématiques (création d’asbl, recherche de subsides, créativité, gestion financière, …).
          <br><br>Pour être tenu informé des prochaines dates : <a href="contact.php">Contactez nous</a></p>
        </div>
      </div>
     </div>
     <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
       <img src="assets/img/image-enfé-1.png" class="img-fluid mx-auto d-block" alt="Schéma Permanence Sociale">
     </div>
  </div>
</div>

<!-- Div-Vie-Citoyenne -->

<div class="container proDivSpace" id="viCi">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
      <div class="card proCard">
        <div class="card-body">
          <h2 class="card-title proTitle">Vie citoyenne</h2>
          <p class="card-text">	Depuis janvier 2016, notre association propose des modules <b>gratuits</b> d’initiation à la vie citoyenne dans le cadre du programme local de Cohésion sociale de la commune de Molenbeek-St-Jean.
          </br></br>L’ensemble de nos animateurs a participé à la formation de formateurs à la citoyenneté au <a href="http://www.cbai.be/ target="_blank"">Centre Bruxellois d’Action Interculturelle (CBAI)</a>.</p>
        </div>
      </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
       <img src="assets/img/image-vici-1.png" class="img-fluid mx-auto d-block" alt="Responsive image">
     </div>
     <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
       <img src="assets/img/image-vici-2.png" class="img-fluid mx-auto d-block" alt="Responsive image">
     </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <img src="assets/img/image-vici-3.jpg" class="img-fluid mx-auto d-block" alt="Responsive image">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <img src="assets/img/image-vici-5.png" class="img-fluid mx-auto d-block proImgTop2" alt="Responsive image">
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
      <img src="assets/img/image-vici-4.png" class="img-fluid mx-auto d-block" alt="Responsive image">
    </div>
  </div>
<!-- to hidden --------------------------->
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/cohesion-sociale/" class="whiteFont" target="_blank">La cohésion sociale, c'est quoi ?</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/listes-des-associations/" class="whiteFont" target="_blank">Liste d'associations en citoyenneté.</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/seances-dinformation/" class="whiteFont" target="_blank">Séances d'information.</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/partenaires/" class="whiteFont" target="_blank">Nos partenaires.</a>
      </div>
      <div class="alert blueBackGrad" role="alert">
        <a href="https://solidarite-savoir.be/ressources/" class="whiteFont" target="_blank">Quelques ressources.</a>
      </div>
    </div>
  </div>
</div>

<?php

require __DIR__.'/templates/footer.php';

?>
