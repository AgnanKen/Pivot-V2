function filterGigs() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const gigGrid = document.getElementById('gigGrid');
    const gigCards = gigGrid.getElementsByClassName('gig-card');

    for (let i = 0; i < gigCards.length; i++) {
        const title = gigCards[i].getElementsByTagName('h3')[0];
        if (title.innerHTML.toLowerCase().indexOf(filter) > -1) {
            gigCards[i].style.display = "";
        } else {
            gigCards[i].style.display = "none";
        }
    }
}
