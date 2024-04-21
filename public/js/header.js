// hien thi hoac tat search
function displaySearching() {
  document.querySelector('.searching').classList.add('active')
}

document.querySelector('.search-mobile').addEventListener('click', function () {
  displaySearching()
})

document.querySelector('.search-tablet').addEventListener('click', function () {
  displaySearching()
})

// close search
document.querySelector('.close-search-mobile-tablet').addEventListener('click', function () {
  document.querySelector('.searching').classList.remove('active')
})

// hien thi navbar mobile
document.querySelector('.nav-bar-mobile').addEventListener('click', function () {
  document.querySelector('.menu-mobile').classList.toggle('active')
})
