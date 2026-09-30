const typingText = document.getElementById("typing-text");

const words = [
    "Aspring Data Engineer",
    "Machine Learning Enthusiast"
   
];

let wordIndex = 0;
let charIndex = 0;
let deleting = false;


function typeEffect() {

    const currentWord = words[wordIndex];

    if (!deleting) {

        typingText.textContent =
            currentWord.substring(0, charIndex + 1);

        charIndex++;

        if (charIndex === currentWord.length) {

            deleting = true;

            setTimeout(typeEffect, 1500);

            return;
        }

    } else {

        typingText.textContent =
            currentWord.substring(0, charIndex - 1);

        charIndex--;

        if (charIndex === 0) {

            deleting = false;

            wordIndex++;

            if (wordIndex === words.length) {
                wordIndex = 0;
            }

        }
    }

    const speed = deleting ? 60 : 100;

    setTimeout(typeEffect, speed);
}


typeEffect();



/* =========================
   Mobile Menu
========================= */

const menuBtn = document.getElementById("menuBtn");

const navMenu = document.querySelector(".nav-menu");


menuBtn.addEventListener("click", function () {

    navMenu.classList.toggle("show");

});

const navLinks = document.querySelectorAll(".nav-menu a");


navLinks.forEach(function (link) {

    link.addEventListener("click", function () {

        navMenu.classList.remove("show");

    });

});