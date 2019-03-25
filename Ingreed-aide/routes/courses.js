module.exports = function(app){
    const courList = require('../controllers/course');

    app.route('/cours/')
        .get(courList.listAllCourses)

    app.route('/cours/:id')
        .get(courList.dlCourses)

    app.route('/cours/create')
        .get(courList.createCourses)
        .post(courList.postCourses)

    app.route('/cours/delete/:id')
        .get(courList.deleteCourses)
}