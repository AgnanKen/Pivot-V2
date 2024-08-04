const container = document.getElementById('container');
const signupbtn = document.getElementById('sign up');
const loginBtn = document.getElementById('log in');

signupbtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});