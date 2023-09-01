const openMenu = document.querySelector("#menu-icon");
const menu1 = document.querySelector("#menu1");
const menu2 = document.querySelector("#menu2");
const nav = document.querySelector("#nav");

openMenu.addEventListener("click", () => {
    menu1.classList.toggle("hidden");
    menu2.classList.toggle("ml-[20%]");
    nav.classList.toggle("nav");
  });