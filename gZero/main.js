var yourScore = 0;
var scorePc = 0;
var scoreDeadHeat = 0;
var score = document.getElementById("score");
var deadHeat = document.getElementById("deadHeat");
var figur1 = document.getElementById("figur1");
var figur2 = document.getElementById("zero");

document.querySelector('#wrapper').addEventListener('click', function (e) { // Вешаем обработчик клика на UL, не LI
  var id = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули
  var text1 = document.getElementById(id).textContent;
  var step = document.getElementById(id);
  score.innerHTML = "идет игра  счет:" + yourScore + ":" + scorePc
  if ((step.textContent) === "x" || (step.textContent) === "o") {
    return
  } else {
    step.innerHTML = "x";
  }
  //задержка 1 с. и ставим в случайное место 0
  setTimeout(function () {
    //первій ход пк
    var quantity = 1;
    for (var i = 0; i < items.length; i++) {
      if (items[i] === "o") {
        var y = 1;
        quantity++;
      }
    }
    if (y === undefined) {
      var stepPc = document.getElementById("block5");
      if ((stepPc.textContent) === "x") {
        //     stepPc = document.getElementById("block4");
        //     stepPc.innerHTML = "o";
        //
        var numbBlockRandom = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
        // var numbBlockRandom = 5;
        if (numbBlockRandom === 5) {
          numbBlockRandom = (Math.floor(Math.random() * (4 - 1 + 1)) + 1);
          if ((numbBlockRandom % 2) > 0) {
            numbBlockRandom = 5 + numbBlockRandom;
          } else {
            numbBlockRandom = 5 - numbBlockRandom;
          }
          var blockRandom = "block" + numbBlockRandom;
          // alert(blockRandom + "dop    условие");
          var stepPc = document.getElementById(blockRandom);
          stepPc.innerHTML = "o";
        } else {
          var blockRandom = "block" + numbBlockRandom;
          // alert(blockRandom + "основное условие");
          var stepPc = document.getElementById(blockRandom);
          stepPc.innerHTML = "o";
        }

      }
      stepPc.innerHTML = "o";

    } else {
      //программируем ходи
      ///программируем на вииграш
      //проверка по горизонтали
      if (c1 === "o" && c2 === "o" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      } else if (c2 === "o" && c3 === "o" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c1 === "o" && c3 === "o" && c2 === "") {
        var stepPc = document.getElementById("block2");
        stepPc.innerHTML = "o";
      } else if (c4 === "o" && c5 === "o" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      } else if (c5 === "o" && c6 === "o" && c4 === "") {
        var stepPc = document.getElementById("block4");
        stepPc.innerHTML = "o";
      } else if (c4 === "o" && c6 === "o" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c7 === "o" && c8 === "o" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c8 === "o" && c9 === "o" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      } else if (c7 === "o" && c9 === "o" && c8 === "") {
        var stepPc = document.getElementById("block8");
        stepPc.innerHTML = "o";
      }
      //по внртикали
      else if (c1 === "o" && c4 === "o" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      } else if (c4 === "o" && c7 === "o" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c1 === "o" && c7 === "o" && c4 === "") {
        var stepPc = document.getElementById("block4");
        stepPc.innerHTML = "o";
      } else if (c2 === "o" && c5 === "o" && c8 === "") {
        var stepPc = document.getElementById("block8");
        stepPc.innerHTML = "o";
      } else if (c5 === "o" && c8 === "o" && c2 === "") {
        var stepPc = document.getElementById("block2");
        stepPc.innerHTML = "o";
      } else if (c2 === "o" && c8 === "o" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c3 === "o" && c6 === "o" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c6 === "o" && c9 === "o" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      } else if (c3 === "o" && c9 === "o" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      }
      //по диагонали
      else if (c1 === "o" && c5 === "o" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c5 === "o" && c9 === "o" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c1 === "o" && c9 === "o" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c3 === "o" && c5 === "o" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      } else if (c5 === "o" && c7 === "o" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      } else if (c3 === "o" && c7 === "o" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      }
      //горизоньаль
      else if (c1 === "x" && c2 === "x" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      } else if (c2 === "x" && c3 === "x" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c4 === "x" && c5 === "x" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      } else if (c5 === "x" && c6 === "x" && c4 === "") {
        var stepPc = document.getElementById("block4");
        stepPc.innerHTML = "o";
      } else if (c7 === "x" && c8 === "x" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c8 === "x" && c9 === "x" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      }
      // вертикаль
      else if (c1 === "x" && c4 === "x" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      } else if (c4 === "x" && c7 === "x" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c2 === "x" && c5 === "x" && c8 === "") {
        var stepPc = document.getElementById("block8");
        stepPc.innerHTML = "o";
      } else if (c5 === "x" && c8 === "x" && c2 === "") {
        var stepPc = document.getElementById("block2");
        stepPc.innerHTML = "o";
      } else if (c3 === "x" && c6 === "x" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c6 === "x" && c9 === "x" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      }
      //диагональ
      else if (c1 === "x" && c5 === "x" && c9 === "") {
        var stepPc = document.getElementById("block9");
        stepPc.innerHTML = "o";
      } else if (c5 === "x" && c9 === "x" && c1 === "") {
        var stepPc = document.getElementById("block1");
        stepPc.innerHTML = "o";
      } else if (c7 === "x" && c5 === "x" && c3 === "") {
        var stepPc = document.getElementById("block3");
        stepPc.innerHTML = "o";
      } else if (c5 === "x" && c3 === "x" && c7 === "") {
        var stepPc = document.getElementById("block7");
        stepPc.innerHTML = "o";
      }
      //пропуск горизонталь
      else if (c1 === "x" && c3 === "x" && c2 === "") {
        var stepPc = document.getElementById("block2");
        stepPc.innerHTML = "o";
      } else if (c4 === "x" && c6 === "x" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c7 === "x" && c9 === "x" && c8 === "") {
        var stepPc = document.getElementById("block8");
        stepPc.innerHTML = "o";
      } //пропуск вертикаль
      else if (c1 === "x" && c7 === "x" && c4 === "") {
        var stepPc = document.getElementById("block4");
        stepPc.innerHTML = "o";
      } else if (c2 === "x" && c8 === "x" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c3 === "x" && c9 === "x" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      }//пропуск диагональ
      else if (c1 === "x" && c7 === "x" && c4 === "") {
        var stepPc = document.getElementById("block4");
        stepPc.innerHTML = "o";
      } else if (c2 === "x" && c8 === "x" && c5 === "") {
        var stepPc = document.getElementById("block5");
        stepPc.innerHTML = "o";
      } else if (c3 === "x" && c9 === "x" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      } else if (c3 === "x" && c9 === "x" && c6 === "") {
        var stepPc = document.getElementById("block6");
        stepPc.innerHTML = "o";
      } else {
        if (c9 === "") {
          var stepPc = document.getElementById("block9")
        } else if (c4 === "") {
          var stepPc = document.getElementById("block4")
        } else if (c1 === "") {
          var stepPc = document.getElementById("block1")
        } else if (c2 === "") {
          var stepPc = document.getElementById("block2")
        } else if (c3 === "") {
          var stepPc = document.getElementById("block3")
        } else if (c4 === "") {
          var stepPc = document.getElementById("block4")
        } else if (c6 === "") {
          var stepPc = document.getElementById("block6")
        } else if (c7 === "") {
          var stepPc = document.getElementById("block7")
        } else if (c8 === "") {
          var stepPc = document.getElementById("block8")
        }
        stepPc.innerHTML = "o";
      }
    }
    var aa1 = document.getElementById("block1").textContent;
    var aa2 = document.getElementById("block2").textContent;
    var aa3 = document.getElementById("block3").textContent;
    var aa4 = document.getElementById("block4").textContent;
    var aa5 = document.getElementById("block5").textContent;
    var aa6 = document.getElementById("block6").textContent;
    var aa7 = document.getElementById("block7").textContent;
    var aa8 = document.getElementById("block8").textContent;
    var aa9 = document.getElementById("block9").textContent;
    var qqqq = [aa1, aa2, aa3, aa4, aa5, aa6, aa7, aa8, aa9];
    if ((aa1 === "x" && aa4 === "x" && aa7 === "x") || (aa2 === "x" && aa5 === "x" && aa8 === "x") || (aa3 === "x" && aa6 === "x" && aa9 === "x") || (aa1 === "x" && aa2 === "x" && aa3 === "x") || (aa4 === "x" && aa5 === "x" && aa6 === "x") || (aa7 === "x" && aa8 === "x" && aa9 === "x") || (aa7 === "x" && aa5 === "x" && aa3 === "x") || (aa1 === "x" && aa5 === "x" && aa9 === "x")) {
      yourScore = yourScore + 1;
      score.innerHTML = "вы выиграли  счет:" + yourScore + ":" + scorePc;
    } else if ((aa1 === "o" && aa4 === "o" && aa7 === "o") || (aa2 === "o" && aa5 === "o" && aa8 === "o") || (aa3 === "o" && aa6 === "o" && aa9 === "o") || (aa1 === "o" && aa2 === "o" && aa3 === "o") || (aa4 === "o" && aa5 === "o" && aa6 === "o") || (aa7 === "o" && aa8 === "o" && aa9 === "o") || (aa7 === "o" && aa5 === "o" && aa3 === "o") || (aa1 === "o" && aa5 === "o" && aa9 === "o")) {
      scorePc = scorePc + 1;
      score.innerHTML = "вы проиграли   счет:" + yourScore + ":" + scorePc;

    }
  }, 1000);
  var c1 = document.getElementById("block1").textContent;
  var c2 = document.getElementById("block2").textContent;
  var c3 = document.getElementById("block3").textContent;
  var c4 = document.getElementById("block4").textContent;
  var c5 = document.getElementById("block5").textContent;
  var c6 = document.getElementById("block6").textContent;
  var c7 = document.getElementById("block7").textContent;
  var c8 = document.getElementById("block8").textContent;
  var c9 = document.getElementById("block9").textContent;
  var items = [c1, c2, c3, c4, c5, c6, c7, c8, c9];
  if (c1 != "" && c2 != "" && c3 != "" && c4 != "" && c5 != "" && c6 != "" && c7 != "" && c8 != "" && c9 != "") {
    score.innerHTML = "ничья  счет:" + yourScore + ":" + scorePc;
    scoreDeadHeat++
    deadHeat.innerHTML = "сыграно в ничью:" + scoreDeadHeat + " раз!";
    var aa1 = "";
    var aa2 = "";
    var aa3 = "";
    var aa4 = "";
    var aa5 = "";
    var aa6 = "";
    var aa7 = "";
    var aa8 = "";
    var aa9 = "";
  }
  // document.querySelector('#test strong').innerHTML = items.length; // For example
  // alert(items)
});

function reset() {
  var c1 = document.getElementById("block1");
  c1.innerHTML = "";
  var c2 = document.getElementById("block2");
  c2.innerHTML = "";
  var c3 = document.getElementById("block3");
  c3.innerHTML = "";
  var c4 = document.getElementById("block4");
  c4.innerHTML = "";
  var c5 = document.getElementById("block5");
  c5.innerHTML = "";
  var c6 = document.getElementById("block6");
  c6.innerHTML = "";
  var c7 = document.getElementById("block7");
  c7.innerHTML = "";
  var c8 = document.getElementById("block8");
  c8.innerHTML = "";
  var c9 = document.getElementById("block9");
  c9.innerHTML = "";
}


