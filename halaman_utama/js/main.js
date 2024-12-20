const menuCards = document.querySelectorAll('.menu-card');
const menuContents = document.querySelectorAll('.menu-content');

menuCards.forEach(card => {
    card.addEventListener('click', () => {
        const target = card.dataset.target;
        const content = document.getElementById(target);

        // Tampilkan konten yang sesuai
        menuContents.forEach(content => content.classList.remove('active'));
        content.classList.add('active');
    });
});