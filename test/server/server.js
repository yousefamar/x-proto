'use strict';

var SERVER = { port: 8888 };

(function () {
	var self = this;

	var userdb = require('./userdb');

	var express = require('express');
	var server = express();
	
	server.use(express.favicon());
	server.use(express.cookieParser());
	server.use(express.session({secret: '***REMOVED***'}));

	server.get('/', function(req, res){
		req.session.count = req.session.count || 0;
		res.send('It\'s working!'+(req.session.count++));

		console.log('waka');
		userdb.getIDUser('Primo', function (userCount) {
			console.log(userCount);
		});
	});

	userdb.connect(function () {
		server.listen(self.port);
	});
}).call(SERVER);