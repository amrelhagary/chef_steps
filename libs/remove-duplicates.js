var email = require('../fixtures/email_list.json');
console.log("duplicate list: " + email.length);
var start = process.hrtime();

var uniqueArray = function(email) {
    return email.filter(function (item, pos) {
        return email.indexOf(item) == pos;
    })
};

var elapsed_time = function(note){
    var precision = 3; // 3 decimal places
    var elapsed = process.hrtime(start)[1] / 1000000; // divide by a million to get nano to milli
    console.log(process.hrtime(start)[0] + " s, " + elapsed.toFixed(precision) + " ms - " + note); // print message + time
    start = process.hrtime(); // reset the timer
};

elapsed_time("start readFile()");

var promise = new Promise((resolve, reject) => {
    console.log("inside promise");
    resolve(uniqueArray(email));
});

promise.then((unique_email_list) => {
    console.log("unique list: " +unique_email_list.length);
});

elapsed_time("end readFile()");

