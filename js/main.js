
var feedback = document.getElementById("feedback");
//feedback.style.color = "red";
function verifyForm(){

	var pwd = document.forms['signup']['pass'].value;
	var Rpwd = document.forms['signup']['repass'].value;
	// var pwd = document.getElementById("pwd").value;
	// var Rpwd = document.getElementById("Rpwd").value;

	if(pwd != Rpwd){
		feedback.innerHTML = "Password does not match!!"
		return false;
	}
	else if(pwd.length < 6){
		feedback.innerHTML = "Password must be at least 6 character!"
		return false;
	}
	else{
		return true;
	}
	console.log(pwd);
}

//Check user name availablity
function check(str){
	if(str.length == 0){
		document.getElementById('inavalid_feed').innerHTML = '';
	  }
	  else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("inavalid_feed").innerHTML = this.responseText;
			
			if(this.responseText == "User name not available"){
				document.getElementById("inavalid_feed").style.color = "red";
			}
			else{
				document.getElementById("inavalid_feed").style.color = "green";
			}
			
		  }
		};
		xmlhttp.open("GET", "include/check.inc.php?uname="+ str , true);
		xmlhttp.send();
	  }
}
//More btn

function more_btn(){
	var dots = document.getElementById("dots");
	var more = document.getElementById("more");
	var btnText = document.getElementById("more-btn");

	if(dots.style.display == "none"){
		dots.style.display = "inline";
		btnText.innerHTML = "Read More";
		more.style.display = "none";
	}
	else{
		dots.style.display = "none";
		btnText.innerHTML = "Read Less";
		more.style.display = "inline";
	}
}

//Verify comment
function verifyComment(){
	var comment = document.forms['commentForm']['comment'].value;
	if(comment.length < 10){
		feedback.innerHTML = "Your comment is too short...!"
		return false;
	}
	else{
		return true;
	}

}

//Register Service Worker
if ('serviceWorker' in navigator) {
	console.log('Service worker is supported');
	window.addEventListener('load', () => {
	  navigator.serviceWorker
		.register('sw_cached_site.js')
		.then(reg => console.log('Service Worker: Registered (Pages)'))
		.catch(err => console.log(`Service Worker: Error: ${err}`));
	});
  }