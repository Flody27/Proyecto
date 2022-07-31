const body = document.querySelector("body"),
 sidebar = body.querySelector(".sidebar"),
 toggle = body.querySelector(".toggle");

  toggle.addEventListener("click", () =>
  {sidebar.classList.toggle("close")}); 

  //PROGRAMACION BOTONES SIDEBAR

function openPage(pageName, elmnt) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    //Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
  
    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";
  
    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = "#2196f3";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();

  //PROGRAMACION MODAL
  let cerrar_modal = document.querySelectorAll(".cierre_modal")[0];
  let abrir_modal = document.querySelectorAll(".abrir_modal")[0];
  let modal = document.querySelectorAll(".modal")[0];
  let cont_modal = document.querySelectorAll(".contenedor-modal")[0];

  abrir_modal.addEventListener("click", function(e){
    e.preventDefault;
    cont_modal.style.opacity = "1";
    cont_modal.style.visibility = "visible";
    modal.classList.toggle("modal-close");
  });

  cerrar_modal.addEventListener("click", function(){
    modal.classList.toggle("modal-close");
    setTimeout(function(){
      cont_modal.style.opacity = "0";
      cont_modal.style.visibility = "hidden";
    }, 200);
  });

  window.addEventListener(function(e){
    console.log(e.target)
    if(e.target == cont_modal){
      cont_modal.style.opacity = "0";
      cont_modal.style.visibility = "hidden";
    }
  });