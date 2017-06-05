<!DOCTYPE html>
<html>
<head>
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./resources/css/stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Sets title based on controller value   -->
	<title><?php echo $controller; ?></title>
</head>
<body>
 	<nav>
 		<div class="nav-wrapper">
 			<ul class="right">
 				<li><a href="/etailinsights">View Logs</a></li>
 			</ul>
 		</div>
 	</nav>

 	<div>
        <!--controls what is loaded into this div-->
 	    <?php require_once("route.php") ?>
 	</div>

   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script type="text/javascript" src="./resources/js/chartview.js"></script>
   <script type="text/javascript" src="./resources/js/detail.js"></script>
   <script type="text/javascript" src="./resources/js/ipsearch.js"></script>

</body>


