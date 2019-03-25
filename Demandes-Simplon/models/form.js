// ==== modules ==== //

var mongoose = require('mongoose');

// ==== producer ==== //

var FormSchema = mongoose.Schema({
  demandeur:{
      type: String,
      required: true
  },
  categorie:{
      type: String,
      required: true
  },
  objet:{
      type: String,
      required: true
  },
  details:{
    type: String,
    required: true
}
});

const Form = module.exports = mongoose.model('Form', FormSchema);
