let images = ['img1.png', 'img2.png', 'img3.png', 'img4.png', 'img5.png'];

function createSlider(target) {
    $.each(images, function(i, e) {
        img = $("<img>");
        img.attr("src", "images/" + e);
        $(target).append(img);
    });

    $(target).slick({
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        centerMode: true,
        centerPadding: '30px'
    });
}