/* COPY EPISODE Titles and rewrite */
var outputText = "";
document.querySelectorAll("[itemprop='containsSeason']").forEach(function(staffelElement){
    staffelElement.querySelectorAll("a").forEach(function(linkElement){
        let folgen_name = linkElement.querySelector('[itemprop="name"]:first-child');
        if (folgen_name) {
            let serientitelElement = document.querySelector('[data-event-category="serientitel"]');
            let episodenliste_schmalElement = linkElement.querySelector('.episodenliste-schmal');

            if (serientitelElement && episodenliste_schmalElement) {
                let episodennummer = "S0" + episodenliste_schmalElement.innerText.trim().replace('.', 'E');
                outputText += serientitelElement.innerText.trim() + " " + episodennummer + " - " + folgen_name.innerText.trim() + "\n";
            }
        }
    });
    outputText += "\n";
});

navigator.clipboard.writeText(outputText).then(() => {
    var successMsg = "Text in den Zwischenspeicher kopiert.";
    console.log(successMsg);
    alert(successMsg);
}).catch(err => {
    console.error("Fehler beim Kopieren in den Zwischenspeicher: ", err);
});
