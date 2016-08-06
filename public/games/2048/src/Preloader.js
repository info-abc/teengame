BasicGame.Preloader = function (game) {

	this.background = null;
	this.preloadBar = null;

	this.ready = false;

};

BasicGame.Preloader.prototype = {

	preload: function () {

		//	These are the assets we loaded in Boot.js
		//	A nice sparkly background and a loading progress bar
		this.background = this.add.sprite(0, 0, 'background');
		this.back = this.add.sprite(0,0,"background");
		this.logo = this.add.sprite( 160,100, "logo");
		this.logo.anchor.setTo( 0.5, 0.5);
		this.preloadBar = this.add.sprite(35, 300, 'preloaderBar');

		//	This sets the preloadBar sprite as a loader sprite.
		//	What that does is automatically crop the sprite from 0 to full-width
		//	as the files below are loaded in.
		this.load.setPreloadSprite(this.preloadBar);

		//	Here we load the rest of the assets our game needs.
		//	As this is just a Project Template I've not provided these assets, the lines below won't work as the files themselves will 404, they are just an example of use.
		this.load.image('checkers', 'assets/checkers.png');
        this.load.spritesheet('bMenuPlay', 'assets/bPlay.png', 156, 45);
        this.load.spritesheet('bMenuMore', 'assets/bMoreGames.png',156, 45);

		this.load.image("logo1", "assets/logo1.png");
		this.load.image("brick_2", "assets/brick_2.png");
		this.load.image("brick_4", "assets/brick_4.png");
		this.load.image("brick_8", "assets/brick_8.png");
		this.load.image("brick_16", "assets/brick_16.png");
		this.load.image("brick_32", "assets/brick_32.png");
		this.load.image("brick_64", "assets/brick_64.png");
		this.load.image("brick_128", "assets/brick_128.png");
		this.load.image("brick_256", "assets/brick_256.png");
		this.load.image("brick_512", "assets/brick_512.png");
		this.load.image("brick_1024", "assets/brick_1024.png");
		this.load.image("brick_2048", "assets/brick_2048.png");

		this.load.image("iconScore", "assets/iconScore.png");
		this.load.image("iconBest", "assets/iconBest.png");
		this.load.image("gameEnd", "assets/gameEnd.png");
		this.load.image("bar", "assets/bar.png");
		this.load.image("pause", "assets/pause.png");
		this.load.image("Tutorial", "assets/Tutorial.png");
	},

	create: function () {
		Phaser.Canvas.setSmoothingEnabled(this.game.context, false);

		if( !localStorage["2048Threes.tutorial"] ){
			localStorage["2048Threes.bestScore"] = 0;
			localStorage["2048Threes.tutorial"] = 0;
		}
		

		//	Once the load has finished we disable the crop because we're going to sit in the update loop for a short while as the music decodes
		this.preloadBar.cropEnabled = false;

		// remove if we have music
		this.ready = true;
		this.game.state.start('MainMenu');
	},

	update: function () {

		//	You don't actually need to do this, but I find it gives a much smoother game experience.
		//	Basically it will wait for our audio file to be decoded before proceeding to the MainMenu.
		//	You can jump right into the menu if you want and still play the music, but you'll have a few
		//	seconds of delay while the mp3 decodes - so if you need your music to be in-sync with your menu
		//	it's best to wait for it to decode here first, then carry on.
		
		//	If you don't have any music in your game then put the game.state.start line into the create function and delete
		//	the update function completely.
		
		if (this.cache.isSoundDecoded('titleMusic') && this.ready == false)
		{
			this.ready = true;
			this.game.state.start('MainMenu');
		}

	}

};
