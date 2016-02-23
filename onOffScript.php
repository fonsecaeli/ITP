<!--
wepage to be used as a remote to turn NAS on and off remotly
ITP project 2/3/16
Authors: Eli F, David S 
Version: 1.0
-->



<!DOCTYPE htlm>
<!--
imports the ActiveX object used for Wol in the applicaiton
-->
<object data="http://www.activexperts.com/files/network-component/cab/4.4/axnetwork32.cab" style="visibility: hidden;">
	<param name="classid" value="CLSID:B52B14BA-244B-4006-86E0-2923CB69D881">
</object>


<html>
	<head>
	<style type="text/css">
		.onButton {
			width: 40%;
			height: 25%;
			position:absolute;
			left: 5%;
			background-color:#76EE00;

		}
		.offButton {
			width: 40%;
			height: 25%;
			position:absolute;
    		left: 55%;
			background-color:#FF0000;
		}
	</style>
		<body>
			<button class="onButton" onclick="turnOn()">On</button>	
			
			<form id="input" method="GET"> 
				<input type="submit" value="Off" class="offButton"/>
			</form>

			<?php
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					$command = escapeshellcmd('py powerOff.py');
	         		$powerOffOutput = shell_exec($command);
	        	}
			?>

			<script>
			//initalize stuff used for WoL
				var objWOL = new ActiveXObject("AxNetwork.WOL"); //object used for WoL
				var MAC = "44-94-FC-6E-0C-C8"; //MAC address of NAS

				function turnOn() {
					var numLastError = 0;
	  				var strLastError = "";
					objWOL.Clear();

					objWOL.WakeUp(MAC);

					numLastError =  objWOL.LastError;
	  				strLastError =  objWOL.GetErrorDescription(numLastError);
	  				console.log(numLastError + " : " + strLastError);  
				}
			</script>
		</body>
	</head>
</html>
