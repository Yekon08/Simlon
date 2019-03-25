const mongoose = require('mongoose');

//Course Schema

const courseSchema = mongoose.Schema({
    idCourse: mongoose.Schema.Types.ObjectId,
    titre:{
        type: String,
    },
    admin: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Admin',
        required: true
    },
    theme: {
        type: String,
    }
})

const Course = module.exports = mongoose.model('course', courseSchema)