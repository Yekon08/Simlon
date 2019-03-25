const express = require('express');
const router = express.Router();

// Article Model
let Article = require('../models/article');

router.get('/', function(req,res){
    const title = 'Articles'
    Article.find({}, function(err, articles){
        if(err){
            console.log(err);
        } else {
            res.render('articles',
            {
                headTitle: title,
                articles: articles,
            });
        }
    });
});

router.get('/add', function(req, res){
    const title = 'Add Article'
    res.render('add_article', {
        headTitle: title,
    });
});

router.post('/add', function(req, res){

    req.checkBody('title', 'Title is required').notEmpty();
    req.checkBody('author', 'Author is required').notEmpty();
    req.checkBody('body', 'Body is required').notEmpty();

    let errors = req.validationErrors();
    
    if(errors){
        res.render('add_article', {
            errors:errors
        });
    } else {
        let article = new Article();
        article.title = req.body.title;
        article.author = req.body.author;
        article.body = req.body.body;
    
        article.save(function(err){
            if(err){
                console.log(err);
                return;
            } else {
                req.flash('success', 'Youpi');
                res.redirect('/articles/');
            }
        });
    }
});

router.get('/edit/:id', function(req, res){
    Article.findById(req.params.id, function(err, article){
        const title = 'Edit Article'
        res.render('edit_article', {
            headTitle: title,
            article: article
        });
    });
});

router.post('/edit/:id', function(req, res){
    let article = {};
    article.title = req.body.title;
    article.author = req.body.author;
    article.body = req.body.body;

    let query = {_id:req.params.id}

    Article.update(query, article, function(err){
        if(err){
            console.log(err);
            return;
        } else {
            req.flash('success', 'Article Updated');
            res.redirect('/articles/');
        }
    });
});

router.get('/delete/:id', function(req, res){
    Article.findByIdAndRemove(req.params.id, function(err){
        if(err) return next(err);
        req.flash('error', 'Suppr');
        res.redirect('/articles/');
    });
});

router.get('/:id', function(req, res){
    Article.findById(req.params.id, function(err, article){
        const title = 'Article'
        res.render('article', {
            headTitle: title,
            article: article
        });
    });
});
module.exports = router;