import Choices from "choices.js";
import "choices.js/public/assets/styles/choices.min.css";

if (document.querySelector(".js-choices")) {
    const multipleSelect = document.querySelector(".js-choices");
    const choices = new Choices(multipleSelect, {
        removeItemButton: true,
        maxItemCount: 4,
    });
}
