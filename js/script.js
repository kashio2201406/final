const dropdownTriggers = Array.prototype.slice.call(
  document.querySelectorAll(".dropdown-trigger"),
  0
);

dropdownTriggers.forEach((dropdownTrigger) => {
  const button = dropdownTrigger.querySelector("button");
  const dropdown = dropdownTrigger.parentNode;

  button.addEventListener("click", () => {
    dropdown.classList.toggle("is-active");
  });

  document.addEventListener("click", (e) => {
    if (!e.target.closest(".dropdown")) {
      dropdown.classList.remove("is-active");
    }
  });
});