<?php

// tm_insights.display.inc - display methods

/**
 * Generate Insights Table via Google Charts
 */
function _tm_insights_table_html($data_pairs, $table_name, $data_type = 'string', $sort_column = -1, $sort_ascending = 'true') {

	// Step 2. Format in Google chart
	$html = '<div id="' . $table_name . '" style="width: 100%;"></div>';
	$html .= <<<EOT
<script>
//google.setOnLoadCallback(drawTable);
function drawTable() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Description');
EOT;

$html .= "data.addColumn('" . $data_type . "', 'Value');";

$html .= <<<EOT
  data.addRows([
EOT;

	foreach ($data_pairs as $data_pair) {
		if ($data_type == 'number') {
			$html .= "['" . $data_pair[0] . "', " . $data_pair[1] . "],";
		} else {
			$html .= "['" . $data_pair[0] . "', '" . $data_pair[1] . "'],";
		}
	}

  	$html .= "]);";
	$html .= "var table = new google.visualization.Table(document.getElementById('" . $table_name . "'));";
	$html .= "table.draw(data, {sort: false, sortColumn: " . $sort_column . ", sortAscending: " . $sort_ascending . ", width: '100%'});";
	$html .= "}";
	$html .= "drawTable();";
	$html .= "</script>";

	return $html;
}

/*
 * Generate js redraw listener code to resize charts/graphs on window resize
 */
function _tm_insights_js_redraw_function($redraw_functions) {

	$html = "<script>\n";

	$html .= "window.onresize = function(e) {
		delay(function(){";

	foreach ($redraw_functions as $fn) {
		$html .= "\nif (typeof " . $fn . " == 'function') { " . $fn . "(); }";
	}

	$html .= "}, 250); 
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

</script>";

	return $html;
}

/**
 * Generate Segments Pie Chart via Google Charts
 */
function _tm_insights_segments_html($segment_data, $normalize) {

	global $conf;

  	// Format in Google chart
	$random_number = rand(0,1000);
	$html = <<<EOT
<div id="insights_segments" style="width: 100%; height: 700px;"></div>
<div style='padding: 8px; text-align: right;'><a href='?reports_color_hash={$random_number}'>Try a new color</a> | <a href='?reports_color_hash='>Reset</a></div>
<script>
//google.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Segment', 'Members'],
EOT;

	foreach ($segment_data as $segment) {
		$html .= "['" . str_replace("'", "", $segment["name"]) . "'," . intval($segment["total"] * $normalize) . "],";
	}
	$html .= <<<EOT
]);

EOT;
  
	// Report chart colors
	// If ?reports_color_hash is provided, create a unique color code for each segment
	// This is so segment colors are consistent across all graphs regardless of order in the chart
	// ie: 0: { color: '#014eff' },
	// ie: 1: { color: '#ab6754' }
	// default is off
	$color_hash = null;

	// get from cookie
	if (isset($_COOKIE['Drupal_visitor_tm_reports_color_hash'])) {
		$color_hash = $_COOKIE['Drupal_visitor_tm_reports_color_hash'];
	}

	// ie: 
	// ?chart_color_hash
	// ?chart_color_hash = 123
	if (isset($_GET["reports_color_hash"])) {
		$color_hash = $_GET["reports_color_hash"];
		if ($color_hash == "") {
	  		$color_hash = null;
		}
		user_cookie_save(array("tm_reports_color_hash" => $color_hash));
	}

	// allow setting in conf
	if ($color_hash == null) {
		if (isset($conf["tm_insights_default_color_hash"])) {
			$color_hash = $conf["tm_insights_default_color_hash"];
		}
	}

	if ($color_hash != null) {
		$count = 0;
		$color_parts = array();
		foreach ($segment_data as $segment) {
			$color_parts[] = $count++ . ": { color: '#" . _tm_insights_string_color_code($segment["name"] . $color_hash) . "' }";
		}
		$html .= "var slices = {" . implode(", ", $color_parts) . "};";
	} else {
		$html .= "var slices = {};";
  	}

	$html .= <<<EOT
	var options = { 'slices': slices, pieHole: 0.4};
	var chart = new google.visualization.PieChart(document.getElementById('insights_segments'));
	chart.draw(data, options);
}
drawChart();
</script>
EOT;

	return $html;
}

/**
 * Helper method to convert string to color code
 */
function _tm_insights_string_color_code($str) {
	// ref: http://stackoverflow.com/questions/3724111/how-can-i-convert-strings-to-an-html-color-code-hash
	$code = dechex(crc32($str));
	$code = substr($code, 0, 6);
	return $code;
}
