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

<!-- javascript functions goes here -->
 <script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
 <script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.ocean.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyBxevA7di7Avo5vGKAgPPSkJa8ud4gnI&callback=initMap"></script>

<script type="text/javascript">

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

// Set body of tooltip
var contentString = '<div id="content">'+
	'<div id="siteNotice">'+
	'</div>'+
	'<h1 id="firstHeading" class="firstHeading">CRIME</h1>'+
	'<div id="bodyContent">'+
	'<p><b>Crime</b> was commited here at <b>time</b> on <b>date</b>.</p>'+
	'<p>for full entry, click <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
	'here</a></p> '+
	'<p><button onclick="addComment()">Add comment</button>' +
	'<button onclick="viewComments()">View comments</button></p>' +
	'</div>'+
	'</div>';
	

//KS update map
function updateMap(crimes, myMarkers) {
	// Create tooltip that will appear when marker is clicked
	initMap();
	var info = new google.maps.InfoWindow()
	var markers = myMarkers;
	console.log("In update map Marker Type is");
	console.log(typeof markers);
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
		locs.push({lat: lat, lng: lng});
		tips.push('<div id="content">'+
	'<div id="siteNotice">'+
	'</div>'+
	'<h1 id="firstHeading" class="firstHeading">'+crime+'</h1>'+
	'<div id="bodyContent">'+
	'<p>'+crime+' was commited here at '+time+' on '+date+'.</p>'+
	'<p>for full entry, click <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
	'here</a></p> '+
	'<p><button onclick="addComment()">Add comment</button>' +
	'<button onclick="viewComments()">View comments</button></p>' +
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
function addComment() {
    var user = "USERNAME";
    var comment = prompt("Enter comment:", "");
    if (comment != null && comment != "") {
        //<user> added comment to <crime entry>
    }
}

//KS--load comments
function viewComments() {
	//load comments and jump to comment section
	$('#comments').goTo();
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

function updateVisualizations(clicked_id){
	
			//testing ajax
				if (window.XMLHttpRequest) {
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
       
        
        
	
}
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

//manipilation of side bar
function updateSideBar(clicked_id){
	
	
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
  		console.log("AGG. ASSAULT");
  	}
  	if (document.getElementById('arson').checked) {
  		wt_Arson="ARSON";
  		console.log("ARSON");
  	}
  	if (document.getElementById('assault_threat').checked) {
  		wt_AssaultByThreat="ASSAULT BY THREAT";
  		console.log("ASSAULT BY THREAT");
  	}
  	if (document.getElementById('auto_theft').checked) {
  		wt_AutoTheft="AUTO THEFT";
  		console.log("AUTO THEFT");
  	}
  	if (document.getElementById('burglary').checked) {
  		wt_Burglary="BURGLARY";
  		console.log("BURGLARY");
  	}
  	if (document.getElementById('common_assault').checked) {
  		wt_CommonAssault="COMMON ASSAULT";
  		console.log("COMMON ASSAULT");
  	}
  	if (document.getElementById('homicide').checked) {
  		wt_Homicide="HOMICIDE";
  		console.log("HOMICIDE");
  	}
  	if (document.getElementById('larceny').checked) {
  		wt_Larceny="LARCENY";
  		console.log("LARCENY");
  	}
  	if (document.getElementById('larceny_auto').checked) {
  		wt_LarcenyAuto="LARCENY FROM AUTO";
  		console.log("LARCENY FROM AUTO");
  	}
  	if (document.getElementById('rape').checked) {
  		wt_Rape="RAPE";
  		console.log("RAPE");
  	}
  	if (document.getElementById('robbery_street').checked) {
  		wt_RobberyStreet="ROBBERY - STREET";
  		console.log("ROBBERY - STREET");
  	}
  	if (document.getElementById('robbery_carjacking').checked) {
  		wt_RobberyCar="ROBBERY - CARJACKING";
  		console.log("ROBBERY - CARJACKING");
  	}
  	if (document.getElementById('robbery_commercial').checked) {
  		wt_RobberyCom="ROBBERY - COMMERCIAL";
  		console.log("ROBBERY - COMMERCIAL");
  	}
  	if (document.getElementById('robbery_residence').checked) {
  		wt_RobberyRes="ROBBERY - RESIDENCE";
  		console.log("ROBBERY - RESIDENCE");
  	}
  	if (document.getElementById('shooting').checked) {
  		wt_Shooting="SHOOTING";
  		console.log("SHOOTING");
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
		    	wt_SouthEastern1: wt_SouthEastern, wt_SouthWestern1: wt_SouthWestern},
		    type:"POST",
		    success:function(msg){
		        handleResponse(msg);
		    },
		    dataType:"json"
			});
	
	function handleResponse(data) {
    // do something with data here, pershaps render map

    console.log("In handle response");
    console.log(data);
	console.log("In handle response markers type is");
	console.log(typeof markers);
	updateMap(data, markers);
	}
	
}//close function

//hides all fields on page
function hideall() {

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
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Filters</button>
    <span class="w3-bar-item w3-right">CrimeBuster</span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong>John</strong></span><br>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr>
    <div class="w3-container">
      <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a> -->
      <h4>Dashboard</h4>
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
      <label class=container> Crime Type <input id ="crime_type" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      <div id="crimeTypeDiv" class ="w3-padding-large">
        <label class=container> AGG. Assault <input id ="agg_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Arson <input id ="arson" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Assault By Threat <input id ="assault_threat" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Auto Theft <input id ="auto_theft" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Burglary <input id ="burglary" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Common Assault <input id ="common_assault" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Homicide <input id ="homicide" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Larceny <input id ="larceny" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Larceny From Auto <input id ="larceny_auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Rape <input id ="rape" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Robbery - Street <input id ="robbery_street" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Robbery - Carjacking <input id ="robbery_carjacking" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Robbery - Commercial <input id ="robbery_commercial" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Robbery - Residence <input id ="robbery_residence" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Shooting <input id ="shooting" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
        <!-- there are different types of robery, Larceny, and assault. we can drill down further -->
    </div>

  <!-- side panel for options of weapon type -->

      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Weapon Type</a>-->
      <label class=container> Weapon Type <input id ="weapon_type" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      <div id="weaponTypeDiv" class ="w3-padding-large">
        <label class=container> Firearm <input id ="weapon_firearm" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Hands <input id ="weapon_hands" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Knife <input id ="weapon_knife" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Other <input id ="weapon_other" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> No Weapon <input id ="weapon_none" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      </div>

      <!-- side panel for district, I will only list 4 for now, but we need to determine if we will list all 8+ -->
      <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  District</a>-->
      <label class=container> District <input id ="district" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
      <div id="districtTypeDiv" class ="w3-padding-large">
        <label class=container> Northern <input id ="district_north" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Southern <input id ="district_south" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Eastern <input id ="district_east" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Western <input id ="district_west" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> Central <input id ="district_central" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> North Eastern <input id ="district_ne" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> North Western <input id ="district_nw" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> South Eastern <input id ="district_se" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <label class=container> South Western <input id ="district_sw" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        
      </div>

      <!-- side panel for location / sourrounding of crime. Note there are alot of options for these. We will need to narrow by alot-->
        <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Location/Premise</a>-->
        <label class=container> Location/Premise <input id ="location_Premise" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        <div id="locationTypeDiv" class ="w3-padding-large">
          <label class=container> Home <input id ="premise_home" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> Bus/Auto <input id ="premise_bus/auto" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> Hotel <input id ="premise_hotel" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
          <label class=container> Gas Station <input id ="premise_gasStation" type = "checkbox" onchange="updateSideBar(id);"> <span class="checkmark"></span></label>
        </div>
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
          <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>52</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Maps</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>99</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Charts</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>23</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Graphs</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
          <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>50</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Tables</h4>
        </div>
      </div>
    </div>

    <div class="w3-panel">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half">
          <h5>Map</h5>
  		<div id="map" style="width:900px;height:500px" alt="Crime map of Baltimore"</div>
  		</div>
<hr>

<div class="w3-panel">
  <div class="w3-row-padding" style="margin:0 -16px">
    <div class="w3-half">
      <h5>Charts</h5>
         <img src="images/heatmap_placeImg.png" alt="heatMap pic" >
         <!-- height="42" width="42" -->
  </div>
<hr>

<div class="w3-panel">
  <div class="w3-row-padding" style="margin:0 -16px">
    <div class="w3-half">
      <h5>Graphs</h5>
         <img src="images/barChart_placeImg.png" alt="heatMap pic" >
         <!-- height="42" width="42" -->
  </div>
<hr>

<!-- this part is hardcoder for the docs, we need to remove it -->
<div class="w3-container">
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
<hr>

      <!-- <iframe src="map.html" width="500px" height="500px">
        <p>Your browser does not support iframes.</p>
      </iframe> -->

        <!-- <div class="w3-half">
          <h5>Feeds</h5>
          <table class="w3-table w3-striped w3-white">
            <tr>
              <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
              <td>New record, over 90 views.</td>
              <td><i>10 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
              <td>Database error.</td>
              <td><i>15 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
              <td>New record, over 40 users.</td>
              <td><i>17 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
              <td>New comments.</td>
              <td><i>25 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
              <td>Check transactions.</td>
              <td><i>28 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
              <td>CPU overload.</td>
              <td><i>35 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
              <td>New shares.</td>
              <td><i>39 mins</i></td>
            </tr>
          </table>
        </div> -->
      </div>
    </div>
    <!-- <hr>
    <div class="w3-container">
      <h5>General Stats</h5>
      <p>New Visitors</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
      </div>

      <p>New Users</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
      </div>

      <p>Bounce Rate</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
      </div>
    </div> -->
    <hr>


    <div class="w3-container" id="comments">
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
    <!-- <div class="w3-container w3-dark-grey w3-padding-32">
      <div class="w3-row">
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-green">Demographic</h5>
          <p>Language</p>
          <p>Country</p>
          <p>City</p>
        </div>
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-red">System</h5>
          <p>Browser</p>
          <p>OS</p>
          <p>More</p>
        </div>
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-orange">Target</h5>
          <p>Users</p>
          <p>Active</p>
          <p>Geo</p>
          <p>Interests</p>
        </div>
      </div> -->
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
    
    <span id="barChart"></span>
    <span> X axis </span>
     <select id='barChartX' name='barChartX' onchange="updateVisualizations(id);">
		      <option value="">Please select an option</option>
		      <option value="Crime_Type" selected='selected'>Crime Type</option>
          <option value="Weapon_Type">Weapon Type</option>
		      
		   </select>
    
    
   
    <div id="chart"></div>
  </div>
  
  
  


</body>

  <!-- Load d3.js and c3.js 
<script src="/path/to/d3.v4.min.js" charset="utf-8"></script> -->
<script src="https://d3js.org/d3.v4.min.js" charset="utf-8"></script>
<script src="c3-0.5.3/c3.min.js"></script>
<script src="scripts/chartVis.js"></script>
</html>
