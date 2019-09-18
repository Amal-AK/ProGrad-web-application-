<?php


require_once('bdd.php');
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();
$id=$_SESSION['id'];

$chemin=$_SESSION['photo'];
$_SESSION['photo']=$chemin;

$_SESSION['type_user']="etudiant";
$req = $db->prepare('SELECT pfe,master FROM etud WHERE  id = :id  ');
$req->execute(array(
    'id' => $id
    ));
$resultat = $req->fetch();
$r=0;
for ($i = 0; $i<2; $i++)
{
  $id_projet=$resultat[$i];
  $req = $bdd->prepare('SELECT id, title, start, end, color FROM events WHERE  id_projet = :id  ');
  $req->execute(array(
      'id' =>  $id_projet
      ));
  $resultat1 = $req->fetchAll();
  $long=sizeof($resultat1);
  for ($j = 0; $j<$long; $j++)
  {

    $events[$r]['id']=$resultat1[$j]['id'];
    $events[$r]['title']=$resultat1[$j]['title'];
    $events[$r]['start']=$resultat1[$j]['start'];
    $events[$r]['end']=$resultat1[$j]['end'];
    $events[$r]['color']=$resultat1[$j]['color'];
   $r++;
 }

 $datetime = date("Y-m-d H:i:s");
 $events[$r]['id']=700;
 $events[$r]['title']="aujourd hui";
 $events[$r]['start']=$datetime;
 $events[$r]['end']=$datetime;
 $events[$r]['color']="#40E0D0";



}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon calendrier</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- FullCalendar -->
	<link href='../css/fullcalendar.css' rel='stylesheet' />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="../css/calendrier.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <style>

	#calendar {
		max-width: 900px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" ></div>
              </div>
            <!--logo start-->
          <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php">Déconnexion</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profil.php"><img height="80" src=<?php echo $chemin ?> width="80" style="border-radius:50% "  class="img-circle"></a></p>
              	  <h5 class="centered">Nom Et Prenom</h5>

                      <li class="mt">
                    <a href="compte.php">
                        <i class="fa fa-home"></i>
                        <span>Aceuil</span>
                    </a>
                  </li>
                    <li >
                    <a href="#"  id="active" >
                        <i class="fa fa-calendar"></i>
                        <span>Consulter l'agenda</span>
                    </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Mon calendrier </h3>
              <!-- page start-->
              <div class="row mt">
              	<aside class="col-lg-3 mt">
            <h4><i class="fa fa-angle-right"></i> Remarques importantes:</h4>
            <div id="external-events">
              <div class="external-event label label-success">Le vert indique le dépôt d'un livrable</div>
              <div class="external-event label label-warning">L'orange indique une simple réunion</div>
              <div class="external-event label label-danger">Le rouge indique une réunion urgente</div>

              <div class="external-event label label-info">Le bleu indique tout autre évenement .</div>

            </div>
          </aside>

                  <aside class="col-lg-9 mt">

                      <section class="panel">
                          <div class="panel-body">

                              <div id="calendar" class="col-centered"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ajouter un évement</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titre</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choix</option>

						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquois</option>
						  <option style="color:#008000;" value="#008000">&#9724; Vert</option>

						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>


						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label"> Date de début</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Date de fin</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary">Sauvegarder</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
			<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modifier cet évenement</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titre</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choix</option>

						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquois</option>
						  <option style="color:#008000;" value="#008000">&#9724; Vert</option>

						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>


						</select>
					</div>
				  </div>
				    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Supprimer cet événement</label>
						  </div>
						</div>
					</div>

				  <input type="hidden" name="id" class="form-control" id="id">


			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary">Sauvegarder</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

              <!-- page end-->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              copyright 
              <a href="calendar.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>












    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='../js/moment.min.js'></script>
	<script src='../js/fullcalendar.min.js'></script>

	<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},






			events: [
			<?php foreach($events as $event):

				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});



	});

</script>

</body>

</html>
