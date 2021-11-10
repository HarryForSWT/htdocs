<!DOCTYPE html>
<html lang="zxx">
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title> Aufgabe 1 </title>
	<meta name="description" content="PHP is disgusting ">
	<meta name="author" content="Daniel Perezamador">
	<meta name="keywords" content="HTML, CSS, JavaScript">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/reset.css">

	<link rel="stylesheet" href="../css/styles.css">
	<meta property="og:title" content="Aufabe 1 ">
	<meta property="og:type" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
</head>

<body>


	<header class="header">

		<nav id="hamnav">
			<img class="logo" src="../res/world_data-logo.svg" alt="World data logo">

			<div id="navItems">


				<!-- [THE HAMBURGER] -->
				<label for="hamburger">
					<i class="fa fa-bars"></i>
				</label>
				<input type="checkbox" id="hamburger" />

				<!-- [MENU ITEMS] -->
				<ul id="hamitems">
				<a><i class="fa fa-bars"></i> A1 - Table </a>

					<a href="./parse.php"><i class="fa fa-bars"></i> A2 - Parse </a>
					<a href="./save.php"><i class="fa fa-bars"></i> A2 - Save </a>
					<a href="./print.php"><i class="fa fa-bars"></i> A2 - Print </a>
					<a><i class="fa fa-bars"></i> A3 - REST </a>
					<a><i class="fa fa-bars"></i> A4 - Vis </a>
					<a><i class="fa fa-bars"></i> A5 - 3D </a>

				</ul>

			</div>
		</nav>
	</header>




	<h1 style="margin-top: 20px;margin-bottom: 10px;padding: 10px;">World Data Overview ...</h1>
	<article class="bottomonly">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque sapien vel urna rutrum auctor. Aliquam suscipit augue dui, sed porta justo accumsan a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
		Duis eget posuere est, quis egestas est. Donec a lectus nec erat tincidunt dictum. Sed id est facilisis, vestibulum augue vel, dapibus libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam maximus,
		massa ac bibendum interdum, leo nisi vulputate nunc, ut lacinia nibh dui at erat. Donec erat arcu, scelerisque at bibendum mattis, faucibus sit amet est. Nam rutrum ac risus ac iaculis. Quisque congue risus facilisis, eleifend urna vitae, sagittis
		diam. Vivamus bibendum felis urna, ut porta felis elementum id. Integer mattis nulla ligula, id consectetur dolor fermentum scelerisque. Nam mi justo, placerat sed lacus a, consectetur euismod justo. Sed sed ligula et lacus dapibus vulputate.
		Nullam commodo malesuada dui. Curabitur tincidunt diam nec mi commodo, eu posuere sem pulvinar. Morbi nec metus id eros suscipit vestibulum non sit amet sapien. Curabitur sodales cursus tellus in vulputate. Praesent tempor, orci vitae fringilla
		consequat, velit purus auctor purus, eget tempus lorem ligula id leo. Fusce accumsan nibh ut nunc mattis, sed aliquet enim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi aliquam, libero
		in maximus bibendum, leo sapien pulvinar erat, vel elementum nunc metus nec lorem. Nullam viverra mauris nunc, id finibus velit tempus id. Pellentesque feugiat ante non porta eleifend. Sed ac augue erat. Nulla mattis massa vel turpis varius consequat.
		Quisque ut mattis lectus. Nulla rhoncus orci mollis, dictum nunc ultrices, scelerisque orci. Sed volutpat, nulla et tempor mollis, purus ante consectetur metus, sed rhoncus orci ex eget arcu. Nam id sagittis dolor, ac eleifend risus. Vivamus imperdiet
		metus sit amet odio vulputate, nec iaculis justo ultrices. Praesent gravida dui ante, vel suscipit neque sagittis a. Nullam a leo consequat ipsum pretium pretium. Nulla ac lobortis elit, ac fringilla risus. Sed eget sapien ornare, venenatis arcu
		vitae, faucibus lorem. Donec enim magna, finibus et sodales vitae, placerat at enim. Nullam convallis orci sit amet cursus commodo. Sed non tristique dui. Nunc id rutrum dui. Pellentesque habitant morbi tristique senectus et netus et malesuada
		fames ac turpis egestas. Etiam eu risus vitae nunc venenatis suscipit vitae non felis. Nulla et sapien ante. Vivamus magna enim, pretium sed enim sit amet, hendrerit pharetra leo. Suspendisse potenti. Praesent bibendum quis justo vitae volutpat.
		Nam a enim metus. Etiam et efficitur risus. Vivamus quis auctor dui. Nullam nec arcu in odio elementum euismod. Maecenas efficitur facilisis enim posuere posuere. Quisque malesuada volutpat molestie. Suspendisse vitae finibus tellus. Maecenas
		mollis tortor sed mauris congue, eget ornare urna convallis. Nunc consectetur egestas tincidunt. Mauris varius mattis mauris, vel finibus orci. Sed a massa nec sem feugiat bibendum consequat eget justo. Nunc at erat dolor.
		<a style="color: green;">https://www.lipsum.com/</a>

	</article>


	<div style="overflow-x:auto; padding: 20px">
		<div style="padding-top: 20px;">
			<p> Show/Hide
				<a class="Toggler"><u>birth rate per 1000</u></a> |
				<a class="Toggler"><u>cell phones per 100</u></a> |
				<a class="Toggler"><u>children per woman</u></a> |
				<a class="Toggler"><u>electricity consumption per capita</u></a> |
				<a class="Toggler"><u>internet user per 100</u></a> |
			</p>
			<table id="myTable"></table>
		</div>
	</div>





	<?php
	require 'world_data_parser.php';

	$wdp = new WorldDataParser;
	$csv = $wdp->parseCSV("../res/world_data_v1.csv");

	$resultSave = $wdp->saveXML($csv);

	if ($resultSave === true) {
		echo ($wdp->printXML("./world_data.xml", "./world_data_xsl.xsl"));
	}


	?>


	<footer>
		<p>Daniel Perezamador</p>
		<p><a href="mailto:daniel.perezamador@mailbox.tu-dresden.de">daniel.perezamador@mailbox.tu-dresden.de</a></p>
	</footer>
	<script src="../util.js"></script>
</body>

</html>