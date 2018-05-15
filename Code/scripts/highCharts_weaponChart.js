//weapon chart using highschart class


//sm update bar graph
function hs_updateBarGraph(Data, bCType){
	console.log("In hs_updateBarGraph - data is");
	console.log(Data);
	
	if(bCType=="districtBC"){
		console.log(Data[0]);
		console.log("In chart file - initiate district");
		
		Highcharts.chart('chart_highChart', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Crimes By District'
  },
  subtitle: {
    //text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
  },
  xAxis: {
  	categories: ['Northern', 'Southern', 'Eastern', 'Western', 'Central', 'N. Eastern', 'N. Western', 'S. Eastern', 'S. Western'],
    //categories: ['Northern', 'Southern', 'Eastern', 'Western'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Number of Incidents',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' Crimes'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Year 2012',
    data: Data[0]
  }, {
    name: 'Year 2013',
    data: Data[1]
  }, {
    name: 'Year 2014',
    data: Data[2]
  }, {
    name: 'Year 2015',
    data: Data[3]
  },
  
  {
    name: 'Year 2016',
    data: Data[4]
  },
  {
    name: 'Year 2017',
    data: Data[5]
  },
  {
    name: 'Year 2018',
    data: Data[6]
  }]
});
	}
	
	
	else if(bCType=="weaponBC"){
		
		Highcharts.chart('chart_highChart', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Crimes with Weapons'
  },
  subtitle: {
    //text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
  },
  xAxis: {
    categories: ['Firearm', 'Hands', 'Knife', 'Other', 'No Weapon'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Number of Incidents',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' Crimes'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Year 2012',
    data: Data[0]
  }, {
    name: 'Year 2013',
    data: Data[1]
  }, {
    name: 'Year 2014',
    data: Data[2]
  }, {
    name: 'Year 2015',
    data: Data[3]
  },
  {
    name: 'Year 2016',
    data: Data[4]
  },
  {
    name: 'Year 2017',
    data: [0, 0, 0, 0, 0]
  },
  {
    name: 'Year 2018',
    data: [0, 0, 0, 0, 0]
  }]
});

	}//ends if 
	
	
	
}