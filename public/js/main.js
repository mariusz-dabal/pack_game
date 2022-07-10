document.querySelector('#menuButton').addEventListener('click', () => {
    const devider = document.querySelector('.dropdown-divider');

    if (devider.classList.contains('show')) {
      devider.classList.remove('show')
    } else {
      devider.classList.add('show')
    }
});

const url = location.href.split("/");
const navLinks = document.querySelectorAll('.nav-link');
let currentPage = url.pop();

navLinks.forEach(function(navLink) {
  let currentLink = navLink.href.split("/").pop();

  if (currentLink === currentPage) {
    navLink.classList.add("active");
  }
});
