$('.slPortfolio').slick({
    dots: true,
    slidesPerRow: 4,
    rows: 2,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesPerRow: 2,
                rows: 2,
                dots: false
            }
        }
    ]
});
$('.slReviews').slick({
    dots: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 922,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }
    ]
});

var priceOld = ['1795', '2295', '1195', '1395', '700'];
var priceNew = ['1495', '1495', '1400', '1095', '600'];

var colorObj = {
    'gold': '#f2ce57',
    'silver': '#dadde3',
    'white': '#fff',
    'red': '#cc0000',
    'black': '#000',
    'sin': '#22229e',
    'violet': '#825399',
    'pink': '#f6aed2',
    'blue': '#85add9',
    'green': '#52ba53',
    'yellow': '#ffe024'
};
var imgTopObj = [
    // {'src': 'none', 'text': 'Без рисунка'},
    {'src': 'crown1', 'text': 'Корона I'},
    {'src': 'crown2', 'text': 'Корона 2'},
    {'src': 'crown31', 'text': 'Корона 3'},
    {'src': 'crown4', 'text': 'Корона 4'},
    {'src': 'crown51', 'text': 'Корона 5 - НОВИНКА'},
    {'src': 'crown6', 'text': 'Корона 6'},
    {'src': 'crown7', 'text': 'Корона 7'},
    {'src': 'crown8', 'text': 'Корона 8'},
    {'src': 'crown9', 'text': 'Корона 9'},
    {'src': 'crown10', 'text': 'Корона 10'},
    {'src': 'crown112', 'text': 'Корона 11 - НОВИНКА'},
    {'src': 'athlete', 'text': 'Атлет'},
    {'src': 'krily', 'text': '"Крылья"'},
    {'src': 'rings', 'text': '"Кольца"'},
    {'src': 'almaz', 'text': '"Алмаз"'},
    {'src': 'heart1', 'text': '"Сердце"'},
    {'src': 'superman', 'text': '"Супермен"'},
    {'src': 'vip', 'text': '"vip"'},
    {'src': 'lev', 'text': 'Лев с короной'},
    {'src': 'dowload', 'text': 'Свой рисунок (от 200 грн.)'}
];
var imgBottomObj = [
    // {'src': 'none', 'text': 'Без рисунка'},
    {'src': 'venzel', 'text': 'Вензель 1'},
    {'src': 'monogram4', 'text': 'Монограмм 1'},
    {'src': 'monogram2', 'text': 'Монограмм 2'},
    {'src': 'uzor', 'text': 'Узор'},
    {'src': 'leaf', 'text': 'Лист'},
];
var atlas = {'atlas': '#ffffff-белый'};
var detskij = {'detskij': '#ffffff-белый'};
var mahr = {
    'halat-black': '#000-черный',
    'halat-red': 'red-красный',
    'halat-temnosin': '#00008B-красный',
    'halat-kor': '#964B00-коричневый',
    'halat-ser': '#808080-серый',
    'halat-sin': '#0000FF-синий',
    'halat-white': '#ffffff-белый'
};
var velur = {
    'halat-black-velyr': '#000-черный',
    'halat-blue-velyr': '#405180-синий',
    'halat-brown-velyr': 'brown-коричневый',
    'halat-persik-velyr': '#FFE5B4-персик',
    'halat-red-velyr': '#FF0000-красный',
    'halat-ros-velyr': '#FFC0CB-розовый',
    'halat-ser-velyr': '#808080-серый',
    'halat-white-velyr': '#ffffff-белый'
};
var sizeMahrVelur = ['s', 'm', 'l', 'xl', '2xl', '3xl', '4xl'];
var sizeAtlas = ['44', '46', '48', '50', '52', '54'];
var sizeKids = ['1-2', '3-5', '5-7', '7-10', '10-12', '12-14'];
var sizePol = ['50*90', '70*140', '100*180'];
var polotence = {
    'pol_bordo': '#9B2D30-Бордо',
    'pol_red': '#FF0000-Красный',
    'pol_corall': '#FF7F50-Коралл',
    'pol_orange': '#FFA500-Оранжевый',
    'pol_jeltiy': '#FFFF00-Желтый',
    'pol_persik': '#FFE5B4-Персик',
    'pol_white': '#fff-Белый',
    'pol_salat': '#99FF99-Салат',
    'pol_goluboy': '#42AAFF-Голубой',
    'pol_biruza': '#77DDE7-Бирюза',
    'pol_siniy': '#0000FF-Синий',
    'pol_lemon': '#FDE910-Лимон',
    'pol_dark_blue': '#3B83BD-Темно голубой',
    'pol_siren': '#422362-Сирень',
    'pol_malina': '#BD2B4E-Малина',
    'pol_rozoviy': '#FFC0CB-Розовый'
};
var oldPriceInput = document.getElementById('oldPriceInput');
var oldPriceInput = document.getElementById('oldPriceInput');
var fontColorSendText = document.getElementById('fontColorSendText');
var img1TextSend = document.getElementById('img1TextSend');
var img2TextSend = document.getElementById('img2TextSend');
var fontColorSend = document.getElementById('fontColorSend');
var fontSizeSend = document.getElementById('fontSizeSend');
var imgtovarInput = document.getElementById('imgtovarInput');
var img1Input = document.getElementById('img1Input');
var img2Input = document.getElementById('img2Input');
var fontFamInput = document.getElementById('fontFamInput');
var img = document.getElementById('img');
var size = document.getElementById('size');
var color1 = document.getElementById('color1');
var textarea = document.getElementById('textarea');
var enterText = document.getElementById('enterText');
var wrImgTop = document.getElementById('wrImgTop');
var wrImgBottom = document.getElementById('wrImgBottom');
var messago = document.getElementById('messago');
textarea.addEventListener('change', editText);
textarea.addEventListener('keyup', editText);
// messago.setAttribute('placeholder', 'Адрес доставки/ \nКомментарий к заказу/\n На когда нужен заказ')
//получаем цвет текста
var fontColor = document.myForm.fontColor;
for (let i = 0; i < fontColor.length; i++) {
    fontColor[i].addEventListener('change', function () {
        enterText.style.color = colorObj[this.value];//берем цвет текста из масива
        changeImgTop(this.value);//вызываем функцию, передаем цвет
        changeImgBottom(this.value);//вызываем функцию, передаем цвет
        fontColorSend.value = colorObj[this.value];
        fontColorSendText.value = this.title;
    });
}

// генерим селекты выбора картинок берем свойства из обекта
for (let i = 0; i < imgTopObj.length; i++) {
    let optionimgTop = document.createElement('option');
    optionimgTop.setAttribute('name', 'optionimgTop');
    optionimgTop.setAttribute('value', imgTopObj[i]['src']);
    optionimgTop.textContent = imgTopObj[i]['text'];
    imgTop.appendChild(optionimgTop);
}
// генерим селекты выбора картинок берем свойства из обекта
for (let i = 0; i < imgBottomObj.length; i++) {
    let optionimgBottom = document.createElement('option');
    optionimgBottom.setAttribute('name', 'optionimgBottom');
    optionimgBottom.setAttribute('value', imgBottomObj[i]['src']);
    optionimgBottom.textContent = imgBottomObj[i]['text'];
    imgBottom.appendChild(optionimgBottom);
}

//смена верхней картинки
function changeImgTop(color) {
    if (imgTop.value !== 'none') {
        if (wrImgTop.children[0]) wrImgTop.children[0].remove();
        var imgWrImgTop = document.createElement('img');
        var srcImg = 'img/picture/' + imgTop.value + '-' + document.myForm.fontColor.value + '.png';
        imgWrImgTop.setAttribute('src', srcImg);
        let wrInputFile = document.getElementsByClassName('wrInputFile')[0];
        if (imgTop.value == 'dowload')
            wrInputFile.style.display = 'flex';
        else {
            wrInputFile.style.display = 'none';
            wrImgTop.appendChild(imgWrImgTop);
        }
        img1Input.value = srcImg;
        for (let i = 0; i < imgTopObj.length; i++) {
            if (imgTopObj[i]['src'] == imgTop.value) {
                img1TextSend.value = imgTopObj[i]['text'];
                // console.log(imgTopObj[i]['text']);
            }
        }
        // console.log(x);
    }
}

//смена картинки под текстом
function changeImgBottom(color) {
    if (imgBottom.value !== 'none') {
        if (!color) color = 'gold';
        if (wrImgBottom.children[0]) wrImgBottom.children[0].remove();
        var imgWrImgBottom = document.createElement('img');
        var srcImg = 'img/picture/' + imgBottom.value + '-' + document.myForm.fontColor.value + '.png';
        imgWrImgBottom.setAttribute('src', srcImg);
        wrImgBottom.appendChild(imgWrImgBottom);
        img2Input.value = srcImg;
        for (let i = 0; i < imgBottomObj.length; i++) {
            if (imgBottomObj[i]['src'] == imgBottom.value) {
                img2TextSend.value = imgBottomObj[i]['text'];
                // console.log(imgBottomObj[i]['text']);
            }
        }
    }
}

//ввод текста
function editText(event) {
    enterText.innerText = textarea.value;
    var arrText = enterText.innerText.split('\n');
    arrText.sort(function (a, b) {
        return b.length - a.length;
    });
    str_size(arrText[0], enterText.style.fontFamily, '50')
}

//подгонка размера текста
function str_size(text, fontfamily, fontsize) {
    var str = document.createTextNode(text);
    var str_size = Array();
    var obj = document.createElement('A');
    obj.style.fontSize = fontsize + 'px';
    obj.style.fontFamily = fontfamily;
    obj.style.margin = 0 + 'px';
    obj.style.padding = 0 + 'px';
    obj.appendChild(str);
    document.body.appendChild(obj);
    str_size[0] = obj.offsetWidth;
    str_size[1] = obj.offsetHeight;
    document.body.removeChild(obj);
    var fonSixe = '50px';
    if (str_size[0] < 214) {
        enterText.style.fontSize = '50px';
        fontSizeSend.value = '50px';
    }
    else if (str_size[0] < 219) {
        enterText.style.fontSize = '40px';
        fontSizeSend.value = '40px';
    }
    else if (str_size[0] < 290) {
        enterText.style.fontSize = '30px';
        fontSizeSend.value = '30px';
    }
    else if (str_size[0] < 379) {
        enterText.style.fontSize = '25px';
        fontSizeSend.value = '25px';
    }
    else if (str_size[0] < 446) {
        enterText.style.fontSize = '20px';
        fontSizeSend.value = '20px';
    } else if (str_size[0] < 558) {
        enterText.style.fontSize = '16px';
        fontSizeSend.value = '16px';
    }else if (str_size[0] < 600) {
        enterText.style.fontSize = '14px';
        enterText.style.overflowX = 'hidden';
        fontSizeSend.value = '14px';
    }
    if (str_size[0] > 670) {
        enterText.style.overflowX = 'hidden';
        enterText.style.overflowY = 'hidden';
        document.getElementsByClassName('tooltip')[0].style.opacity='1';
        console.log('ura');
    }
    else {
        document.getElementsByClassName('tooltip')[0].style.opacity='0';

    }
    // console.log(str_size[0] + "x" + enterText.style.fontSize);
    // console.log(fonSixe);
    // console.log(fontfamily);
}

//смена фонт фемили
function editFontFamily(el) {
    enterText.style.fontFamily = el;
    fontFamInput.value = el;
}

var fontFam = document.getElementById('fontFam');
for (let i = 0; i < fontFam.length; i++) {
    fontFam[i].addEventListener('change', function () {
        enterText.style.fontFamily = fontFam.value;
    });
}

//создаем инпуты с выбором цвета
function createInputColorFunc(obj) {
    let keys = Object.keys(obj);
    for (let i = 0; i < keys.length; i++) {
        let inputColor = document.createElement('input');
        let inputColorLabel = document.createElement('label');
        let inputColorSpan = document.createElement('span');
        inputColorLabel.setAttribute('for', 'color_' + Object.keys(obj)[i]);
        inputColorLabel.setAttribute('title', obj[keys[i]].split('-')[1]);
        inputColor.setAttribute('id', 'color_' + Object.keys(obj)[i]);
        inputColor.setAttribute('type', 'radio');
        inputColor.setAttribute('name', 'inputColor');
        inputColor.setAttribute('onchange', 'editColor(this.alt)');
        inputColor.setAttribute('title', obj[keys[i]]);
        inputColor.setAttribute('alt', Object.keys(obj)[i]);
        inputColor.value = obj[keys[i]];
        inputColorSpan.style.backgroundColor = obj[keys[i]].split('-')[0];
        inputColorSpan.setAttribute('data-color', obj[keys[i]].split('-')[0]);
        inputColorLabel.appendChild(inputColorSpan);
        color1.appendChild(inputColor);
        color1.appendChild(inputColorLabel);
    }
    color1.children[0].setAttribute('checked', 'checked');
}

//создаем инпуты с ввыбором размера
function createInputSize(arr) {
    let keys = Object.keys(arr);
    for (let i = 0; i < keys.length; i++) {
        let inputSize = document.createElement('input');
        let labelSize = document.createElement('label');
        labelSize.setAttribute('for', 'size-' + arr[i]);
        labelSize.textContent = arr[i];
        inputSize.setAttribute('id', 'size-' + arr[i]);
        inputSize.setAttribute('type', 'radio');
        inputSize.setAttribute('name', 'inputSize');
        inputSize.value = arr[i];
        size.appendChild(inputSize);
        size.appendChild(labelSize);
    }
    size.children[0].setAttribute('checked', 'checked');

}

//добавляем блок с ориентацеми надписи на полотенце
function orientcija() {
    var contejnerSize = document.getElementById('contejnerSize');
    var conteinerOrient = document.getElementById('conteinerOrient');
    // var  conteinerOrientInput = document.getElementById('conteinerOrientInput');
    let radio1 = document.createElement('input');
    let label1 = document.createElement('label');
    let p = document.createElement('p');
    let conteinerOrientInput = document.createElement('div');
    conteinerOrientInput.setAttribute('class', 'conteinerOrientInput');
    conteinerOrientInput.setAttribute('id', 'conteinerOrientInput');
    p.textContent = 'Расположение вышивки:';
    p.setAttribute('class', 'titleCalc');
    radio1.setAttribute('type', 'radio');
    radio1.setAttribute('checked', 'checked');
    radio1.setAttribute('name', 'orient');
    radio1.setAttribute('value', 'По длине');
    radio1.setAttribute('id', 'dlina');
    label1.setAttribute('for', 'dlina');
    label1.setAttribute('class', 'orient');
    label1.textContent = 'По длине';
    let radio2 = document.createElement('input');
    let label2 = document.createElement('label');
    radio2.setAttribute('type', 'radio');
    radio2.setAttribute('name', 'orient');
    radio2.setAttribute('value', 'По ширине');
    radio2.setAttribute('id', 'schirina');
    label2.setAttribute('for', 'schirina');
    label2.setAttribute('class', 'orient');
    label2.textContent = 'По ширине';
    conteinerOrient.appendChild(p);
    conteinerOrient.prepend(p);
    conteinerOrientInput.appendChild(radio1);
    conteinerOrientInput.appendChild(label1);
    conteinerOrientInput.appendChild(radio2);
    conteinerOrientInput.appendChild(label2);
    conteinerOrient.appendChild(conteinerOrientInput);
}

//цена
function price(numb) {
    let oldPrice = document.getElementById('oldPrice');
    let inputoldPrice = document.querySelector('input[name=oldPrice]');
    let newPrice = document.getElementById('newPrice');
    let inputnewPrice = document.querySelector('input[name=newPrice]');
    oldPrice.innerText = priceOld[numb];
    newPrice.innerText = priceNew[numb];
    inputoldPrice.value = priceOld[numb];
    inputnewPrice.value = priceNew[numb];

}

var imgContaiber = document.getElementById('imgContaiber');

//смена цвета товара
function editColor(el) {
    let imgId = document.getElementById('imgId');
    if (imgId) imgContaiber.removeChild(imgId);
    var imgTovar = document.createElement('img');
    let linkImg = 'img/mahr/' + el + '.png';
    imgTovar.setAttribute('src', linkImg);
    imgTovar.setAttribute('id', 'imgId');
    imgContaiber.appendChild(imgTovar);
    imgtovarInput.value = linkImg;

    // console.log(el)
}

// вызываем функцыю при откритии
velurFunc();

//выбор  махровый халат
function machrFunc() {
    clearElement();
    editColor('halat-black');
    createInputColorFunc(mahr);
    createInputSize(sizeMahrVelur);
    price(0);
    // img1Input.value = srcImg;
    // img1Input.value = srcImg;
    // img2Input.value = srcImg;

}

//выбор велюр халат
function velurFunc() {
    clearElement();
    editColor('halat-black-velyr');
    createInputColorFunc(velur);
    createInputSize(sizeMahrVelur);
    price(1);
}

//выбор атлас халат

function atlasFunc() {
    clearElement();
    editColor('atlas');
    createInputColorFunc(atlas);
    createInputSize(sizeAtlas);
    price(2);
}

//выбор детский халат

function detskijFunc() {
    clearElement();
    editColor('detskiy-white');
    createInputColorFunc(detskij);
    createInputSize(sizeKids);
    price(3);
}

//выбор полотенце халат

function polotenceFunc() {
    clearElement();
    editColor('pol_bordo');
    createInputColorFunc(polotence);
    createInputSize(sizePol);
    orientcija();
    price(4);
    // document.getElementsByClassName('wrImg')[0].style.left = '80px';
}

// функция очитсти (если еже сработало)
function clearElement() {
    let conteinerOrient = document.getElementById('conteinerOrient');
    if (conteinerOrient.children[0])
        // console.log(conteinerOrient.children[0]);
    while (conteinerOrient.firstChild)
        conteinerOrient.removeChild(conteinerOrient.firstChild);
    if (size.children[0])
        while (size.firstChild)
            size.removeChild(size.firstChild);
    if (color1.children[0])
        while (color1.firstChild)
            color1.removeChild(color1.firstChild);
}
var linkNav = document.querySelectorAll('[href^="#"]'), //выбираем все ссылки к якорю на странице
    V = .2;  // скорость, может иметь дробное значение через точку (чем меньше значение - тем больше скорость)
for (var i = 0; i < linkNav.length; i++) {
    linkNav[i].addEventListener('click', function(e) { //по клику на ссылку
        e.preventDefault(); //отменяем стандартное поведение
        var w = window.pageYOffset,  // производим прокрутка прокрутка
            hash = this.href.replace(/[^#]*(.*)/, '$1');  // к id элемента, к которому нужно перейти
        t = document.querySelector(hash).getBoundingClientRect().top,  // отступ от окна браузера до id
            start = null;
        requestAnimationFrame(step);  // подробнее про функцию анимации [developer.mozilla.org]
        function step(time) {
            if (start === null) start = time;
            var progress = time - start,
                r = (t < 0 ? Math.max(w - progress/V, w + t) : Math.min(w + progress/V, w + t));
            window.scrollTo(0,r);
            if (r != w + t) {
                requestAnimationFrame(step)
            } else {
                location.hash = hash  // URL с хэшем
            }
        }
    }, false);
}