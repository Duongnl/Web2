
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
  console.log(contentScrollLeft, contentScrollWidth)
  if (contentScrollLeft >= contentScrollWidth) {
    contentScrollLeft = contentScrollWidth
  } else {
  }
  contentCategories.scrollLeft = contentScrollLeft
})

let currentIndexSlide = 1;

setInterval(() => {
  showSlide(currentIndexSlide)
  if (currentIndexSlide >= 3) {
    currentIndexSlide = 1;
  } else {
    currentIndexSlide += 1;
  }
}, 2000)

const showSlide = (index) => {
  currentIndexSlide = index
  document.querySelector('.banner .img-slide.active').classList.remove('active')
  document.querySelector(`.banner > img:nth-child(${index})`).classList.add('active')
  document.querySelector('.badge-nav .badge.active').classList.remove('active')
  document.querySelector(`.badge-nav span:nth-child(${index})`).classList.add('active')
}




