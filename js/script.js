let menu = document.querySelector('#menu-btn');
let cari = document.querySelector('#search-btn');
let navbar = document.querySelector('.header .navbar');
let nav = document.querySelector('.navbar .Btn');
const activePage = window.location.pathname;
let searchForm = document.querySelector(".search-form");
let searchBar = document.querySelector('.search-bar-container');
let header = document.querySelector('#header'); // Identify target
const password = document.getElementById('password');
const toggle = document.getElementById('toggle');
let subMenu = document.getElementById('subMenu');

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

function checkEmail(input) {
  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!emailRegex.test(input.value)) {
    input.setCustomValidity("Format email yang dimasukkan salah!");
  } else {
    input.setCustomValidity("");
  }
}

function showHide(){
  if(password.type === 'password'){
      password.setAttribute('type', 'text');
      toggle.classList.add('hide')
  } else{
      password.setAttribute('type', 'password');
      toggle.classList.remove('hide')
  }
}

function showPassword() {
  var pass = document.getElementById("pass");
  var cpass = document.getElementById("cpass");
  pass.setAttribute("type", "text");
  cpass.setAttribute("type", "text");
}

function hidePassword() {
  var pass = document.getElementById("pass");
  var cpass = document.getElementById("cpass");
  pass.setAttribute("type", "password");
  cpass.setAttribute("type", "password");
}

//untuk header backgroud transparant
// window.addEventListener('scroll', function(event) {
//     event.preventDefault();

//     if (window.scrollY <= 700) {
//         header.style.backgroundColor = 'transparent';
//     } else {
//         header.style.backgroundColor = '#fff';
//     }
// });

document.querySelector("#menu-btn").onclick = () => {
    navbar.classList.toggle("active");
};

document.querySelector("#search-btn").onclick = () => {
    searchForm.classList.toggle("active");
}; 

//untuk active menu navbar
const currentPage = window.location.href;
const navLinks = document.querySelectorAll('nav a').forEach(link => {
  if(currentPage !== "http://localhost/healingqu/" && link.href && link.href !== "" && link.href.includes(`${activePage}`)){
    link.classList.add('active');
  } else {
    link.classList.remove('active');
  }
});


menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
};

window.onscroll = () =>{
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
};

var swiper = new Swiper(".blogs-slider", {
  loop:true, 
  grabCursor:true,
  spaceBetween: 10,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
},
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
  },
});

var swiper = new Swiper(".clients-slider", {
  loop:true, 
  grabCursor:true,
  autoplay: {
      delay: 2000,
      disableOnInteraction: false,
  },
  spaceBetween: 20,
  breakpoints: {
      0: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
});

var swiper = new Swiper(".home-slider", {
  loop:true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
},
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var swiper = new Swiper(".product-slider", {
  loop:true, 
  grabCursor:true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".reviews-slider", {
  grabCursor:true,
  loop:true,
  autoHeight:true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    700: {
      slidesPerView: 2,
    },
    1000: {
      slidesPerView: 3,
    },
  },
});

let loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
  let boxes = [...document.querySelectorAll('.packages .box-container .box')];
  for (var i = currentItem; i < currentItem + 3; i++){
    boxes[i].style.display = 'inline-block';
  };
  currentItem += 3;
  if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
  }
}