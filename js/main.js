window.onload = function() {
	var loginBox = document.querySelectorAll('.loginForm')[0],
		loginLink = document.querySelectorAll('.login')[0];

	if(loginLink) {
		loginLink.addEventListener('click', function(e) {
			e.preventDefault();
			loginBox.style.display = loginBox.style.display === 'block' ? 'none' : 'block';
		});
	}

	var entries = document.querySelectorAll('.entry');
	if(entries.length > 0) {
		for(var x = 0; x < entries.length; ++x) {
			(function(){
				var entry = entries[x],
					excerpt = entry.querySelector('.excerpt'),
					full = entry.querySelector('.full'),
					more = entry.querySelector('.read-more'),
					less = entry.querySelector('.read-less');

				if(more) {
					more.addEventListener('click', function(e){
						e.preventDefault();
						excerpt.style.height = "0";
						full.style.height = "100%";
					});
				}

				if(less) {
					less.addEventListener('click', function(e){
						e.preventDefault();
						excerpt.style.height = "100%";
						full.style.height = "0";

					});
				}
			})();
			
		}
	}

	var regions = document.querySelectorAll('.regionMenuLabel');
	if(regions.length > 0) {
		for(var x = 0; x < regions.length; ++x) {
			(function(x){
				regions[x].addEventListener('click', function(e){
					e.preventDefault();
					var next = regions[x].nextElementSibling;
					next.style.display = next.style.display === 'none' ? 'block' : 'none';
				});
			})(x);
		}
	}
}