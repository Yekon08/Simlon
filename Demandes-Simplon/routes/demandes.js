const express = require('express');
const router = express.Router();

let Form = require('../models/form');

router.get('/', function(req, res)
{
    Form.find({}, function(err, form){
        
        if(err){
            console.log(err);
        } else {
            res.render('test',
            {
                form: form,
                
            });
        }
    });
});

router.get('/admin', function(req, res)
{
    Form.find({}, function(err, form){
        
        if(err){
            console.log(err);
        } else {
            res.render('details',
            {
                form: form,
            });
        }
    });
});

router.get('/admin/:id', function(req, res){
    Form.findById(req.params.id, function(err, form){
        res.render('details_infos', {
            form: form
        });
    });
});


router.post('/', function(req, res){
    let form = new Form();
    form.demandeur = req.body.demandeur;
    console.log(req.body.demandeur);
    form.categorie = req.body.categorie;
    form.objet = req.body.objet;
    form.details = req.body.details;

    form.save(function(err){
        if (err){
            console.log(err);
            return;
        } else {
            res.redirect('/demandes/');
        }
    });
});

module.exports = router;