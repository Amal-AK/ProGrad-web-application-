<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Page d'aide</title>
  
    
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min1.css">
    <link rel="stylesheet" href="../css/style_help.css">
    <link rel="stylesheet" href="../css/responsive_help.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="../css/bootstrap1.css" rel="stylesheet">
  

   
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
   
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="../img/logoo1.png" alt="Logo" width="110" height="40" style="margin-left: 70px ;"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="scrollspy"><a href="index.php">Acceuil</a></li>
			   
                    <li class=" active"><a href="#">Aide</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Questions-Area -->
    <section id="questions_page" class="questions-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">BIENVENU</h5>
                        <h4 class="dark-color"> Choisissez l'aide qui vous correspond</h4>
                        <a href="HelpEtudiant.php" class="bttn-default">Etudiant</a>
                        <a href="HelpEns.php" class="bttn-default">Enseignant</a>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="toggole-boxs">
                        <h3> Comment gérer les projets?</h3>
                        <div>
                            <p>Vous pouvez ajouter un projet en cliquant sur : 
                            	<button type="button" class="btn btn-default btn-xs">Ajouter un projet</button> dans la page de compte .
                           </p>
                          <p> Puis lui définir un planning lors d'ajout d'un projet en cliquant sur: 
                             <button type="button" class="btn btn-default btn-xs">Continuer</button>
                              
                          </p>
                          <p>Vous pouvez modifier une phase du planning en glissant la souris sur la phase et cliquer sur le button: 
                                <button type="button" class="btn btn-default btn-xs"><i class='fa fa-pencil'> </i></button> 
                          </p>
                        </div>
                        <h3>Comment gérer les livrables? </h3>
                        <div>
                           <p>Pour consulter un livrable cliquez sur "livrable à remettre " dans la page du projet :  
                                
                          </p>
                          
                          <p>Pour déposer un livrable cliquez sur:  
                                <button type="button" class="btn btn-default btn-xs">Déposer mon livrable</button>
                          </p>
                           
                          <p>Pour télécharger un livrable cliquez sur le lien de telchargement dans la page du livrable :  
                                <button type="button" class="btn btn-default btn-xs">Télécharger livrable</button>
                          </p>
                        
                        </div>
                        <h3 id="hh3">Comment consulter les diagrammes/historique? </h3>
                        <div>
                            <p> Pour consulter les diagrammes en cliquez sur: 
                                 <button type="button" class="btn btn-default btn-xs">Voir l'avancement</button>
                            </p>
                          
                          <p>  Vous pouvez consulter l'historique en cliquant sur:
                                 <button type="button" class="btn btn-default btn-xs">Historique du projet</button>
                          </p>
                        </div>
                       
                       <h3>Comment Ajouter des encadreurs/étudiants au projet? </h3>
                        <div>
                            <p> Vous ajouter un encadreur cliquez sur : 
                                 <button type="button" class="btn btn-default btn-xs">Ajouter co-encadreur</button>
                            </p>
                          <p> Pour ajouter un étudiant cliquez sur:  
                                 <button type="button" class="btn btn-default btn-xs">Ajouter un étdudiant</button>
                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="space-20 hidden visible-xs"></div>
                    <div class="toggole-boxs">
                        <h3>Comment gérer les réunions? </h3>
                        <div>
                            <p> Pour programmer une réunion cliquez dans la page du projet , la colonne des réunions sur: 
                                 <button type="button" class="btn btn-default btn-xs">  <i class="fa fa-plus-circle " ></i></button>
                            </p>
                          <p> Pour modifier une réunion allez dans l'agenda:  
                                 
                          </p>
                          <p>Pour supprimer une réunion double clic sur la réunion dans l'agenda puis cliquez sur :  
                                 <button type="button" class="btn btn-default btn-xs">Supprimer l'évènement</button>
                          </p>
                        </div>
                        
                           <h3>Comment modifier le mot de passe? </h3>
                        <div>
                            <p> Pour modifier votre mot de passe allez dans le profil puis cliquez sur  <button type="button" class="btn btn-default btn-xs">Modifier profil</button> 
                            </p>
                          <p> Puis modifier le mot de passe à travers le form et cliquez sur :  
                                 <button type="button" class="btn btn-default btn-xs">Enregistrer</button>
                          </p>
                        </div>
                        <h3>Comment consulter mon agenda? </h3>
                        <div>
                        <p> Vous pouvez consulter l'agenda en cliquant sur:  
                                 <button type="button" class="btn btn-default btn-xs">Mon agenda</button>
                          </p>
                       </div>
                        <h3>Comment me déconnecter de mon compte? </h3>
                        <div>
                            <p> Pour vous déconnectez cliquer sur: 
                                 <button type="button" class="btn btn-default btn-xs">Déconnexion</button>
                            </p> 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!--Questions-Area-End -->
     <script src="../vendor/jquery-1.12.4.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script>
    <script src="../vendor/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/scrollUp.min.js"></script>
    <script src="../js/main_help.js"></script>
</body>

</html>
