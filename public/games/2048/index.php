<!DOCTYPE HTML>
<html>
<head>
    <title>2048</title>
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1, IE=9">
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="true" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Phaser App">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 user-scalable=0 minimal-ui" />

	<link rel='canonical' href='http://choinhanh.vn/tri-tue/2048'/>
	
        <link type="text/css" href='assets1/softgames.css' rel="stylesheet">
        <script type="text/javascript">
            window.gameLangs = ['en'];
            window.gameJS = ['src/phaser.js', 'src/Boot.js', 'src/Preloader.js', 'src/MainMenu.js','src/Game.js', 'src/Tile.js', 'src/Texts.js'];
            window.gameOnLoadScript = "startGame();";
        </script>
        <script type="text/javascript" src='assets1/softgames-1.1.js'></script>
        <script type="text/javascript" src='assets1/sg.hooks.js'></script>

</head>
<body>

<div id="game" style="font-family: HelveticaNeue;"></div>
<div id="orientation"></div>

<script type="text/javascript">

    var lang;
    
    startGame = (function () {
        lang = SG.lang; //SG_Hooks.getLanguage(['en','ru', 'de', 'es', 'fr', 'it','pt', 'tk']);

        var game = new Phaser.Game(320, 480, Phaser.CANVAS, 'game');

        //	Add the States your game has.
        //	You don't have to do this in the html, it could be done in your Boot state too, but for simplicity I'll keep it here.
        game.state.add('Boot', BasicGame.Boot);
        game.state.add('Preloader', BasicGame.Preloader);
        game.state.add('MainMenu', BasicGame.MainMenu);
        game.state.add('Game', BasicGame.Game);

        //	Now start the Boot state.
        game.state.start('Boot');



    });
    
</script>
<?php require '../menu.php'; ?>
</body>
</html>