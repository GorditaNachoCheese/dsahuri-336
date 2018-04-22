// JavaScript File
var i = 0;
var images = ["now_you_see_me", "now_you_dont"];
var strings = ["Now you see me...", "...now you don't!"];
var button = ["disappear", "reappear"];

function onClick() {
    i = Math.abs(i - 1);
    $("#string").html(strings[i]);
    $("#image").attr("src", "img/" + images[i] + ".png");
    $("#btn").html(button[i]);
}

$(document).ready(function () {
    $("#btn").click(onClick);
}); 