<?php

if (!isset($_GET["world"]))
	header("Location: /");

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Game</title>

	<link rel="stylesheet" type="text/css" href="./style.css"></link>
	<script src="lib/three.min.js"></script>
	<script src="lib/stats.min.js"></script>
	<script src="lib/physics/physi.js"></script>
	<script src="lib/tween.min.js"></script>
	<script src="lib/peer.min.js"></script>
	<!--script src="build/game.min.js"></script-->
	<script src="src/utils.js"></script>
	<script src="src/net.js"></script>
	<script src="src/graphics.js"></script>
	<script src="src/gui.js"></script>
	<script src="src/shaders.js"></script>
	<script src="src/input.js"></script>
	<script src="src/audio.js"></script>
	<script src="src/models.js"></script>
	<script src="src/world.js"></script>
	<script src="src/entities.js"></script>
	<script src="src/animation.js"></script>
	<script src="src/player.js"></script>
	<script src="src/main.js"></script>
	<script>
	function onload() {
		GAME.utils.loadScriptSync('lib/mespeak/mespeak.js', function() {
			GAME.audio.initMeSpeak();
		});
		//GAME.utils.loadScriptAsync('./socket.io.min.js', function () {
		//	GAME.utils.loadScriptAsync('./datachannel.js', function () {
				//GAME.net.connectToServer(GAME.game, 'http://4ytech.com:9980');
		//	});
		//});

		GAME.meta = {
			WORLD_NAME: <?php print "'".$_GET['world']."'\n"; ?>
		};

		GAME.core.Main.main();
	}
	</script>
</head>

<body onload="onload();">
	<div id="game">
		<div id="blocker" class="fullscreen"></div>
		<div id="overlay">
			<div id="reticle"></div>
			<div id="passiveChat" class="fadeIn"></div>
			<form id="clientForm" name="clientForm">
				<textarea readonly name="console" rows="20" cols="80" id="console" class="minSize fadeOut"
						onfocus="GAME.gui.setChatFocus(true, this);"
						onblur="GAME.gui.setChatFocus(false, this);">## Console ready. ##&#13;&#10;</textarea><br>
				<textarea type="text" name="input" rows="1" cols="80" id="input"
						placeholder="(Press Enter to Chat)"
						onfocus="GAME.gui.setChatFocus(true, this);"
						onblur="GAME.gui.setChatFocus(false, this);"
						onkeydown="if (event.keyCode == 13) { GAME.gui.submitConsoleInput(this.form); return false; }"></textarea>
			</form>
		</div>
		<div id="loadingScreen" class="fullscreen">
			<div id="loadingText" class="centered">
				Loading...
			</div>
		</div>
		<script>GAME.utils.centerElement(document.getElementById('loadingText'));</script>
	</div>
</body>
</html>