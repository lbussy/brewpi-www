<?php
/* Copyright (C) 2018, 2019 Lee C. Bussy (@LBussy)
 *
 * This file is part of LBussy's BrewPi WWW Remix (BrewPi-WWW-RMX).
 *
 * BrewPi WWW RMX is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * BrewPi WWW RMX is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with BrewPi WWW RMX. If not, see <https://www.gnu.org/licenses/>.
 *
 * These scripts were originally a part of brewpi-www, a part of
 * the BrewPi project. Legacy support (for the very popular Arduino
 * controller) seems to have been discontinued in favor of new hardware.
 *
 * All credit for the original brewpi-www goes to @elcojacobs,
 * @lukepower, @m-mcgowan, @vanosg, @GregAtkinson and I'm sure
 * many more contributors around the world. My apologies if I have
 * missed anyone; those were the names listed as contributors on the
 * Legacy branch.
 *
 * See: 'original-license.md' for notes about the original project's
 * license and credits. */

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLR: Previous Beers</title>
</head>
<body>
	<div id="beer-selector">
		<span>Select the beer you would like to view:</span>
		<select id="prev-beer-name">
			<?php
				foreach(glob('data/*', GLOB_ONLYDIR) as $dir)
				{
					$dir = basename($dir);
					if($dir !== "profiles"){
					    echo '<option value="', $dir, '">', urldecode($dir), '</option>';
					}
				}
			?>
		</select>
		<button id="prev-beer-show">Show</button>
		<button id="download-csv">Download CSV</button>
	</div>
	<div class="chart-container">
			<div id="prev-beer-chart-label" class="beer-chart-label"></div>
		<div id="prev-beer-chart" class="beer-chart" style="width:770px; height:500px"></div>
		<div id="prev-beer-chart-controls" class="beer-chart-controls" style="display: none">
		    <div id="curr-beer-chart-buttons" class="beer-chart-buttons">
		    	<div class="beer-chart-legend-row">
					<button class="chart-help" title="Help"></button>
		    		<div class="beer-chart-legend-label">Help</div>
	    			<br class="crystal" />
		    	</div>
			</div>
		    <div id="curr-beer-chart-legend" class="beer-chart-legend">
		    	<div class="beer-chart-legend-row time">
		    		<div class="beer-chart-legend-time">Date/Time</div>
		    	</div>
		    	<div class="beer-chart-legend-row beerTemp">
		    		<div class="toggle beerTemp" onClick="toggleLine(this)"></div>
		    		<div class="beer-chart-legend-label" onClick="toggleLine(this)">Beer Temp</div>
		    		<div class="beer-chart-legend-value">--</div>
		    		<br class="crystal" />
		    	</div>
		    	<div class="beer-chart-legend-row beerSet">
					<div class="toggle beerSet" onClick="toggleLine(this)"></div>
		    		<div class="beer-chart-legend-label" onClick="toggleLine(this)">Beer Setting</div>
		    		<div class="beer-chart-legend-value">--</div>
		    		<br class="crystal" />
		    	</div>
		    	<div class="beer-chart-legend-row fridgeTemp">
					<div class="toggle fridgeTemp" onClick="toggleLine(this)"></div>
		    		<div class="beer-chart-legend-label" onClick="toggleLine(this)">Fridge Temp</div>
		    		<div class="beer-chart-legend-value">--</div>
		    		<br class="crystal" />
		    	</div>
		    	<div class="beer-chart-legend-row fridgeSet">
					<div class="toggle fridgeSet" onClick="toggleLine(this)"></div>
		    		<div class="beer-chart-legend-label" onClick="toggleLine(this)">Fridge Setting</div>
		    		<div class="beer-chart-legend-value">--</div>
		    		<br class="crystal" />
		    	</div>
		    	<div class="beer-chart-legend-row roomTemp">
					<div class="toggle roomTemp" onClick="toggleLine(this)"></div>
		    		<div class="beer-chart-legend-label" onClick="toggleLine(this)">Room Temp</div>
		    		<div class="beer-chart-legend-value">--</div>
		    		<br class="crystal" />
		    	</div>
                <!-- Tilt lines BEGIN -->
                <div class="beer-chart-legend-row redSG">
                    <div class="toggle redSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Red Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row greenSG">
                    <div class="toggle greenSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Green Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row blackSG">
                    <div class="toggle blackSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Black Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row purpleSG">
                    <div class="toggle purpleSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Purple Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row orangeSG">
                    <div class="toggle orangeSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Orange Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row blueSG">
                    <div class="toggle blueSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Blue Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row yellowSG">
                    <div class="toggle yellowSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Yellow Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <div class="beer-chart-legend-row pinkSG">
                    <div class="toggle pinkSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">Pink Tilt SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
                <!-- Tilt lines END-->
				<!-- iSpindel lines BEGIN-->
                <div class="beer-chart-legend-row SpinSG">
                    <div class="toggle spinSG" onClick="toggleLine(this)"></div>
                    <div class="beer-chart-legend-label" onClick="toggleLine(this)">iSpindel SG</div>
                    <div class="beer-chart-legend-value">--</div>
                    <br class="crystal" />
                </div>
				<!-- iSpindel lines END-->
		    	<div class="beer-chart-legend-row state">
					<div class="state-indicator"></div>
		    		<div class="beer-chart-legend-label"></div>
		    		<br class="crystal" />
		    	</div>
		    	<div class="beer-chart-legend-row annotation last">
					<div class="toggleAnnotations dygraphDefaultAnnotation" onClick="toggleAnnotations(this)">A</div>
		    		<div class="beer-chart-legend-label" onClick="toggleAnnotations(this)">Annotations</div>
		    		<br class="crystal" />
		    	</div>
		    </div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("button#prev-beer-show").button({ icons: {primary: "ui-icon-circle-triangle-e"} }).click(function(){
				drawBeerChart(String($("select#prev-beer-name").val()), "prev-beer-chart" );
			});
			$("button#download-csv").button({ icons: {primary: "ui-icon-arrowthickstop-1-s"} }).click(function(){
				var url = "data/" + String($("select#prev-beer-name").val()) + "/" + String($("select#prev-beer-name").val()) + ".csv";
				window.open(encodeURI(url), 'Download CSV' );
			});
			$("#prev-beer-chart-controls button.chart-help").button({	icons: {primary: "ui-icon-help" }, text: false }).click(function(){
				$("#chart-help-popup").dialog("open");
			});
		});
	</script>
</body>
</html>
