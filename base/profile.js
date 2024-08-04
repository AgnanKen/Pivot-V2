document.addEventListener('DOMContentLoaded', () => {
    const editProfileButton = document.getElementById('editProfile');
    const editProfileSection = document.getElementById('editProfileSection');
    const profileDetails = document.getElementById('profileDetails');
    const cancelEditButton = document.getElementById('cancelEdit');
    const profileForm = document.getElementById('profileForm');
    const dropZone = document.getElementById('dropZone');
    const profilePicInput = document.getElementById('profilePicInput');
    const profilePic = document.getElementById('profilePic');
    const usernameInput = document.getElementById('usernameInput');
    const emailInput = document.getElementById('emailInput');
    const bioInput = document.getElementById('bioInput');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const bio = document.getElementById('bio');

    // Populate form with existing user data (for demo purposes)
    usernameInput.value = 'John Doe';
    emailInput.value = 'johndoe@example.com';
    bioInput.value = 'Lorem ipsum dolor sit amet.';

    // Show edit profile section
    editProfileButton.addEventListener('click', () => {
        profileDetails.style.display = 'none';
        editProfileSection.style.display = 'block';
    });

    // Cancel edit
    cancelEditButton.addEventListener('click', () => {
        profileDetails.style.display = 'block';
        editProfileSection.style.display = 'none';
    });

    // Handle form submission
    profileForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission

        // Update profile details
        username.textContent = usernameInput.value;
        email.textContent = emailInput.value;
        bio.textContent = bioInput.value;

        // Handle profile picture upload
        if (profilePicInput.files.length > 0) {
            const file = profilePicInput.files[0];
            const reader = new FileReader();
            reader.onloadend = () => {
                profilePic.src = reader.result;
            };
            reader.readAsDataURL(file);
        }

        alert('Profile updated successfully!');
        profileDetails.style.display = 'block';
        editProfileSection.style.display = 'none';
    });

    // Handle drag-and-drop file upload
    dropZone.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropZone.classList.add('drag-over');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('drag-over');
    });

    dropZone.addEventListener('drop', (event) => {
        event.preventDefault();
        dropZone.classList.remove('drag-over');

        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onloadend = () => {
                profilePic.src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
