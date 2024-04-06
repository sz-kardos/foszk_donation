const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}

$(document).ready(function () {

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });


    // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();

});

// modal click
let modal = document.getElementById("myModal");
let btn = document.getElementById("openModal");
let span = document.getElementsByClassName("close")[0];
let iframe = document.querySelector('iframe');

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
    stopVideo();
  }
  
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      stopVideo();
    }
  }
  
function stopVideo() {
    let iframeSrc = iframe.src;
    iframe.src = iframeSrc;
  }