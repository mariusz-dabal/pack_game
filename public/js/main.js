document.querySelector('#menuButton').addEventListener('click', () => {
    const devider = document.querySelector('.dropdown-divider');

    if (devider.classList.contains('show')) {
      devider.classList.remove('show')
    } else {
      devider.classList.add('show')
    }
});




