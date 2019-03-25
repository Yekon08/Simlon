const express = require('express');
const hbs = require('express-handlebars');


const app = express();

// Set template Engine
app.engine('hbs', hbs({
    extname: 'hbs',
    defaultLayout: 'main',
    layoutsDir: __dirname + '/views/layouts',
    partialsDir: __dirname + '/views/partials'
}));

app.set('view engine', 'hbs');
app.use(express.static('public'));

app.get('/', function(req, res){
    res.render('index', {

   });
});

var port = process.env.PORT || 1337;
server.listen(port);

console.log("Server running at http://localhost:%d", port);
