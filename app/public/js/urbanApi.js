$(document).ready(function () {
    let result = document.getElementById('result');
    let div = document.getElementById('result');
    $("#search").on("click", function () {
        /* clearing results */
        div.innerHTML = "";
        let word = document.getElementById("word_search").value;
        fetch("https://api.dictionaryapi.dev/api/v1/entries/en/" +word)
        .then(function (response) {
           return response.json();
            })
            .then(function (json) {
                console.log(json);
                let searchDef = document.createElement('p');
                let searchExample = document.createElement('p');
                searchDef.innerText = json[0].firstChild.firstChild.defenition;
               
                result.appendChild(searchDef);
                
                

         })
    })
})