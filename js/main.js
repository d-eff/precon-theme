window.onload = function() {
	var loginBox = document.querySelectorAll('.loginForm')[0],
		loginLink = document.querySelectorAll('.login')[0];

		loginLink.addEventListener('click', function(e) {
			e.preventDefault();
			loginBox.style.display = loginBox.style.display === 'block' ? 'none' : 'block';

		});
}