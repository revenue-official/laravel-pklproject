import { gsap } from "gsap";

// global variable
var count = 20;

function swipeDown() {
    const swipeDown = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        swipeDown.push(`.swipe-down-${i}`);
        delays.push(i * 0.5);
    }

    swipeDown.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                y: -100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    });
}
swipeDown();

function swipeUp() {
    const swipeUp = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        swipeUp.push(`.swipe-up-${i}`);
        delays.push(i * 0.5);
    }

    swipeUp.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                y: 100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    });
}
swipeUp();


function swipeRight() {
    const swipeRight = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        swipeRight.push(`.swipe-right-${i}`);
        delays.push(i * 0.5);
    }

    swipeRight.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                x: -100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    });
}
swipeRight();

function swipeLeft() {
    const swipeLeft = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        swipeLeft.push(`.swipe-left-${i}`);
        delays.push(i * 0.5);
    }

    swipeLeft.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                x: 100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    });
}
swipeLeft();

function fadeIn() {
    const fadeIn = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        fadeIn.push(`.fade-in-${i}`);
        delays.push(i * 0.5);
    }
    fadeIn.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    })
}
fadeIn();

function fadeout() {
    const fadeOut = [];
    const delays = [];

    for (let i = 1; i <= count; i++) {
        fadeOut.push(`.fade-out-${i}`);
        delays.push(i * 0.5);
    }
    fadeOut.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.to(targetElements, {
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2
            });
        }
    })
}
fadeout();

function marqueeProg() {
    const animate_marquee = document.querySelector(".animate-marquee");
    if (animate_marquee) {
        gsap.to(".animate-marquee", {
            x: "-50%",
            duration: 120,
            ease: "linear",
            repeat: -1

        });
    }

    const animate_marquee_reverse = document.querySelector(".animate-marquee-reverse");
    if (animate_marquee_reverse) {
        gsap.to(".animate-marquee-reverse", {
            x: "50%",
            duration: 120,
            ease: "linear",
            repeat: -1

        });
    }
}
marqueeProg();

function cardAnimation() {
    const proCardSlide = document.querySelectorAll('.pro-card-slide');
    const proTextCard = document.querySelectorAll('.pro-text-slide');
    const proText = document.querySelectorAll('.pro-text');
    const analyzeImage = document.querySelectorAll('.analyze-image');


    const count = proCardSlide.length;
    const strLength = count.toString().length;

    let firstX = count * 100;

    let firstDuration = () => {
        if (strLength <= 1) {
            return '0.' + (count + 2);
        } else if (strLength >= 2) {
            let durations = count % 10 == 0 ? (count / 10) : (count / 10 + '' + count % 10);
            return durations;
        }
    }

    setTimeout(() => {
        gsap.to(proCardSlide, {
            x: '-' + firstX + 'px',
            duration: firstDuration(),
            ease: "power1.inOut",
            delay: 1,
            onComplete: () => {
                gsap.to(proCardSlide, {
                    x: 0,
                    duration: firstDuration(),
                    stagger: `-0.${strLength}`,
                    ease: "power1.inOut",
                    delay: 0.5,
                });
            }
        });

    }, 1500);




}
cardAnimation();
