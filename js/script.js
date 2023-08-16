// js/script.js

document.addEventListener("DOMContentLoaded", () => {
  const itemsList = document.getElementById("items-list");

  // Fetch data from Express API
  fetch("http://localhost:5000/api/students")
    .then((response) => response.json())
    .then((data) => {
      // Iterate through the fetched items and append to the list
      data.forEach((item) => {
        const listItem = document.createElement("li");
        listItem.textContent = item.name + item.registerNumber;
        itemsList.appendChild(listItem);
      });
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
});
