<ul id="slides">
    <?php foreach($announcements as $key => $announcement): ?>
        <li class="slide <?= $key == 0 ? 'showing' : '' ?>">
            <h1><?= $announcement->title ?></h1>
            <h3><?= $announcement->subtitle ?></h3>
            <?php if($announcement->event): ?>
                <h4><?= $announcement->event_location ?> <?= $announcement->event_start ?> to <?= $announcement->event_end ?></h4>
            <?php endif; ?>
            <h5><?= $announcement->description ?></h5>
            <img src="<?= $announcement->image_url ?>" />
        </li>
    <?php endforeach; ?>
</ul>

<script>
    var slides = document.querySelectorAll('#slides .slide');
    var currentSlide = 0;
    var interval = 5000;
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

img {
    width:300px;
    height:auto;
}

#slides {
    position: relative;
    height: 100%;
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