<?php 
define('TXT_LANG', (isset($_GET['lang']) && !empty($_GET['lang'])) ? $_GET['lang'] : 'en');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
	WWW SQL Designer, (C) 2005-2010 Ondrej Zara, ondras@zarovi.cz
	Version: 2.5
	See license.txt for licencing information.
-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
	<title>WWW SQL Designer</title>
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />     
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="styles/ie6.css" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="styles/ie7.css" /><![endif]-->
	<link rel="stylesheet" href="styles/print.css" type="text/css" media="print" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/oz.js"></script>
	<?php /*<script type="text/javascript" src="js/config.js"></script>*/?>
	<script type="text/javascript">
	var CONFIG = {
		AVAILABLE_DBS: ["mysql", "sqlite", "web2py", "mssql", "postgresql", "oracle", "sqlalchemy", "vfp9"],
		DEFAULT_DB: "mysql",
	
		AVAILABLE_LOCALES: ["cs", "de", "el", "en", "eo", "es", "fr", "hu", "it", "ja", "pl", "pt_BR", "ru", "zh"],
		DEFAULT_LOCALE: "<?php echo TXT_LANG;?>",
		
		/*AVAILABLE_BACKENDS: ["php-mysql", "php-blank", "php-file", "php-sqlite", "php-mysql+file", "php-postgresql", "php-pdo", "perl-file"],
		DEFAULT_BACKEND: ["php-mysql"],*/
		AVAILABLE_BACKENDS: [],
		DEFAULT_BACKEND: [],
	
		RELATION_THICKNESS: 2,
		RELATION_SPACING: 15,
		RELATION_COLORS: ["#000", "#800", "#080", "#008", "#088", "#808", "#088"],
		
		STATIC_PATH: "",
		XHR_PATH: ""
	}
	</script>
	<script type="text/javascript" src="js/wwwsqldesigner.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		var d = new SQL.Designer();
		
		$('#saveload, #docs, #options, #backendsave').css({display:'none'});

		$('#save').click(function() {
	            $('#saveload').click();
	            $('#clientsql').click(); 
	            console.log('here');
	        });
	});
	</script>
</head>

<body>
	<div id="area"></div>

	<div id="controls">
		<div id="bar">
			<div id="toggle"></div>
			<input type="button" id="saveload" />
			<input type="button" id="save" value="<?php if(TXT_LANG === 'fr'):?>Exporter en SQL<?php else:?>Export as SQL<?php endif;?>" />
			<hr/>

			<input type="button" id="addtable" />
			<input type="button" id="edittable" />
			<input type="button" id="tablekeys" />
			<input type="button" id="removetable" />
			<input type="button" id="aligntables" />
			<input type="button" id="cleartables" />
		
			<hr/>
		
			<input type="button" id="addrow" />
			<input type="button" id="editrow" />
			<input type="button" id="uprow" class="small" /><input type="button" id="downrow" class="small"/>
			<input type="button" id="foreigncreate" />
			<input type="button" id="foreignconnect" />
			<input type="button" id="foreigndisconnect" />
			<input type="button" id="removerow" />
		
			<?php /*<hr/>*/?>
		
			<input type="button" id="options" />
			<a href="http://code.google.com/p/wwwsqldesigner/w/list" target="_blank"><input type="button" id="docs" value="" /></a>
		</div>
	
		<div id="rubberband"></div>

		<div id="minimap"></div>
	
		<div id="background"></div>
	
		<div id="window">
			<div id="windowtitle"><img id="throbber" src="images/throbber.gif" alt="" title=""/></div>
			<div id="windowcontent"></div>
			<input type="button" id="windowok" />
			<input type="button" id="windowcancel" />
		</div>
	</div> <!-- #controls -->
	
	<div id="opts">
		<table>
			<tbody>
				<tr>
					<td>
						* <label id="language" for="optionlocale"></label>
					</td>
					<td>
						<select id="optionlocale"></select>
					</td>
				</tr>
				<tr>
					<td>
						* <label id="db" for="optiondb"></label> 
					</td>
					<td>
						<select id="optiondb"></select>
					</td>
				</tr>
				<tr>
					<td>
						<label id="snap" for="optionsnap"></label> 
					</td>
					<td>
						<input type="text" size="4" id="optionsnap" />
						<span class="small" id="optionsnapnotice"></span>
					</td>
				</tr>
				<tr>
					<td>
						<label id="pattern" for="optionpattern"></label> 
					</td>
					<td>
						<input type="text" size="6" id="optionpattern" />
						<span class="small" id="optionpatternnotice"></span>
					</td>
				</tr>
				<tr>
					<td>
						<label id="hide" for="optionhide"></label> 
					</td>
					<td>
						<input type="checkbox" id="optionhide" />
					</td>
				</tr>
				<tr>
					<td>
						* <label id="vector" for="optionvector"></label> 
					</td>
					<td>
						<input type="checkbox" id="optionvector" />
					</td>
				</tr>
			</tbody>
		</table>

		<hr />

		* <span class="small" id="optionsnotice"></span>
	</div>
	
	<div id="io">
		<table>
			<tbody>
				<tr id="backendsave">
					<td>
						<fieldset>
							<legend id="client"></legend>
							<input type="button" id="clientsave" /> 
							<input type="button" id="clientload" />
							<hr/>
							<input type="button" id="clientsql" />
						</fieldset>
					</td>
					<td>
						<fieldset>
							<legend id="server"></legend>
							<label for="backend" id="backendlabel"></label> <select id="backend"></select>
							<hr/>
							<input type="button" id="serversave" /> 
							<input type="button" id="serverload" /> 
							<input type="button" id="serverlist" /> 
							<input type="button" id="serverimport" /> 
						</fieldset>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<fieldset>
							<legend id="output"></legend>
							<textarea id="textarea"></textarea>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div id="keys">
		<fieldset>
			<legend id="keyslistlabel"></legend> 
			<select id="keyslist"></select>
			<input type="button" id="keyadd" />
			<input type="button" id="keyremove" />
		</fieldset>
		<fieldset>
			<legend id="keyedit"></legend>
			<table>
				<tbody>
					<tr>
						<td>
							<label for="keytype" id="keytypelabel"></label>
							<select id="keytype"></select>
						</td>
						<td></td>
						<td>
							<label for="keyname" id="keynamelabel"></label>
							<input type="text" id="keyname" size="10" />
						</td>
					</tr>
					<tr>
						<td colspan="3"><hr/></td>
					</tr>
					<tr>
						<td>
							<label for="keyfields" id="keyfieldslabel"></label><br/>
							<select id="keyfields" size="5" multiple="multiple"></select>
						</td>
						<td>
							<input type="button" id="keyleft" value="&lt;&lt;" /><br/>
							<input type="button" id="keyright" value="&gt;&gt;" /><br/>
						</td>
						<td>
							<label for="keyavail" id="keyavaillabel"></label><br/>
							<select id="keyavail" size="5" multiple="multiple"></select>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
	
	<div id="table">
		<table>
			<tbody>
				<tr>
					<td>
						<label id="tablenamelabel" for="tablename"></label>
					</td>
					<td>
						<input id="tablename" type="text" />
					</td>
				</tr>
				<tr>
					<td>
						<label id="tablecommentlabel" for="tablecomment"></label> 
					</td>
					<td>
						<textarea rows="5" cols="40" id="tablecomment"></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<?php /*<script type="text/javascript">
		var d = new SQL.Designer();
	</script>*/?>
</body>
</html>