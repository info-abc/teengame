BasicGame.Game = function (game) {

	//	When a State is added to Phaser it automatically has the following properties set on it, even if they already exist:

    this.game;		//	a reference to the currently running game
    this.add;		//	used to add sprites, text, groups, etc
    this.camera;	//	a reference to the game camera
    this.cache;		//	the game cache
    this.input;		//	the global input manager (you can access this.input.keyboard, this.input.mouse, as well from it)
    this.load;		//	for preloading assets
    this.math;		//	lots of useful common math operations
    this.sound;		//	the sound manager - add a sound, play one, set-up markers, etc
    this.stage;		//	the game stage
    this.time;		//	the clock
    this.tweens;	//	the tween manager
    this.world;		//	the game world
    this.particles;	//	the particle manager
    this.physics;	//	the physics manager
    this.rnd;		//	the repeatable random number generator

    //	You can use any of these from any function within this State.
    //	But do consider them as being 'reserved words', i.e. don't create a property for your own game called "world" or you'll over-write the world reference.

};

BasicGame.Game.prototype = {

	create: function () {
        this.back = this.add.sprite(0,0,"background");
        this.back.inputEnabled = true;
        this.back.events.onInputDown.add( this.touchDown, this);
        this.back.events.onInputUp.add( this.touchUp, this);
        this.checkers = this.add.sprite(1,60, "checkers");

        this.bar = this.add.sprite(-8,-6,"bar");

        this.isTouching = false;
        this.beginTouchPosition = new Phaser.Point();

        this.scores = 0;

        this.iconScore = this.add.sprite(5,2,"iconScore");
        this.iconScore = this.add.sprite(287,2,"iconBest");
        this.iconScore.anchor.setTo(1,0);
        var score_style = {font: "bold 14px Helvetica Neue", fill: "#555555", align: "left"};
        this.labelScore = this.game.add.text(50, 16, "0", score_style);
        this.labelScore.anchor.setTo( 0, 0 );
        var best_style = {font: "bold 14px Helvetica Neue", fill: "#555555", align: "right"};
        this.labelBest = this.game.add.text(256-28, 16, "", best_style);
        this.labelBest.anchor.setTo( 1, 0 );
        this.labelBest.setText( localStorage["2048Threes.bestScore"] );

        this.buttonPause = this.add.sprite(315,8, "pause")
        this.buttonPause.anchor.setTo(1,0);
        this.buttonPause.inputEnabled = true;
        this.buttonPause.events.onInputUp.add(this.enterPause, this);

        this.tileGroup = this.add.group();

        // pause
        this.pauseGroup = this.add.group();
        this.pause_back = this.add.graphics(0,0, this.pauseGroup);
        this.pause_back.beginFill(0x000000);
        this.pause_back.drawRect(0, 0, 320, 480);
        this.pause_back.alpha = 0.7;
        this.pause_back.endFill();
        var style_label = {font: "bold 28px Helvetica Neue", fill: "#ffffff", align: "center"};
        this.pause_label = this.add.text(160, 150, Lang[lang][2], style_label, this.pauseGroup);
        this.pause_label.anchor.setTo( 0.5, 0 );
        this.pauseGroup.add( this.pause_label );

        this.buttonContinue = this.add.button(160,220,"bMenuPlay",this.leavePause, this, 0,0,1,0);
        this.buttonContinue.anchor.setTo(0.5, 0.5);
        var style_play = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "center",stroke:"#DB6C25",strokeThickness:4 };
        this.buttonContinueLabel = this.add.text(160, this.buttonContinue.y-4, Lang[lang][3], style_play);
        this.buttonContinueLabel.anchor.setTo(0.5, 0.5);

        this.buttonRestart = this.add.button(160,270,"bMenuPlay",this.startGame, this, 0,0,1,0);
        this.buttonRestart.anchor.setTo(0.5, 0.5);
        this.buttonRestartLabel = this.add.text(160, this.buttonRestart.y-4, Lang[lang][4], style_play);
        this.buttonRestartLabel.anchor.setTo(0.5, 0.5);

        this.buttonMenu = this.add.button(160,320,"bMenuPlay",this.gotoMenu, this, 0,0,1,0);
        this.buttonMenu.anchor.setTo(0.5, 0.5);
        this.buttonMenuLabel = this.add.text(160, this.buttonMenu.y-4, Lang[lang][5], style_play);
        this.buttonMenuLabel.anchor.setTo(0.5, 0.5);

        this.pauseGroup.add(  this.buttonContinue );
        this.pauseGroup.add(  this.buttonRestart );
        this.pauseGroup.add(  this.buttonMenu );
        this.pauseGroup.add(  this.buttonContinueLabel );
        this.pauseGroup.add(  this.buttonRestartLabel );
        this.pauseGroup.add(  this.buttonMenuLabel );
        this.pauseGroup.alpha = 0;
        this.buttonContinue.visible = false;
        this.buttonRestart.visible = false;
        this.buttonMenu.visible = false;

        // end pause

        this.endGame = this.add.group();
        this.endGame_back = this.add.graphics(-160,-240, this.endGame);
        this.endGame_back.beginFill(0x000000);
        this.endGame_back.drawRect(0, 0, 320, 480);
        this.endGame_back.alpha = 0.7;
        this.endGame_back.endFill();
        this.endGame.x = 160;
        this.endGame.y = 240;
        this.endGame_back = this.endGame.create(-130,-160,"gameEnd");


        this.endGame_label = this.game.add.text(0, -150, Lang[lang][7], style_label);
        this.endGame_label.anchor.setTo( 0.5, 0 );
        this.endGame.add( this.endGame_label );
        var style_text = {font: "bold 20px Helvetica Neue", fill: "#006B9F", align: "left"};
        var style_score = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "right",stroke:"#006B9F",strokeThickness:4};
        this.endGame_labelScore = this.game.add.text(-100, -85, Lang[lang][8] + ":", style_text);
        this.endGame_labelScore.anchor.setTo( 0, 0 );
        this.endGame_labelBest = this.game.add.text(-100, -30, Lang[lang][9] + ":", style_text);
        this.endGame_labelBest.anchor.setTo( 0, 0 );
        this.endGame_scoreValue = this.game.add.text(100, -85, "0", style_score);
        this.endGame_scoreValue.anchor.setTo( 1, 0 );
        this.endGame_bestValue = this.game.add.text(100, -30, "0", style_score);
        this.endGame_bestValue.anchor.setTo( 1, 0 );
        this.endGame.add( this.endGame_labelScore );
        this.endGame.add( this.endGame_labelBest );
        this.endGame.add( this.endGame_scoreValue );
        this.endGame.add( this.endGame_bestValue );
        this.endGame.alpha = 0;


        this.buttonPlay = this.add.button(0,80,"bMenuPlay",this.startGame, this, 0,0,1,0);
        this.buttonPlay.anchor.setTo(0.5, 0.5);
        var style_play = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "center",stroke:"#DB6C25",strokeThickness:4 };
        this.buttonPlayLabel = this.add.text(0, this.buttonPlay.y-4, Lang[lang][6], style_play);
        this.buttonPlayLabel.anchor.setTo(0.5, 0.5);

        this.buttonMoreGames = this.add.button(0,130,"bMenuMore",this.gotoSite, this, 0,0,1,0);
        this.buttonMoreGames.anchor.setTo(0.5, 0.5);
        var style_more = {font: "bold 20px Helvetica Neue", fill: "#ffffff", align: "center",stroke:"#0072bc",strokeThickness:4 };
        this.buttonMoreGamesLabel = this.add.text(0, this.buttonMoreGames.y-4, Lang[lang][1], style_more);
        this.buttonMoreGamesLabel.anchor.setTo(0.5, 0.5);

        this.endGame.add( this.buttonPlay );
        this.endGame.add( this.buttonPlayLabel );
        this.endGame.add( this.buttonMoreGames );
        this.endGame.add( this.buttonMoreGamesLabel );

        this.buttonPlay.visible = false;
        this.buttonMoreGames.visible = false;


        this.tileWidth = 80;
		this.tileHeight = 89;
        this.fieldArray = new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        this.calcArray = new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

        this.tileSprites = [];
        this.upKey;
        this.downKey;
        this.leftKey;
        this.rightKey;
        this.colors = {
            2:0xFFFFFF,
            4:0xFFEEEE,
            8:0xFFDDDD,
            16:0xFFCCCC,
            32:0xFFBBBB,
            64:0xFFAAAA,
            128:0xFF9999,
            256:0xFF8888,
            512:0xFF7777,
            1024:0xFF6666,
            2048:0xFF5555,
            4096:0xFF4444,
            8192:0xFF3333,
            16384:0xFF2222,
            32768:0xFF1111,
            65536:0xFF0000
        }
        var canMove=false;

        this.upKey = this.game.input.keyboard.addKey(Phaser.Keyboard.UP);
        this.upKey.onDown.add(this.moveUp,this);
        this.downKey = this.game.input.keyboard.addKey(Phaser.Keyboard.DOWN);
        this.downKey.onDown.add(this.moveDown,this);
        this.leftKey = this.game.input.keyboard.addKey(Phaser.Keyboard.LEFT);
        this.leftKey.onDown.add(this.moveLeft,this);
        this.rightKey = this.game.input.keyboard.addKey(Phaser.Keyboard.RIGHT);
        this.rightKey.onDown.add(this.moveRight,this);

        this.addTwo();
        this.addTwo();

        SG_Hooks.start();

        if( parseInt(localStorage["2048Threes.tutorial"]) == 0 ){
            //localStorage["2048Threes.tutorial"] = 1;
            //this.showTutorial();
        };
	},

    showTutorial: function() {
        this.tutorial = this.add.sprite(0,0,"Tutorial");
        this.tutorial.inputEnabled = true;
        this.tutorial.events.onInputUp.add( this.hideTutorial, this);

        var style = {font: "bold 13px Helvetica Neue", fill: "#444444", align: "left", wordWrap: true, wordWrapWidth: 150 };
        this.tutorial_label_1 = this.add.text(165, 10, Lang[lang][10], style);
        this.tutorial_label_2 = this.add.text(10, 170, Lang[lang][11], style);
        this.tutorial_label_3 = this.add.text(165, 330, Lang[lang][12], style);
    },

    hideTutorial: function() {
        this.tutorial.destroy();
        this.tutorial_label_1.destroy();
        this.tutorial_label_2.destroy();
        this.tutorial_label_3.destroy();
    },

    startGame: function () {
        this.game.state.start('Game', false, false);
    },

    gotoMenu: function () {
        this.game.state.start('MainMenu', false, false);
    },

    enterPause: function() {
        this.back.inputEnabled = false;
        this.pauseGroup.alpha = 1;
        this.buttonContinue.visible = true;
        this.buttonRestart.visible = true;
        this.buttonMenu.visible = true;
    },

    leavePause: function() {
        this.back.inputEnabled = true;
        this.pauseGroup.alpha = 0;
        this.buttonContinue.visible = false;
        this.buttonRestart.visible = false;
        this.buttonMenu.visible = false;
    },

    gotoSite: function (pointer) {
        window.open("http://choinhanh.vn", "_blank");
        
    },

    addTwo: function(){
        do{
            var randomValue = Math.floor(Math.random()*16);
        } while (this.fieldArray[randomValue]!=0)
        this.fieldArray[randomValue]=2;


        var tile = new Tile(this.game , this.toCol(randomValue)*this.tileWidth, 61 + this.toRow(randomValue)*this.tileHeight);
        tile.pos = randomValue;
        tile.alpha = 0;


        this.tileSprites.push(tile);
        this.tileGroup.add( tile );

        tile.alpha = 1;
        this.updateNumbers();
        this.canMove=true;

        if( this.checkGameOver() ){
            if( this.scores > parseInt(localStorage["2048Threes.bestScore"]) )
                localStorage["2048Threes.bestScore"] = this.scores;
            this.endGame_scoreValue.setText( "" + this.scores);
            this.endGame_bestValue.setText( localStorage["2048Threes.bestScore"]);
            SG_Hooks.gameOver(0, this.scores);
            this.buttonPlay.visible = true;
            this.buttonMoreGames.visible = true;
            this.endGame.alpha = 1;
        }
    },

    toRow: function(n){
        return Math.floor(n/4);
    },

    toCol: function(n){
        return n%4;    
    },

    updateNumbers: function(){
        for( var i = 0; i < this.tileSprites.length; i++) {
            var value = this.fieldArray[this.tileSprites[i].pos];
            this.tileSprites[i].setValue( value );
        } 
    },

    moveLeft: function(){
        this.prepareCalc();
        if(this.canMove){
            this.canMove=false;
            var moved = false;
            this.tileSprites.sort(this.sort_by('x', true, parseInt));
            for( var i = 0; i < this.tileSprites.length; i++) {
                var item = this.tileSprites[i];
                var row = this.toRow(item.pos);
                var col = this.toCol(item.pos);
                if(col>0){
                    var remove = false;
                    for(var j=col-1;j>=0;j--){
                        if(this.fieldArray[row*4+j]!=0){
                            // ...we just have to see if the tile we are landing on has the same value of the tile we are moving
                            if(this.fieldArray[row*4+j]==this.fieldArray[row*4+col]){
                                remove = true;
                                j--;                                             
                            }
                            break;
                        }
                    }
                    if(col!=j+1){
                        moved=true;
                        this.moveTile(item,row*4+col,row*4+j+1,remove);
                    }
                }
            }
            this.endMove(moved);
        }
    },

    moveRight:function(){
        this.prepareCalc();
        if(this.canMove){
            this.canMove=false;
            var moved=false;
            this.tileSprites.sort(this.sort_by('x', false, parseInt));
            for( var i = 0; i < this.tileSprites.length; i++) {
                var item = this.tileSprites[i];
                var row = this.toRow(item.pos);
                var col = this.toCol(item.pos);
                if(col<3){
                    var remove = false;
                    for(var j=col+1;j<=3;j++){
                        if(this.fieldArray[row*4+j]!=0){
                            if(this.fieldArray[row*4+j]==this.fieldArray[row*4+col]){
                                remove = true;
                                j++;                                             
                            }
                            break;
                        }
                    }
                    if(col!=j-1){
                        moved=true;
                        this.moveTile(item,row*4+col,row*4+j-1,remove);
                    }
                }
            }
            this.endMove(moved);
        }
    },
        
    moveUp:function(){
        this.prepareCalc();
        if(this.canMove){
            this.canMove=false;
            var moved=false;
            this.tileSprites.sort(this.sort_by('y', true, parseInt));
            for( var i = 0; i < this.tileSprites.length; i++) {
                var item = this.tileSprites[i];
                var row = this.toRow(item.pos);
                var col = this.toCol(item.pos);
                if(row>0){  
                    var remove=false;
                    for(var j=row-1;j>=0;j--){
                        if(this.fieldArray[j*4+col]!=0){
                            if(this.fieldArray[j*4+col]==this.fieldArray[row*4+col]){
                                remove = true;
                                j--;                                             
                            }
                            break
                        }
                    }
                    if(row!=j+1){
                        moved=true;
                        this.moveTile(item,row*4+col,(j+1)*4+col,remove);
                    }
                }
            }
            this.endMove(moved);
        }
    },
        
    moveDown:function(){
        this.prepareCalc();
        if(this.canMove){
            this.canMove=false;
            var moved=false;
            this.tileSprites.sort(this.sort_by('y', false, parseInt));
            for( var i = 0; i < this.tileSprites.length; i++) {
                var item = this.tileSprites[i];
                var row = this.toRow(item.pos);
                var col = this.toCol(item.pos);
                if(row<3){
                    var remove = false;
                    for(var j=row+1;j<=3;j++){
                        if(this.fieldArray[j*4+col]!=0){
                            if(this.fieldArray[j*4+col]==this.fieldArray[row*4+col]){
                                remove = true;
                                j++;                                             
                            }
                            break;
                        }
                    }
                    if(row!=j-1){
                        moved=true;
                        this.moveTile(item,row*4+col,(j-1)*4+col,remove);
                    }
                }
            }
            this.endMove(moved);
        }
    },

    prepareCalc: function() {
        this.calcArray = new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    },

    endMove:function(m){
        if(m){
            for( var i = 0; i <  this.fieldArray.length; i++){
                if(this.fieldArray[i] == -1)
                    this.fieldArray[i] = this.calcArray[i];    
            }
            this.time.events.add(150,this.addTwo, this);
        }else{
            this.canMove=true;
        }
    },
    
    moveTile:function(tile,from,to,remove){
        this.fieldArray[to]=this.fieldArray[from];
        this.fieldArray[from]=0;
        tile.pos=to;
        var movement = this.game.add.tween(tile);
        movement.to({x:this.tileWidth*(this.toCol(to)),y:60+this.tileHeight*(this.toRow(to))},150);
        if(remove){
            this.calcArray[to] = this.fieldArray[to]*2;
            this.fieldArray[to] = -1;
            this.scores += this.calcArray[to];
            this.labelScore.setText( ""+ this.scores );
            var self = this;
            movement.onComplete.add(function(tile){
                var index = self.tileSprites.indexOf( tile );
                tile.destroy();
                self.tileSprites.splice( index, 1 );

            });
        }
        movement.start();
    },

    checkGameOver: function() {
        var gameOver = true;
        for( var i = 0; i <  this.fieldArray.length; i++){
            if(this.fieldArray[i] == 0)
                return false;    
        }

        for( var i = 0; i <  this.fieldArray.length; i++){
            var current = this.fieldArray[i];
            var fromRight = this.fieldArray[i + 1];
            var fromBottom = this.fieldArray[i + 4];
            if( (i+1) % 4 == 0)
                fromRight = 0;
            if( i>=12 )
                fromBottom = 0;
            if( current == fromRight || current == fromBottom ) {
                gameOver = false;
                break;
            }

        }   
        return gameOver;
    },

    sort_by:function(field, reverse, primer){
        var key = primer ? 
           function(x) {return primer(x[field])} : 
           function(x) {return x[field]};

        reverse = [-1, 1][+!!reverse];
        return function (a, b) {
           return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
        } 
    },

    touchDown: function() {
        this.isTouching = true;
        this.beginTouchPosition.x = this.game.input.x;
        this.beginTouchPosition.y = this.game.input.y;
    },

    touchUp: function() {
        this.isTouching = false;
    },

	update: function () {
        if( this.isTouching ) {
            var dist = this.game.math.distance( this.beginTouchPosition.x, this.beginTouchPosition.y, this.game.input.x, this.game.input.y);
            if( dist > 10) {
                var direction = this.detectDirection();
                this.isTouching = false;
                if( direction == "up" )
                    this.moveUp();
                else if( direction == "down" )
                    this.moveDown();
                else if( direction == "left" )
                    this.moveLeft();
                else if( direction == "right" )
                    this.moveRight();
            }
        }
	},

    detectDirection: function() {
        var swipeDirection = "";
        var gestureThreshold = 8;
        var gestureRestraint = 100;
        var distX = this.game.input.x - this.beginTouchPosition.x;
        var distY = this.game.input.y - this.beginTouchPosition.y;
        if ( Math.abs(distX) >= gestureThreshold && Math.abs(distY) <= gestureRestraint ) {
            swipeDirection = (distX < 0)? 'left' : 'right';
        }
        else if( Math.abs(distY) >= gestureThreshold && Math.abs(distX) <= gestureRestraint) {
            swipeDirection = (distY < 0)? 'up' : 'down';
        }

        return swipeDirection;
    },

	quitGame: function (pointer) {

		this.game.state.start('MainMenu');

	}

};