<?PHP
//php code stuff as setting up db and stuff goes here

$db = new SQLite3('db/mydb.db');
$myStreet="STREET";
//$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");
$results = $db->query("SELECT * FROM mydb");



$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9]." ". $row[16]);
	
}



//echo json_encode($myArray);

?>

<!DOCTYPE html >
<html>
<title>CrimeBuster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- styles are here -->
<link href="styles/style2.css" rel="stylesheet" type="text/css">
<link href="c3-0.5.3/c3.css" rel="stylesheet">

<!-- javascript functions goes here
 <script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
 <script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.ocean.js"></script>  -->
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!--<script src="scripts/heatMap.js"></script> -->

<script type="text/javascript">

/*
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
    } */


//KS
var markers = [];
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 11,
		center: {lat: 39.2904, lng: -76.6122}
	});
}

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


//KS update map
function updateMap(crimes, myMarkers) {
	// Create tooltip that will appear when marker is clicked
	initMap();
	var info = new google.maps.InfoWindow();
	var markers = myMarkers;
	console.log("In update map Marker Type is");
	//console.log(typeof markers);
	var locs = new Array();
	var tips = new Array();
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
		locs.push({lat: lat, lng: lng});
		tips.push('<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<h1 id="firstHeading" class="firstHeading">'+crime+'</h1>'+
			'<div id="bodyContent">'+
			'<p>'+crime+' was commited here at '+time+' on '+date+'.</p>'+
			'<p>for full entry, click <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
			'here</a></p> '+
			'<p><button onclick="addComment(crimeID)">Add comment</button>' +
			'<button onclick="viewComments(crimeID)">View comments</button></p>' +
			'</div>'+
			'</div>');
	}
	markers = locs.map(function(loc, i) {
		var marker = new google.maps.Marker({
			position: loc,
			map: map
			});
		marker.addListener('click', function() {
			info.setContent(tips[i]);
			info.open(map, marker);
		});
		return marker
		});
	// Add a marker clusterer to manage the markers.
	var markerCluster = new MarkerClusterer(map, markers,
		{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

}

//KS--add in code
function addComment(crime) {
    var user = 12345;
    //ID = get max ID from existing comments
    var ID = 00000;
    var comment = prompt("Enter comment:", "");
    if (comment != null && comment != "") {
        //<user> added comment to <crime entry>
    }
}

//KS--load comments
function viewComments(crimeID) {
	//load comments and jump to comment section
	$('#commentsPanel').goTo();
}

//SM

// Accepts a Date object or date string that is recognized by the Date.parse() method
function getDayOfWeek(date) {
var dayOfWeek = new Date(date).getDay(); 
return isNaN(dayOfWeek) ? null : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][dayOfWeek];
}

function heatMapData(Data){
	
	console.log("In heat Map function - data is in dataSet variable");
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
    text: 'Crimes every three hours per weekday'
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
    maxColor: Highcharts.getOptions().colors[0]
  },

  legend: {
    align: 'right',
    layout: 'vertical',
    margin: 0,
    verticalAlign: 'top',
    y: 25,
    symbolHeight: 280
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





<!-- additional scripts that interactive with page -->


//control function based on user interaction
//hide and displays visualizations on page
function updateVisualizations(clicked_id){
	
		hideall();
	//	hideElt('mapPanel');
//	hideElt('heatMapPanel');
	//hideElt('barChartPanel');
	//hideElt('tablePanel');
	console.log(clicked_id);
		
		if(document.getElementById('vis_map').checked){
			showElt('mapPanel');
			showElt('commentsPanel');
			console.log("showing map - showing comments");
		}
		if(document.getElementById('vis_chart').checked){
			showElt('barChartPanel');
			console.log("showing chart");
		}
		if(document.getElementById('vis_heatmap').checked){
			showElt('heatMapPanel');
			console.log("showing heat map");
		}
		if(document.getElementById('vis_table').checked){
			showElt('tablePanel');
			console.log("showing table");
		}
		
	
			//testing ajax
			/*	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
       // calling appropriate chart using ajax
        if(clicked_id == "barChartX"){
        	var myArray = new Array();
        	myArray.push("Test1");
        	var xVal = document.getElementById('barChartX').value;
        	 console.log(xVal);
        	 xmlhttp.onreadystatechange = function() {
            
                document.getElementById("barChart").innerHTML = this.responseText;
        	};
        var str=1;
        //xmlhttp.open("GET","db/barChart.php?q="+xVal, myArray, true);
        xmlhttp.open("GET","db/barChart2.php", true);
        xmlhttp.send();
        }
       
        
        */
	
}

//ignore this for now
function updateFormControls() {

		//testing ajax
				if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
            //if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxText").innerHTML = this.responseText;
            //}
        };
        var str=1;
        xmlhttp.open("GET","db/templateAjax.php?q="+str,true);
        xmlhttp.send();

}

function formatDate(str){
	console.log("Call format date");
	var splitD = str.split('/');
	var returnStr = splitD[2]+'-'+splitD[0]+'-'+splitD[1];
	return returnStr;
	
	
}

function getTwentyFourHourTime(amPmString) { 
	var d = new Date("1/1/2013 " + amPmString); 
	return d.getHours() + ':' + d.getMinutes(); 
}

//manipilation of side bar
function updateSideBar(clicked_id){
	
	//if(clicked_id=="daterange"){
	//	console.log("Date picker calls function");
		var dateSelect = 	document.getElementById("daterange").value;
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
			document.getElementById("premise_home").checked = true;
			document.getElementById("premise_bus/auto").checked = true;
			document.getElementById("premise_hotel").checked = true;
			document.getElementById("premise_gasStation").checked = true;
			//console.log("location_premise is now check");
		}
		else{
			document.getElementById("premise_home").checked = false;
			document.getElementById("premise_bus/auto").checked = false;
			document.getElementById("premise_hotel").checked = false;
			document.getElementById("premise_gasStation").checked = false;
			
		}
	}
	
	
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
	
	//date / time
	var wt_StartDate = correctStartDate;
	var wt_EndDate = correctEndDate;
	var wt_StartTime = correctStartTime;
	var wt_EndTime = correctEndTime;
	
	
  
  //firearm
  
  //if(clicked_id=="weapon_firearm"||clicked_id=="weapon_hands"||clicked_id=="weapon_knife"||clicked_id=="weapon_other"){
  	
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
  	
  //}
  /*
  if(clicked_id == "agg_assault" || clicked_id == "arson" || clicked_id == "assault_threat" || 
  clicked_id == "auto_theft" || clicked_id == "burglary" || clicked_id == "common_assault" ||
  clicked_id  == "homicide" || clicked_id == "larceny" || clicked_id == "larceny_auto" || clicked_id == "rape" || 
  clicked_id == "robbery_street" || clicked_id == "robbery_carjacking" || clicked_id == 
  "robbery_commercial" || clicked_id == "robbery_residence" || clicked_id == "shooting"){
  */
  	
  	if (document.getElementById('agg_assault').checked) {
  		wt_AggAssault="AGG. ASSAULT";
  	//	console.log("AGG. ASSAULT");
  	}
  	if (document.getElementById('arson').checked) {
  		wt_Arson="ARSON";
  	//	console.log("ARSON");
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
  	
  //}
  /*
  if(clicked_id == "district_north" || clicked_id == "district_south" || clicked_id == "district_east" || 
  clicked_id == "district_west" || clicked_id == "district_central" || clicked_id == "district_ne" ||
  clicked_id  == "district_nw" || clicked_id == "district_se" || clicked_id == "district_sw"){
  	*/
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
  
  
  /*
  if(clicked_id=="agg_assault"){
    console.log(clicked_id);
    if (document.getElementById('agg_assault').checked) {
 
			$.ajax({
		    url:"db/getMapLocations.php",
		    data: {wt_Other: wt_Other, wt_Hands: wt_Hands, wt_Knife: wt_Knife, wt_Firearm: wt_Firearm},
		    type:"POST",
		    success:function(msg){
		        //id_numbers = msg;
		       // returnD=$(msg);
		        //console.log(id_numbers);
		        handleResponse(msg);
		    },
		    dataType:"json"
			});
			
  	}//close second if
	}//close if
	*/
	//ajax call here

	//ajax call for  bar chart
		if(document.getElementById('barChartX').value =="weapon_Type_barChart"){
			console.log("Calling weapon type from bar chart");
			$.ajax({
		    url:"db/getWeaponChartData.php",
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
		    	console.log("should return here for bar chart");
		    	//console.log(msg);
		    	//var bCType = "crimeBC";
		        handleResponseBChart(msg, "weaponBC");
		    },
		    /*failure:function(msg2){
		    		console.log("did not work");
		    }*/
		    dataType:"json"
			});
			
			/*function handleResponseBChart(data) {
				console.log("IN handle response for b chart");
				console.log(data);
				updateBarGraph(data);
		
			}//inner handler */
		}//close if
		
		//ajax call for crime type bar chart
		if(document.getElementById('barChartX').value =="crime_Type_barChart"){
			console.log("Calling crime type from bar chart");
			$.ajax({
		    url:"db/getDescriptionData.php",
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
		    	console.log("should return here for bar chart - crime type");
		    	//console.log(msg);
		    	//var bCType = "crimeBC";
		        handleResponseBChart(msg, "crimeBC");
		    },
		    /*failure:function(msg2){
		    		console.log("did not work");
		    }*/
		    dataType:"json"
			});
			
			
		}//close if
		
		//ajax call for crime type bar chart
		if(document.getElementById('barChartX').value =="district_Type_barChart"){
			console.log("Calling crime type from bar chart");
			$.ajax({
		    url:"db/getDistrictData.php",
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
		    	console.log("should return here for bar chart - crime type");
		    	//console.log(msg);
		    	//var bCType = "crimeBC";
		        handleResponseBChart(msg, "districtBC");
		    },
		    /*failure:function(msg2){
		    		console.log("did not work");
		    }*/
		    dataType:"json"
			});
			
			
			
			
		}//close if
	
	//ajax call for location bar chart should be here
	if(document.getElementById('barChartX').value =="location_Type_barChart"){
		var msg= [];
		handleResponseBChart(msg, "locationBC");
	}
	
	
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
		    	wt_EndDate1: wt_EndDate, wt_StartTime1: wt_StartTime, wt_EndTime1: wt_EndTime},
		    type:"POST",
		    success:function(msg){
		        handleResponse(msg);
		    },
		    dataType:"json"
			});
	
	function handleResponse(data) {
    // do something with data here, pershaps render map

    //console.log("In handle response");
   // console.log(data);
	//console.log("In handle response markers type is");
	//console.log(typeof markers);
	updateMap(data, markers);
	console.log("Before call heatMap ");
	heatMapData(data);
	
	//display to the map the number of crimes with these filters
	var crimesCount = data.length;
	//console.log(crimesCount);
	var retStr = "<span style='color:#f00;'>["+crimesCount+"]</span>";
	//document.getElementById('numCrimesPerFilter').innerHTML="<span style='color:#f00;'>[crimesCount]</span>";
	document.getElementById('numCrimesPerFilter').innerHTML=retStr;
	
	}
	
	function handleResponseBChart(data, bCType) {
				console.log("IN handle response for bar chart");
				console.log(data);
				console.log(bCType)
				updateBarGraph(data, bCType);
		
			}//inner handler
	

	
}//close function

//hides all fields on page
function hideall() {
	hideElt('mapPanel');
	hideElt('heatMapPanel');
	hideElt('barChartPanel');
	hideElt('tablePanel');
	hideElt('commentsPanel');
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

<body class="w3-light-grey">

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:7">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Filter</button>
    <span class="w3-bar-item w3-animate-left"> CrimeBuster</span>
    <div style="float: right;">
      <div class="w3-col s8 w3-bar" style = "width:150px;">
          <span>Welcome, <strong>John</strong></span><br>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
      </div>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
    <!--  <div class="w3-col s4">
        <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong>John</strong></span><br>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr> -->
    <div class="w3-container">
      <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a> -->
      <h3>Filters <span style='color:#f00;font-size:24px' id='numCrimesPerFilter'>[0]</span> </h3>
    </div>
    <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
 
      
      <!-- <label class=container> <b>Weapon Filter</b> </label> -->
      <!--
      <a href="#" class="w3-bar-item w3-button w3-padding" id="weaponFilterPanel"><i class="fa fa-bell fa-fw" onclick="updateSideBar(this.id)"></i>  Weapon Filter</a>
      <div id="weaponFilterDiv" class ="w3-padding-large">
        <label class=container> One<input type = "checkbox" ><span class="checkmark"></span></label> <!-- <input type = "checkbox" checked="checked"> -->
        <!--
        <label class="container">Two<input type="checkbox"><span class="checkmark"></span></label>
        <label class="container">Three<input type="checkbox"><span class="checkmark"></span></label>
        <label class="container">Four<input type="checkbox"><span class="checkmark"></span></label>
    </div>
    -->

  <!-- different options for crime type. note the class name ='w3-padding-large determines the padding'-->
     <!-- <a href="#" class="w3-bar-item w3-button w3-padding" id="crimeTypePanel"><i class="fa fa-eye fa-fw"></i>  Crime Type</a>-->

     <hr>
     
     <label class = container> Time Picker </label>
     <input type="text" id="daterange" name="daterange" size = "50" onchange="updateSideBar(id);" value="01/01/2010 1:30 PM - 01/01/2018 1:30 PM" />
 
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
	</script>

	<hr>
      <label class=container>  &nbsp Crime Type <input id ="crime_type" type = "checkbox" onchange="updateSideBar(id)";> <span class="checkmark"></span></label>
      <div id="crimeTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp AGG. Assault <input id ="agg_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Arson <input id ="arson" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Assault By Threat <input id ="assault_threat" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Auto Theft <input id ="auto_theft" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Burglary <input id ="burglary" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Common Assault <input id ="common_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Homicide <input id ="homicide" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Larceny <input id ="larceny" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Larceny From Auto <input id ="larceny_auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp  Rape <input id ="rape" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Robbery - Street <input id ="robbery_street" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Robbery - Carjacking <input id ="robbery_carjacking" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Robbery - Commercial <input id ="robbery_commercial" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Robbery - Residence <input id ="robbery_residence" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Shooting <input id ="shooting" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
        <!-- there are different types of robery, Larceny, and assault. we can drill down further -->
    </div>
    <hr>
  <!-- side panel for options of weapon type -->

      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Weapon Type</a>-->
      <label class=container> &nbsp Weapon Type <input id ="weapon_type" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      <div id="weaponTypeDiv" class ="w3-padding-large">
        <label class=container> &nbsp Firearm <input id ="weapon_firearm" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Hands <input id ="weapon_hands" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Knife <input id ="weapon_knife" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp Other <input id ="weapon_other" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> &nbsp No Weapon <input id ="weapon_none" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      </div>
      <hr>
      <!-- side panel for district, I will only list 4 for now, but we need to determine if we will list all 8+ -->
      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  District</a>-->
      <label class=container> &nbsp District <input id ="district" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
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
      <!-- side panel for location / sourrounding of crime. Note there are alot of options for these. We will need to narrow by alot-->
        <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Location/Premise</a>-->
        <label class=container> &nbsp Location/Premise <input id ="location_Premise" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <div id="locationTypeDiv" class ="w3-padding-large">
          <label class=container> &nbsp Home <input id ="premise_home" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Bus/Auto <input id ="premise_bus/auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container>&nbsp  Hotel <input id ="premise_hotel" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> &nbsp Gas Station <input id ="premise_gasStation" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        </div>
        <hr>
      <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a> -->
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
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
        <div class="w3-container w3-red w3-padding-16">
          <label class=container>&nbsp  Map <input id ="vis_map" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
         <label class=container>&nbsp Charts <input id ="vis_chart" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <label class=container>&nbsp Heat Map <input id ="vis_heatmap" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
          <label class=container>&nbsp Data Table <input id ="vis_table" type = "checkbox" onchange="updateVisualizations(id);" checked> <span class="checkmark"></span></label>
        </div>
      </div>
    </div>

    <div class="w3-panel" id="mapPanel">
      <div class="w3-row-padding" style="margin:0 -16px">
       <!--	 <div class="w3-half"> -->
          <h5>Map</h5>
         
  		<div id="map" class="container" style="width:100%;height:800px" alt="Crime map of Baltimore"</div>
  	 <!--	<div id="map" class="fill" alt="Crime map of Baltimore"</div> -->
  		</div>
  		</div>
  	<!--		</div> -->
  		</div>
<hr>

<div class="w3-panel" id="heatMapPanel">
  <div class="w3-row-padding" style="margin:0 -16px">
   
      <h5>Charts</h5>
      <!--  <img src="images/heatmap_placeImg.png" alt="heatMap pic"  -->
        <div id="heatMapVisualization" style="height: 400px; min-width: 310px; max-width: 800px; margin: 0 auto"></div>
         <!-- height="42" width="42" -->
  
  </div>
  </div>
  
  
<hr>
<div class="w3-panel" id="barChartPanel">
 <span id="barChart"></span>
     <span style="text-align: center"> Category </span>
     <select id='barChartX' name='barChartX' onchange="updateSideBar(id);">
		      <option value="" selected='selected'>Please select an option</option>
		      <option value="crime_Type_barChart" >Crime Type</option>
          <option value="weapon_Type_barChart" >Weapon Type</option>
          <option value="district_Type_barChart">District</option>
          <option value="location_Type_barChart">Location</option>
		      
		   </select>
    
    <div id="chart"></div>

 
  </div>



<hr>

<!-- this part is hardcoder for the docs, we need to remove it -->
<div class="w3-container" id="tablePanel">
  <h5><b>Table</b></h5>
  <div class="w3-row">
    <div class="w3-container w3-third">
      <h6>Crime Type Ratio</h6>
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
          <td>Robbery</td>
          <td>65%</td>
        </tr>
        <tr>
          <td>Burglary</td>
          <td>15.7%</td>
        </tr>
        <tr>
          <td>Shooting</td>
          <td>5.6%</td>
        </tr>
        <tr>
          <td>Arson</td>
          <td>2.1%</td>
        </tr>
        <tr>
          <td>Homicide</td>
          <td>1.9%</td>
        </tr>
        <tr>
          <td>Other</td>
          <td>1.5%</td>
        </tr>
      </table><br>
    </div>

    <div class="w3-container w3-third" style="margin-left:50px">
      <h6>District Crime Ratio</h6>
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
          <td>North Baltimore</td>
          <td>19%</td>
        </tr>
        <tr>
          <td>South Baltimore</td>
          <td>22.1%</td>
        </tr>
        <tr>
          <td>East</td>
          <td>33%</td>
        </tr>
        <tr>
          <td>West</td>
          <td>25.9%</td>
        </tr>

      </table><br>
    </div>



  </div>
  <button class="w3-button w3-dark-grey">Other Options  <i class="fa fa-arrow-right"></i></button>
</div>

    


    <div class="w3-container" id="commentsPanel">
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
  <!-- Load d3.js and c3.js 
<script src="/path/to/d3.v4.min.js" charset="utf-8"></script> -->
<script src="https://d3js.org/d3.v4.min.js" charset="utf-8"></script>
<script src="c3-0.5.3/c3.min.js"></script>
<script src="scripts/chartVis.js"></script>


<!--
<script src="scripts/heatMap.js"></script> -->
<!--
<div id="heatMapVisualization" style="height: 400px; min-width: 310px; max-width: 800px; margin: 0 auto"></div>
-->

</html>
