<!DOCTYPE Html>
<html>

<head>
	<meta charset="UTF-8">
	<title>База данных - Лаб 9 </title>
	<style type="text/css">
		TABLE {
			width: 300px;
			border-collapse: collapse;
		}

		TD,
		TH {
			padding: 3px;
			border: 1px solid black;
		}

		TH {
			background: #b0e0e6;
		}

		.controls {
			display: flex;
			flex-direction: row;
		}

		.controls>* {
			margin: 6px;
		}
		.controls>a {
			text-decoration: none;
			background-color: #b0e0e6;
			padding: 2px;
			color: black;
			border: 1px solid black;
			border-radius: 5px;
		}
	</style>
</head>

<body>
	<?php include_once("./table.php"); ?>
	<?php include_once("./controls.php"); ?>
</body>

</html>