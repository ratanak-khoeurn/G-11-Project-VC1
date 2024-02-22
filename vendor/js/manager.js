// Add this to your manager.js file

// Function to show the modal
function show_form() {
    var modal = document.getElementById("form_modale");
    modal.style.display = "block";
}

// Function to hide the modal
function hide_form() {
    var modal = document.getElementById("form_modale");
    modal.style.display = "none";
}

// Close the modal when clicking on the close button
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
    hide_form();
}

// Close the modal when clicking outside the modal content
window.onclick = function(event) {
    var modal = document.getElementById("form_modale");
    if (event.target == modal) {
        hide_form();
    }
}
