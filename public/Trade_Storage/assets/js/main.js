$(document).ready(function () {
    jQuery(".loctaion-slider").slick({
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrow: true,
        // nextArrow: true,
        // prevArrow: true,
        adaptiveHeight: true,
        responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
            },
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            },
        },
        ],
    });

    jQuery(".people_slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        // nextArrow: true,
        // prevArrow: true,
        adaptiveHeight: true,
    });

    jQuery(".recent_slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        nextArrow: $(".recent_arrow .left_arow"),
        prevArrow: $(".recent_arrow .right_arow"),
        adaptiveHeight: true,
    });

    // product detail page slider js

    $(".public_slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: ".slide_public2",
        prevArrow: $(".public_arows .left_arow"),
        nextArrow: $(".public_arows .right_arow"),
        infinite: true,
    });
    $(".slide_public2").slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: ".public_slider",
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        arrows: false,
        infinite: true,
    });
});

$(".custom-select").each(function () {
    var classes = $(this).attr("class"),
    id = $(this).attr("id"),
    name = $(this).attr("name");
    var template = '<div class="' + classes + '">';
    template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + "</span>";
    template += '<div class="custom-options">';
    $(this)
    .find("option")
    .each(function () {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + "</span>";
    });
    template += "</div></div>";

    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(
    function () {
        $(this).parents(".custom-options").addClass("option-hover");
    },
    function () {
        $(this).parents(".custom-options").removeClass("option-hover");
    }
    );
// $(".custom-select-trigger").on("click", function () {
    $("body").delegate(".custom-select-trigger","click",function(){
    $("html").one("click", function () {
        $(".custom-select").removeClass("opened");
    });
    $(this).parents(".custom-select").toggleClass("opened");
    event.stopPropagation();
});
$("body").delegate(".custom-option","click",function(){
// $(".custom-option").on("click", function () {
    $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
    $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".custom-select").removeClass("opened");
    $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});



// kjs
$('.meb_slider').slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
    ]
});

$('.executive_slider').slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
    ]
});

var current = 0;
var tabs = $(".tab");
var tabs_pill = $(".tab-pills");

loadFormData(current);

function loadFormData(n) {
    $(tabs_pill[n]).addClass("active");
    $(tabs[n]).removeClass("d-none");
    $("#back_button").attr("disabled", n == 0 ? true : false);
    n == tabs.length - 1
    ? $("#next_button").text("Submit").removeAttr("onclick")
    : $("#next_button")
    .attr("type", "button");
    // .attr("onclick", "next()");
}

function next() {
    $(tabs[current]).addClass("d-none");
    $(tabs_pill[current]).removeClass("active");

    current++;
    loadFormData(current);
}   

function back() {
    $(tabs[current]).addClass("d-none");
    $(tabs_pill[current]).removeClass("active");

    current--;
    loadFormData(current);
}