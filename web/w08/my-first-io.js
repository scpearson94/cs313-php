const fs = require('fs');

let buf = fs.readFileSync(process.argv[2]);

let lines = buf.toString().str.split('\n').length - 1;

console.log(sum);