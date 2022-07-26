var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var closeX = document.getElementById("close-x");
var btnClose = document.getElementById("close-btn");
btn.onclick = function() {
  modal.style.display = "block";
}
closeX.onclick = function() {
  modal.style.display = "none";
}

btnClose.onclick = function() {
    modal.style.display = "none";
  }

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}