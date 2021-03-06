const express = require('express');
var app = express();
const bodyparser = require('body-parser');
app.use(bodyparser.json());


const mysql = require('mysql');
const config = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'js',
};

const pool = mysql.createPool(config);
module.exports = pool;


app.get('/users', (request, response) => {
    pool.query('SELECT * FROM users', (error, result) => {
        if (error) throw error;
        response.send(result);
    });
});


app.post('/users', (request, response) => {
    pool.query('INSERT INTO users SET ?', [request.body], (error, result) => {
        if (error) throw error;
        response.status(201).send(`User added with ID: ${result.insertId}`);
    });
});


app.put('/users/:id', (request, response) => {
    const id = request.params.id;
    pool.query('UPDATE users SET ? WHERE id = ?', [request.body, id], (error, result) => {
        if (error) throw error;
        response.send('User updated successfully.');
    });
});


app.delete('/users/:id', (request, response) => {
    const id = request.params.id;
 
    pool.query('DELETE FROM users WHERE id = ?', id, (error, result) => {
        if (error) throw error;
 
        response.send('User deleted.');
    });
});

app.listen(3000,()=> console.log("Server listening on 3000"));