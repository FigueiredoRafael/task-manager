function showError(error) {
  document.getElementById("results").style.display = "none";

  document.getElementById("loading").style.display = "none";

  const errorDiv = document.createElement("div");

  const card = document.querySelector(".card");
  const heading = document.querySelector(".heading");

  errorDiv.className = "alert alert-danger";

  errorDiv.appendChild(document.createTextNode(error));

  card.insertBefore(errorDiv, heading);

  setTimeout(clearError, 2500);
}

function clearError() {
  document.querySelector(".alert").remove();
}
