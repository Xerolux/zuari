document.addEventListener('DOMContentLoaded', function() {
	if (!zuariDarkMode.enabled) return;

	const toggle = document.getElementById('dark-mode-toggle');
	if (!toggle) return;

	const savedTheme = localStorage.getItem('zuari-theme');
	const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

	if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
		document.documentElement.classList.add('dark-mode');
	}

	toggle.addEventListener('click', function() {
		document.documentElement.classList.toggle('dark-mode');
		const isDark = document.documentElement.classList.contains('dark-mode');
		localStorage.setItem('zuari-theme', isDark ? 'dark' : 'light');
	});
});
