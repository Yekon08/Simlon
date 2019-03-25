const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const hbs = require('express-handlebars');
const config = require('./config/database');

// Set connection MongoDB
mongoose.connect(config.database, { useNewUrlParser: true })
let db = mongoose.connection;

// Check connection
db.once('open', function(){
    console.log('Connected to MongoDB');
});

// Check for DB errors
db.on('error', function(err)
{
    console.log(err);
});

// init App
const app = express();

// Bring in Models
const Form = require('./models/form');

// Set template Engine
app.engine('hbs', hbs({
    extname: 'hbs',
    defaultLayout: 'main',
    layoutsDir: __dirname + '/views/layouts',
    partialsDir: __dirname + '/views/partials'
}));

app.set('view engine', 'hbs');
app.use(express.static('public'));

// Body Parser Middleware
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));
// parse application/json
app.use(bodyParser.json());

app.get('/', function(req, res)
{
    Form.find({}, function(err, forms){

        if(err){
            console.log(err);
        } else {
            res.render('index',
            {
                forms: forms
            });
        }
    });
});

let demandes = require('./routes/demandes');
app.use('/demandes', demandes);

var port = Number(process.env.PORT || 8080 );
app.listen(port);
