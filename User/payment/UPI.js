var modal = document.getElementById("myModal");
// var btn = document.getElementById("new");
var btn = document.querySelector("#paytm");
// var span = document.getElementsByClassName("close")[0];
var span = document.getElementById("close");
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var modal1 = document.getElementById("myModal1");
// var btn = document.getElementById("new");
var btn1 = document.querySelector("#phonepay");
var span1 = document.getElementById("close1");
btn1.onclick = function() {
  modal1.style.display = "block";
}
span1.onclick = function() {
  modal1.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

var modal2 = document.getElementById("myModal2");
// var btn = document.getElementById("new");
var btn2 = document.querySelector("#gpay");
var span2 = document.getElementById("close2");
btn2.onclick = function() {
  modal2.style.display = "block";
}
span2.onclick = function() {
  modal2.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}


var modal3 = document.getElementById("myModal3");
// var btn = document.getElementById("new");
var btn3 = document.querySelector("#amazonpay");
var span3 = document.getElementById("close3");
btn3.onclick = function() {
  modal3.style.display = "block";
}
span3.onclick = function() {
  modal3.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
}

var modal4 = document.getElementById("myModal4");
// var btn = document.getElementById("new");
var btn4 = document.querySelector("#applepay");
var span4 = document.getElementById("close4");
btn4.onclick = function() {
  modal4.style.display = "block";
}
span4.onclick = function() {
  modal4.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal4) {
    modal4.style.display = "none";
  }
}


// var submit = document.querySelector(".submit-btn");

// submit.onclick ="window.location.href='https://google.com';"