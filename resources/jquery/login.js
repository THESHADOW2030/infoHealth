var images = [];

images[0] = "resources/images/login/6999301.jpg";
images[1] = "resources/images/login/6999299.jpg";
images[2] = "resources/images/login/6999309.jpg";
images[3] = "resources/images/login/6999319.jpg";


var i = 0;
setInterval(fadeDivs, 3000);

function fadeDivs()
{
    i = i < images.length ? i : 0;
    $('.image-fader img').fadeOut(1000, function()
    {
        $(this).attr('src', images[i]).fadeIn(1000);
    })
    i++;
}