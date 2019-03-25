var express = require('express');
var mongoose = require('mongoose');
var path = require('path');
var serveStatic = require('serve-static');
var bodyParser = require('body-parser');

app = express();
app.use(serveStatic(__dirname + "/dist"));

let db = mongoose.connection;
db.once('open', function(){
  console.log('Connected to DataBase');
});
mongoose.Promise = global.Promise;
mongoose.connect('mongodb://localhost/courses', {useNewUrlParser: true});
//------------BODY PARSER URL ENCODED------------//
app.use(bodyParser.urlencoded({ extended: true}));
app.use(bodyParser.json());

var port = process.env.PORT || 5000;
app.listen(port);

console.log('server started '+ port);
