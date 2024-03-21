<?php
include("index.php");
$user = $_GET['cur_user'];
$id_mody = $_GET['id_client'];
$result = mysqli_query($conn,"SELECT * FROM users where login = '$user'");
while($res = mysqli_fetch_array($result)){
$resName = $res['nom'];
}

if (!$user) {
  header("Location: login.php");
  exit; 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Side Menu Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style >
   @import url('./nav_effects.css');
 
  </style>
</head>
<body>

<div class="navbar" style="justify-content: flex-end;">
  <div class="toggle-btn" onclick="toggleSidebar()">
    <i class="fa fa-bars fa-2x"></i>
  </div>
  
 
  <!-- Dropdown integration -->
  <div class="dropdown">
    <div class="user-circle" onclick="toggleDropdown()">
      <img src="user.jpg" alt="User Image">
      <div class="user-name">John Doe</div>
      
    </div>
    <div class="dropdown-content" id="dropdownContent">
      <a href="#">Profile</a>
      <a href="#" onclick="window.location.href ='login.php'">Logout</a>
      <a href="#">Help</a>
    </div>
  </div>
</div>

<div class="sidebar-container">
  <div class="sidebar sidebar-hidden">
    <div class="menu_section">
        
      <h3>General</h3>
      <ul class="nav side-menu">
        <li>
          <a>
            <i class="fa fa-bar-chart-o"></i> Tableau de bord <span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="index.php">TB</a></li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-user"></i> BDD Etudiant <span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="editer_etudiant.php">Info étudiant</a></li>
            <li><a href="bddetudiant_demande.php">Attestations</a></li>
            <li><a href="bddetudiant_abscence.php">Abscence</a></li>
            <li><a href="seminaire.php">Seminaires</a></li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-check-square-o"></i> Cursus Etudiant<span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="note.php">Notes</a></li>
            <li><a href="matiere_reporte.php">Matiere Reporte</a></li>
            <li><a href="plan_cour.php">Calendrier cour</a></li>
            <li><a href="calendrier_exam.php">Calendrier Exam</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="menu_section">
      <h3>Stages</h3>
      <ul class="nav side-menu">
        <li>
          <a>
            <i class="fa fa-building"></i> Stage Processus <span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="global.html">Statut Stages</a></li>
          </ul>
        </li>
        <li>
          <a>
            <i class="fa fa-graduation-cap"></i> PFE & Diplome <span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="endadrant_pfe.php">Encadrant</a></li>
            <li><a href="suivi_pfe.php">Suivi PFE</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="content">
<?php
$_GET['user'] = $user ;
$_GET['id_client'] = $id_mody;
 include('modification_client.php'); ?>
</div>

<script>

function toggleDropdown() {
  var dropdownContent = document.getElementById('dropdownContent');
  dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
}

// Close dropdown when clicking outside
window.onclick = function(event) {
  var dropdownContent = document.getElementById('dropdownContent');
  if (event.target.closest('.dropdown') === null && dropdownContent.style.display === 'block') {
    dropdownContent.style.display = 'none';
  }
}

  function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var content = document.querySelector('.content');
    var toggleBtn = document.querySelector('.toggle-btn');

    sidebar.classList.toggle('sidebar-hidden');
    if (sidebar.classList.contains('sidebar-hidden')) {
      content.style.maxWidth = '100%';
      content.style.marginLeft = '0';
      toggleBtn.style.left = '20px';
    } else {
      content.style.maxWidth = 'calc(100% - ' + sidebar.offsetWidth + 'px)';
      content.style.marginLeft = sidebar.offsetWidth + 'px';
      toggleBtn.style.left = (sidebar.offsetWidth + 20) + 'px';
    }
  }

  function toggleChildMenu(event) {
    event.preventDefault();
    var parentMenuItem = event.target.closest('.nav > li');
    var childMenu = parentMenuItem.querySelector('.nav.child_menu');

    childMenu.classList.toggle('open');

    if (childMenu.classList.contains('open')) {
      childMenu.style.display = 'block';
      setTimeout(function() {
        childMenu.style.height = childMenu.scrollHeight + 'px';
      }, 10);
    } else {
      childMenu.style.height = childMenu.scrollHeight + 'px';
      setTimeout(function() {
        childMenu.style.height = '0';
      }, 10);
    }
  }

  var parentMenuItems = document.querySelectorAll('.nav.side-menu > li > a');
  parentMenuItems.forEach(function(item) {
    item.addEventListener('click', toggleChildMenu);
  });
</script>
</body>
</html>


