const addAdminBtn = document.querySelector('.btn-add');
const adminForm = document.querySelector('form');

// Add event listener to the button
addAdminBtn.addEventListener('click', function() {
    // Toggle the visibility of the form
    if (adminForm.style.display === 'none') {
        adminForm.style.display = 'block';
        adminForm.style.opacity = '1'; // Set opacity to 1 for smooth transition
    } else {
        adminForm.style.display = 'none';
        adminForm.style.opacity = '0'; // Set opacity to 0 for smooth transition
    }
});