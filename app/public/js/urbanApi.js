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
                // let searchExample = document.createElement('p');
                $("#result").append("<span class='dictHeaders'>" + word + ":</span>" + " " + json[0].fl + "</br>");
                $("#result").append("<span class='dictHeaders'>Definition :</span>" + " " + json[0].shortdef[0]);
                //result.appendChild(searchDef);



            })
    })
})