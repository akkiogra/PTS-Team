<!doctype html>
<?php
session_start();
if ( isset($_POST['Username']) and $_POST['Username'] != "" 
     and isset($_POST['password']) and $_POST['password'] != ""  )
{
    if ( 
         $_POST['Username'] == "admin" 
         AND 
         $_POST['password'] == "admin"
       )
    {
        $_SESSION['Username'] = $_POST['Username'];
        $_SESSION['eingeloggt'] = true;
        echo "<b></b>";
    }
    else
    {
        echo "<b>ungültige Eingabe</b>";
        $_SESSION['eingeloggt'] = false;
    }
}
if ( isset($_SESSION['eingeloggt']) and $_SESSION['eingeloggt'] == true )
{
    // Benutzer begruessen
    echo "<h1></h1>";
}
else
{
    echo "<h1>Please Login";
    $url = $_SERVER['SCRIPT_NAME'];
    echo '<form action="'. $url .'" method="POST">';
    echo '<p>Username:<br>';
    echo '<input type="text" name="Username" value="">';
    echo '<p>password:<br>';
    echo '<input type="password" name="password" value="">';
    echo '<p><input type="Submit" value="einloggen">';
    echo '</form>';
    exit;
}
?>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<meta name="robots" content="noindex, nofollow, noarchive" />
<meta http-equiv="cache-control" content="no-cache" /> 
<title>Com-UI</title>
<link rel="icon" type="image/png" href="https://i.imgur.com/T7OQsZz.png" sizes="32x32">
<style type="text/css">
.test {
	margin: auto;
}
body,td,th {
	color: #FFFFFF;
	font-size: medium;
	font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
}
body {
	background-color: #252525;
	text-align: left;
  background: -webkit-linear-gradient;
  background: -moz-linear-gradient;
  background: -o-linear-gradient);
  background: linear-gradient;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
a:link {
	color: #E8DD06;
}
a:visited {
	color: #E8DD06;
}
.image {
  width: 100%;
  height: 100%;
  background-image: -webkit-linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('https://i.imgur.com/01ueZ9g.png');
  background-size: 98% 98%;
}
.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #FFFFF;
}
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}
.navigation {
  list-style: none;
  margin: 0;
  background: #FFFFF;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row wrap;
  justify-content: flex-end;
}

.navigation a {
  text-decoration: none;
  display: block;
  padding: 1em;
  color: white;
}

.navigation a:hover {
  background: #FFFFF;
}

@media all and (max-width: 800px) {
  .navigation {
    justify-content: space-around;
  }
}
@media all and (max-width: 600px) {
  .navigation {
    -webkit-flex-flow: column wrap;
    flex-flow: column wrap;
    padding: 0;
  }

  .navigation a {
    text-align: center;
    padding: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }

  .navigation li:last-of-type a {
    border-bottom: none;
  }
}

</style>
</head>
<body text="#FFFFFF">
<ul class="navigation">
    <li><a class="active" href="https://github.com/Pandaura/PTS-Team/wiki">PTS-Wiki</a></li>
    <li><a href="https://discord.gg/cKsMwMZ">Discord</a></li>
</ul>
<div class="image">
<table width="100%" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
		<td width="876" align="center">
			<h1>
				<strong style="color: #000000; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: xx-large; font-weight: bolder;">Community UI<br>
					<span style="color: #053F00; font-size: small">Auto-Refreshes Every 25 Seconds</span>	
					<br>
				</strong>
			</h1>
		</td>
    </tr>
  </tbody>
</table>
</div>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td width="90%" height="30" style="color: #E11919; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bolder; font-size: large; text-align: left;"><br>
					WARNING LOG</td>
				</tr>
			  </tbody>
			</table>
			<table width="100%" height="44" border="1" align="center" cellpadding="5" cellspacing="0">
			  <tbody>
				<tr>
					<td colspan="6" bgcolor="#000000" style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium;">
						<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;">
						<?php $output = shell_exec('cat /plexguide/emergency.log');echo "<pre>$output</pre>";?></span>
					</td>
				</tr>
			  </tbody>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="100%" height="30" style="color: #E8DD06; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bolder; font-size: large; text-align: left;">RClone | Transport & Checks</td>
            </tr>
          </tbody>
        </table>					<table width="100%" height="44" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
							    <td width="15%" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong><strong>&nbsp;&nbsp;Union - RClone | Mount</strong></span></span></td>
						    	<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.union');echo "<pre>$output</pre>";?></span></td>
						    	<td width="15%" height="21" bgcolor="#000000" style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp; Blitz | Move</strong></span></span></td>
						    	<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.blitz');echo "<pre>$output</pre>";?></span></td>
						        </tr>
							    <tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;/mnt/downloads</strong></span></td><td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF;">
								<?php $output = shell_exec('tail -n1 /plexguide/spaceused.log');echo "<pre>$output</pre>";?></span>
							    </td>
							    <td width="15%" height="21" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium; "><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;/mnt/move</strong></span></span></td>
							    <td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('head -n1 /plexguide/spaceused.log');echo "<pre>$output</pre>";?></span></td>
						    	</tr>
						    	<tr>
							    <td width="15%" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp; mergerfs </strong></span></td><td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF;">
								<?php $output = shell_exec('tail -n 1 /plexguide/checkers/mergerfs.log');echo "<pre>$output</pre>";?></span>
							    </td>
						        <td width="15%" height="21" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium; "><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;rClone</strong></span></span></td>
							    <td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/checkers/rclone.log');echo "<pre>$output</pre>";?></span></td>
							</tr>
						</tbody>
					</table>
			<br>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr>
			<td width="90%" height="30" style="color: #E8DD06; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bolder; font-size: large; text-align: left;">
				Basic Information
			</td></tr></tbody>
        </table>
					<table width="100%" height="44" border="1" align="center" cellpadding="0" cellspacing="0">			
						<tbody>
							<tr>
							    <td width="15%" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;Edition</td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.transport');echo "<pre>$output</pre>" ?></span></td>
							    <td width="15%" height="21" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;Version</td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.number');echo "<pre>$output</pre>";?></span></td>
							</tr>
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;ServerID</td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/server.id');echo "<pre>$output</pre>" ?></span></td>
							    <td width="15%" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;Traefik</td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.traefik');echo "<pre>$output</pre>";?></span></td>
							</tr>
							<tr>
								<td width="15%" height="21" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;GOAuth</td><td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.oauth');echo "<pre>$output</pre>";?></span></td>
							    <td width="15%" bgcolor="#000000" style="font-size: medium">&nbsp;&nbsp;PortGuard</td>
							    <td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.ports');echo "<pre>$output</pre>";?></span></td>
							</tr>
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;OS</strong></span></td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.os');echo "<pre>$output</pre>";?></span></td>
								<td width="15%" height="21" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium; "><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;Ansible</strong></span></span></td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.ansible');echo "<pre>$output</pre>";?></span></td>
							</tr>
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium; font-weight: bold;"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong> &nbsp;&nbsp;Used Space</strong></span></span></td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.used');echo "<pre>$output</pre>" ?></span></td>
							    <td width="15%" bgcolor="#000000" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium; font-weight: bold;"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;Disk Space</strong></span></span></td>
							    <td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.capacity');echo "<pre>$output</pre>";?></span></td>
							</tr>
							<tr>
								<td width="15%" height="21" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight: bold; font-size: medium; "><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp;&nbsp;Docker</strong></span></span></td>
							    <td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.docker');echo "<pre>$output</pre>";?></span></td>
							    <td width="15%" bgcolor="#000000" style="font-size: medium"><span style="color: #F7F6F6; font-weight: bold; font-size: medium;"><strong>&nbsp; GCE</strong></span></td>
								<td width="18%" height="21" style="font-size: medium"><span class="test" style="color: #FFFFFF;">
								<?php $output = shell_exec('tail -n 1 /plexguide/pg.gce');echo "<pre>$output</pre>";?></span></td>
							</tr>
						</tbody>
					</table>
				</div>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr>
			<td width="90%" height="30" style="color: #E8DD06; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bolder; font-size: large; text-align: left;">
				TDrive | GDrive Section
			</td></tr></tbody>
        </table>
					<table width="100%" height="40" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody> <!--// GDRIVE -->
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GDrive Mount</strong></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n 1 /plexguide/pg.gdrive');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GCrypt Mount</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n 1 /plexguide/pg.gcrypt');echo "<pre>$output</pre>";?>
									</span>
								</td>
							</tr>
						</tbody>			
					</table>
					<table width="100%" height="40" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody> <!--// GDRIVE -->
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GDrive</strong></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n1 /plexguide/gduncrypt.log');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GDrive</strong></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n1 /plexguide/gdcrypt.log');echo "<pre>$output</pre>";?>
									</span>
								</td>
							</tr>	
						</tbody>
					</table>
					<table width="100%" height="40" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody> <!--// GDRIVE -->
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GCrypt files</strong></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n2 /plexguide/gduncrypt.log | head -1');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;GCrypt files</strong></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n2 /plexguide/gdcrypt.log | head -1');echo "<pre>$output</pre>";?>
									</span>
								</td>
							</tr>
						</tbody>			
					</table>
					<table width="100%" height="40" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody> <!--// TDRIVE -->
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong> &nbsp;&nbsp;TDrive Mount</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n 1 /plexguide/pg.tdrive');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong>&nbsp;&nbsp;TCrypt Mount</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n 1 /plexguide/pg.tcrypt');echo "<pre>$output</pre>";?>
									</span>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" height="42" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong> &nbsp;&nbsp;TDrive</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n1 /plexguide/tduncrypt.log');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong> &nbsp;&nbsp;TCrypt</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n1 /plexguide/tdcrypt.log');echo "<pre>$output</pre>";?>
									</span>
								</td>			
							</tr>
						</tbody>			
					</table>
					<table width="100%" height="42" border="1" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong> &nbsp;&nbsp;TDrive files</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n2 /plexguide/tduncrypt.log | head -1');echo "<pre>$output</pre>";?>
									</span>
								</td>
								<td width="15%" bgcolor="#000000" style="font-size: medium"><strong> &nbsp;&nbsp;TCrypt files</strong></span></td>
								<td width="18%" height="21" class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
									<span class="test" style="color: #FFFFFF; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: medium;">
										<?php $output = shell_exec('tail -n2 /plexguide/tdcrypt.log | head -1');echo "<pre>$output</pre>";?>
									</span>
								</td>
							</tr>
						</tbody>			
					</table>
				</div>
			</td>
		</tr>			
	</tbody>
</table>
</body>
</html>
