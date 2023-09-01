const closeArrow = document.querySelector("#flecha");
const modal = document.querySelector("#modal");

closeArrow.addEventListener("click", () => {
  modal.classList.toggle("hidden");
});

window.addEventListener("click", (event) => {
  if (!modal.contains(event.target) && event.target != closeArrow) {
    modal.classList.add("hidden");
  }
});

closeArrow.addEventListener("click", () => {
    if (closeArrow.textContent === "chevron_right") {
      closeArrow.textContent = "expand_more";
    } else {
      closeArrow.textContent = "chevron_right";
    }
  });