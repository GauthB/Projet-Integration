const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const connection = mysql.createPool({
  host     : '91.216.107.248',
  user     : 'gauth1148636_1fzru',
  password : 'n7ttg6wdjq',
  database : 'gauth1148636_1fzru'
});


// Starting our app.
const app = express();

// Creating a GET route that returns data from the 'users' table.
app.get('/Events', function (req, res) {
    // Connecting to the database.
    connection.getConnection(function (err, connection) {

    // Executing the MySQL query (select all data from the 'users' table).
    connection.query('SELECT * FROM Events', function (error, results, fields) {
      // If some error occurs, we throw an error.
      if (error) throw error;

      // Getting the 'response' from the database and sending it to our route. This is were the data is.
      res.send(results)
    });
  });
});

// Starting our server.
app.listen(3000, () => {
 console.log('Go to http://91.216.107.248:3000/Events so you can see the data.');
});
