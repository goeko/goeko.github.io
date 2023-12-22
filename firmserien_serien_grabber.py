import requests
from bs4 import BeautifulSoup

serien_name = "king-of-queens"
url = f'https://www.fernsehserien.de/{serien_name}/episodenguide'

outputFile = f"fernsehserien.de_{serien_name}.txt"
response = requests.get(url)
soup = BeautifulSoup(response.text, 'html.parser')

outputText = ''
for staffelElement in soup.select("[itemprop='containsSeason']"):
    for linkElement in staffelElement.select("a"):
        folgen_name = linkElement.select_one('[itemprop="name"]:first-child')
        if folgen_name:
            serientitelElement = soup.select_one('[data-event-category="serientitel"]')
            episodenliste_schmalElement = linkElement.select_one('.episodenliste-schmal')

            if serientitelElement and episodenliste_schmalElement:
                episodennummer = "S0" + episodenliste_schmalElement.get_text(strip=True).replace('.', 'E')
                outputText += serientitelElement.get_text(strip=True) + " " + episodennummer + " - " + folgen_name.get_text(strip=True) + "\n"
    outputText += "\n"

with open(f"{outputFile}", "w") as file:
    file.write(outputText)
print(outputText)