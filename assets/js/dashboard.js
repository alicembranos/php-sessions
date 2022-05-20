const aside = document.getElementById("wrapper");
const toggleButton = document.getElementById("menu-toggle");

toggleButton.addEventListener("click", ()=> {
    aside.classList.toggle("toggled");
});
