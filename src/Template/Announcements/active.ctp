<ul id="slides">
    <li class="slide showing">1</li>
    <li class="slide">2</li>
    <li class="slide">3</li>
    <li class="slide">4</li>
</ul>

<script>
    var slides = document.querySelectorAll('#slides .slide');
    var currentSlide = 0;
    var interval = 2000;
    var slideInterval = setInterval(nextSlide, interval);

    function nextSlide() {
        slides[currentSlide].className = 'slide';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].className = 'slide showing';
    }
</script>

<style>
/*
    essential styles:
    these make the slideshow work
*/

#slides {
    position: relative;
    height: 300px;
    padding: 0px;
    margin: 0px;
    list-style-type: none;
}

.slide {
    position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 1;

    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
}

.showing {
    opacity: 1;
    z-index: 2;
}

html {
    height:100%;
}

body {
    min-height: 100%;
}
</style>