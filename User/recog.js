const speechButton = document.getElementById("speech-button");
const searchBox = document.getElementById("search-box");
const searchResults = document.getElementById("search-results");

// Create SpeechRecognition object
const recognition = new webkitSpeechRecognition();
recognition.lang = "en-US";

speechButton.addEventListener("click", startSpeechRecognition);

function startSpeechRecognition() {
    recognition.start();
    console.log("Speech recognition started");
}

// Handle speech recognition result
recognition.addEventListener("result", event => {
    const result = event.results[0][0].transcript;
    console.log(`Speech recognition result: ${result}`);
    searchBox.value = result;
    search();
});

function search() {
    // Clear previous results
    searchResults.innerHTML = "";

    // Get search query
    const query = searchBox.value;

    // Perform search and display results
    const results = performSearch(query);
    results.forEach(result => {
        const item = createResultItem(result);
        searchResults.appendChild(item);
    });
}

function performSearch(query) {
    // Perform search logic here and return an array of search results
    const results = [
        { title: "Result 1", description: "This is result 1" },
        { title: "Result 2", description: "This is result 2" },
        { title: "Result 3", description: "This is result 3" }
    ];
    return results;
}

function createResultItem(result) {
    const item = document.createElement("div");
    item.className = "search-item";
    const title = document.createElement("p");
    title.textContent = result.title;
}