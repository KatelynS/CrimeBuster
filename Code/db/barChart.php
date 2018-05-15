
 <script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
 <script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.ocean.js"></script>

<?php
//Code for using fusion chart library for visualizations. This is outdated and was replace in the index.php file.

include("../php-wrapper/wrappers2/php-wrapper/fusioncharts.php");

// Syntax for the constructor - new FusionCharts("type of chart", "unique chart id", "width of chart", "height of chart", "div id to render the chart", "type of data", "actual data")
	$columnChart = new FusionCharts("column2d", "ex1" , 600, 400, "chart-1", "json", '{  
		   "chart":{  
			  "caption":"Harrys SuperMart",
			  "subCaption":"Top 5 stores in last month by revenue",
			  "numberPrefix":"$",
			  "theme":"ocean"
		   },
		   "data":[  
			  {  
				 "label":"Bakersfield Central",
				 "value":"880000"
			  },
			  {  
				 "label":"Garden Groove harbour",
				 "value":"730000"
			  },
			  {  
				 "label":"Los Angeles Topanga",
				 "value":"590000"
			  },
			  {  
				 "label":"Compton-Rancho Dom",
				 "value":"520000"
			  },
			  {  
				 "label":"Daly City Serramonte",
				 "value":"330000"
			  }
		   ]
		}');

$columnChart->render();

?>