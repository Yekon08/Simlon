  var createError = require('http-errors');

// Set require and Express
const express = require('express');
const path = require('path');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const expressValidator = require('express-validator');
const flash = require('express-flash');
const session = require('express-session');
const passport = require('passport');
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

// Article Model
let Article = require('./models/article');

// init App
const app = express();

// app.use(function (req, res, next) {
//   res.locals.messages = require('express-messages')(req, res);
//   next();
// });

// Express Validator Middleware
app.use(expressValidator({
    errorFormatter: function(param, msg, value) {
        var namespace = param.split('.')
        , root    = namespace.shift()
        , formParam = root;
  
      while(namespace.length) {
        formParam += '[' + namespace.shift() + ']';
      }
      return {
        param : formParam,
        msg   : msg,
        value : value
      };
    }
  }));

// Passport Config
require('./config/passport')(passport);

// Passport Middleware
app.use(passport.initialize());
app.use(passport.session());

// Set template Engine
app.engine('hbs', hbs({
    extname: 'hbs',
    defaultLayout: 'main',
    layoutsDir: __dirname + '/views/layouts',
    partialsDir: __dirname + '/views/partials'
}));

app.set('view engine', 'hbs');
app.use(express.static('public'));

// Express Session Middleware
app.use(session({
    secret: 'this is My long String that is used for session in http',
    resave: false,
    saveUninitialized: true,
}));

// Flash Middleware
app.use(flash());

// Body Parser Middleware
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));
// parse application/json
app.use(bodyParser.json());


// Controller / Routes
app.get('*', function(req, res, next){
    res.locals.user = req.user || null;
    next();
});

// Root
app.get('/', function(req, res){
    const title = 'Accueil';
    Article.find({}).limit(2).exec(function(err, articles){
        if(err){
            console.log(err);
        } else {
            res.render('index', {
                headTitle: title,
                articles: articles
            });
        }
    });
});

let users = require('./routes/users');
let articles =  require('./routes/articles');
app.use('/users', users);
app.use('/articles/', articles);


// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;