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

<div class="chart-container">
	<div id="curr-beer-chart-label" class="beer-chart-label"></div>
	<div id="curr-beer-chart" class="beer-chart" style="width:815px; height:390px"></div>
	<div id="curr-beer-chart-controls" class="beer-chart-controls" style="display: none">
		<div id="curr-beer-chart-buttons" class="beer-chart-buttons">
			<div class="beer-chart-legend-row">
				<button class="refresh-curr-beer-chart" title="Refresh"></button>
				<div class="beer-chart-legend-label">Refresh Chart</div>
				<br class="crystal" />
			</div>
			<div class="beer-chart-legend-row last">
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
				<div class="beer-chart-legend-label" onClick="toggleLine(this)">Chamber Temp</div>
				<div class="beer-chart-legend-value">--</div>
				<br class="crystal" />
			</div>
			<div class="beer-chart-legend-row fridgeSet">
				<div class="toggle fridgeSet" onClick="toggleLine(this)"></div>
				<div class="beer-chart-legend-label" onClick="toggleLine(this)">Chamber Setting</div>
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
			<div class="beer-chart-legend-row spinSG">
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
<div id="chart-help-popup" title="Beer graph help" style="display: none">
	<p>This chart displays all temperatures and state information logged by BrewPi.
		Not all temperatures are shown by default, but you can toggle them with the colored dots.</p>
	<p>Click and drag left or right to zoom horizontally, click and drag up or down to zoom vertically. Double click to zoom out.
		When zoomed in, you can hold shift to pan around. On your phone or tablet you can just pinch to zoom.</p>
	<p>The state information is shown as colored bars at the bottom of the graph, explanation below.</p>
	<div class="state-info"><span class="state-color state-idle"></span><span class="state-name">Idle</span>
		<span class="state-explanation">
			No actuator is active.
		</span>
	</div>
	<div class="state-info">
		<span class="state-color state-cooling"></span><span class="state-name">Cooling</span>
		<span class="state-explanation">
			The fridge is cooling!
		</span>
	</div>
	<div class="state-info"><span class="state-color state-heating"></span><span class="state-name">Heating</span>
		<span class="state-explanation">
			The heater is heating!
		</span>
	</div>
	<div class="state-info"><span class="state-color state-waiting-to-cool"></span><span class="state-name">Waiting to cool</span>
		<span class="state-explanation">
			The fridge is waiting to start cooling. It has to wait because BrewPi has just cooled or heated. There is a a minimum time for between cool cycles and a minimum time for switching from heating to cooling.
		</span>
	</div>
	<div class="state-info"><span class="state-color state-waiting-to-heat"></span><span class="state-name">Waiting to heat</span>
		<span class="state-explanation">
			Idem for heating. There is a a minimum time for between heat cycles and a minimum time for switching from cooling to heating.
		</span>
	</div>
	<div class="state-info"><span class="state-color state-cooling-min-time"></span><span class="state-name">Cooling minimum time</span>
		<span class="state-explanation">
			There is a minimum on time for each cool cycle. When the fridge hits target but has not cooled the minimum time, it will continue cooling until the minimum time has passed.
		</span>
	</div>
	<div class="state-info"><span class="state-color state-heating-min-time"></span><span class="state-name">Heating minimum time</span>
		<span class="state-explanation">
			There is a minimum on time for each heat cycle too. When the fridge hits target but has not heated the minimum time, it will continue heating until the minimum time has passed.
		</span>
	</div>
	<div class="state-info"><span class="state-color state-waiting-peak"></span><span class="state-name">Waiting for peak detect</span>
		<span class="state-explanation">
			BrewPi estimates fridge temperature overshoot to be able to turn off the actuators early. To adjust the estimators, it has to detect the peaks in fridge temperature.
			When BrewPi would be allowed to heat/cool by the time limits but no peak has been detected yet for previous cycle, it waits in this state for a peak.
		</span>
	</div>
</div>