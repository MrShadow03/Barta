//single-chat
const msg_form = document.querySelector("#chat_form");
const msg_input = document.querySelector("#messageInput");
const msg_btn = document.querySelector("#msg_btn");

msg_form.onsubmit = (e) => {
	e.preventDefault();
};
msg_btn.onclick = () => {
	let formData = new FormData(msg_form);
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./assets/php/chatUsers.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				msg_input.value = "";
				//alert(data);
			}
		}
	};

	xhr.send(formData);
};

const msg_container = document.querySelector("#msg_container");
setInterval(() => {
	let formData = new FormData(msg_form);
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./assets/php/getChat.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				msg_container.innerHTML = data;
			}
		}
	};
	xhr.send(formData);
}, 500);
