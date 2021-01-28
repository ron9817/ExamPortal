$(document).ready( _=>{

    $(document).on("click", "#myFunction1", function(){
        document.getElementById("new1").innerText = 'Test is scheduled or should start on date.';
        setTimeout(myTimeout1, 4000)
    });
    $(document).on("click", "#myFunction2", function(){
        document.getElementById("new2").innerText = 'Total duration of test in Hrs : Mins.';
        setTimeout(myTimeout1, 4000)
    });
    $(document).on("click", "#myFunction3", function(){
        document.getElementById("new3").innerText = 'Test is valid till or should end on date.';
        setTimeout(myTimeout1, 4000)
    });

    function myTimeout1() {
        document.getElementById("new1").innerText = "";
        document.getElementById("new2").innerText = "";
        document.getElementById("new3").innerText = "";
    }
    // Reference : https://www.w3schools.com/js/tryit.asp?filename=tryjs_timing2

});