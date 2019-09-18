<?php
require_once('bdd.php');
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

session_start();

$id=$_SESSION['id'];
$_SESSION['id']=$id;
$chemin=$_SESSION['photo'];
$_SESSION['photo']=$chemin;

$_SESSION['type_user']="enseignant";

$req = $db->prepare('SELECT projets FROM ens1 WHERE  id = :id  ');
$req->execute(array(
    'id' => $id
    ));
$resultat = $req->fetch();

$sep = explode('.', $resultat[0]);
$len=count($sep);

$r=0;

for ($i = 0; $i<$len; $i++)
{
  $id_projet=(int)$sep[$i];

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




}
$datetime = date("Y-m-d H:i:s");
$events[$r]['id']=700;
$events[$r]['title']="aujourd hui";
$events[$r]['start']=$datetime;
$events[$r]['end']=$datetime;
$events[$r]['color']="#40E0D0";

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

              	  <p class="centered"><a href="profil.php"><img width="80" height="80" class="img-circle" style="border-radius:50% "   src=<?php echo $chemin ?> ></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></h5>

                   <li class="mt">
                                <a href="compte.php">
                                    <i class="fa fa-home"></i>
                                    <span>Acceuil</span>
                                </a>
                              </li>
                            <li class="sub-menu">
                                <a href="pageAjout_Projet.php?insere=0" >
                                    <i class="fa fa-plus-square-o"></i>
                                    <span>Ajouter un projet</span>
                                </a>
                              </li>
                              <li class="sub-menu">

                                    <a  href="#" onclick="changer()">
                                      <i class="fa fa-trash"></i>
                                      <span >Supprimer un projet</span>
                                  </a>
                              </li>
                               <li class="sub-menu">

                                  <a  href="page_agenda_ens.php" id="active" >
                                    <i class="fa fa-calendar"></i>
                                    <span >Mon agenda</span>
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
              <div class="external-event label label-success">Utilisez du vert pour le dépôt d'un livrable</div>
              <div class="external-event label label-warning">Utilisez du orange pour indiquer une simple réunion</div>
              <div class="external-event label label-danger">Utilisez du rouge pour indiquer une réunion urgente</div>

              <div class="external-event label label-info">Utilisez du bleu pour tout les autres évenements .</div>

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
					  <input type="text" name="start" class="form-control" id="start" >
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
              @copyright projet 4 équipe 23
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

			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {

				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

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

		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}

			id =  event.id;

			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;

			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Sauvegardé !');
					}else{
						alert('Erreur , essayez encore !');
					}
				}
			});
		}

	});

</script>

</body>

</html>
