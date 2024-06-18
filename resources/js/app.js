import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

//___________________________________________________
// Trovo tutti i bottoni di cancellazione
const deleteBtns = document.querySelectorAll(".delete-form button");
// console.log(deleteBtns);
if (deleteBtns.length > 0) {
    // per ogni bottone mettiti in ascolto del click
    //fai partire il click solo se è presente ed è in ascolto
    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            // prevengo il ricaricameto della pagina
            event.preventDefault();
            console.log("Questo è il modale di cancellazione");
            // creo il modale in js (delete-comic-modal.blade-php)
            const modal = new bootstrap.Modal(
                document.getElementById("delete-modal")
            );
            // Prelevo il titolo del comic dal data attribute nel bottone
            const comicTitle = btn.dataset.comicTitle;
            // Inserisco i dati della pasta nel modale
            //data-comic-title="{{ $comic->title }}->index comic
            document.getElementById(
                "modal-title"
                //ricorda che si usa il back-tick ` 
            ).innerHTML = `Stai per cancellare ${comicTitle}`;

            // mettersi in ascolto del click sul bottone modal-deletebtn
            document
                .getElementById("modal-delete-btn")
                .addEventListener("click", function () {
                    //eredito la funzione dal genitore, in questo caso dal bottone nella tabella
                    btn.parentElement.submit();
                });
            // mostro il modale
            modal.show();
        });
    });
}
