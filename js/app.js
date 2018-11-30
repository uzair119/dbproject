$(document).ready(function(){
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var item = [];
			var quantity = [];

			for(var i in data) {
				item.push(data[i].PCODE);
				quantity.push(data[i].QUANTITY);
			}

			var chartdata = {
				labels: item,
				datasets : [
					{
						label: 'QUANTITY',
						backgroundColor: 'orange',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'teal',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: quantity
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
  					scales: {
    					yAxes: [{
      						scaleLabel: {
        						display: true,
        						labelString: 'QUANTITY SOLD'
      						}
    					}],
    					xAxes: [{
    						scaleLabel: {
        						display: true,
        						labelString: 'ITEMS SOLD'
      						}
    					}]
  					}     
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
