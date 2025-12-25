import { DataTable } from "simple-datatables";

//functia de manevrare a butonului hamburger
const hamburger = document.querySelector("#hamburger");
const menu = document.getElementById("mobile-menu");
//guard script sa nu crape codul daca am pagini fara #hamburger
if (hamburger && menu) {
    hamburger.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
}

//
// Functia de incarcare a tabelului
document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("#default-table");
    if (table) {
        new DataTable(table);
    }
});

//Functie de disparitie a mesajului alert (componenta alert)
document.querySelectorAll('[id$="-alert"]').forEach((alert) => {
    const duration = parseInt(alert.getAttribute("data-duration"), 10);
    // Set a timeout to remove the alert after the specified duration
    setTimeout(function () {
        alert.style.opacity = 0;
        setTimeout(function () {
            alert.remove();
        }, 2000); // Match this duration with your CSS transition time
    }, duration);
});
