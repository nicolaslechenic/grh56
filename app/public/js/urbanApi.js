$(document).ready(function () {
    const RESULT = document.getElementById('results');
    let ul = document.getElementById('results');
    let li = ul.getElementsByTagName('li')
    $("#search").on("click", function () {
        /* clearing results */
        ul.innerHTML = "";
        let word = document.getElementById("word_search").value;

        fetch("https://cors-anywhere.herokuapp.com/https://od-api.oxforddictionaries.com/api/v2/entries/en-gb/" + word, {
                "method": "GET",
                "headers": {
                    "app_id": "d9730fd0",
                    "app_key": "09309458c4b76c5d889b92c344a21f05"
                }
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (json) {
                let searchResult = document.createElement('li');
                searchResult.innerText = json.results[0].lexicalEntries[0].entries[0].senses[0].definitions;
                RESULT.appendChild(searchResult);

            })
    })
})