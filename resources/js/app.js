const toggleBtn = document.querySelector('.menu-toggle');
const navList = document.querySelector('.list-container');

const toggleBtn2 = document.querySelector('.user-toggle');
const navList2 = document.querySelector('.user-dropdown');


toggleBtn.addEventListener('click', () => {
    navList.classList.toggle('show');
});

toggleBtn2.addEventListener('click', () => {
    navList2.classList.toggle('show');
});


