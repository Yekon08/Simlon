const mongoose = require('mongoose')

course = mongoose.model('course')

exports.listAllCourses = function(req, res){
    course.find({}, function(err, course){
        if(err){
            res.send(err);
        }else{
            res.render('cours',{
                course: course,
            })
        }
    })
    
}

exports.dlCourses = function(req, res){
    
    
}

exports.createCourses = function(req, res){
    var newCourse = new course(req.body);
    newCourse.save(function(err, course){
        if(err){
            res.send(err);
        }else{
            res.render('create_course',{
                course: course
            })
        }
    })
}

exports.postCourses = function(req, res){
 
}

exports.deleteCourses = function(req, res){

}