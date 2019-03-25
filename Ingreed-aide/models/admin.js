const mongoose = require("mongoose");

//Admin Schema

const AdminSchema = mongoose.Schema({
  name: {
    type: String
  },

  password: {
    type: String
  },

  _id: mongoose.Schema.Types.ObjectId,

  rank: {
    type: Boolean
  }
});

const Admin = (module.exports = mongoose.model("Admin", AdminSchema));
