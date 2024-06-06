import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

//^ delete button for CRUD: delete project
const deleteSubmitButtons = document.querySelectorAll(".delete-button");

deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        //prendo titolo del project dall'attributo data-item-title del button presente nell'index
        const dataTitle = button.getAttribute("data-item-title");

        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        //prendo elemento della MODALE
        const modalItemTitle = modal.querySelector("#modal-item-title");
        //inserisco nello span il valore preso dalla modale il titolo del progetto tramite l'attributo data-item-title presente nel bottone nella index
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector("button.btn-danger");

        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});