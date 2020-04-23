$(document).ready(function () {
    let result = document.getElementById('result');
    let div = document.getElementById('result');
    $("#search").on("click", function () {
        /* clearing results */
        div.innerHTML = "";
        let word = document.getElementById("word_search").value;
        fetch("https://www.dictionaryapi.com/api/v3/references/learners/json/" + word + "?key=397a4020-5d86-43ad-bbc7-03bc84db852b")
            .then(function (response) {
                return response.json();
            })
            .then(function (json) {
                console.log(json);
                // checking if defenition exists and appending text as a new "li"
                $("#result").append("<li><span class='searchedWord'>" + word + ":</span> </li>");
                for (let i = 0; i < json.length; i++) {
                    if (json[i].shortdef.length != 0) {
                        // need to add pronunciation
                        $("#result").append("<li><span class='dictHeader'>" + json[i].fl + ":</span> </li>");
                        $("#result").append("<span class='dictDefinition'>" + json[i].shortdef[0]) + "</span>";
                    }
                }
            })
    })
})