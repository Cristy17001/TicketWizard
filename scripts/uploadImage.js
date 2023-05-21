document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('image-upload');
    const cameraIcon = document.querySelector('.camera-icon');

    cameraIcon.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0]; // Get the selected file
        if (file) {
            const formData = new FormData(); // Create a FormData object
            formData.append('image', file); // Append the file to the form data

            // Send an AJAX request to the action_change_icon.php script
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../actions/action_change_icon.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        location.reload();
                        console.log('Image uploaded and database updated successfully');
                    } else {
                        console.error('Failed to upload the image or update the database');
                    }
                }
            };
            xhr.send(formData);
        }
    });
});
