
BasicGame.MainMenu = function (game) {

	this.music = null;
	this.playButton = null;

};

BasicGame.MainMenu.prototype = {

	create: function () {

		this.back = this.add.sprite(0,0,"background");
		this.logo = this.add.sprite( 160,100, "logo");
		this.logo.anchor.setTo( 0.5, 0.5);

		this.buttonPlay = this.add.button(160,220,"bMenuPlay",this.startGame, this, 0,0,1,null);
        this.buttonPlay.anchor.setTo(0.5, 0.5);
        var style_play = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "center",stroke:"#DB6C25",strokeThickness:4 };
        this.buttonPlayLabel = this.add.text(160, this.buttonPlay.y-4, Lang[lang][0], style_play);
        this.buttonPlayLabel.anchor.setTo(0.5, 0.5);

        this.buttonMoreGames = this.add.button(160,280,"bMenuMore",this.gotoSite, this, 0,0,1,null);
        this.buttonMoreGames.anchor.setTo(0.5, 0.5);
        var style_more = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "center",stroke:"#0072bc",strokeThickness:4 };
        this.buttonMoreGamesLabel = this.add.text(160, this.buttonMoreGames.y-4, Lang[lang][1], style_more);
        this.buttonMoreGamesLabel.anchor.setTo(0.5, 0.5);
        
        this.logo1 = this.add.button( 80,320, "logo1",this.gotoSite, this, 0,0,1,null);
        this.buttonMoreGames.anchor.setTo(0.5, 0.5);
	},

	update: function () {

		//	Do some nice funky main menu effect here

	},

	startGame: function (pointer) {
		this.game.state.start('Game', false, false);
	},

	gotoSite: function (pointer) {
		window.open("http://choinhanh.vn", "_blank");
		//SG.redirectToPortal();
	},

	shutdown: function() {
		this.back.destroy();
		this.logo.destroy();
		this.buttonPlay.destroy();
		this.buttonMoreGames.destroy();
	}

};
