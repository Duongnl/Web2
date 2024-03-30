window.onload = () => {
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
}