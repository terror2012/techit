var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
const redis = require('redis');
const redisClient = redis.createClient();


server.listen(3000);
console.log(server.address());
io.on('connection', function(socket){
    console.log('a user connected');
    });

redisClient.subscribe('business');
console.log("Redis server running");
redisClient.on("message", function(channel, message) {
    console.log(channel);
    console.log(message);
            io.emit(channel, message);
});