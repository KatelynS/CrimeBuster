<?PHP
//index.php - main page for crime buster. This controps the application and connects to all other files


//initiate db setup
$db = new SQLite3('db/mydb.db');
$results = $db->query("SELECT * FROM mydb");

$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9]." ". $row[16]);
	
}

//get user info base on authenticated system
include "sso/UMBCUtils.php";

   $shibArr=UMBCUtils::getShibbolethInfo();

   $reqFirstName = $shibArr['FirstName'];
   $reqLastName = $shibArr['LastName'];
   $reqEmail = $shibArr['Email'];
   $reqCampusID = $shibArr['CampusID'];
   $reqUserName=$shibArr['UserName'];
   $reqAffiliation=$shibArr['Affiliation'];
   $reqRTEmail=$shibArr['RTEmail'];



?>

<!DOCTYPE html >
<html>
<title>CrimeBuster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- styles are here -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="styles/style2.css" rel="stylesheet" type="text/css">

<!--additional scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyBxevA7di7Avo5vGKAgPPSkJa8ud4gnI&callback=initMap"></script>

<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<!-- scripts for highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- scripts for dataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	
	//set authenticated user name base on sso info
	function getAuthenticatedUsername(){
		var userName = <?php echo json_encode($reqFirstName) ?>;
		document.getElementById('authenticatedUsername').innerHTML=userName;
		
	}

//set up page and selection base on load
$(document).ready(function() {
	
    document.getElementById("crime_type").checked = true;
    document.getElementById("weapon_type").checked = true;
    document.getElementById("district").checked = true;
    document.getElementById("location_Premise").checked = true;
    document.getElementById("I_O").checked = true;
    
    updateSideBar("crime_type");
    updateSideBar("weapon_type");
    updateSideBar("district");
    updateSideBar("location_Premise");
    updateSideBar("I_O");
    
    getAuthenticatedUsername();
    
} ); 



//setting up table on load
$(document).ready(function() {
	
    $("#table_id").dataTable().fnDestroy();
    $('#table_id').dataTable( {
        
        ajax:({
        	url: 'db/getTableStartData.php',
        	type: 'POST',
        	
        	}),
        	"scrollX": true
        	
    } );
    

}); 	//close function
	



//KS - code for inittializing map
var markers = [];
var map;
var markerCluster = null;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 11,
		center: {lat: 39.2904, lng: -76.6122}
	});
}


/*
//get location on a Map
function getLocations(){
	
	var myLocations = new Array();
	var ar = <?php echo json_encode($myArray) ?>;
	
	for(var i = 0; i < ar.length; i++)
	{
		var loc = ar[i].split(" ");
		var lat = parseFloat(loc[0]);
		var lng = parseFloat(loc[1]);
		myLocations.push({lat: lat, lng: lng});
	}
	
	console.log(myLocations);
	return myLocations;
}
*/

//KS update map - update map with locations
function updateMap(crimes, myMarkers) {
	// Create tooltip that will appear when marker is clicked
	initMap();
	var info = new google.maps.InfoWindow();
	markers = myMarkers;
	
	var locs = new Array();
	var tips = new Array();
	var dot = new Array();
	for(var i = 0; i < crimes.length; i++)
	{
		//console.log(crimes[i]);
		
		var loc = crimes[i].split(",");
		var lat = parseFloat(loc[0]);
		var lng = parseFloat(loc[1]);
		var crime = loc[2];
		var time = loc[3];
		var date = loc[4].substring(0, 10);
		var crimeID = loc[0]+':'+loc[1];
		
		//adding images / color per crime
		switch (crime) {
			case "AGG. ASSAULT":
				// console.log("Agg. Assault");
				 dot.push("images/black.png");
			break;
			case "ARSON":
				 dot.push("images/orange.png");
			break;
			case "ASSAULT BY THREAT":
				 dot.push("images/white.png");
			break;
			case "AUTO THEFT":
				 dot.push("images/yellow.png");
			break;
			case "BURGLARY":
				 dot.push("images/blue.png");
			break;
			case "COMMON ASSAULT":
				 dot.push("images/gray.png");
			break;
			case "HOMICIDE":
				 dot.push("images/red.png");
			break;
			case "LARCENY":
				 dot.push("images/pink.png");
			break;
			case "LARCENY FROM AUTO":
				 dot.push("images/magenta.png");
			break;
			case "RAPE":
				 dot.push("images/brown.png");
			break;
			case "ROBBERY - STREET":
				 dot.push("images/lime.png");
			break;
			case "ROBBERY - CARJACKING":
				 dot.push("images/green.png");
			break;
			case "ROBBERY - COMMERCIAL":
				 dot.push("images/teal.png");
			break;
			case "ROBBERY - RESIDENCE":
				 dot.push("images/cyan.png");
			break;
			case "SHOOTING":
				 dot.push("images/purple.png");
			break;
			default:
				dot.push("images/null.png");
		}
		locs.push({lat: lat, lng: lng});
		tips.push('<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<h1 id="firstHeading" class="firstHeading">'+crime+'</h1>'+
			'<div id="bodyContent">'+
			'<p>'+crime+' was commited here at '+time+' on '+date+'.</p>'+
			'<p>for full entry, click <a target="_blank" href="https://data.baltimorecity.gov/Public-Safety/BPD-Part-1-Victim-Based-Crime-Data/wsfq-mvij/data">'+
			'here</a></p> '+
			'<p><button onclick="addComment()">Add comment</button>' +
			'<button onclick="viewComments()">View comments</button></p>' +
			'</div>'+
			'</div>');

	}
	markers = locs.map(function(loc, i) {
		var marker = new google.maps.Marker({
			position: loc,
			map: map,
			icon: dot[i]
			});
		marker.addListener('click', function() {
			info.setContent(tips[i]);
			info.open(map, marker);
		});
		return marker
		});
	// Add a marker clusterer to manage the markers.
	updateMarkers("cluster");
}

//update Map markers
function updateMarkers(clicked_id){
	//check to see if button is clicked
	//if clicked, display clusters,
	//if not, do not cluster
	if(document.getElementById(clicked_id).checked){
		markerCluster = new MarkerClusterer(map, markers,
		{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

	}else{
		var mrks = markerCluster.getMarkers();
		markerCluster.clearMarkers();
		//put mrks back on map
		for(var i = 0; i < mrks.length; i++){
			mrks[i].setMap(map);
		}
	}
}

//KS--add in code - to be implemented - add comments to db
function addComment() {
   var wt_userID = 12345;
    //ID = get max ID from existing comments
    var wt_commentsID = 11111;
    var wt_crimeID = "heythere";
    var wt_actualComment = prompt("Enter comment:", "");
    if (wt_actualComment != null && wt_actualComment != "") {
        //<user> added comment to <crime entry>
        $.ajax({
		    url:"db/insertComment.php",
		    data: {wt_commentsID1: wt_commentsID, wt_crimeID1: wt_crimeID, wt_userID1: wt_userID, 
		    	wt_actualComment1: wt_actualComment},
		    type:"POST",
		    success:function(msg){
		    	console.log("should return here for comment insert");
		    	console.log(msg);
		    	//var bCType = "crimeBC";
		        //handleResponseBChart(msg, "weaponBC");
		    },
		    /*failure:function(msg2){
		    		console.log("did not work");
		    }*/
		    dataType:"json"
			});
    console.log(wt_actualComment);
    }
    
}

//KS--load comments
function viewComments() {
	//load comments and jump to comment section
	$('#tablePanel').goTo();
}

//SM
// Accepts a Date object or date string that is recognized by the Date.parse() method
function getDayOfWeek(date) {
var dayOfWeek = new Date(date).getDay(); 
return isNaN(dayOfWeek) ? null : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][dayOfWeek];
}

//creates time series viz
function timeSeriesData(Data){

	var monthdata = [0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0,0,0,0,0,0,0,0,0,
					0,0,0,0];


var dataSet= Data;

for(var i = 0; i < dataSet.length; i++){
		var loc = dataSet[i].split(",");
		var fulltime = loc[3];
		var timeloc = fulltime.split(":");
		var hour = timeloc[0];
		var date = loc[4].substring(0, 10);
		var year = date.substring(0,4);
		var month = date.substring(5,7);
		var yearindex = 0;
		var monthindex = 0;
		if (year == "2012"){
			yearindex = 0;
		}
		if (year == "2013"){
			yearindex = 1;
		}
		if (year == "2014"){
			yearindex = 2;
		}
		if (year == "2015"){
			yearindex = 3;
		}
		if (year == "2016"){
			yearindex = 4;
		}
		if (year == "2017"){
			yearindex = 5;
		}
		if (year == "2018"){
			yearindex = 6;
		}

		if (month == "01"){
			monthindex = 0;
		}

		if (month == "02"){
			monthindex = 1;
		}
		if (month == "03"){
			monthindex = 2;
		}
		if (month == "04"){
			monthindex = 3;
		}
		if (month == "05"){
			monthindex = 4;
		}
		if (month == "06"){
			monthindex = 5;
		}
		if (month == "07"){
			monthindex = 6;
		}

		if (month == "08"){
			monthindex = 7;
		}
		if (month == "09"){
			monthindex = 8;
		}
		if (month == "10"){
			monthindex = 9;
		}
		if (month == "11"){
			monthindex = 10;
		}
		if (month == "12"){
			monthindex = 11;
		}
		
		var dataindex = yearindex*12 + monthindex;
		monthdata[dataindex]++;
	}

var chart = Highcharts.chart('timelineSeries', {

  title: {
    text: 'Time Series By Month'
  },

  subtitle: {
    text: 'By Month'
  },

  xAxis: {
    categories: ['Jan 2012', 'Feb 2012', 'Mar 2012', 'Apr 2012', 'May 2012', 'Jun 2012', 'Jul 2012', 'Aug 2012', 'Sep 2012', 'Oct 2012', 'Nov 2012', 'Dec 2012',
    			'Jan 2013', 'Feb 2013', 'Mar 2013', 'Apr 2013', 'May 2013', 'Jun 2013', 'Jul 2013', 'Aug 2013', 'Sep 2013', 'Oct 2013', 'Nov 2013', 'Dec 2013',
    			'Jan 2014', 'Feb 2014', 'Mar 2014', 'Apr 2014', 'May 2014', 'Jun 2014', 'Jul 2014', 'Aug 2014', 'Sep 2014', 'Oct 2014', 'Nov 2014', 'Dec 2014',
    			'Jan 2015', 'Feb 2015', 'Mar 2015', 'Apr 2015', 'May 2015', 'Jun 2015', 'Jul 2015', 'Aug 2015', 'Sep 2015', 'Oct 2015', 'Nov 2015', 'Dec 2015',
    			'Jan 2016', 'Feb 2016', 'Mar 2016', 'Apr 2016', 'May 2016', 'Jun 2016', 'Jul 2016', 'Aug 2016', 'Sep 2016', 'Oct 2016', 'Nov 2016', 'Dec 2016',
    			'Jan 2017', 'Feb 2017', 'Mar 2017', 'Apr 2017', 'May 2017', 'Jun 2017', 'Jul 2017', 'Aug 2017', 'Sep 2017', 'Oct 2017', 'Nov 2017', 'Dec 2017',
    			'Jan 2018', 'Feb 2018', 'Mar 2018', 'Apr 2018']
  },

  series: [{
    type: 'column',
    colorByPoint: true,
    data: monthdata,
    showInLegend: false
  }]

});




}

//create heatMap viz
function heatMapData(Data){
	
	//console.log("In heat Map function - data is in dataSet variable");
	dataSet = Data;
	tempStart=1;
	//console.log(dataSet);
	var heatdata = [[0, 0, 0], [0, 1, 0], [0, 2, 0], [0, 3, 0], [0, 4, 0], [0, 5, 0], [0, 6, 0], 
	[1, 0, 0], [1, 1, 0], [1, 2, 0], [1, 3, 0], [1, 4, 0], [1, 5, 0], [1, 6, 0], 
	[2, 0, 0], [2, 1, 0], [2, 2, 0], [2, 3, 0], [2, 4, 0], [2, 5, 0], [2, 6, 0], 
	[3, 0, 0], [3, 1, 0], [3, 2, 0], [3, 3, 0], [3, 4, 0], [3, 5, 0], [3, 6, 0], 
	[4, 0, 0], [4, 1, 0], [4, 2, 0], [4, 3, 0], [4, 4, 0], [4, 5, 0], [4, 6, 0],
	[5, 0, 0], [5, 1, 0], [5, 2, 0], [5, 3, 0], [5, 4, 0], [5, 5, 0], [5, 6, 0], 
	[6, 0, 0], [6, 1, 0], [6, 2, 0], [6, 3, 0], [6, 4, 0], [6, 5, 0], [6, 6, 0], 
	[7, 0, 0], [7, 1, 0], [7, 2, 0], [7, 3, 0], [7, 4, 0], [7, 5, 0], [7, 6, 0]]
    
	for(var i = 0; i < dataSet.length; i++){
		var loc = dataSet[i].split(",");
		var fulltime = loc[3];
		var timeloc = fulltime.split(":");
		var hour = timeloc[0];
		var date = loc[4].substring(0, 10);
		var weekday = getDayOfWeek(date);
		//console.log(hour);
		var weeknum ;
		if (weekday == "Monday"){
			weeknum = 0;
		}
		if (weekday == "Tuesday"){
			weeknum = 1;
		}
		if (weekday == "Wednesday"){
			weeknum = 2;
		}
		if (weekday == "Thursday"){
			weeknum = 3;
		}
		if (weekday == "Friday"){
			weeknum = 4;
		}
		if (weekday == "Saturday"){
			weeknum = 5;
		}
		if (weekday == "Sunday"){
			weeknum = 6;
		}
		var hounum;
		if (hour >= 0 && hour < 3){
			hournum = 0;
		}
		if (hour >= 3 && hour < 6){
			hournum = 1;
		}
		if (hour >= 6 && hour < 9){
			hournum = 2;
		}
		if (hour >= 9 && hour < 12){
			hournum = 3;
		}
		if (hour >= 12 && hour < 15){
			hournum = 4;
		}
		if (hour >= 15 && hour < 18){
			hournum = 5;
		}
		if (hour >= 18 && hour < 21){
			hournum = 6;
		}
		if (hour >= 21 && hour < 24){
			hournum = 7;
		}
		var indexnum = hournum*7 + weeknum;
		//console.log(heatdata[indexnum][2]);
		heatdata[indexnum][2]++;
	}
	//console.log(heatdata);
	
	Highcharts.chart('heatMapVisualization', {

  chart: {
    type: 'heatmap',
    marginTop: 40,
    marginBottom: 80,
    plotBorderWidth: 1
  },


  title: {
    text: 'Crimes every three hours per day of the week'
  },

  xAxis: {
    categories: ['12AM-3AM', '3AM-6AM', '6AM-9AM', '9AM-12PM', '12PM-3PM', '3PM-6PM', '6PM-9PM', '9PM-12AM']
  },

  yAxis: {
    categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    title: null
  },

  colorAxis: {
    min: 0,
    minColor: '#FFFFFF',
    maxColor: Highcharts.getOptions().colors[8]
  },

  legend: {
    align: 'right',
    layout: 'vertical',
    margin: 0,
    verticalAlign: 'top',
    y: 25,
    symbolHeight: 380
  },

  tooltip: {
    formatter: function () {
      return '<b>' + this.point.value + '</b> crimes happened at <br><b>'+ this.series.xAxis.categories[this.point.x] +  '</b> on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
    }
  },

  series: [{
    name: 'Sales per employee',
    borderWidth: 1,
    data: heatdata,
    dataLabels: {
      enabled: true,
      color: '#000000'
    }
  }]

});
}

//KS
// Jumps to specific element
(function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'fast');
        return this; // for chaining...
    }
})(jQuery); 





//additional scripts that interactive with page 


//control function based on user interaction
//hide and displays visualizations on page
function updateVisualizations(clicked_id){
	
		hideall();
	//	hideElt('mapPanel');
//	hideElt('heatMapPanel');
	//hideElt('barChartPanel');
	//hideElt('tablePanel');
	
	hideElt('commentsPanel_old');
//	console.log(clicked_id);
		
		if(document.getElementById('vis_map').checked){
			showElt('mapPanel');
			//showElt('commentsPanel');
			//console.log("showing map - showing comments");
		}
		if(document.getElementById('vis_chart').checked){
			showElt('barChartPanel');
			//console.log("showing chart");
		}
		if(document.getElementById('vis_heatmap').checked){
			showElt('timeSeriesPanel');
			//showElt('timelinePanel');
			//console.log("showing heat map");
		}
		if(document.getElementById('vis_table').checked){
			showElt('tablePanel');
			//console.log("showing table");
		}
		
	
	
}


//format a date with format that works with dataset
function formatDate(str){
//	console.log("Call format date");
	var splitD = str.split('/');
	var returnStr = splitD[2]+'-'+splitD[0]+'-'+splitD[1];
	return returnStr;
	
	
}

//convert 12 hour to 24 hour time
function getTwentyFourHourTime(amPmString) { 
	var d = new Date("1/1/2013 " + amPmString); 
	return d.getHours() + ':' + d.getMinutes(); 
}

//switch the x and y of a 2D array - > flipped values
function fix2DArray(Data){
	var myOtherArray = [];
	
	for(var x=0; x<Data[0].length; x++){
		var myInnerArr = [];
		for(var y =0; y<Data.length; y++){
			//console.log(Data[y][x]);
			myInnerArr.push(Data[y][x]);
			
			} 
			//console.log("First ARray about to push");
			myOtherArray.push(myInnerArr);
	
	}
	
//	console.log("new Array is now");
	//console.log(myOtherArray);
	
	return myOtherArray;
}

//make stack vertical bar chart
function hs_updateBarGraph_percent(Data, bCType){
	if(bCType=="districtBC"){
		
		Highcharts.chart('chart_percent', {
		  chart: {
		    type: 'column'
		  },
		  title: {
		    text: 'Crimes By District'
		  },
		  xAxis: {
		    categories: ['Northern', 'Southern', 'Eastern', 'Western', 'Central', 'N. Eastern', 'N. Western', 'S. Eastern', 'S. Western'],
		  },
		  yAxis: {
		    min: 0,
		    title: {
		      text: 'Number of Incidents',
		    },
		    
		    stackLabels: {
		      enabled: true,
		      style: {
		        fontWeight: 'bold',
		        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
		      }
		    }
		  },
		  legend: {
		    align: 'right',
		    x: -30,
		    verticalAlign: 'top',
		    y: 25,
		    floating: true,
		    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
		    borderColor: '#CCC',
		    borderWidth: 1,
		    shadow: false
		  },
		  tooltip: {
		    headerFormat: '<b>{point.x}</b><br/>',
		    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		  },
		  plotOptions: {
		    column: {
		      stacking: 'normal',
		      dataLabels: {
		        enabled: false,
		        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
		      }
		    }
		  },
		  series:  [{
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
	
	else if(bCType=="crimeBC"){
		
		Highcharts.chart('chart_percent', {
		  chart: {
		    type: 'column'
		  },
		  title: {
		    text: 'Crimes By CrimeType(Description)'
		  },
		  xAxis: {
		    categories: ['AGG. Assault', 'Arson', 'ASL Threat', 'Auto Theft', 'Burglary', 'Common ASL', 'Homicide', 'Larceny', 'Larceny Auto', 'Rape', 'Robb-Street', 'Robb-Carjacking', 'Robb-Commercial', 'Robb-Residence', 'Shooting'],
   	  },
		  yAxis: {
		    min: 0,
		    title: {
		      text: 'Number of Incidents',
		    },
		    
		    stackLabels: {
		      enabled: true,
		      style: {
		        fontWeight: 'bold',
		        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
		      }
		    }
		  },
		  legend: {
		    align: 'right',
		    x: -30,
		    verticalAlign: 'top',
		    y: 25,
		    floating: true,
		    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
		    borderColor: '#CCC',
		    borderWidth: 1,
		    shadow: false
		  },
		  tooltip: {
		    headerFormat: '<b>{point.x}</b><br/>',
		    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		  },
		  plotOptions: {
		    column: {
		      stacking: 'normal',
		      dataLabels: {
		        enabled: false,
		        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
		      }
		    }
		  },
		  series:  [{
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
		
		Highcharts.chart('chart_percent', {
		  chart: {
		    type: 'column'
		  },
		  title: {
		    text: 'Crimes with Weapons'
		  },
		  xAxis: {
		    categories: ['Firearm', 'Hands', 'Knife', 'Other', 'No Weapon'],
     },
		  yAxis: {
		    min: 0,
		    title: {
		      text: 'Number of Incidents',
		    },
		    
		    stackLabels: {
		      enabled: true,
		      style: {
		        fontWeight: 'bold',
		        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
		      }
		    }
		  },
		  legend: {
		    align: 'right',
		    x: -30,
		    verticalAlign: 'top',
		    y: 25,
		    floating: true,
		    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
		    borderColor: '#CCC',
		    borderWidth: 1,
		    shadow: false
		  },
		  tooltip: {
		    headerFormat: '<b>{point.x}</b><br/>',
		    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		  },
		  plotOptions: {
		    column: {
		      stacking: 'normal',
		      dataLabels: {
		        enabled: false,
		        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
		      }
		    }
		  },
		  series:  [{
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
	
}
//make horizontal bar chart
function hs_updateBarGraph(Data, bCType){
	//console.log("In hs_updateBarGraph - data is");
	//console.log(Data);
	
	if(bCType=="districtBC"){
	//	console.log(Data[0]);
		//console.log("In chart file - initiate district");
		
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
	
	else if(bCType=="crimeBC"){
		//console.log(Data[0]);
	//console.log("In chart file - initiate crime type");
		
		Highcharts.chart('chart_highChart', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Crimes By CrimeType(Description)'
  },
  subtitle: {
    //text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
  },
  xAxis: {
  	categories: ['AGG. Assault', 'Arson', 'ASL Threat', 'Auto Theft', 'Burglary', 'Common ASL', 'Homicide', 'Larceny', 'Larceny Auto', 'Rape', 'Robb-Street', 'Robb-Carjacking', 'Robb-Commercial', 'Robb-Residence', 'Shooting'],
    
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
	//	console.log(Data[0]);
	//	console.log("In chart file - initiate district");
		
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
    data: Data[5]
  },
  {
    name: 'Year 2018',
    data: Data[6]
  }]
});

	}//ends if 
	
	
	
}

//make horizontal stacked bar chart
function hs_updateBarGraph_stack(Data, bCType){

	
	if(bCType=="districtBC"){
		
		Highcharts.chart('chart_highChart_stack', {
		  chart: {
		    type: 'bar'
		  },
		  title: {
		    text: 'Crimes By District'
		  },
		  xAxis: {
		    categories: ['Northern', 'Southern', 'Eastern', 'Western', 'Central', 'N. Eastern', 'N. Western', 'S. Eastern', 'S. Western'],
		   
		  },
		  yAxis: {
		    min: 0,
		    title: {
		      text: 'Number of Incidents'
		    }
		  },
		  legend: {
		    reversed: true
		  },
		  tooltip: {
		    valueSuffix: ' Crimes'
		  },
		  plotOptions: {
		    series: {
		      stacking: 'normal',
		    }
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
	
	else if(bCType=="crimeBC"){
		
Highcharts.chart('chart_highChart_stack', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Crimes By CrimeType(Description)'
  },
  xAxis: {
    categories: ['AGG. Assault', 'Arson', 'ASL Threat', 'Auto Theft', 'Burglary', 'Common ASL', 'Homicide', 'Larceny', 'Larceny Auto', 'Rape', 'Robb-Street', 'Robb-Carjacking', 'Robb-Commercial', 'Robb-Residence', 'Shooting'],
    
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Number of Incidents'
    }
  },
  legend: {
    reversed: true
  },
  tooltip: {
    valueSuffix: ' Crimes'
  },
  plotOptions: {
    series: {
      stacking: 'normal'
    }
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
		
		Highcharts.chart('chart_highChart_stack', {
		  chart: {
		    type: 'bar'
		  },
		  title: {
		    text: 'Crimes with Weapons'
		  },
		  xAxis: {
		    categories: ['Firearm', 'Hands', 'Knife', 'Other', 'No Weapon'],
		  },
		  yAxis: {
		    min: 0,
		    title: {
		      text: 'Number of Incidents'
		    }
		  },
		  legend: {
		    reversed: true
		  },
		  tooltip: {
		    valueSuffix: ' Crimes'
		  },
		  plotOptions: {
		    series: {
		      stacking: 'normal'
		    }
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
	

	
	
	
}

//Updates DOM and visualizations when an object / element is clicked
function updateSideBar(clicked_id){
	
	//this is not needed - will probably set some global var to handle this
	/*if(clicked_id=="timePickerCall"){
		document.getElementById("daterange").value = "01/01/2010 1:30 PM - 05/01/2018 1:30 PM";

	}*/
	
	//if(clicked_id=="daterange"){
	//	console.log("Date picker calls function");
	/*	var dateSelect = 	document.getElementById("daterange").value;
	//	console.log(dateSelect);
		
		var initSplit = dateSelect.split(' ');
		for(var x=0; x<initSplit.length; x++){
			//console.log(initSplit[x]);	
		}
		var correctStartDate = formatDate(initSplit[0]);
		var correctEndDate = formatDate(initSplit[4]);
	//	console.log(correctStartDate);
	//	console.log(correctEndDate);
		
		var sTime = initSplit[1]+' '+initSplit[2]
		var eTime = initSplit[5]+' '+initSplit[6]
		var correctStartTime = getTwentyFourHourTime(sTime);
		var correctEndTime = getTwentyFourHourTime(eTime);
		
		/*
		var checkStart = correctStartTime.split(':');
		if(checkStart[1] == '0'){
				correctStartTime = correctStartTime + '0';
		}
		var checkEnd = correctEndTime.split(':');
		if(checkEnd[1] ==  '0'){
				correctEndTime = correctEndTime + '0';
		}
		if(checkStart[0] == '0'){
				correctStartTime = correctStartTime + '0';
		}
		var checkEnd = correctEndTime.split(':');
		if(checkEnd[0] ==  '0'){
				correctEndTime = correctEndTime + '0';
		}
		
		correctStartTime = correctStartTime +':00';
		correctEndTime = correctEndTime +':00';
		*/
		
	//	console.log(correctStartTime);
	//	console.log(correctEndTime);
		
	//}

	if(clicked_id == "weapon_type"){
		if (document.getElementById('weapon_type').checked) {
			document.getElementById("weapon_firearm").checked = true;
			document.getElementById("weapon_hands").checked = true;
			document.getElementById("weapon_knife").checked = true;
			document.getElementById("weapon_other").checked = true;
			document.getElementById("weapon_none").checked = true;
			//console.log("firearm is now check");
		}
		else{
			document.getElementById("weapon_firearm").checked = false;
			document.getElementById("weapon_hands").checked = false;
			document.getElementById("weapon_knife").checked = false;
			document.getElementById("weapon_other").checked = false;
			document.getElementById("weapon_none").checked = false;
		}
	}
	
	if(clicked_id=="crime_type"){
		if (document.getElementById('crime_type').checked) {
			document.getElementById("agg_assault").checked = true;
			document.getElementById("arson").checked = true;
			document.getElementById("assault_threat").checked = true;
			document.getElementById("auto_theft").checked = true;
			document.getElementById("burglary").checked = true;
			document.getElementById("common_assault").checked = true;
			document.getElementById("homicide").checked = true;
			document.getElementById("larceny").checked = true;
			document.getElementById("larceny_auto").checked = true;
			document.getElementById("rape").checked = true;
			document.getElementById("robbery_street").checked = true;
			document.getElementById("robbery_carjacking").checked = true;
			document.getElementById("robbery_commercial").checked = true;
			document.getElementById("robbery_residence").checked = true;
			document.getElementById("shooting").checked = true;
			
			//console.log("firearm is now check");
		}
		else{
			document.getElementById("agg_assault").checked = false;
			document.getElementById("arson").checked = false;
			document.getElementById("assault_threat").checked = false
			document.getElementById("auto_theft").checked = false;
			document.getElementById("burglary").checked = false;
			document.getElementById("common_assault").checked = false;
			document.getElementById("homicide").checked = false;
			document.getElementById("larceny").checked = false;
			document.getElementById("larceny_auto").checked = false;
			document.getElementById("rape").checked = false;
			document.getElementById("robbery_commercial").checked = false;
			document.getElementById("robbery_residence").checked = false;
			document.getElementById("shooting").checked = false;
			document.getElementById("robbery_street").checked = false;
			document.getElementById("robbery_carjacking").checked = false;
		}
		
	}
	
	
	if(clicked_id == "district"){
		if (document.getElementById('district').checked) {
			document.getElementById("district_north").checked = true;
			document.getElementById("district_south").checked = true;
			document.getElementById("district_east").checked = true;
			document.getElementById("district_west").checked = true;
			document.getElementById("district_central").checked = true;
			document.getElementById("district_ne").checked = true;
			document.getElementById("district_nw").checked = true;
			document.getElementById("district_se").checked = true;
			document.getElementById("district_sw").checked = true;
			//console.log("firearm is now check");
		}
		else{
				document.getElementById("district_north").checked = false;
			document.getElementById("district_south").checked = false;
			document.getElementById("district_east").checked = false;
			document.getElementById("district_west").checked = false;
			document.getElementById("district_central").checked = false;
			document.getElementById("district_ne").checked = false;
			document.getElementById("district_nw").checked = false;
			document.getElementById("district_se").checked = false;
			document.getElementById("district_sw").checked = false;
		}
	}
	
	
	if(clicked_id == "location_Premise"){
		if (document.getElementById('location_Premise').checked) {
			document.getElementById("premise_Alley").checked = true;
			document.getElementById("premise_apt").checked = true;
			document.getElementById("premise_atm").checked = true;
			document.getElementById("premise_bank").checked = true;
			document.getElementById("premise_bar").checked = true;
			document.getElementById("premise_barb").checked = true;
			document.getElementById("premise_bridge").checked = true;
			document.getElementById("premise_bus/auto").checked = true;
			document.getElementById("premise_carry").checked = true;
			document.getElementById("premise_conv").checked = true;
			document.getElementById("premise_court").checked = true;
			document.getElementById("premise_dept").checked = true;
			document.getElementById("premise_driveway").checked = true;
			document.getElementById("premise_drugStore").checked = true;
			document.getElementById("premise_dwelling").checked = true;
			document.getElementById("premise_fast").checked = true;
			document.getElementById("premise_fire").checked = true;
			document.getElementById("premise_garage").checked = true;
			document.getElementById("premise_gasStation").checked = true;
			document.getElementById("premise_grocery").checked = true;
			document.getElementById("premise_home").checked = true;
			document.getElementById("premise_hosp").checked = true;
			document.getElementById("premise_hotel").checked = true;
			document.getElementById("premise_laund").checked = true;
			document.getElementById("premise_lightRail").checked = true;
			document.getElementById("premise_liq").checked = true;
			document.getElementById("premise_mark").checked = true;
			document.getElementById("premise_office").checked = true;
			document.getElementById("premise_rec").checked = true;
			document.getElementById("premise_rel").checked = true;
			document.getElementById("premise_retail").checked = true;
			document.getElementById("premise_rest").checked = true;
			document.getElementById("premise_row").checked = true;
			document.getElementById("premise_park").checked = true;
			document.getElementById("premise_parking").checked = true;
			document.getElementById("premise_play").checked = true;
			document.getElementById("premise_porch").checked = true;
			document.getElementById("premise_publ").checked = true;
			document.getElementById("premise_School").checked = true;
			document.getElementById("premise_spec").checked = true;
			document.getElementById("premise_stadium").checked = true;
			document.getElementById("premise_Street").checked = true;
			document.getElementById("premise_sub").checked = true;
			document.getElementById("premise_vac").checked = true;
			document.getElementById("premise_war").checked = true;
			document.getElementById("premise_wholesale").checked = true;
			document.getElementById("premise_yard").checked = true;
			document.getElementById("premise_other").checked = true;
			
			//console.log("location_premise is now check");
		}
		else{
			document.getElementById("premise_Alley").checked = false;
			document.getElementById("premise_apt").checked = false;
			document.getElementById("premise_atm").checked = false;
			document.getElementById("premise_bank").checked = false;
			document.getElementById("premise_bar").checked = false;
			document.getElementById("premise_barb").checked = false;
			document.getElementById("premise_bridge").checked = false;
			document.getElementById("premise_bus/auto").checked = false;
			document.getElementById("premise_carry").checked = false;
			document.getElementById("premise_conv").checked = false;
			document.getElementById("premise_court").checked = false;
			document.getElementById("premise_dept").checked = false;
			document.getElementById("premise_driveway").checked = false;
			document.getElementById("premise_drugStore").checked = false;
			document.getElementById("premise_dwelling").checked = false;
			document.getElementById("premise_fast").checked = false;
			document.getElementById("premise_fire").checked = false;
			document.getElementById("premise_garage").checked = false;
			document.getElementById("premise_gasStation").checked = false;
			document.getElementById("premise_grocery").checked = false;
			document.getElementById("premise_home").checked = false;
			document.getElementById("premise_hosp").checked = false;
			document.getElementById("premise_hotel").checked = false;
			document.getElementById("premise_laund").checked = false;
			document.getElementById("premise_lightRail").checked = false;
			document.getElementById("premise_liq").checked = false;
			document.getElementById("premise_mark").checked = false;
			document.getElementById("premise_office").checked = false;
			document.getElementById("premise_rec").checked = false;
			document.getElementById("premise_rel").checked = false;
			document.getElementById("premise_retail").checked = false;
			document.getElementById("premise_rest").checked = false;
			document.getElementById("premise_row").checked = false;
			document.getElementById("premise_park").checked = false;
			document.getElementById("premise_parking").checked = false;
			document.getElementById("premise_play").checked = false;
			document.getElementById("premise_porch").checked = false;
			document.getElementById("premise_publ").checked = false;
			document.getElementById("premise_School").checked = false;
			document.getElementById("premise_spec").checked = false;
			document.getElementById("premise_stadium").checked = false;
			document.getElementById("premise_Street").checked = false;
			document.getElementById("premise_sub").checked = false;
			document.getElementById("premise_vac").checked = false;
			document.getElementById("premise_war").checked = false;
			document.getElementById("premise_wholesale").checked = false;
			document.getElementById("premise_yard").checked = false;
			document.getElementById("premise_other").checked = false;
			
		}
	}
	
   if(clicked_id == "I_O"){
		if (document.getElementById('I_O').checked) {
			document.getElementById("inside").checked = true;
			document.getElementById("outside").checked = true;
			document.getElementById("unspecified").checked = true;
			
		}
		else{
			document.getElementById("inside").checked = false;
			document.getElementById("outside").checked = false;
			document.getElementById("unspecified").checked = false;
			
		}
	}
	/*
	//when getting neighborhood
  if(clicked_id == "neighborhood"){
		if (document.getElementById('neighborhood').checked) {
			document.getElementById("fairfield").checked = true;
			document.getElementById("monument").checked = true;
			document.getElementById("orangeville").checked = true;
			document.getElementById("greenmountWest").checked = true;
			document.getElementById("cherryHill").checked = true;
			document.getElementById("rosemont").checked = true;
			document.getElementById("pulaski").checked = true;
			document.getElementById("madisonEastend").checked = true;
			document.getElementById("berea").checked = true;
			document.getElementById("dorchester").checked = true;
			document.getElementById("neigh_other").checked = true;
			
		}
		else{
			document.getElementById("fairfield").checked = false;
			document.getElementById("monument").checked = false;
			document.getElementById("orangeville").checked = false;
			document.getElementById("greenmountWest").checked = false;
			document.getElementById("cherryHill").checked = false;
			document.getElementById("rosemont").checked = false;
			document.getElementById("pulaski").checked = false;
			document.getElementById("madisonEastend").checked = false;
			document.getElementById("berea").checked = false;
			document.getElementById("dorchester").checked = false;
			document.getElementById("neigh_other").checked = false;
			
		}
	}
	*/
	
  //weapons
  var wt_Other="n/a";
  var wt_Hands="n/a";
  var wt_Knife="n/a";
  var wt_Firearm="n/a";
  var wt_None="n/a";
  
  //crime types
  var wt_AggAssault = "n/a";
	var wt_Arson = "n/a";
	var wt_AssaultByThreat = "n/a";
	var wt_AutoTheft = "n/a";
	var wt_Burglary = "n/a";
	var wt_CommonAssault = "n/a";
	var wt_Homicide = "n/a";
	var wt_Larceny = "n/a";
	var wt_LarcenyAuto = "n/a";
	var wt_Rape = "n/a";
	var wt_RobberyStreet = "n/a";
	var wt_RobberyCar = "n/a";
	var wt_RobberyCom = "n/a";
	var wt_RobberyRes = "n/a";
	var wt_Shooting = "n/a";
	
	
	//districts
	var wt_Northern = "n/a";
	var wt_Southern = "n/a";
	var wt_Eastern = "n/a";
	var wt_Western = "n/a";
	var wt_Central = "n/a";
	var wt_NorthEastern = "n/a";
	var wt_NorthWestern = "n/a";
	var wt_SouthEastern = "n/a";
	var wt_SouthWestern = "n/a";
	
	var wt_inside = "n/a";
	var wt_inside2 = "n/a";
	var wt_outside = "n/a";
	var wt_outside2 = "n/a";
	var wt_unspecified = "n/a";
	
	
	//neighborhoods
	var wt_berea = "n/a";
	var wt_cherryHill = "n/a";
	var wt_dorchester = "n/a";
	var wt_ellwoodPark = "n/a";
	var wt_fairfield = "n/a";
	var wt_greenmont = "n/a";
	var wt_orangeville = "n/a";
	var wt_madison = "n/a";
	var wt_pulaski = "n/a";
	var wt_rosemont = "n/a";
	var wt_neighOther = "n/a";
	
	var wt_drugStore = "n/a";
	var wt_autoParts = "n/a";
	var wt_subway = "n/a";
	var wt_drugStore = "n/a";
	var wt_drugStore = "n/a";
	var wt_drugStore = "n/a";
	
	
	
  	var	wt_alley = "n/a";
  	var	wt_apt = "n/a";
  	var	wt_aptTwo = "n/a";
  	var	wt_atm = "n/a";
  	var	wt_bank = "n/a";
  	var	wt_bar = "n/a";
  	var	wt_barber = "n/a";
  	var	wt_bridge = "n/a";
  	var	wt_bus = "n/a";
  	var	wt_busTwo = "n/a";
  	var	wt_auto = "n/a";
  	var	wt_busThree = "n/a";
  	var	wt_busFour = "n/a";
  	var	wt_carry = "n/a";
  	var	wt_conv = "n/a";
  	var	wt_cloth = "n/a";
  	var	wt_shop = "n/a";
  	var	wt_court = "n/a";
  	var	wt_dept = "n/a";
  	var	wt_driveway = "n/a";
  	var	wt_drug = "n/a";
  	var	wt_dwelling = "n/a";
  	var	wt_fast = "n/a";
  	var	wt_fire = "n/a";
  	var	wt_garage = "n/a";
  	var	wt_garageTwo = "n/a";
  	var	wt_gas = "n/a";
  	var	wt_grocery = "n/a";
  	var	wt_home = "n/a";
  	var	wt_hosp = "n/a";
  	var	wt_hotel = "n/a";
  	var	wt_laundry = "n/a";
  	var	wt_lightRail = "n/a";
  	var	wt_liquor = "n/a";
  	var	wt_market = "n/a";
  	var	wt_office = "n/a";
  	var	wt_rec = "n/a";
  	var	wt_religious = "n/a";
 		var	wt_retail = "n/a";
		var	wt_rest = "n/a";
 		var	wt_row = "n/a";
 		var	wt_park = "n/a";
 		var	wt_parking = "n/a";
 		var	wt_parkingTwo = "n/a";
 		var	wt_play = "n/a";
 	 	var	wt_porch = "n/a";
  	var	wt_publ = "n/a";
  	var	wt_publTwo = "n/a";
  	var	wt_school = "n/a";
  	var	wt_specialty = "n/a";
  	var	wt_stadium = "n/a";
  	var	wt_streetCap = "n/a";
  	var	wt_street = "n/a";
  	var	wt_subway = "n/a";
  	var	wt_vac = "n/a";
  	var	wt_war = "n/a";
  	var	wt_whole = "n/a";
  	var	wt_yard = "n/a";
  	var	wt_yardTwo = "n/a";
  	var	wt_otherOne = "n/a";
  	var	wt_otherTwo = "n/a";
  	var	wt_otherThree = "n/a";
  	var	wt_otherFour = "n/a";
  	var	wt_rent = "n/a";
	
	
	
	//date / time
	var wt_StartDate;
	var wt_EndDate;
	//var wt_StartDate = correctStartDate;
	//var wt_EndDate = correctEndDate;
	//var wt_StartTime = correctStartTime;
	//var wt_EndTime = correctEndTime;
	var sd = document.getElementById("StartDate").value;
	var ed = document.getElementById("EndDate").value;
	var StartDate = new Date(sd);
	var EndDate = new Date(ed);
	if (StartDate > EndDate){
		alert("Please select valid dates.");
	}
	else {
		wt_StartDate = sd;
		wt_EndDate = ed;
	}
	//console.log(wt_StartDate);


	var startTime = document.getElementById("StartTime").value;
  var endTime = document.getElementById("EndTime").value;
	
	wt_StartTime = startTime;
	wt_EndTime = endTime;
  
  
  
  if(document.getElementById('premise_Alley').checked) {
  		wt_alley = "ALLEY";
  	}
  	if(document.getElementById('premise_apt').checked) {
  		wt_apt = "APT/CONDO";
  		wt_aptTwo = "APT. LOCKE";
  	}
  	if(document.getElementById('premise_atm').checked) {
  		wt_atm = "ATM MACHIN";
  	}
  	if(document.getElementById('premise_bank').checked) {
  		wt_bank = "BANK/FINAN";
  	}
  	if(document.getElementById('premise_bar').checked) {
  		wt_bar = "BAR";
  	}
  	if(document.getElementById('premise_barb').checked) {
  		wt_barber = "BARBER/BEA";
  	}
  	if(document.getElementById('premise_bridge').checked) {
  		wt_bridge = "BRIDGE-PIE";
  	}
  	if(document.getElementById('premise_bus/auto').checked) {
  		wt_bus = "BUS/AUTO";
  		wt_busTwo = "BUS/RAILRO";
  		wt_auto = "AUTO PARTS";
  		wt_busThree = "BUS. PARK";
  		wt_busFour = "Common Bus";
  	}
  	if(document.getElementById('premise_carry').checked) {
  		wt_carry = "CARRY OUT";
  	}
  	if(document.getElementById('premise_conv').checked) {
  		wt_conv = "CONVENIENC";
  		wt_cloth = "CLOTHING/S";
  		wt_shop = "SHOPPING M";
  	}
  	if(document.getElementById('premise_court').checked) {
  		wt_court = "COURT HOUS";
  	}
  	if(document.getElementById('premise_dept').checked) {
  		wt_dept = "DEPARTMENT";
  	}
  	if(document.getElementById('premise_driveway').checked) {
  		wt_driveway = "DRIVEWAY";
  	}
  	if(document.getElementById('premise_drugStore').checked) {
  		wt_drug = "DRUG STORE";
  	}
  	if(document.getElementById('premise_dwelling').checked) {
  		wt_dwelling = "Dwelling";
  	}
  	if(document.getElementById('premise_fast').checked) {
  		wt_fast = "FAST FOOD";
  	}
  	if(document.getElementById('premise_fire').checked) {
  		wt_fire = "FIRE DEPAR";
  	}
  	if(document.getElementById('premise_garage').checked) {
  		wt_garage = "GARAGE ON";
  		wt_garageTwo = "SHED/GARAG";
  	}
  	if(document.getElementById('premise_gasStation').checked) {
  		wt_gas = "GAS STATIO";
  	}
  	if(document.getElementById('premise_grocery').checked) {
  		wt_grocery = "GROCERY/CO";
  	}
  	if(document.getElementById('premise_home').checked) {
  		wt_home = "SINGLE HOU";
  	}
  	if(document.getElementById('premise_hosp').checked) {
  		wt_hosp = "HOSP/NURS.";
  	}
  	if(document.getElementById('premise_hotel').checked) {
  		wt_hotel = "HOTEL/MOTE";
  	}
  	if(document.getElementById('premise_laund').checked) {
  		wt_laundry = "LAUNDRY/CL";
  	}
  	if(document.getElementById('premise_lightRail').checked) {
  		wt_lightRail = "LIGHT RAIL";
  	}
  	if(document.getElementById('premise_liq').checked) {
  		wt_liquor = "LIQUOR STO";
  	}
  	if(document.getElementById('premise_mark').checked) {
  		wt_market = "MARKET STA";
  	}
  	if(document.getElementById('premise_office').checked) {
  		wt_office = "OFFICE BUI";
  	}
  	if(document.getElementById('premise_rec').checked) {
  		wt_rec = "RECREATION";
  	}
  	if(document.getElementById('premise_rel').checked) {
  		wt_religious = "RELIGIOUS";
  	}
  	if(document.getElementById('premise_retail').checked) {
  		wt_retail = "RETAIL/SMA";
  	}
  	if(document.getElementById('premise_rest').checked) {
  		wt_rest = "RESTAURANT";
  	}
  	if(document.getElementById('premise_row').checked) {
  		wt_row = "ROW/TOWNHO";
  	}
  	if(document.getElementById('premise_park').checked) {
  		wt_park = "PARK";
  	}
  	if(document.getElementById('premise_parking').checked) {
  		wt_parking = "PARKING LO";
  		wt_parkingTwo = "CAR LOT-NE";
  	}
  	if(document.getElementById('premise_play').checked) {
  		wt_play = "PLAYGROUND";
  	}
  	if(document.getElementById('premise_porch').checked) {
  		wt_porch = "PORCH/DECK";
  	}
  	if(document.getElementById('premise_publ').checked) {
  		wt_publ = "Public Are";
  		wt_publTwo = "PUBLIC HOU";
  	}
  	if(document.getElementById('premise_School').checked) {
  		wt_school = "SCHOOL";
  	}
  	if(document.getElementById('premise_spec').checked) {
  		wt_specialty = "SPECIALTY";
  	}
  	if(document.getElementById('premise_stadium').checked) {
  		wt_stadium = "STADIUM";
  	}
  	if(document.getElementById('premise_Street').checked) {
  		wt_streetCap = "STREET";
  		wt_street = "Street";
  	}
  	if(document.getElementById('premise_sub').checked) {
  		wt_subway = "SUBWAY";
  	}
  	if(document.getElementById('premise_vac').checked) {
  		wt_vac = "VACANT BUI";
  	}
  	if(document.getElementById('premise_war').checked) {
  		wt_war = "WAREHOUSE";
  	}
  	if(document.getElementById('premise_wholesale').checked) {
  		wt_whole = "WHOLESALE/";
  	}
  	if(document.getElementById('premise_yard').checked) {
  		wt_yard = "YARD";
  		wt_yardTwo = "YARD/BUSIN";
  	}
  	if(document.getElementById('premise_other').checked) {
  		wt_otherOne = "OTHER/RESI";
  		wt_otherTwo = "OTHER - IN";
  		wt_otherThree = "OTHER - OU";
  		wt_otherFour = "UNKNOWN";
  		wt_rent = "RENTAL/VID";
  	}
  	
  	
  	
  	
  	
     
    if(document.getElementById('inside').checked) {
  		wt_inside = "I";
  		wt_inside2 = "Inside";
  		//console.log("FIREARM");
  	}
  	if(document.getElementById('outside').checked) {
  		wt_outside="O";
  		wt_outside2 = "Outside";
  		//console.log("FIREARM");
  	}
  	if(document.getElementById('unspecified').checked) {
  		wt_unspecified="NONE";
  		//console.log("FIREARM");
  	}
  	
	/*
	//neighborhood
	if(document.getElementById('berea').checked) {
  		wt_berea = "Berea";
  	}
  	if(document.getElementById('cherryHill').checked) {
  		wt_cherryHill="Cherry Hill";
  	}
  	if(document.getElementById('dorchester').checked) {
  		wt_dorchester="Dorchester";
  	}
  	if(document.getElementById('monument').checked) {
  		wt_ellwoodPark="Ellwood Park/Monument";
  	}
  	if(document.getElementById('fairfield').checked) {
  		wt_fairfield="Fairfield Area";
  	}
  	if(document.getElementById('greenmountWest').checked) {
  		wt_greenmont="Greenmount West";
  	}
  	if(document.getElementById('orangeville').checked) {
  		wt_orangeville="Orangeville";
  	}
  	if(document.getElementById('madisonEastend').checked) {
  		wt_madison="Madison-Eastend";
  	}
  	if(document.getElementById('pulaski').checked) {
  		wt_pulaski="Pulaski Industrial Area";
  	}
  	if(document.getElementById('rosemont').checked) {
  		wt_rosemont="Rosemont";
  	}
  	if(document.getElementById('neigh_other').checked) {
  		wt_neighOther="NONE";
  	}
  */
  //firearm
  
  
  	
  	if (document.getElementById('weapon_firearm').checked) {
  		wt_Firearm="FIREARM";
  		//console.log("FIREARM");
  	}
  	if (document.getElementById('weapon_hands').checked) {
  		wt_Hands="HANDS";}
  		//console.log("HANDS");
  	if (document.getElementById('weapon_knife').checked) {
  		wt_Knife="KNIFE";
  		//console.log("KNIFE");
  	}
  	if (document.getElementById('weapon_other').checked) {
  		wt_Other="OTHER";
  		//console.log("OTHER");
  	}
  	if (document.getElementById('weapon_none').checked) {
  		wt_None="NONE";
  		//console.log("OTHER");
  	}
  	
 

  	if (document.getElementById('agg_assault').checked) {
  		wt_AggAssault="AGG. ASSAULT";
  	//	console.log("AGG. ASSAULT");
  	}
  	if (document.getElementById('arson').checked) {
  		wt_Arson="ARSON";
  		console.log("ARSON");
  	}
  	if (document.getElementById('assault_threat').checked) {
  		wt_AssaultByThreat="ASSAULT BY THREAT";
  	//	console.log("ASSAULT BY THREAT");
  	}
  	if (document.getElementById('auto_theft').checked) {
  		wt_AutoTheft="AUTO THEFT";
  	//	console.log("AUTO THEFT");
  	}
  	if (document.getElementById('burglary').checked) {
  		wt_Burglary="BURGLARY";
  	//	console.log("BURGLARY");
  	}
  	if (document.getElementById('common_assault').checked) {
  		wt_CommonAssault="COMMON ASSAULT";
  	//	console.log("COMMON ASSAULT");
  	}
  	if (document.getElementById('homicide').checked) {
  		wt_Homicide="HOMICIDE";
  	//	console.log("HOMICIDE");
  	}
  	if (document.getElementById('larceny').checked) {
  		wt_Larceny="LARCENY";
  	//	console.log("LARCENY");
  	}
  	if (document.getElementById('larceny_auto').checked) {
  		wt_LarcenyAuto="LARCENY FROM AUTO";
  	//	console.log("LARCENY FROM AUTO");
  	}
  	if (document.getElementById('rape').checked) {
  		wt_Rape="RAPE";
  	//	console.log("RAPE");
  	}
  	if (document.getElementById('robbery_street').checked) {
  		wt_RobberyStreet="ROBBERY - STREET";
  	//	console.log("ROBBERY - STREET");
  	}
  	if (document.getElementById('robbery_carjacking').checked) {
  		wt_RobberyCar="ROBBERY - CARJACKING";
  		//console.log("ROBBERY - CARJACKING");
  	}
  	if (document.getElementById('robbery_commercial').checked) {
  		wt_RobberyCom="ROBBERY - COMMERCIAL";
  		//console.log("ROBBERY - COMMERCIAL");
  	}
  	if (document.getElementById('robbery_residence').checked) {
  		wt_RobberyRes="ROBBERY - RESIDENCE";
  		//console.log("ROBBERY - RESIDENCE");
  	}
  	if (document.getElementById('shooting').checked) {
  		wt_Shooting="SHOOTING";
  		//console.log("SHOOTING");
  	}
  	
  //district
  		if (document.getElementById('district_north').checked) {
  		wt_Northern="NORTHERN";
  	}
  	if (document.getElementById('district_south').checked) {
  		wt_Southern="SOUTHERN";
  	}
  	if (document.getElementById('district_east').checked) {
  		wt_Eastern="EASTERN";
  	}
  	if (document.getElementById('district_west').checked) {
  		wt_Western="WESTERN";
  	}
  	if (document.getElementById('district_central').checked) {
  		wt_Central="CENTRAL";
  	}
  	if (document.getElementById('district_ne').checked) {
  		wt_NorthEastern="NORTHEASTERN";
  	}
  	if (document.getElementById('district_nw').checked) {
  		wt_NorthWestern="NORTHWESTERN";
  	}
  	if (document.getElementById('district_se').checked) {
  		wt_SouthEastern="SOUTHEASTERN";
  	}
  	if (document.getElementById('district_sw').checked) {
  		wt_SouthWestern="SOUTHWESTERN";
  	}
  	
  //}
  
  

	//ajax calls here

			//ajax call for  bar chart
		if(document.getElementById('barChartX').value =="weapon_Type_barChart"){
			//console.log("Calling weapon type from bar chart");
			$.ajax({
		    url:"db/getActualWeaponChartData.php",
		    data: {wt_Other1: wt_Other, wt_Hands1: wt_Hands, wt_Knife1: wt_Knife, wt_Firearm1: wt_Firearm,
		    	wt_None1: wt_None, wt_AggAssault1: wt_AggAssault, wt_Arson1: wt_Arson, wt_AssaultByThreat1: wt_AssaultByThreat, 
		    	wt_AutoTheft1: wt_AutoTheft, wt_Burglary1: wt_Burglary, wt_CommonAssault1: wt_CommonAssault,
		    	wt_Homicide1: wt_Homicide, wt_Larceny1: wt_Larceny, wt_LarcenyAuto1: wt_LarcenyAuto, wt_Rape1: wt_Rape,
		    	wt_RobberyStreet1: wt_RobberyStreet, wt_RobberyCar1: wt_RobberyCar, wt_RobberyCom1: wt_RobberyCom,
		    	wt_RobberyRes1: wt_RobberyRes, wt_Shooting1: wt_Shooting, wt_Northern1: wt_Northern, 
		    	wt_Southern1: wt_Southern, wt_Eastern1: wt_Eastern, wt_Western1: wt_Western, wt_Central1: 
		    	wt_Central, wt_NorthEastern1: wt_NorthEastern, wt_NorthWestern1: wt_NorthWestern,
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern, wt_StartDate1: wt_StartDate,
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime},
		    type:"POST",
		    success:function(msg){
		    	
		    	msg = fix2DArray(msg);
		       handleResponseBChart_hs(msg, "weaponBC");
		    },
		    
		    dataType:"json"
			});
			
		
		}//close if
		
		
		
		//ajax call for crime type bar chart
		if(document.getElementById('barChartX').value =="crime_Type_barChart"){
			//console.log("Calling crime type from bar chart - high chart");
			$.ajax({
		    url:"db/getActualCrimeTypeData.php",
		    data: {wt_Other1: wt_Other, wt_Hands1: wt_Hands, wt_Knife1: wt_Knife, wt_Firearm1: wt_Firearm,
		    	wt_None1: wt_None, wt_AggAssault1: wt_AggAssault, wt_Arson1: wt_Arson, wt_AssaultByThreat1: wt_AssaultByThreat, 
		    	wt_AutoTheft1: wt_AutoTheft, wt_Burglary1: wt_Burglary, wt_CommonAssault1: wt_CommonAssault,
		    	wt_Homicide1: wt_Homicide, wt_Larceny1: wt_Larceny, wt_LarcenyAuto1: wt_LarcenyAuto, wt_Rape1: wt_Rape,
		    	wt_RobberyStreet1: wt_RobberyStreet, wt_RobberyCar1: wt_RobberyCar, wt_RobberyCom1: wt_RobberyCom,
		    	wt_RobberyRes1: wt_RobberyRes, wt_Shooting1: wt_Shooting, wt_Northern1: wt_Northern, 
		    	wt_Southern1: wt_Southern, wt_Eastern1: wt_Eastern, wt_Western1: wt_Western, wt_Central1: 
		    	wt_Central, wt_NorthEastern1: wt_NorthEastern, wt_NorthWestern1: wt_NorthWestern,
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern, wt_StartDate1: wt_StartDate,
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime},
		    type:"POST",
		    success:function(msg){
		    	
		        handleResponseBChart_hs(msg, "crimeBC");
		    },
		    
		    dataType:"json"
			});
			
			
		}//close if
		
		
		
		//ajax call for crime type bar chart
		if(document.getElementById('barChartX').value =="district_Type_barChart"){
			//console.log("Calling district from bar chart - highchart");
			$.ajax({
		    url:"db/getActualDistrictData.php",
		    data: {wt_Other1: wt_Other, wt_Hands1: wt_Hands, wt_Knife1: wt_Knife, wt_Firearm1: wt_Firearm,
		    	wt_None1: wt_None, wt_AggAssault1: wt_AggAssault, wt_Arson1: wt_Arson, wt_AssaultByThreat1: wt_AssaultByThreat, 
		    	wt_AutoTheft1: wt_AutoTheft, wt_Burglary1: wt_Burglary, wt_CommonAssault1: wt_CommonAssault,
		    	wt_Homicide1: wt_Homicide, wt_Larceny1: wt_Larceny, wt_LarcenyAuto1: wt_LarcenyAuto, wt_Rape1: wt_Rape,
		    	wt_RobberyStreet1: wt_RobberyStreet, wt_RobberyCar1: wt_RobberyCar, wt_RobberyCom1: wt_RobberyCom,
		    	wt_RobberyRes1: wt_RobberyRes, wt_Shooting1: wt_Shooting, wt_Northern1: wt_Northern, 
		    	wt_Southern1: wt_Southern, wt_Eastern1: wt_Eastern, wt_Western1: wt_Western, wt_Central1: 
		    	wt_Central, wt_NorthEastern1: wt_NorthEastern, wt_NorthWestern1: wt_NorthWestern,
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern, wt_StartDate1: wt_StartDate,
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime},
		    type:"POST",
		    success:function(msg){
		    //	console.log("should return here for bar chart - crime type");
		    	//console.log(msg);
		    	//var bCType = "crimeBC";
		        handleResponseBChart_hs(msg, "districtBC");
		    },
		  
		    dataType:"json"
			});
			
			
		}//close if
	
	
	
	$.ajax({
		    url:"db/getMapLocations.php",
		    data: {wt_Other1: wt_Other, wt_Hands1: wt_Hands, wt_Knife1: wt_Knife, wt_Firearm1: wt_Firearm,
		    	wt_None1: wt_None, wt_AggAssault1: wt_AggAssault, wt_Arson1: wt_Arson, wt_AssaultByThreat1: wt_AssaultByThreat, 
		    	wt_AutoTheft1: wt_AutoTheft, wt_Burglary1: wt_Burglary, wt_CommonAssault1: wt_CommonAssault,
		    	wt_Homicide1: wt_Homicide, wt_Larceny1: wt_Larceny, wt_LarcenyAuto1: wt_LarcenyAuto, wt_Rape1: wt_Rape,
		    	wt_RobberyStreet1: wt_RobberyStreet, wt_RobberyCar1: wt_RobberyCar, wt_RobberyCom1: wt_RobberyCom,
		    	wt_RobberyRes1: wt_RobberyRes, wt_Shooting1: wt_Shooting, wt_Northern1: wt_Northern, 
		    	wt_Southern1: wt_Southern, wt_Eastern1: wt_Eastern, wt_Western1: wt_Western, wt_Central1: 
		    	wt_Central, wt_NorthEastern1: wt_NorthEastern, wt_NorthWestern1: wt_NorthWestern,
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern, wt_StartDate1: wt_StartDate,
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime, 
		    	wt_inside1:wt_inside, wt_inside21:wt_inside2, wt_outside1: wt_outside, wt_outside21:wt_outside2,
		    	wt_unspecified1: wt_unspecified, wt_berea1:wt_berea, wt_cherryHill1:wt_cherryHill,
		    	wt_dorchester1:wt_dorchester,  wt_ellwoodPark1:wt_ellwoodPark, wt_fairfield1:wt_fairfield,
		    	wt_greenmont1:wt_greenmont, wt_orangeville1:wt_orangeville, wt_madison1:wt_madison,
		    	wt_pulaski1:wt_pulaski, wt_rosemont1:wt_rosemont, wt_neighOther1:wt_neighOther,
		    	wt_alley:wt_alley,wt_apt:wt_apt,wt_aptTwo:wt_aptTwo,wt_atm:wt_atm,wt_bank:wt_bank,
		    	wt_bar:wt_bar,wt_barber:wt_barber,wt_bridge:wt_bridge,wt_bus:wt_bus,wt_busTwo:wt_busTwo,
		    	wt_auto:wt_auto,wt_busThree:wt_busThree,wt_busFour:wt_busFour,wt_carry:wt_carry,wt_conv:wt_conv,
		    	wt_cloth:wt_cloth,wt_shop:wt_shop,wt_court:wt_court,wt_dept:wt_dept,wt_driveway:wt_driveway,
		    	wt_drug:wt_drug,wt_dwelling:wt_dwelling,wt_fast:wt_fast,wt_fire:wt_fire,wt_garage:wt_garage,
		    	wt_garageTwo:wt_garageTwo,wt_gas:wt_gas,wt_grocery:wt_grocery,wt_home:wt_home,wt_hosp:wt_hosp,
		    	wt_hotel:wt_hotel,wt_laundry:wt_laundry,wt_lightRail:wt_lightRail,wt_liquor:wt_liquor,
		    	wt_market:wt_market,wt_office:wt_office,wt_rec:wt_rec,wt_religious:wt_religious,
		    	wt_retail:wt_retail,wt_rest:wt_rest,wt_row:wt_row,wt_park:wt_park,wt_parking:wt_parking,
		    	wt_parkingTwo:wt_parkingTwo,wt_play:wt_play,wt_porch:wt_porch,wt_publ:wt_publ,
		    	wt_publTwo:wt_publTwo,wt_school:wt_school,wt_specialty:wt_specialty,wt_stadium:wt_stadium,
		    	wt_streetCap:wt_streetCap,wt_street:wt_street,wt_subway:wt_subway,wt_vac:wt_vac,wt_war:wt_war,
		    	wt_whole:wt_whole,wt_yard:wt_yard,wt_yardTwo:wt_yardTwo,wt_otherOne:wt_otherOne,
		    	wt_otherTwo:wt_otherTwo,wt_otherThree:wt_otherThree,wt_otherFour:wt_otherFour,
		    	wt_rent:wt_rent
		    	},
		    	
		    	
		    type:"POST",
		    success:function(msg){
		        handleResponse(msg);
		    },
		    dataType:"json"
			});
			
			if(document.readyState === "complete") {
			
			 $("#table_id").dataTable().fnDestroy();
			//ajax for table
			 $('#table_id').dataTable( {
        
        ajax:({
        	url: 'db/getTableData2.php',
        	data: {wt_Other1: wt_Other, wt_Hands1: wt_Hands, wt_Knife1: wt_Knife, wt_Firearm1: wt_Firearm,
		    	wt_None1: wt_None, wt_AggAssault1: wt_AggAssault, wt_Arson1: wt_Arson, wt_AssaultByThreat1: wt_AssaultByThreat, 
		    	wt_AutoTheft1: wt_AutoTheft, wt_Burglary1: wt_Burglary, wt_CommonAssault1: wt_CommonAssault,
		    	wt_Homicide1: wt_Homicide, wt_Larceny1: wt_Larceny, wt_LarcenyAuto1: wt_LarcenyAuto, wt_Rape1: wt_Rape,
		    	wt_RobberyStreet1: wt_RobberyStreet, wt_RobberyCar1: wt_RobberyCar, wt_RobberyCom1: wt_RobberyCom,
		    	wt_RobberyRes1: wt_RobberyRes, wt_Shooting1: wt_Shooting, wt_Northern1: wt_Northern, 
		    	wt_Southern1: wt_Southern, wt_Eastern1: wt_Eastern, wt_Western1: wt_Western, wt_Central1: 
		    	wt_Central, wt_NorthEastern1: wt_NorthEastern, wt_NorthWestern1: wt_NorthWestern,
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern, wt_StartDate1: wt_StartDate,
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime, 
		    	wt_inside1:wt_inside, wt_inside21:wt_inside2, wt_outside1: wt_outside, wt_outside21:wt_outside2,
		    	wt_unspecified1: wt_unspecified, wt_berea1:wt_berea, wt_cherryHill1:wt_cherryHill,
		    	wt_dorchester1:wt_dorchester,  wt_ellwoodPark1:wt_ellwoodPark, wt_fairfield1:wt_fairfield,
		    	wt_greenmont1:wt_greenmont, wt_orangeville1:wt_orangeville, wt_madison1:wt_madison,
		    	wt_pulaski1:wt_pulaski, wt_rosemont1:wt_rosemont, wt_neighOther1:wt_neighOther,
		    	wt_alley:wt_alley,wt_apt:wt_apt,wt_aptTwo:wt_aptTwo,wt_atm:wt_atm,wt_bank:wt_bank,
		    	wt_bar:wt_bar,wt_barber:wt_barber,wt_bridge:wt_bridge,wt_bus:wt_bus,wt_busTwo:wt_busTwo,
		    	wt_auto:wt_auto,wt_busThree:wt_busThree,wt_busFour:wt_busFour,wt_carry:wt_carry,wt_conv:wt_conv,
		    	wt_cloth:wt_cloth,wt_shop:wt_shop,wt_court:wt_court,wt_dept:wt_dept,wt_driveway:wt_driveway,
		    	wt_drug:wt_drug,wt_dwelling:wt_dwelling,wt_fast:wt_fast,wt_fire:wt_fire,wt_garage:wt_garage,
		    	wt_garageTwo:wt_garageTwo,wt_gas:wt_gas,wt_grocery:wt_grocery,wt_home:wt_home,wt_hosp:wt_hosp,
		    	wt_hotel:wt_hotel,wt_laundry:wt_laundry,wt_lightRail:wt_lightRail,wt_liquor:wt_liquor,
		    	wt_market:wt_market,wt_office:wt_office,wt_rec:wt_rec,wt_religious:wt_religious,
		    	wt_retail:wt_retail,wt_rest:wt_rest,wt_row:wt_row,wt_park:wt_park,wt_parking:wt_parking,
		    	wt_parkingTwo:wt_parkingTwo,wt_play:wt_play,wt_porch:wt_porch,wt_publ:wt_publ,
		    	wt_publTwo:wt_publTwo,wt_school:wt_school,wt_specialty:wt_specialty,wt_stadium:wt_stadium,
		    	wt_streetCap:wt_streetCap,wt_street:wt_street,wt_subway:wt_subway,wt_vac:wt_vac,wt_war:wt_war,
		    	wt_whole:wt_whole,wt_yard:wt_yard,wt_yardTwo:wt_yardTwo,wt_otherOne:wt_otherOne,
		    	wt_otherTwo:wt_otherTwo,wt_otherThree:wt_otherThree,wt_otherFour:wt_otherFour,
		    	wt_rent:wt_rent},
        	type: 'POST',
        	
        	}),
        	"scrollX": true
        	
   		 } );
    
	}//ends if statement
	function handleResponse(data) {
   
 
		//console.log("Before call heatMap ");
		heatMapData(data[0]);

		//console.log("Before call time series function ");
		timeSeriesData(data[0]);
		
		//display to the map the number of crimes with these filters
		var crimesCount = data[0].length;
		//console.log(crimesCount);
		var retStr = "<span style='color:##000000;'>["+crimesCount+"]</span>";
		//document.getElementById('numCrimesPerFilter').innerHTML="<span style='color:#000000;'>[crimesCount]</span>";
		document.getElementById('numCrimesPerFilter').innerHTML=retStr;
		
		//console.log(typeof markers);
	//	console.log("In Handle response before update Map");
		updateMap(data[0], markers);
	
	}
	
	function handleResponseBChart(data, bCType) {
			
				updateBarGraph(data, bCType);
			//	console.log("Calling the updated charts");
				hs_updateBarGraph(data, bCType);
		
			}//inner handler
			
			function handleResponseBChart_hs(data, bCType) {
			
				hs_updateBarGraph_percent(data, bCType);
				hs_updateBarGraph(data, bCType);
				hs_updateBarGraph_stack(data, bCType);
		
			}//inner handler
	

	
}//close function

//select a sub menu in side Bar
function clearSideBar(clicked_id){
	
	if(clicked_id=="crime_type"){
		document.getElementById('crime_type').checked=false;
	}
	else if(clicked_id == "district"){
		document.getElementById('district').checked=false;
	}
	else if(clicked_id == "weapon_type"){
		document.getElementById('weapon_type').checked=false;
	}
	else if(clicked_id == "location_Premise"){
		document.getElementById('location_Premise').checked=false;
	}
	else if(clicked_id == "timePicker"){
		document.getElementById("daterange").value = "00/00/0000 0:00 AM - 00/00/0000 0:00 PM";
		//"01/01/2010 1:30 PM - 01/01/2018 1:30 PM";
	}else if(clicked_id == "I_O"){
		document.getElementById('I_O').checked=false;
	}else if(clicked_id == "neighborhood"){
		document.getElementById('neighborhood').checked=false;
	}else if(clicked_id == "timePicker"){
		document.getElementById("StartDate").value = "0000-00-00";
		document.getElementById("EndDate").value = "0000-00-00";	
	}
	
	updateSideBar(clicked_id);
	
	
}

//check all visualizations
function selectAllSideBar(clicked_id){
	
		document.getElementById('crime_type').checked=true;
		updateSideBar('crime_type');
	
		document.getElementById('district').checked=true;
		updateSideBar('district');
	
		document.getElementById('weapon_type').checked=true;
		updateSideBar('weapon_type');
	
		document.getElementById('location_Premise').checked=true;
		updateSideBar('location_Premise');
	
		//document.getElementById("daterange").value = "01/01/2010 0:00 AM - 12/31/2018 0:00 PM";
		document.getElementById("StartDate").value = "2010-01-01";
		document.getElementById("EndDate").value = "2018-05-01";

		document.getElementById('I_O').checked=true;
		updateSideBar('I_O');
		
		document.getElementById('StartTime').value = "00:00:00";
		document.getElementById('EndTime').value = "00:00:00";
		

		document.getElementById('neighborhood').checked=true;
		updateSideBar('neighborhood');
	
	updateSideBar(clicked_id);
}

//uncheck all visualizations
function clearAllSideBar(clicked_id){
	
		document.getElementById('crime_type').checked=false;
		updateSideBar('crime_type');
	
		document.getElementById('district').checked=false;
		updateSideBar('district');
	
		document.getElementById('weapon_type').checked=false;
		updateSideBar('weapon_type');
	
		document.getElementById('location_Premise').checked=false;
		updateSideBar('location_Premise');
	
		//document.getElementById("StartDate").value = "00/00/0000 0:00 AM - 00/00/0000 0:00 PM";
		document.getElementById("StartDate").value = "0000-00-00";
		document.getElementById("EndDate").value = "0000-00-00";

		document.getElementById('I_O').checked=false;
		updateSideBar('I_O');
		
		document.getElementById('StartTime').value = "00:00:00";
		document.getElementById('EndTime').value = "00:00:00";
		

		document.getElementById('neighborhood').checked=false;
		updateSideBar('neighborhood');
	
	updateSideBar(clicked_id);
}

//display or hide the various bar charts viz
function toggleBarCharts(clicked_id){
	console.log("In toogle bar func");
	console.log(clicked_id);
	var btnVal =document.getElementById(clicked_id).innerHTML;
	console.log(btnVal);
	
	if(clicked_id=="verticalChart"){
		//when on
		if(btnVal=="Vertical Chart - On"){
			document.getElementById("verticalChart").innerHTML = "Vertical Chart - Off";
			hideElt('chart_percentPanel');
			
		}
		//when off
		else{
			document.getElementById("verticalChart").innerHTML = "Vertical Chart - On";
			showElt('chart_percentPanel');
		}
	}
	else if(clicked_id=="horizontalChart"){
		if(btnVal=="Horizontal Chart - On"){
			document.getElementById("horizontalChart").innerHTML = "Horizontal Chart - Off";
			hideElt('chart_highChartPanel');
			
		}
		//when off
		else{
			document.getElementById("horizontalChart").innerHTML = "Horizontal Chart - On";
			showElt('chart_highChartPanel');
		}
		
	}
	else if(clicked_id=="stackChart"){
		if(btnVal=="Stack Chart - On"){
			document.getElementById("stackChart").innerHTML = "Stack Chart - Off";
			hideElt('chart_highChart_stackPanel');
			
		}
		//when off
		else{
			document.getElementById("stackChart").innerHTML = "Stack Chart - On";
			showElt('chart_highChart_stackPanel');
		}
	}
}

//display or hid the various time series viz
function toggleTimeSeries(clicked_id){
	console.log("In toogle time series");
	console.log(clicked_id);
	var btnVal =document.getElementById(clicked_id).innerHTML;
	console.log(btnVal);
	
	if(clicked_id=="heatMap_ts"){
		//when on
		if(btnVal=="Heat Chart - On"){
			document.getElementById(clicked_id).innerHTML = "Heat Chart - Off";
			hideElt('heatMapPanel');
			
		}
		//when off
		else{
			document.getElementById(clicked_id).innerHTML = "Heat Chart - On";
			showElt('heatMapPanel');
		}
	}
	else if(clicked_id=="timeLine_ts"){
		if(btnVal=="Time Line - On"){
			document.getElementById(clicked_id).innerHTML = "Time Line - Off";
			hideElt('timelinePanel');
			
		}
		//when off
		else{
			document.getElementById(clicked_id).innerHTML = "Time Line - On";
			showElt('timelinePanel');
		}
		
	}
	
}

//alert for time filter
function openTimeLinePopUp(){
	//var myPopup = window.open("Blab blab", "Display Message", "width=200, height=100");
	window.alert("Note: times picked are applied to every day in the selected time frame.");
	
	
}

//hides all fields on page
function hideall() {
	hideElt('mapPanel');
	hideElt('barChartPanel');
	hideElt('tablePanel');
	hideElt('commentsPanel');
	hideElt('timeSeriesPanel');
}

//remove an element/frame from form
function hideElt(eltId) {
    var divElt = document.getElementById(eltId);
    if (divElt) {
      divElt.style.display = "none";
   } else {
      console.info("Invalid eltid in hideElt-"+eltId);
   }
}
//display and render element as block-level element
function showElt(eltId) {
    var divElt = document.getElementById(eltId);
    if (divElt) {
      divElt.style.display = "block";
   } else {
      console.info("Invalid eltid in showElt-"+eltId);
   }
}
//display and render element as in-line element
function showEltInline(eltId) {
    var divElt = document.getElementById(eltId);
    if (divElt) {
      divElt.style.display = "inline";
   } else {
      console.info("Invalid eltid in showEltInline-"+eltId);
   }
}
//sets element display type to null or ""
function showEltBlank(eltId) {
    var divElt = document.getElementById(eltId);
    if (divElt) {
      divElt.style.display = "";
   } else {
      console.info("Invalid eltid in showEltBlank-"+eltId);
   }
}




</script>

<!-- code for body that creates elements to hold the visualizations on the page -->
<body class="w3-light-grey">

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:7">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Filter</button>
    <span class="w3-bar-item w3-animate-left"> CrimeBuster</span>
    <div style="float: right;">
      <div class="w3-col s8 w3-bar" style = "width:150px;">
          <span>Welcome, <strong id='authenticatedUsername'>John</strong></span><br>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
      </div>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:305px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
    
    <div class="w3-container">
      <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>ÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂ  Geo</a> -->
      <h3>Filters </h3>
      <h4><span style='color:#000000;font-size:24px' id='numCrimesPerFilter'>[0]</span> Resulting Crimes</h4>
    </div>
    <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Close Menu</a>
 
     
     <hr>
     
     <label class=container>  &nbsp </span> <button type="button" name="selectAllButton" class="selectButton" id ="selectAll" onclick="selectAllSideBar(id)";>Select All</button>  &nbsp&nbsp </span> <button type="button" name="clearAllButton" class="clearAllButton" id ="clearAll" onclick="clearAllSideBar(id)";>Clear All</button></label>
    
      </div>
    <hr>
    
     <label class = container>  Filter by date range:&nbsp&nbsp&nbsp </label>
     <!--old date/time range filter
     <input type="text" id="daterange" name="daterange" size = "31" onchange="updateSideBar(id);" value="01/01/2010 1:30 PM - 05/01/2018 1:30 PM" />
 
	<script type="text/javascript">
		$(function() {
    		$('input[name="daterange"]').daterangepicker({
        		timePicker: true,
        		timePickerIncrement: 30,
        		locale: {
            		format: 'MM/DD/YYYY h:mm A'
        		}
    		});
		});
	</script> -->

	<div style = "margin-bottom: 5px"> &nbsp&nbsp Start Date: &nbsp&nbsp <input type="date" id="StartDate" onchange="updateSideBar(id);" value="2010-01-01"></div>

	<div> &nbsp&nbsp End Date:  &nbsp&nbsp&nbsp&nbsp<input type="date" id="EndDate"  onchange="updateSideBar(id);" value="2018-05-01"></div>

	<hr>

	
	<label class = container> <img src="images/qBlueSmaller.png" width='16' height='16' onClick="openTimeLinePopUp();" /> Filter by time of day:</label>
	<div style = "margin-bottom: 5px"> &nbsp&nbsp&nbsp Start time: &nbsp&nbsp <input type="time" id="StartTime" onchange="updateSideBar(id);" value="00:00:00"></div>
	<div> &nbsp&nbsp&nbsp End time:  &nbsp&nbsp&nbsp&nbsp<input type="time" id="EndTime"  onchange="updateSideBar(id);" value="00:00:00"></div>
	<hr>
	<!--
	<label class=container>  &nbsp </span> <button type="button" name="clearButton" class="clearButton" id ="selectAll" onclick="selectAllSideBar(id)";>Select All</button></label>
    
      </div>
    <hr>-->
	
	
      <label class=container>  &nbsp Crime Type&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input id ="crime_type" type = "checkbox" onchange="updateSideBar(id)";> <span class="checkmark"></span> <button type="button" name="clearButton" class="clearButton" id ="crime_type" onclick="clearSideBar(id)";>Clear</button></label>
      <div id="crimeTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp <img src="images/black.png" alt="Black" height="12" width="12"> AGG. Assault <input id ="agg_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/orange.png" alt="Orange" height="12" width="12"> Arson <input id ="arson" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/white.png" alt="White" height="12" width="12"> Assault By Threat <input id ="assault_threat" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/yellow.png" alt="Yellow" height="12" width="12"> Auto Theft <input id ="auto_theft" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/blue.png" alt="Blue" height="12" width="12"> Burglary <input id ="burglary" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/gray.png" alt="Gray" height="12" width="12"> Common Assault <input id ="common_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/red.png" alt="Red" height="12" width="12"> Homicide <input id ="homicide" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/pink.png" alt="Pink" height="12" width="12"> Larceny <input id ="larceny" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/magenta.png" alt="Magenta" height="12" width="12"> Larceny From Auto <input id ="larceny_auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/brown.png" alt="Brown" height="12" width="12"> Rape <input id ="rape" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/lime.png" alt="Lime" height="12" width="12"> Robbery - Street <input id ="robbery_street" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/green.png" alt="Green" height="12" width="12"> Robbery - Carjacking <input id ="robbery_carjacking" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/teal.png" alt="Teal" height="12" width="12"> Robbery - Commercial <input id ="robbery_commercial" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/cyan.png" alt="Cyan" height="12" width="12"> Robbery - Residence <input id ="robbery_residence" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp <img src="images/purple.png" alt="Purple" height="12" width="12"> Shooting <input id ="shooting" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
        <!-- there are different types of robery, Larceny, and assault. we can drill down further -->
    </div>
    <hr>
  <!-- side panel for options of weapon type -->

      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>ÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂ  Weapon Type</a>-->
      <label class=container> &nbsp Weapon Type &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id ="weapon_type" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span><button type="button" name="clearButton" class="clearButton" id ="weapon_type" onclick="clearSideBar(id)";>Clear</button></label>
      <div id="weaponTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp Firearm <input id ="weapon_firearm" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Hands <input id ="weapon_hands" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Knife <input id ="weapon_knife" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Other <input id ="weapon_other" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp No Weapon <input id ="weapon_none" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      </div>
      <hr>
      <!-- side panel for district, I will only list 4 for now, but we need to determine if we will list all 8+ -->
      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>ÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂ  District</a>-->
      <label class=container> &nbsp District &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id ="district" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span><button type="button" name="clearButton" class="clearButton" id ="district" onclick="clearSideBar(id)";>Clear</button></label>
      <div id="districtTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp Northern <input id ="district_north" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Southern <input id ="district_south" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Eastern <input id ="district_east" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Western <input id ="district_west" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Central <input id ="district_central" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp North Eastern <input id ="district_ne" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp North Western <input id ="district_nw" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp South Eastern <input id ="district_se" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp South Western <input id ="district_sw" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
      </div>
      <hr>
      
      
      <label class=container> &nbsp Location &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id ="I_O" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span><button type="button" name="clearButton" class="clearButton" id ="I_O" onclick="clearSideBar(id)";>Clear</button></label>
      <div id="districtTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp Inside <input id ="inside" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Outside <input id ="outside" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Unspecified <input id ="unspecified" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       
       
        </div>
      <hr>
      
      <!--
      //neighborhood elements
       <label class=container> &nbsp Neighborhood &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id ="neighborhood" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span><button type="button" name="clearButton" class="clearButton" id ="neighborhood" onclick="clearSideBar(id)";>Clear</button></label>
      <div id="districtTypeDiv" class ="w3-padding-large">
      	<label class=container> &nbsp Berea <input id ="berea" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       	<label class=container> &nbsp Cherry Hill <input id ="cherryHill" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Dorchester <input id ="dorchester" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Ellwood Park/Monument <input id ="monument" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Fairfield Area <input id ="fairfield" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Greenmount West <input id ="greenmountWest" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Orangeville <input id ="orangeville" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       	<label class=container> &nbsp Madison-Eastend <input id ="madisonEastend" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Pulaski <input id ="pulaski" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Rosemont <input id ="rosemont" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Other <input id ="neigh_other" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
        
      </div>
      <hr>
      -->
      <!-- side panel for location / sourrounding of crime. Note there are alot of options for these. We will need to narrow by alot-->
        <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>ÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂÃÂ  Location/Premise</a>-->
        <label class=container> &nbsp Premise &nbsp&nbsp&nbsp&nbsp&nbsp <input id ="location_Premise" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span><button type="button" name="clearButton" class="clearButton" id ="location_Premise" onclick="clearSideBar(id);">Clear</button></label>
        <div id="locationTypeDiv" class ="w3-padding-large">
        	<label class=container> &nbsp Alley <input id ="premise_Alley" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Apartment <input id ="premise_apt" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp ATM Machine <input id ="premise_atm" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Bank <input id ="premise_bank" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Bar <input id ="premise_bar" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Barber Shop <input id ="premise_barb" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Bridge <input id ="premise_bridge" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
					<label class=container> &nbsp Bus/Auto <input id ="premise_bus/auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Carry Out <input id ="premise_carry" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Convenience Store <input id ="premise_conv" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Court House <input id ="premise_court" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Department <input id ="premise_dept" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Driveway <input id ="premise_driveway" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Drug Store <input id ="premise_drugStore" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Dwelling <input id ="premise_dwelling" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Fast Food <input id ="premise_fast" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Fire Dept <input id ="premise_fire" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Garage <input id ="premise_garage" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Gas Station <input id ="premise_gasStation" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Grocery <input id ="premise_grocery" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Home <input id ="premise_home" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Hospital <input id ="premise_hosp" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Hotel <input id ="premise_hotel" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Laundry <input id ="premise_laund" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Light Rail <input id ="premise_lightRail" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Liquor Store <input id ="premise_liq" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Market Station <input id ="premise_mark" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Office <input id ="premise_office" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Recreation <input id ="premise_rec" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Religious <input id ="premise_rel" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Retail <input id ="premise_retail" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Restaurant <input id ="premise_rest" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
       		<label class=container> &nbsp Row/Townhome <input id ="premise_row" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
					<label class=container> &nbsp Park <input id ="premise_park" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
				  <label class=container> &nbsp Parking Lot <input id ="premise_parking" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Playground <input id ="premise_play" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Porch <input id ="premise_porch" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Public Area <input id ="premise_publ" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        	<label class=container> &nbsp School <input id ="premise_School" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        	<label class=container> &nbsp Specialty <input id ="premise_spec" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        	<label class=container> &nbsp Stadium <input id ="premise_stadium" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        	<label class=container> &nbsp Street <input id ="premise_Street" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label> 	 	 
      	 	<label class=container> &nbsp Subway <input id ="premise_sub" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      	 	<label class=container> &nbsp Vacant Building <input id ="premise_vac" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
         	<label class=container> &nbsp Warehouse <input id ="premise_war" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Wholesale <input id ="premise_wholesale" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      	 	<label class=container> &nbsp Yard <input id ="premise_yard" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label> 
      	 	<label class=container> &nbsp Other <input id ="premise_other" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
        
        
        </div>
        <hr>
          <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>Settings</a><br><br>
    </div>
  </nav>


  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
      <h5><b><i class="fa fa-dashboard"></i> Visualizations</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-quarter">
        <div class="w3-container w3-dark-grey w3-padding-16">
          <label class=container>&nbsp  Map <input id ="vis_map" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-dark-grey w3-padding-16">
          <label class=container>&nbsp Time Series <input id ="vis_heatmap" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      
     
      <div class="w3-quarter">
        <div class="w3-container w3-dark-grey w3-padding-16">
         <label class=container>&nbsp Charts <input id ="vis_chart" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      
      <div class="w3-quarter">
        <div class="w3-container w3-dark-grey w3-text-white w3-padding-16">
          <label class=container>&nbsp Data Table <input id ="vis_table" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
    </div>

    <div class="w3-panel" id="mapPanel">
      <div class="w3-row-padding" style="margin:0 -16px">
       <!--	 <div class="w3-half"> -->
       <h5><b>Map</b></h5> 
       
       <div class="w3-quarter">
        <div class="w3-content w3-dark-grey w3-padding-small">
           <label class=container> &nbsp Cluster Map Markers <input style="background:#000000"  id ="cluster" type = "checkbox" onchange="updateMarkers(id);"> <span class="checkmark"></span></label> 
        </div>
      </div>
      
  		<div id="map" class="container" style="width:100%;height:800px" alt="Crime map of Baltimore"</div>
  	 <!--	<div id="map" class="fill" alt="Crime map of Baltimore"</div> -->
  		</div>
  		</div>
  	<!--		</div> -->
  		</div>
<hr>

<div class="w3-panel" id="timeSeriesPanel">
	<span><b>Time Series</b></span> &nbsp&nbsp <button id="heatMap_ts" onClick="toggleTimeSeries(id);">Heat Chart - On</button> <button id="timeLine_ts" onClick="toggleTimeSeries(id);">Time Line - On</button>
<div class="w3-panel" id="heatMapPanel">
  <div class="w3-row-padding" style="margin:0 -16px">
   
      <!--<h5><b>Heat Chart</b></h5>-->
      <!--  <img src="images/heatmap_placeImg.png" alt="heatMap pic"  -->
        <div id="heatMapVisualization" style="height: 500px; min-width: 610px; max-width: 1000px; margin: 0 auto"></div>
         <!-- height="42" width="42" -->
  
  </div>
  </div>
  <hr>
  
  <div class="w3-panel" id="timelinePanel">
  <div class="w3-row-padding" style="margin:0 -16px">
  	<!--<h5><b>Time Line</b></h5>-->
  <div id="timelineSeries" style="height: 500px; min-width: 610px; max-width: 1000px; margin: 0 auto"></div>


</div>
  </div>
  
</div>
<hr>

<div class="w3-panel" id="barChartPanel">
	<h5><b>Charts</b></h5>

     <span style="text-align: center"> Outer Category Filter </span>
     <select id='barChartX' name='barChartX' onchange="updateSideBar(id);">
		    <!--  <option value="" selected='selected'>Please select an option</option> -->
		      <option value="crime_Type_barChart" >Crime Type</option>
          <option value="weapon_Type_barChart" selected='selected'>Weapon Type</option>
          <option value="district_Type_barChart">District</option>
          
		      
		   </select>
		   &nbsp&nbsp
		   <button id="verticalChart" onClick="toggleBarCharts(id);">Vertical Chart - On</button> <button id="horizontalChart" onClick="toggleBarCharts(id);">Horizontal Chart - On</button> <button id="stackChart" onClick="toggleBarCharts(id);">Stack Chart - On</button>
    
    <br>
    
    <div id="chart_percentPanel">
    	<br><br>
    	<div id="chart_percent"></div>
    </div>
    
    <div id="chart_highChartPanel">
    	<br><br>
    	<div id="chart_highChart"></div>
    </div>
    
    <div id="chart_highChart_stackPanel">
    	<br><br>
    	 <div id="chart_highChart_stack"></div>
    </div>
    
    
    

 
  </div>



<hr>

<!-- this part is hardcoder for the docs, we need to remove it -->
<div class="w3-container" id="tablePanel">
  <h5><b>Table</b></h5>
  <div class="w3-row">
   

     <table id="table_id" class="display">
    <thead>
        <tr>
        		<th>CrimeCode</th>
            <th>Crime Type</th>
            <th>District</th>
            <th>Weapon Type</th> 
            <th>Premise</th>
            <th>Address</th>
            <th>Neighborhood</th>
            
            <th>Inside/Out</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>
        		<th>CrimeCode</th>
            <th>Crime Type</th>
            <th>District</th>
            <th>Weapon Type</th> 
            <th>Premise</th>
            <th>Address</th>
            <th>Neighborhood</th>
            
            <th>Inside/Out</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </tfoot>
    
    
    
</table> 



  </div>
  
</div>

    <br> <br>

<!-- code for the comments Panel
    <div class="w3-container" id="commentsPanel_old">
      <h5>Recent Comments</h5>
      <div class="w3-row">
        <div class="w3-col m2 text-center">
          <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
        </div>
        <div class="w3-col m10 w3-container">
          <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
        </div>
      </div>

      <div class="w3-row">
        <div class="w3-col m2 text-center">
          <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
        </div>
        <div class="w3-col m10 w3-container">
          <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
          <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
        </div>
      </div>
    </div>
    -->
    <br>
   
   <!--close page div-->
</div>
    <!-- Footer -->
    <!-- <footer class="w3-container w3-padding-16 w3-light-grey">
      <h4>FOOTER</h4>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer> -->

    <!-- End page content -->
    
    <!--
    <Button type='button' onClick='updateFormControls()'> ClickMe to get Locations!</Button>
    <p>Pulling Stuff: <span id="ajaxText"></span></p> -->
    
  
  
  
  


</body>


<script type="text/javascript">
		////this was brought down as my sidebar had not been declare when the code load
		   // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
    
 </script>

</html>
