<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script src="Chart.bundle.js"></script>
	<script src="utils.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:40%">
		<canvas id="chart-area"></canvas>
	</div>

	<script>
		
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						25,
						25,
						25,
						25,
						
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
					
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

	


	</script>
</body>

</html>
