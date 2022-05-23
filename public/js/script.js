const navLink = document.querySelectorAll('.nav-link');

navLink.forEach(navLink => {
    navLink.addEventListener('click', () => {
        removeActive()
        navLink.classList.add('active')
    })
   
})

function removeActive(){
    navLink.forEach(navLink =>{
        navLink.classList.remove('active')
    })
}