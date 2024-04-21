
const btnScrollLeft = document.querySelector('.scrollToLeft')
const btnScrollRight = document.querySelector('.scrollToRight')
const contentCategories = document.querySelector('.block.categories .bottom')
let contentScrollWidth = contentCategories.scrollWidth - contentCategories.offsetWidth
let contentScrollLeft = contentCategories.scrollLeft
btnScrollLeft.addEventListener('click', () => {
  contentScrollLeft -= 200
  if (contentScrollLeft <= 0) {
    contentScrollLeft = 0
  }
  contentCategories.scrollLeft = contentScrollLeft
})

btnScrollRight.addEventListener('click', () => {
  contentScrollLeft += 200
  if (contentScrollLeft >= contentScrollWidth) {
    contentScrollLeft = contentScrollWidth
  } else {
  }
  contentCategories.scrollLeft = contentScrollLeft
})

// slideshow 
let currentIndexSlide = 1

const showSlide = (index) => {
  if (index > 3) {
    currentIndexSlide = 1
  }
  if (index < 1) {
    currentIndexSlide = 3
  }
  const slides = document.querySelectorAll('.banner img')
  const badges = document.querySelectorAll('.badge-nav .badge')
  slides.forEach(s => { s.classList.remove('active') })
  badges.forEach(b => { b.classList.remove('active') })
  slides[currentIndexSlide - 1].classList.add('active')
  badges[currentIndexSlide - 1].classList.add('active')
}
showSlide(currentIndexSlide)

setInterval(() => {
  showSlide(currentIndexSlide += 1)
}, 5000)

document.querySelector('.group-nav .fa-angle-left').addEventListener('click', () => {
  showSlide(currentIndexSlide -= 1)
})

document.querySelector('.group-nav .fa-angle-right').addEventListener('click', () => {
  showSlide(currentIndexSlide += 1)
})



