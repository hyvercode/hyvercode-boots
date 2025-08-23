document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const darkModeIcon = document.getElementById('dark-mode-icon');

    function applyTheme(theme) {
        body.classList.remove('light-mode', 'dark-mode');

        if (theme === 'dark') {
            body.classList.add('dark-mode');
            darkModeIcon.textContent = '🌙';
        } else if (theme === 'light') {
            body.classList.add('light-mode');
            darkModeIcon.textContent = '☀️';
        } else {
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            darkModeIcon.textContent = '🖥';
            if (systemPrefersDark) {
                body.classList.add('dark-mode');
            }
        }
    }

    // Cek tema dari localStorage atau default ke auto
    const savedTheme = localStorage.getItem('theme') || 'auto';
    applyTheme(savedTheme);

    dropdownItems.forEach(item => {
        item.addEventListener('click', function () {
            const selectedTheme = this.getAttribute('data-theme');
            darkModeIcon.textContent = selectedTheme ? '☀️' : '🌙';
            localStorage.setItem('theme', selectedTheme);
            applyTheme(selectedTheme);
        });
    });

    document.querySelectorAll('pre code').forEach((block) => {
        if (!block.classList.length) {
            block.classList.add('language-js'); // Default to JavaScript if no class exists
        }
    });
});
