
let menuBtn = document.querySelector('#menu-btn');
let navbar = document.querySelector('#myNavbar');


menuBtn.onclick = () => {
    
    navbar.classList.toggle('active');
}


document.querySelectorAll('.navbar a').forEach(link => {
    link.onclick = () => {
        navbar.classList.remove('active');
    };
});

window.onscroll = () => {
    navbar.classList.remove('active');
}