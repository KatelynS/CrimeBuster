//make an express.js server
var express = require('express');
var server = express();

server.use('/', express.static(__dirname + '/'));
server.listen(8080);
console.log("listening on port 8080");
