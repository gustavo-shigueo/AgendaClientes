const dropdown = document.querySelectorAll('[data-dropdown]')

window.addEventListener('resize', e => e.target.innerWidth >= 950 ? dropdown.forEach(el => el.classList.remove('active')) : undefined)

dropdown[0].addEventListener('click', () => dropdown.forEach(el => el.classList.toggle('active')))