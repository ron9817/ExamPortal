// Start date
var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
var day = currentDate.getDate()
var month = currentDate.getMonth() + 1
var year = currentDate.getFullYear()

if (day<10) {
    day = "0"+day;
    // console.log(day);
}
if (month<10) {
    month = "0"+month;
    // console.log(month);
}

var tomo_date = year + "-" + month + "-" + day + "T00:00";
// console.log(tomo_date);
document.getElementById('test_start').value = tomo_date;
document.getElementById('test_start').min = tomo_date;

// End Date
var nextDate = new Date(new Date().getTime() + 48 * 60 * 60 * 1000);
var day2 = nextDate.getDate()
var month2 = nextDate.getMonth() + 1
var year2 = nextDate.getFullYear()

if (day2<10) {
    day2 = "0"+day2;
    // console.log(day2);
}
if (month2<10) {
    month2 = "0"+month2;
    // console.log(month2);
}

var end_date = year2 + "-" + month2 + "-" + day2 + "T00:00";
document.getElementById('test_end').value = end_date;
document.getElementById('test_end').min = tomo_date;
// console.log(end_date);
// console.log(day2);
// Reference : https://flaviocopes.com/how-to-get-tomorrow-date-javascript/
