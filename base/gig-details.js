document.addEventListener('DOMContentLoaded', () => {
    // Function to get query parameter by name
    const getQueryParam = (name) => {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    };

    const gigId = getQueryParam('id');

    // Fetch gig details using the gigId (dummy data used here)
    // In a real application, you would fetch data from a server
    const gigDetails = {
        1: {
            title: 'Gig Title 1',
            image: 'https://example.com/gig-image1.jpg',
            description: 'Detailed description of Gig 1...'
        },
        2: {
            title: 'Gig Title 2',
            image: 'https://example.com/gig-image2.jpg',
            description: 'Detailed description of Gig 2...'
        },
        3: {
            title: 'Gig Title 3',
            image: 'https://example.com/gig-image2.jpg',
            description: 'Detailed description of Gig ...'
        }
    };

    const gig = gigDetails[gigId];

    if (gig) {
        document.getElementById('gigTitle').textContent = gig.title;
        document.getElementById('gigImage').src = gig.image;
        document.getElementById('gigDescription').textContent = gig.description;
    } else {
        document.getElementById('gigTitle').textContent = 'Gig Not Found';
        document.getElementById('gigImage').style.display = 'none';
        document.getElementById('gigDescription').textContent = 'The gig you are looking for does not exist.';
    }
});
