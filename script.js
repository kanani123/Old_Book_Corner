window.onscroll = () =>{
    if(window.scrollY > 80){
        document.querySelector('.header-2').classList.add('active');
    }else{
        document.querySelector('.header-2').classList.remove('active');
    }
}

window.onload = () =>{
    if(window.scrollY > 80){
        document.querySelector('.header-2').classList.add('active');
    }else{
        document.querySelector('.header-2').classList.remove('active');
    }
}

var swiper = new Swiper(".books-slider", {
  loop:true,
  centeredSlides: true,
  autoplay: {
      delay: 1000,
      disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

