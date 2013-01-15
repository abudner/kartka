<?php session_start(); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>E-kartki</title>
			<link href="public/stylesheets/style.css" rel="stylesheet" type="text/css"/>
			<link href="public/stylesheets/editanddrag.css" rel="stylesheet" type="text/css"/>
			<link href="public/stylesheets/colors.css" rel="stylesheet" type="text/css" />
			<link href="css/bootstrap.css" rel="stylesheet" media="screen">
			<script src="http://code.jquery.com/jquery-latest.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="public/javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
			<script src="public/javascripts/jquery.kwicks-1.5.1.pack.js" type="text/javascript"></script>
			<script src="public/javascripts/all.js" type="text/javascript"></script>
			<script src="public/javascripts/plugin.js" type="text/javascript"></script>
			<script src="public/javascripts/all2.js" type="text/javascript"></script>
			<script src="public/javascripts/colors.js" type="text/javascript"></script>
			<script src="public/javascripts/jquery.ui.core.js"></script>
			<script src="public/javascripts/jquery.ui.widget.js"></script>
			<script src="public/javascripts/jquery.ui.mouse.js"></script>
			<script src="public/javascripts/jquery.ui.draggable.js"></script>
			<script src="public/javascripts/jquery.ui.droppable.js"></script>
			<script src="public/javascripts/webtoolkit.sha1.js"></script>
			<script type="text/javascript" src="public/javascripts/jquery.generateFile.js"></script>
			<script src="public/javascripts/domReady.js"></script>
			<script src="smoke/smoke.min.js" type="text/javascript"></script>
			<script src="smoke/smoke.js" type="text/javascript"></script>
			<script src="public/javascripts/colors.js" type="text/javascript"></script>
			<link rel="stylesheet" href="smoke/smoke.css" type="text/css" media="screen" />  
			<link id="theme" rel="stylesheet" href="smoke/themes/tiger.css" type="text/css" media="screen" />

		
		</head>
		<body id="b" onload="Start();">
		
	
		
		
		
		
			    <div id="logowanie" class="modal hide fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-body">
<ul class="nav nav-tabs" id="myTab">
<li class="active"><a href="#log">Logowanie</a></li>
<li><a href="#reg">Rejestracja</a></li>
</ul>
 
<div class="tab-content">
<div class="tab-pane active" id="log">	
	<form id="loginform">
		<table>
			<tr>
				<td>Login:</td>
				<td>
					<input id="loglogin" name="login" type="text" data-provide="typeahead">
				</td>
			</tr>
			<tr>
				<td>Hasło:</td>
				<td>
					<input id="loghaslo" name="haslo" type="password" data-provide="typeahead"></td>
			</tr>
		</table>
		<button type="button" class="btn btn-primary" id="logowaniebut">Zaloguj</button>
	</form>
	
</div>
<div class="tab-pane" id="reg">	<form id="rejestracjaform"><table><tr><td>Login:</td><td><input id="rejlogin" name="login" type="text" data-provide="typeahead"></td></tr>
	<tr><td>Hasło:</td><td><input id="rejhaslo" name="haslo" type="password" data-provide="typeahead"></td></tr></table>
	<button type="button" class="btn btn-primary" id="zarejestruj">Zarejestruj</button></form></div>
</div>
 
 

    </div>
    </div>
		
		

		
		
		
		
		
		
		
		
			<div id="wrapper">
				<div id="main">
					<div id="site_title">
						<h1></h1>
					</div>
					<div id="uzytzalog">
					  <div class="dropdown">
	<button type="button" class="btn btn-primary" data-toggle="button" class="dropdown-toggle" id="dLabel" data-toggle="dropdown" data-target="#" href="#">
    Moje Kartki 

	</button>
    <ul id="nazwaaa" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    
    </ul>
    </div><div id="afterek">
					<?php if(isset($_SESSION['login'])) {
						echo '<h1>Witaj : '. $_SESSION['login'];
						?>   </h1>
					  <a id="wylogujbut" href="#"><img src="public/images/logout-icon.png" alt="wyloguj" /></a>
					<? } ?>
		</div>
					</div>
					<div id="content">
						<ul class="kwicks">
							<li id="home">
								<span class="header"></span>
								<div class="innerr">
									<h2>Witamy w serwisie E-kartki</h2>
									<br/>
									<img src="public/images/01.jpg" alt="Image 01" class="image_fl" />
									<div class="col_half float_r">
										<p>Dzięki serwisowi będziesz mógł znaleźć E-kartkę na różną okoliczność.</p>
										<br/>
										<br/>
										<h3>Ponadto serwis pozwoli Tobie :</h3>
										<ul class="templatemo_list">
											<br/>
											<li>Stworzyć własną kartkę</li>
											<li>Wysłać ją Twojemu znajomemu</li>
											<li>Opublikować swój projekt w serwisie E-kartki</li>
										</ul>
									</div>
								</div>
							</li>
							<li id="config">
								<span class="header"></span>
								<div class="innerr">
									<div class="col_half float_r">
										<div class="bun_position">
											<br/>
											<br/>
											<h2>EDYTOR TEKSTU</h2>
											<table id="toolbar2">
												<tr>
													<td></td>
													<td>
														<div class="imagebutton" id="undo">
															<img class="image" src="public/images/undo.png" alt="Undo" title="Undo">
														</div>
													</td>
													<td></td>
													<td>
														<div class="imagebutton" id="redo">
															<img class="image" src="public/images/redo.png" alt="Redo" title="Redo">
														</div>
													</td>
													<td></td>
													<td>
														<div style="left: 10;" class="imagebutton" id="createlink">
															<img class="image" src="public/images/link.png" alt="Insert Link" title="Insert Link">
														</div>
													</td>
													<td>
														<td>
															<div style="left: 10;" class="imagebutton" id="createimage">
																<img class="image" src="public/images/image.png" alt="Insert Image" title="Insert Image">
															</div>
														</td>
														<td></td>
														<td>
															<div class="imagebutton" id="bold">
																<img class="image" src="public/images/bold.png" alt="Bold" title="Bold">
															</div>
														</td>
														<td></td>
														<td>
															<div class="imagebutton" id="italic">
																<img class="image" src="public/images/italic.png" alt="Italic" title="Italic">
															</div>
														</td>
														<td></td>
														<td>
															<div class="imagebutton" id="underline">
																<img class="image" src="public/images/underline.png" alt="Underline" title="Underline">
															</div>
														</td>
														<td></td>
														<td>
															<div style="left: 10;" class="imagebutton" id="justifyleft">
																<img class="image" src="public/images/justifyleft.png" alt="Align Left" title="Align Left">
															</div>
														</td>
														<td></td>
														<td>
															<div style="left: 40;" class="imagebutton" id="justifycenter">
																<img class="image" src="public/images/justifycenter.png" alt="Center" title="Center">
															</div>
														</td>
														<td></td>
														<td>
															<div style="left: 70;" class="imagebutton" id="justifyright">
																<img class="image" src="public/images/justifyright.png" alt="Align Right" title="Align Right">
															</div>
														</td>
														<td>
															<div style="left: 10;" class="imagebutton" id="outdent">
																<img class="image" src="public/images/outdent.png" alt="Outdent" title="Outdent">
															</div>
														</td>
														<td>
															<div style="left: 40;" class="imagebutton" id="indent">
																<img class="image" src="public/images/indent.png" alt="Indent" title="Indent">
															</div>
														</td>
												</tr>
											</table>
											<br>
											<table id="toolbar2">
												<tr>
													<td>
														<select id="formatblock" onchange="Select(this.id);">
															<option value="<p>">Normal</option>
															<option value="<p>">Paragraph</option>
															<option value="<h1>">Heading 1
																<H1>
															</option>
															<option value="<h2>">Heading 2
																<H2>
															</option>
															<option value="<h3>">Heading 3
																<H3>
															</option>
															<option value="<h4>">Heading 4
																<H4>
															</option>
															<option value="<h5>">Heading 5
																<H5>
															</option>
															<option value="<h6>">Heading 6
																<H6>
															</option>
															<option value="<address>">Address
																<ADDR>
															</option>
															<option value="<pre>">Formatted
																<PRE>
															</option>
														</select>
													</td>
													<td>
														<select id="fontname" onchange="Select(this.id);">
															<option value="Font">Font</option>
															<option value="Arial">Arial</option>
															<option value="Courier">Courier</option>
															<option value="Times New Roman">Times New Roman</option>
														</select>
													</td>
													<td>
														<select unselectable="on" id="fontsize" onchange="Select(this.id);">
															<option value="Size">Size</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
														</select>
													</td>
												</tr>
											</table>
											<br/>
											<br/>
											<table style="padding-left:110px;" id="toolbar2">
												<tr>
													<td>
														<div style=" text-align: center;" class="imagebutton" id="forecolor">
															<img class="image" src="public/images/forecolor.png" alt="Text Color" title="Text Color">
														</div>
													</td>
													<td></td>
													<td></td>
													<td>
														<div style=" text-align: center;" class="imagebutton" id="backcolor">
															<img class="image" src="public/images/backcolor.png" alt="Background Color"
															title="Background Color">
														</div>
													</td>
													<td></td>
												</tr>
											</table>
											<br/>
										    <br/>
										    
										</div>
									</div>
									<h2>Kreator E-kartki</h2>
									<div id="droppable">
										<iframe id="editt">
									</iframe>
										  <script type="text/javascript">  
	function save(source)
	{
	  var html;
	  if (source) {
	    html = document.createTextNode(document.getElementById('editt').contentWindow.document.body.innerHTML);
	    document.getElementById('editt').contentWindow.document.body.innerHTML = "";
	    html = document.getElementById('editt').contentWindow.document.importNode(html,false);
		document.getElementById('editt').contentWindow.document.body.appendChild(html);
	    
	  } 
	}
	   </script>
										<input id="show" type="button" onclick="showCard();" ></input>
										<input id="print" type="button" onclick="printCard();" ></input>
										<input id="save" type="button"></input>
										<div id="link"></div>
										
									</div>
									
									<div id="draggable2"></div>
									<div id="draggable3"></div>
									<div id="draggable4"></div>
									<div id="draggable5"></div>
									<div id="draggable6"></div>
									<div id="draggable7"></div>
									<div id="draggable8"></div>
									
									<iframe width="250" height="170" id="colorpalette" src="colors.html"
									style="visibility:hidden; position: absolute;border:1px solid #CEB46D;-moz-border-radius: 20px;
	  border-radius: 20px; -webkit-box-shadow: 0px 0px 30px #CEB46D;-moz-box-shadow: 0px 0px 30px #CEB46D;  box-shadow: 0px 0px 30px #CEB46Df; top:230px; left:635px;padding:7px;"></iframe>
								</div>
							</li>
							<li id="catalog">
								<span class="header"></span>
								<div class="innerr">
									<div class="col_half float_r">
										<div class="bun_position">
											
											<img alt="send email" src="public/images/email.png" style= "text-decoration: none; position:relative; top:100px; transform:rotate(15deg); -webkit-transform:rotate(15deg); 
-moz-transform:rotate(15deg); -o-transform:rotate(15deg); " />
											
											</div>
											</div>
									
									
									<h2>Wyślij E-kartkę</h2>
									
				<br/><br/>					
<script type="text/javascript">
function msg() {
document.mailer.action = "mailto:"
list = ((document.mailer.adresat.value) + '?subject=' + document.mailer.temat.value);
}
</script>

<form name="mailer" method="post" action="" enctype="text/plain" onsubmit="(document.mailer.action += list)">

<table align=center width="460" border=0 cellspacing=0 cellpadding=8 style="position:relative; left:-20px; top:-30px">

<tr>
	<td align="right" >
	Adresat:
	</td>
	
	<td>

	<input type="text" size=43 name="adresat" onchange="msg(this.form)" value="" style="border-radius: 5px;height:25px;background-color: #B8456D; -moz-box-shadow: 0px 0px 30px#CEB46D;font-weight: bold; border: 1px#CEB46D solid; color: #F8F0D9"></br>

	</td>

</tr>

<tr>
	<td align="right" >
    Nadawca: 
	</td>
	<td>

	<input type="text" size=43 name="nadawca" onchange="msg(this.form)" style="border-radius: 5px;height:25px;background-color: #B8456D; -moz-box-shadow: 0px 0px 30px#CEB46D;font-weight: bold; border: 1px#CEB46D solid;color: #F8F0D9"></br>
	
	</td>
</tr>

<tr>
	<td align="right" >
    Temat listu: 
</td>

<td>
<input type="text" size=43 name="temat" onchange="msg(this.form)" style="border-radius: 5px;height:25px;background-color: #B8456D;-moz-box-shadow: 0px 0px 30px#CEB46D; font-weight: bold;border: 1px#CEB46D solid;color: #F8F0D9"></br>
</td>

</tr>

<input type="hidden" name="=================================================================================================================">

<tr>
	<td align="right">
    Treść listu: </br>
	</td>
	<td >
 <textarea id="links" name=" " cols=38 rows=6 wrap="virtual" onchange="msg(this.form)" style="border-radius: 5px;height:150px;background-color: #B8456D; -moz-box-shadow: 0px 0px 30px#CEB46D; font-weight: bold; border: 1px#CEB46D solid; color: #F8F0D9"></textarea>
	</td>
</tr>

<tr><td align="right" >
&nbsp;
</td><td >
</br>
<input type="submit" value="Wyślij"> 
<input type="reset" value= "Zresetuj">
</td></tr>

</table>
</form> 

								
							</li>
						</ul>
					</div>
					<!--content -->
				</div>
				<!--main -->
			</div>
			<!--wrapper -->
		</body>
	
	</html>