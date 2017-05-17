var step = 0;
var images = ["url(images/background.jpg)", "url(images/webres_1.png", "url(images/webres_2.png", "url(images/webres_3.png", "url(images/webres_4.png", "url(images/webres_5.png"]
function slideit() {
    document.getElementById('head').style.backgroundImage = images[step];
    if (step < 6)
        step++
    else
        step = 1
    setTimeout("slideit()", 2500)
}
slideit()