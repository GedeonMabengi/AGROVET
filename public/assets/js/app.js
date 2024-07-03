/*---------- LE MENU COMMENCE ICI ----------*/

/*----- Fonction pour basculer le menu de navigation -----*/
function toggleNav(toggledMenu, toggleMenuImg){
    toggledMenu.classList.toggle('-translate-y-96');
    if (toggledMenu.classList.contains('-translate-y-96')) {
        toggleMenuImg.innerHTML = '<svg class="size-7" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><line x1="88" y1="152" x2="424" y2="152" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:48px"/><line x1="88" y1="256" x2="424" y2="256" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:48px"/><line x1="88" y1="360" x2="424" y2="360" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:48px"/></svg>';
        toggleMenuImg.setAttribute("aria-expended","false");
    }
    else{
        toggleMenuImg.innerHTML = '<svg class="size-7" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M289.94,256l95-95A24,24,0,0,0,351,127l-95,95-95-95A24,24,0,0,0,127,161l95,95-95,95A24,24,0,1,0,161,385l95-95,95,95A24,24,0,0,0,385,351Z"/></svg>';
        toggleMenuImg.setAttribute("aria-expended","true");
        toggledMenu.classList.add('header');
        toggledMenu.classList.add('backdrop-blur-md')
    }
}

const toggleMenuBtn = document.querySelector('#menu-btn');//menu_deroulant_en_js 
const toggleMenuImg = document.querySelector('#menu-btn');//le bouton du menu
const toggledMenu = document.querySelector('#toggled-menu');
const menuLinks = document.querySelector('#main-nav ul a');
toggleMenuBtn.addEventListener('click', () => toggleNav(toggledMenu, toggleMenuImg));

/*---------- LE MENU SE TERMINE ICI ----------*/

/*---------- LE SLIDE DE LA SECTION BLOG COMMENCE ICI ----------*/
var swiper = new Swiper(".mySwiper", {
      slidesPerView: 2,
      spaceBetween: 28,
      centeredSlides: false,
      loop: true,
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      breakpoints: {
          0: {
              slidesPerView: 1,
              spaceBetween: 20,
              centeredSlides: false,
          },
          568: {
              slidesPerView: 2,
              spaceBetween: 28,
              centeredSlides: false,
          },
          768: {
              slidesPerView: 2,
              spaceBetween: 28,
              centeredSlides: false,
          },
          1024: {
              slidesPerView: 2,
              spaceBetween: 32,
          },
      },
  });

/*---------- LE SLIDE DE LA SECTION BLOG SE TERMINE ICI ----------*/

/*---------- LE SLIDE DES HAPPY CLIENTTS SE TERMINE ICI ----------*/
var swiper = new Swiper(".mySwiper2", {
            loop: true,
            pagination: {
                el: ".swiper-pagination2",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
/*---------- LE SLIDE DES HAPPY CLIENTTS COMMENCE ICI ----------*/