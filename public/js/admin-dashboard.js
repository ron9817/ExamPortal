// const { reference } = require("@popperjs/core");

var counterYou = document.getElementsByClassName("CT")[0];
var myText = document.getElementsByClassName("CT-text")[0];

var counterYou1 = document.getElementsByClassName("CT1")[0];
var myText1 = document.getElementsByClassName("CT1-text")[0];

var counterYou2 = document.getElementsByClassName("CT2")[0];
var myText2 = document.getElementsByClassName("CT2-text")[0];

var counterYou3 = document.getElementsByClassName("CT3")[0];
var myText3 = document.getElementsByClassName("CT3-text")[0];

var url = window.location.pathname;
// alert(url);

const total_time = 4;

var tmp = counterYou.innerText;
let count = 0;
let speed = parseInt( tmp )/ total_time;
setInterval(() => {
    if (count <= tmp) {
        counterYou.innerText = count;
        count+=speed;
        if (url=='/admin/dashboard') {
            myText.innerText = "Total Tests";
        }else if(url=='/admin/tests') {
            myText.innerText = "Total Tests";
        }else if (url='/admin/students') {
            myText.innerText = "Total Registration";
        }
    }else if (count > tmp) {
        if (url=='/admin/dashboard') {
            myText.innerText = "Total Tests";
        }else if(url=='/admin/tests') {
            myText.innerText = "Total Tests";
        }else if (url='/admin/students') {
            myText.innerText = "Total Registration";
        }
        // break;
    }
}, 100);

var tmp1 = counterYou1.innerText;
let speed1 = parseInt( tmp1 )/ total_time;
let count1 = 0;
setInterval(() => {
    if (count1 <= tmp1) {
        counterYou1.innerText = count1;
        count1+=speed1;
        if (url=='/admin/dashboard') {
            myText1.innerText = "Total Registration";
        }else if(url=='/admin/tests') {
            myText1.innerText = "Completed Tests";
        }else if (url='/admin/students') {
            myText1.innerText = "Total Appeared";
        }
    }else if (count1 > tmp1) {
        if (url=='/admin/dashboard') {
            myText1.innerText = "Total Registration";
        }else if(url=='/admin/tests') {
            myText1.innerText = "Completed Tests";
        }else if (url='/admin/students') {
            myText1.innerText = "Total Appeared";
        }
    }
}, 100);

var tmp2 = counterYou2.innerText;
let count2 = 0;
let speed2 = parseInt( tmp2 )/ total_time;
setInterval(() => {
    if (count2 <= tmp2) {
        counterYou2.innerText = count2;
        count2+=speed2;
        if (url=='/admin/dashboard') {
            myText2.innerText = "Tests Published";
        }else if(url=='/admin/tests') {
            myText2.innerText = "Ongoing Tests";
        }else if (url='/admin/students') {
            myText2.innerText = "Total Passed";
        }
    }else if (count2 > tmp2) {
        if (url=='/admin/dashboard') {
            myText2.innerText = "Tests Published";
        }else if(url=='/admin/tests') {
            myText2.innerText = "Ongoing Tests";
        }else if (url='/admin/students') {
            myText2.innerText = "Total Passed";
        }
    }
}, 100);

var tmp3 = counterYou3.innerText;
let count3 = 0;
let speed3 = parseInt( tmp3 )/ total_time;
setInterval(() => {
    if (count3 <= tmp3) {
        counterYou3.innerText = count3;
        count3+=speed3;
        if (url=='/admin/dashboard') {
            myText3.innerText = "Success Rate %";
        }else if(url=='/admin/tests') {
            myText3.innerText = "Upcoming Tests";
        }else if (url='/admin/students') {
            myText3.innerText = "Total Failed";
        }
    }else if (count3 > tmp3) {
        if (url=='/admin/dashboard') {
            myText3.innerText = "Success Rate %";
        }else if(url=='/admin/tests') {
            myText3.innerText = "Upcoming Tests";
        }else if (url='/admin/students') {
            myText3.innerText = "Total Failed";
        }
    }
}, 100);
