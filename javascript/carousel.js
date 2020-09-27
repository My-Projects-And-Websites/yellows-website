// target the carousel slide and the images
const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = document.querySelectorAll('.carousel-slide img');

// Previous and next buttons
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// Counter for the carousel
let counter = 1;
// all images are the same size, this constant will determine how much the slide will move when the buttons are clicked
const size = carouselImages[0].clientWidth;

// do not start on the clone image, start at the original first
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

// when the next button is clicked...
nextBtn.addEventListener('click', () => {
    // if counter is greater than the number of images, start again
    if (counter >= carouselImages.length - 1) {
        return;
    }

    // sliding transition
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    // counter increment
    counter++;
    // move to the next image
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

// when the previous button is clicked...
prevBtn.addEventListener('click', () => {
    // if counter is less than 0, move to the last cloned image
    if (counter <= 0) {
        return;
    }

    // sliding transition
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    // decrement counter
    counter--;
    // move to previous image
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

// when transition of one of the images ends...
carouselSlide.addEventListener('transitionend', () => {
    // remove transition of last clone and move to the last image (not the clone)
    if (carouselImages[counter].id === 'lastClone') {
        carouselSlide.style.transition = "none";
        counter = carouselImages.length - 2;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }

    // remove transition of first clone and move to the first image (not the clone)
    if (carouselImages[counter].id === 'firstClone') {
        carouselSlide.style.transition = "none";
        counter = carouselImages.length - counter;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
})