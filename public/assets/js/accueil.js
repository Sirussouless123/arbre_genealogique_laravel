const menuHamburger = document.querySelector(".menu-hamburger")
const navlinks = document.querySelector(".nav-links")
const search=document.querySelector(".search-bar")

menuHamburger.addEventListener('click',()=>{
    navlinks.classList.toggle('mobile-menu')
    search.classList.toggle('mobile-search')
})