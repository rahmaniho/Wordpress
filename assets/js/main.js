/* Karen Soft — main.js */

/* ── منوی موبایل ── */
(function () {
	var toggle = document.querySelector('.menu-toggle');
	var nav = document.querySelector('.primary-navigation');
	if (!toggle || !nav) return;

	toggle.addEventListener('click', function () {
		var open = toggle.getAttribute('aria-expanded') === 'true';
		toggle.setAttribute('aria-expanded', String(!open));
		nav.classList.toggle('nav-open');
	});

	// بستن منو هنگام کلیک روی لینک (موبایل)
	nav.querySelectorAll('a').forEach(function (link) {
		link.addEventListener('click', function () {
			toggle.setAttribute('aria-expanded', 'false');
			nav.classList.remove('nav-open');
		});
	});
})();

/* ── فرم تماس AJAX ── */
(function () {
	var form = document.querySelector('.karen-contact-form');
	if (!form) return;

	var responseBox = form.querySelector('.karen-contact-response');

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		responseBox.textContent = '';
		responseBox.className = 'karen-contact-response';

		var formData = new FormData(form);

		var karenSoft = window.karenSoft || {};
		formData.append('action', 'karen_soft_contact_form');
		formData.append('karen_contact_nonce_field', karenSoft.nonce || '');

		fetch(karenSoft.ajaxurl || form.action, {
			method: 'POST',
			body: formData,
			credentials: 'same-origin',
		})
			.then(function (resp) {
				return resp.json().catch(function () { return {}; });
			})
			.then(function (data) {
				if (data.success) {
					responseBox.textContent = data.data && data.data.message ? data.data.message : 'پیام شما با موفقیت ارسال شد.';
					responseBox.classList.add('success');
					form.reset();
				} else {
					var msg = data.data && data.data.message ? data.data.message : 'خطایی رخ داد. لطفاً دوباره تلاش کنید.';
					responseBox.textContent = msg;
					responseBox.classList.add('error');
				}
			})
			.catch(function () {
				responseBox.textContent = 'اتصال برقرار نشد. لطفاً دوباره تلاش کنید.';
				responseBox.classList.add('error');
			});
	});
})();
