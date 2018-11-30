$(document).ready(function(){
	$.ajax({
		url: "data2.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var cid = [];
			var amount = [];

			for(var i in data) {
				cid.push(data[i].CID);
				amount.push(data[i].TOTAL);
			}

			var chartdata = {
				labels: cid,
				datasets : [
					{
						label: 'AMOUNT SPENT',
						backgroundColor: ['orange','blue','green','yellow','red','teal','pink'],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'teal',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: amount
					}
				]
			};

			var ctx = $("#mycanvas2");

			var barGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata,
				/*options: {
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
				}*/
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
