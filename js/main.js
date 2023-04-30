//HEADER RESPONSIVE NAVBAR//
window.onload = function () {
	window.addEventListener('scroll', function (e) {
		if (window.pageYOffset > 100) {
			document.querySelector("header").classList.add('is-scrolling');
		} else {
			document.querySelector("header").classList.remove('is-scrolling');
		}
	});

	const menu_btn = document.querySelector('.hamburger');
	const mobile_menu = document.querySelector('.mobile-nav');

	menu_btn.addEventListener('click', function () {
		menu_btn.classList.toggle('is-active');
		mobile_menu.classList.toggle('is-active');
	});
}

//SKILLS//
const faqs = document.querySelectorAll(".faq1");

faqs.forEach(faq1 => {
    faq1.addEventListener("click", () =>{
        faq1.classList.toggle("active");
    })
})
