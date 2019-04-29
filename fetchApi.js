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
      
      // Add the person objects one by one depending on their job titles
          // add professors into the 'professors' collection
          DD.collection("fs").insertMany(myJson, function(err, res) {
            if (err) throw err;
            console.log("Faculty/Staff added into the database.");
            db.close();
          });
      /*DD.collection("members").insertMany(myJson, function(err, res) {
        if (err) throw err;
        console.log("All documents are successfully inserted into the database.");
        db.close();
      });*/
    });
});