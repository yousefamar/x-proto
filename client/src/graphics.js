GAME.namespace('graphics').init = function(game) {
	game.renderer = new THREE.WebGLRenderer({ antialias: true });
	game.renderer.setSize(window.innerWidth, window.innerHeight);
	game.renderer.shadowMapEnabled = true;
	game.renderer.shadowMapSoft = true;
	game.renderer.sortObjects = false;

	window.addEventListener('resize', function(){
		if (game.camera) {
			game.camera.aspect = window.innerWidth/window.innerHeight;
			game.camera.updateProjectionMatrix();
		}
		game.renderer.setSize(window.innerWidth, window.innerHeight);
	}, false);
};