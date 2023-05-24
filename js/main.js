
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

//PORTFOLIO//
	// Get references to the buttons and containers
	const btn1 = document.getElementById("btn1");
	const btn2 = document.getElementById("btn2");
	const btn3 = document.getElementById("btn3");
	const container1 = document.getElementById("Portrona");
	const container2 = document.getElementById("Portboth");
	const container3 = document.getElementById("Portangela");

	// Function to show a container and hide the others
	function showContainer(container) {
	container1.style.display = "none";
	container2.style.display = "none";
	container3.style.display = "none";
	container.style.display = "block";
	}

	// Add click event listeners to the buttons
	btn1.addEventListener("click", function() {
	showContainer(container1);
	});

	btn2.addEventListener("click", function() {
	showContainer(container2);
	});

	btn3.addEventListener("click", function() {
	showContainer(container3);
	});

	$(document).ready(function() {
	// Handle button click event
	$('.nav-link').click(function() {
		// Remove active class from all buttons
		$('.nav-link').removeClass('active');
		// Add active class to the clicked button
		$(this).addClass('active');
	});
	});

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
	  
	//For Drag Vid//
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


//============== About Page =================//
  	// Typing Effect
	// First Typing Effect
	document.addEventListener("DOMContentLoaded", function() {
		// Start the typing effects
		typeText1();
		typeText2();
	});
	var text1 = "I'm Angela Anne Therese";
	var index1 = 0;
	var speed1 = 100; // Adjust typing speed (in milliseconds)
		  
	function typeText1() {
		var element1 = document.getElementById("typing-text");
		if (index1 < text1.length) {
			element1.innerHTML += text1.charAt(index1);
			index1++;
			setTimeout(typeText1, speed1);
		} else {
			setTimeout(deleteText1, 1000); // Delay before deleting the text
		}
	}
		  
	function deleteText1() {
		var element1 = document.getElementById("typing-text");
		if (index1 >= 0) {
			var tempText = text1.substring(0, index1);
			element1.innerHTML = tempText;
			index1--;
			setTimeout(deleteText1, 50); // Adjust deleting speed (in milliseconds)
		} else {
			  index1 = 0;
			setTimeout(typeText1, 1000); // Delay before retyping the text
		}
	}
		  
	// Second Typing Effect
	var text2 = "I'm Rona May ";
	var index2 = 0;
	var speed2 = 50; // Adjust typing speed (in milliseconds)
		  
	function typeText2() {
		var element2 = document.getElementById("rona_type");
		if (index2 < text2.length) {
			element2.innerHTML += text2.charAt(index2);
			index2++;
			setTimeout(typeText2, speed2);
		} else {
			setTimeout(deleteText2, 1000); // Delay before deleting the text
		}
	}
		  
	function deleteText2() {
		var element2 = document.getElementById("rona_type");
		if (index2 >= 0) {
			var tempText = text2.substring(0, index2);
			element2.innerHTML = tempText;
			index2--;
			setTimeout(deleteText2, 50); // Adjust deleting speed (in milliseconds)
		} else {
			index2 = 0;
			setTimeout(typeText2, 1000); // Delay before retyping the text
		}
	}
		  
