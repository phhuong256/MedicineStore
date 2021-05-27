$(document).ready(function () {
    $(".ol-content").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      centerMode: true,
      // focusOnSelect: true,
      // prevArrow: true,
      // nextArrow: true,
      // arrows: true,
    });
    // $(".main-img").slick({
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   arrows: false,
    //   fade: true,
    //   asNavFor: ".flex-imgs",
    // });
    $(".flex-imgs").slick({
      centerMode: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      // asNavFor: ".main-img",
      // dots: true,
      infinite: true,
      cssEase: "linear",
      variableWidth: true,
      variableHeight: true,
      arrows: true,
    });
  });