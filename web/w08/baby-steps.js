let num = 0;

for (let j = 2; j < process.argv.length; j++) {
    num += Number(process.argv[j]);
}

console.log(num);