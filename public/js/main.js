document.querySelector('#menuButton').addEventListener('click', () => {
    const devider = document.querySelector('.dropdown-divider');

    if (devider.classList.contains('show')) {
      devider.classList.remove('show')
    } else {
      devider.classList.add('show')
    }
});

var url = location.href.split("/");
var navLinks = document.getElementsByTagName("ul")[0].getElementsByTagName("a");
var i=0;
var currentPage = url[url.length - 1];
for(i;i<navLinks.length;i++){
  var lb = navLinks[i].href.split("/");
  if(lb[lb.length-1] == currentPage) {
   navLinks[i].className = "nav-link active";
}};

