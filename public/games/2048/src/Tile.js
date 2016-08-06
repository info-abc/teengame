Tile = function (game, x, y) {
    Phaser.Group.call(this, game);

  	this.x = x;
  	this.y = y;

    this.value = 2;
    this.image = this.create(5, 5,"brick_2");
    this.pos = 0;

};

Tile.prototype = Object.create(Phaser.Group.prototype);
Tile.prototype.constructor = Tile;

var p = Tile.prototype;

p.setValue = function(value) {
  this.value = value;
	this.image.loadTexture("brick_"+value);
};

p.getValue = function() {
	return this.value;
};

p.destroy = function() {
	this.image.destroy();
};