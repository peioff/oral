let burger = document.getElementById('burger');
burger.addEventListener('click', () => toggleVisibility())

function toggleVisibility() {
    let navbar = document.getElementById('header-nav');
    if (navbar.style.display === 'none') {
        navbar.style.display = 'flex';
    }
    else {
        navbar.style.display = 'none';
    }
}