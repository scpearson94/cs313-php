'use strict'

const http = require('http');
const fs = require('fs');

http.createServer(onRequest).listen(8888);

  function onRequest(req, res) {
    if (req.url == '/home') {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write('<!DOCTYPE html><html><body><h1>Welcome to the Home Page</h1></body></html>');
    } else if (req.url == '/getData') {
        fs.writeFile('mynewfile.json', '{"name":"Sophia Pearson","class":"cse342"}', function (err) {
            if (err) throw err;
            console.log('Saved!');
        });
    } else {
        res.writeHead(404, {'Content-Type': 'text/html'});
        res.write('Page Not Found');
    }

    res.end();
  }

  