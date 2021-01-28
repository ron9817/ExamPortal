function login() {
    // var element = document.getElementById("log");
    $('#log').addClass("login");
    $('#reg').removeClass("register");
    $('#textl').addClass("textWhite");
    $('#textl').removeClass("textBlack");
    $('#textr').addClass("textBlack");
}
// Reference : https://stackoverflow.com/questions/7002039/easiest-way-to-toggle-2-classes-in-jquery

function register() {
    // var element = document.getElementById("reg");
    $('#reg').addClass("register");
    $('#log').removeClass("login");
    $('#textl').removeClass("textWhite");
    $('#textl').addClass("textBlack");
    $('#textr').addClass("textWhite");
    $('#textr').removeClass("textBlack");
    // $('#target').removeClass("a").addClass("b");
}