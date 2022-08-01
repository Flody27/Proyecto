var btn = document.getElementById("AddBtn");
var closeX = document.getElementById("close-x");
var closeBtn = document.getElementById("close-btn");

function showModal($id){
  var modal = document.getElementById($id);
  modal.style.display = "flex"; 
  closeX.onclick = function() {
    modal.style.display = "none";
  }
  
  closeBtn.onclick = function() {
    modal.style.display = "none";
  }
}