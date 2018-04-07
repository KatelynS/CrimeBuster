<?PHP
//php code stuff as setting up db and stuff goes here

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

<!-- javascript functions goes here -->
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



</script>

<script type="text/javascript">
//KS
function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 11,
		center: {lat: 39.2904, lng: -76.6122}
	});

	// Create an array of alphabetical characters used to label the markers.
	//var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
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

	// Create tooltip that will appear when marker is clicked
	var tooltip = new google.maps.InfoWindow({
		content: contentString
		});
	// Add some markers to the map.
	// Note: The code uses the JavaScript Array.prototype.map() method to
	// create an array of markers based on a given "locations" array.
	// The map() method here has nothing to do with the Google Maps API.
	var markers = locations.map(function(location, i) {
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			//label: labels[i % labels.length]
			});
		marker.addListener('click', function() {
			tooltip.open(map, marker);
		});
		return marker
		});
	// Add a marker clusterer to manage the markers.
	var markerCluster = new MarkerClusterer(map, markers,
		{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}//KS
var locations = [
// Get {lat, long} of all selected crimes using SQL
{lat: 39.2904, lng: -76.6122},
{lat: 39.3, lng: -76.6},
{lat: 39.3, lng: -76.6122},
{lat: 39.2904, lng: -76.6}
]

//KS--add in code
function addComment() {
    var user = "USERNAME";
    var comment = prompt("Enter comment:", "");
    if (comment != null && comment != "") {
        //<user> added comment to <crime entry>
    }
}

//KS--add in code
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

</script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyBxevA7di7Avo5vGKAgPPSkJa8ud4gnI&callback=initMap"></script>

<!-- additional scripts that interactive with page -->
<script type="text/javascript">

//control function based on user interaction
function updateFormControls() {

}

//manipilation of side bar
function updateSideBar(clicked_id){
  //this is currently not working, will need to fic later
  if(clicked_id=="weaponFilterPanel"){
    console.log(clicked_id);
  }
}

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
      <a href="#" class="w3-bar-item w3-button w3-padding" id="weaponFilterPanel"><i class="fa fa-bell fa-fw" onclick="updateSideBar(this.id)"></i>  Weapon Filter</a>
      <div id="weaponFilterDiv" class ="w3-padding-large">
        <label class=container> One<input type = "checkbox" ><span class="checkmark"></span></label> <!-- <input type = "checkbox" checked="checked"> -->
        <label class="container">Two<input type="checkbox"><span class="checkmark"></span></label>
        <label class="container">Three<input type="checkbox"><span class="checkmark"></span></label>
        <label class="container">Four<input type="checkbox"><span class="checkmark"></span></label>
    </div>

  <!-- different options for crime type. note the class name ='w3-padding-large determines the padding'-->
      <a href="#" class="w3-bar-item w3-button w3-padding" id="crimeTypePanel"><i class="fa fa-eye fa-fw"></i>  Crime Type</a>
      <div id="crimeTypeDiv" class ="w3-padding-large">
        <label class=container> AGG. Assault <input id ="agg_assault" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Arson <input id ="arson" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Assault By Threat <input id ="assault_threat" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Auto Theft <input id ="auto_theft" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Burglary <input id ="burglary" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Common Assault <input id ="common_assault" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Homicide <input id ="homicide" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Larceny <input id ="larceny" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Rape <input id ="rape" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Robbery <input id ="robbery" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Shooting <input id ="shooting" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Other <input id ="other_crimeType" type = "checkbox" > <span class="checkmark"></span></label>

        <!-- there are different types of robery, Larceny, and assault. we can drill down further -->
    </div>

  <!-- side panel for options of weapon type -->

      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Weapon Type</a>
      <div id="weaponTypeDiv" class ="w3-padding-large">
        <label class=container> Firearm <input id ="weapon_firearm" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Hands <input id ="weapon_hands" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Knife <input id ="weapon_knife" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> Other <input id ="weapon_other" type = "checkbox" > <span class="checkmark"></span></label>
      </div>

      <!-- side panel for district, I will only list 4 for now, but we need to determine if we will list all 8+ -->
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  District</a>
      <div id="districtTypeDiv" class ="w3-padding-large">
        <label class=container> North Baltimore <input id ="district_north" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> South Baltimore <input id ="district_south" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> East Baltimore <input id ="district_east" type = "checkbox" > <span class="checkmark"></span></label>
        <label class=container> West Baltimore <input id ="district_west" type = "checkbox" > <span class="checkmark"></span></label>
      </div>

      <!-- side panel for location / sourrounding of crime. Note there are alot of options for these. We will need to narrow by alot-->
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Location/Premise</a>
        <div id="locationTypeDiv" class ="w3-padding-large">
          <label class=container> Home <input id ="premise_home" type = "checkbox" > <span class="checkmark"></span></label>
          <label class=container> Bus/Auto <input id ="premise_bus/auto" type = "checkbox" > <span class="checkmark"></span></label>
          <label class=container> Hotel <input id ="premise_hotel" type = "checkbox" > <span class="checkmark"></span></label>
          <label class=container> Gas Station <input id ="premise_gasStation" type = "checkbox" > <span class="checkmark"></span></label>
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
  </div>

</body>
</html>
