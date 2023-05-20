//HEADER RESPONSIVE NAVBAR//
window.onload = function () {
	window.addEventListener('scroll', function (e) {
		if (window.pageYOffset > 10) { //100//
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

//VIDEO PLAYER//
var videoPlayer = document.getElementById("videoPlayer");
      var myVideo = document.getElementById("myVideo");

      function stopVideo(){
          videoPlayer.style.display = "none";

		  	const video = document.getElementById('myVideo');
			video.pause();
			video.currentTime = 0;
      }
      function playVideo(file){
          myVideo.src = file;
          videoPlayer.style.display = "block";
      }

	/*
	const player = document.getElementById('videoPlayer');
	player.addEventListener('mousedown', dragStart);

	function dragStart(event) {
		const player = document.getElementById('videoPlayer');
		player.style.position = 'absolute';
		player.style.zIndex = 1000;
		let offsetX = event.clientX - player.offsetLeft;
		let offsetY = event.clientY - player.offsetTop;
	  
		function movePlayer(event) {
		  player.style.left = (event.clientX - offsetX) + 'px';
		  player.style.top = (event.clientY - offsetY) + 'px';
		}
	  
		document.addEventListener('mousemove', movePlayer);
		document.addEventListener('mouseup', stopDragging);

		function stopDragging() {
			document.removeEventListener('mousemove', movePlayer);
			document.removeEventListener('mouseup', stopDragging);
		}
	  }
	*/

