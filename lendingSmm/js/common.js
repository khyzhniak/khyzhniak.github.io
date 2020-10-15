var ham = document.getElementById('ham');
ham.addEventListener("click", burger);
var element = document.querySelectorAll('#nav > a');
for (var i = 0; i < element.length; i++) {
  element[i].addEventListener("click", hideMenu);
}

function burger() {
  $("#nav").toggleClass("activeNav");
};

function hideMenu() {
  $("#nav").toggleClass("activeNav");
  ham.classList.remove("active")
};


var arr = [
  {
    'text1': '1 месяц',
    'text2': [376, 1980],
    'text3': [0.7, 2],
    'text4': [906, 8706],
    'text5': [1321, 2315],
    'href': '#1',
    'src': 'v-mariage',
  }, {
    'text1': '2 месяца',
    'text2': [22, 22],
    'text3': [222, 222],
    'text4': [2222, 2222],
    'text5': [22222, 22222],
    'href': '#2',
    'src': 'v-cocoloco',
  }, {
    'text1': '3 месяца',
    'text2': [33, 33],
    'text3': [333, 333],
    'text4': [3333, 3333],
    'text5': [3333, 33333],
    'href': '#3',
    'src': 'v-natalimage',
  },
];
var i = 0;
var par1 = document.getElementById('par1');
var par1_1 = document.getElementById('par1_1');
var par1_2 = document.getElementById('par1_2');
var par1_3 = document.getElementById('par1_3');
var par1_4 = document.getElementById('par1_4');
var par2_1 = document.getElementById('par2_1');
var par2_2 = document.getElementById('par2_2');
var par2_3 = document.getElementById('par2_3');
var par2_4 = document.getElementById('par2_4');
var par3 = document.getElementById('par3');
var par4_1 = document.getElementById('par4_1');
var par4_2 = document.getElementById('par4_2');
var par4_3 = document.getElementById('par4_3');

var videoEl = document.getElementsByTagName('video')[0];

function contentCase(when) {
  if (when === 'next') {
    ++i;
    if (i === arr.length) {
      i = 0
    }
  } else {
    --i;
    if (i < 0) {
      i = arr.length - 1
    }
  }
  par1.innerText = arr[i]['text1'];
  anim(par1_1, arr[i]['text2'][0], 50);
  anim(par1_2, arr[i]['text3'][0], 50);
  anim(par1_3, arr[i]['text4'][0], 50);
  anim(par1_4, arr[i]['text5'][0], 50);
  anim(par2_1, arr[i]['text2'][1], 100);
  anim(par2_2, arr[i]['text3'][1], 100);
  anim(par2_3, arr[i]['text4'][1], 100);
  anim(par2_4, arr[i]['text5'][1], 100);
  par3.setAttribute('href', arr[i]['href']);
  var src1 = "../lendingSmm/img/" + arr[i]['src'] + ".mp4";
  var src2 = "../lendingSmm/img/" + arr[i]['src'] + ".ogv";
  var src3 = "../lendingSmm/img/" + arr[i]['src'] + ".webm";
  var src4 = "../lendingSmm/img/" + arr[i]['src'] + ".jpg";
  par4_1.setAttribute('src', src1);
  par4_2.setAttribute('src', src2);
  par4_3.setAttribute('src', src3);
  videoEl.setAttribute('poster', src4);
  // par4.setAttribute('class', 'imgPhoneContent slide-out-left')
  // par4.setAttribute('class', 'imgPhoneContent scale-in-hor-right')
  // img();
  videoEl.load();

}

var par4 = document.getElementById('par4');

// function img() {
//     setTimeout(function () {
//         par4.setAttribute('class', 'imgPhoneContent')
//     }, 500)
// }

contentCase();

function anim(props1, props2, x) {
  var y = 0;
  var i = 1;
  if (props2 > 100000) y = 2000;
  else if (props2 > 10000) y = 1000;
  else if (props2 > 1000) y = 100;
  else if (props2 > 100) y = 50;
  else if (props2 > 10) y = 10;
  else if (props2 > 1) y = 1;
  var timerId = setTimeout(function go() {
    props1.innerText = i;
    if (i < props2) {
      setTimeout(go, x);
      i += y;
    } else {
      props1.innerText = props2;
    }
  }, 1);

}

$("#scroll").click(function () {
  $('body').animate({scrollTop: '+=' + window.innerHeight}, 'slow');
});
var $win = $(window);
var $marker = $('#unit_misja');

var buttonToTop = document.getElementById('buttonToTop');
$win.scroll(function () {
  //Складываем значение прокрутки страницы и высоту окна, этим мы получаем положение страницы относительно нижней границы окна, потом проверяем, если это значение больше, чем отступ нужного элемента от верха страницы, то значит элемент уже появился внизу окна, соответственно виден
  if ($win.scrollTop() + $win.height() >= $marker.offset().top) {
    buttonToTop.style.display = 'block'
  } else {
    buttonToTop.style.display = 'none'

  }
});


var $page = $('html, body');
$('a[href*="#"]').click(function () {
  $page.animate({
    scrollTop: $($.attr(this, 'href')).offset().top
  }, 400);
  return false;
});
$('#headb1').click(function () {
  $('#bodyb1').slideToggle("slow");
});
$('#headb2').click(function () {
  $('#bodyb2').slideToggle("slow");
});
$('#headb3').click(function () {
  $('#bodyb3').slideToggle("slow");
});
