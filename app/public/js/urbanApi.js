    let result = document.getElementById("result");
    let word = document.getElementById("word_search").value;
    let searchBtn = document.getElementById("search");

    searchBtn.addEventListener("click", function search() {
        /* clearing resalt */


        // result = "";
        fetch("https://mashape-community-urban-dictionary.p.rapidapi.com/define?term=" + word, {
                "method": "GET",
                "headers": {
                    "x-rapidapi-host": "mashape-community-urban-dictionary.p.rapidapi.com",
                    "x-rapidapi-key": "1b3db1587emsh55553bedeb4bae3p1afaaajsna8c432997d98"
                }
            })
            .then(function (response) {
                return response.json();

            })
            .then(function (json) {
                result.innerText = json.list[0].definition;

            })
    })