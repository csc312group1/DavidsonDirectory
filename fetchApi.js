var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";
const fetch = require("node-fetch");
fetch("https://elastic.snaplogic.com:443/api/1/rest/slsched/feed/davidsonDEV/Sandbox-NickRoberts/HR_Employee_Directory_API/EmployeeDirectory", {
  headers: { "Content-Type": "application/json", "Authorization": "Bearer 6PHSMY0BSAdRzLruLEVRc1A3FnnjxIjA" },
  credentials: "include"
  })
  .then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    data = JSON.stringify(myJson)
    console.log(data.length);
    // Connect to the mongo client after running "sudo mongod" on Terminal
    MongoClient.connect(url, function(err, db) {
      if (err) throw err;
      var DD = db.db("DavidsonDirectory");

      DD.fs.drop()

      // Create collection
      DD.createCollection("fs", function(err, res) {
        if (err) throw err;
        console.log("Collection 'Faculty/Staff' created!");
      });
      // add faculty/staff into the fs collection of DD database
      DD.collection("fs").insertMany(myJson, function(err, res) {
        if (err) throw err;
        console.log("Faculty/Staff added into the database.");
        db.close();
      });
    });
});
fetch("https://elastic.snaplogic.com/api/1/rest/slsched/feed/davidsonDEV/Sandbox-NickRoberts/ST_Student_Directory_API/StudentDirectory", {
  headers: { "Content-Type": "application/json", "Authorization": "Bearer n7V44wXBiIdkXkk5Pv6NAIIOKLJ0JE75" },
  credentials: "include"
  })
  .then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    data = JSON.stringify(myJson)
    console.log(data.length);
    // Connect to the mongo client after running "sudo mongod" on Terminal
    MongoClient.connect(url, function(err, db) {
      if (err) throw err;
      var DD = db.db("DavidsonDirectory");

      

      // Create collection
      DD.createCollection("st", function(err, res) {
        if (err) throw err;
        console.log("Collection 'Student' created!");
      });
      // add students into the st collection of DD database
      DD.collection("st").insertMany(myJson, function(err, res) {
        if (err) throw err;
        console.log("Student added into the database.");
        db.close();
      });
    });
});