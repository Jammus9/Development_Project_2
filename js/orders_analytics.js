$(document).ready(function(){
	var date = ('0' + (new Date().getDate())).slice(-2) + '-' + ('0' + (new Date().getMonth()+1)).slice(-2) + '-' + new Date().getFullYear();
	console.log(date);
	$.ajax({
		url: "./includes/analytic_orders_data.php",
		method: "GET",
		dataType: 'json',
		success: function(data) {
			var productNameDay = [];
			var sumDay = [];
			var productNameMonth = [];
			var sumMonth = [];
			var productNameYear = [];
			var sumYear = [];

			for(var i in data) {
				if(data[i].date == date){
					productNameDay.push(data[i].productName);
					sumDay.push(data[i].sum);
				}
			}
		
			for(var i in data) {
				if(parseInt((data[i].date).split('-')[1]) <= parseInt(date.split('-')[1])+1 && (data[i].date).split('-')[2] == date.split('-')[2]){
					productNameMonth.push(data[i].productName);
					sumMonth.push(data[i].sum);
				}
			}
			
			for(var i in data) {
				if(parseInt((data[i].date).split('-')[2]) <= parseInt(date.split('-')[2])+1){
					productNameYear.push(data[i].productName);
					sumYear.push(data[i].sum);
				}
			}

			var chartdataDay = {
				labels: productNameDay,
				datasets : [
					{
						label: 'Sum',
						backgroundColor: 'rgba(2,117,216,1)',
						borderColor: 'rgba(2,117,216,1)',
						data: sumDay
					}
				]
			};
			
			var chartdataMonth = {
				labels: productNameMonth,
				datasets : [
					{
						label: 'Sum',
						backgroundColor: 'rgba(2,117,216,1)',
						borderColor: 'rgba(2,117,216,1)',
						data: sumMonth
					}
				]
			};
			
			var chartdataYear = {
				labels: productNameYear,
				datasets : [
					{
						label: 'Sum',
						backgroundColor: 'rgba(2,117,216,1)',
						borderColor: 'rgba(2,117,216,1)',
						data: sumYear
					}
				]
			};

			new Chart($("#myBarChartDay"), {
				type: 'bar',
				data: chartdataDay,
				options: {
					scales: {
						xAxes: [{
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 6
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								stepSize: 1
							},
							gridLines: {
								display: true
							}
						}],
					},
						legend: {
							display: false
						}
					}
			});
			
			new Chart($("#myBarChartMonth"), {
				type: 'bar',
				data: chartdataMonth,
				options: {
					scales: {
						xAxes: [{
							gridLines: {
								display: false
							},
							ticks: {
								min: 30
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								stepSize: 10
							},
							gridLines: {
								display: true
							}
						}],
					},
						legend: {
							display: false
						}
					}
			});
			
			new Chart($("#myBarChartYear"), {
				type: 'bar',
				data: chartdataYear,
				options: {
					scales: {
						xAxes: [{
							gridLines: {
								display: false
							},
							ticks: {
								min: 365
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								stepSize: 50
							},
							gridLines: {
								display: true
							}
						}],
					},
						legend: {
							display: false
						}
					}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});