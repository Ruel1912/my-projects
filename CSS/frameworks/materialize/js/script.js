$( document ).ready(function () {
    $(".sidenav").sidenav();
    $(".parallax").parallax();
    $(".modal").modal({
        dismissible: false,
        opacity: .4,
        inDuration: 800,
        outDuration: 800,
        startingTop: '10%'
    });
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
        duration: 500,
        noWrap: true,
    });
    Materialize.showStaggeredList('#ul-test')
});

