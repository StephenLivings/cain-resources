//code adapted from https://www.geeksforgeeks.org/how-to-use-the-javascript-fetch-api-to-get-data/
// api url

const api_url = 
      "https://content.guardianapis.com/search?q=ireland&api-key=6e09b456-cba7-4b5b-a5f4-67603d0f7b1b";
  
// Defining async function
async function getapi(url) {
    
    // Storing response
    const response = await fetch(url);
    
    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);
    if (response) {
        hideloader();
    }
    show(data);
}
// Calling that async function
getapi(api_url);
  
// Function to hide the loader
function hideloader() {
    document.getElementById('loading').style.display = 'none';
}
// Function to define innerHTML for HTML table
function show(data) {
    let tab = 
        `<tr>
         </tr>`;
    
    // Loop to access all rows 
    for (let r of data.response.results) {
        tab += `<tr> 
    <td><a href="${r.webUrl}">${r.webTitle} </a></td>
    <td>${r.webPublicationDate}</td> 
             
</tr>`;
    }
    // Setting innerHTML as tab variable
    document.getElementById("results").innerHTML = tab;
}