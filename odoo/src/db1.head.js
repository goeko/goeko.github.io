// This is the main file for the db1 module
// // Path: odoo/src/db1.head.js
document.addEventListener("DOMContentLoaded", function() {
    var script = document.createElement("script");
    script.src = "https://vm40/external-script.js"; // Ersetzen Sie dies durch die tatsächliche URL des Scripts von der anderen Domain
    script.onload = function() {
        console.log("External script loaded successfully.");
    };
    script.onerror = function() {
        console.error("Error loading the external script.");
    };
    document.body.appendChild(script);
});
// Path: odoo/src/db1.head.js
