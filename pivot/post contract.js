document.getElementById('contract-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const location = document.getElementById('location').value;
    const budget = document.getElementById('budget').value;
    const requirements = document.getElementById('requirements').value;

    if (title && description && location && budget) {
        alert(`Contract Posted!\nTitle: ${title}\nLocation: ${location}\nBudget: $${budget}`);
        // Clear the form (Optional)
        document.getElementById('contract-form').reset();
    } else {
        alert("Please fill out all required fields.");
    }
});
