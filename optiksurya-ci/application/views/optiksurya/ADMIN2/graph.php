<?php
	$dataPoints = array(
			array("label" => "Education", "y" => 284935),
			array("label" => "Entertainment", "y" => 256584),
			array("label" => "Business", "y" => 233464),
			array("label" => "Music & Audio", "y" => 200285),
			array("label" => "Personalization", "y" => 194422),
			array("label" => "Tools", "y" => 180337),
			array("label" => "Books & References", "y" => 172340),
			array("label" => "Travel & Local", "y" => 118187),
			array("label" => "Puzzle", "y" => 107530)
	);
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
	window.onload = function(){
		var chart = new CanvasJS.Chart("chartContainer",{
			animationEnabled: true,
			theme: "light2",
			//"light1", "light2", "dark1", "dark2"
			title:{
				text: "Top 10 Google Play Categories - till 2019"
			},
			axisY: {
				title: "Number of Apps",
				includeZero: false
			},
			data: [{
				type: "column",
				dataPoints:<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK);?>
				}]
		});
			chart.render();
		}		
	</script>
</head>
<body>
	<div id="chartContainer" style= "height: 370px; width: 100%">
	<script src="assets/canvasjs-2.3.2/canvasjs.min.js"></script>
	</div>
</body>
</html>
