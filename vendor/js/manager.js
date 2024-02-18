    // Get the modal
    var modal = document.getElementById('my_modal');

    // Get the button that opens the modal
    var btn = document.querySelector('.add');

    // Get the <span> element that closes the modal
    var span = document.querySelector('.close');

    // Get the cancel button
    var cancelButton = document.querySelector('.cancel');

    // Get the select element
    var selectElement = document.getElementById('restaurant_name');

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = 'block';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = 'none';
    }

    // When the user clicks on cancel button, close the modal
    cancelButton.onclick = function (event) {
        event.preventDefault(); // Prevent form submission
        modal.style.display = 'none';
    }

    // When the user selects an option, close the modal
    selectElement.addEventListener('change', function () {
        modal.style.display = 'none';
    });

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }