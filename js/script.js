const name = document.getElementById('name');
const form = document.getElementById('form');
const input = document.getElementById('input');
const msgContainer = document.getElementById('msg-container');
const msgs = document.querySelector('.msgs');

msgs.scrollTop = msgs.scrollHeight;

const getMsg = async () => {
	const res = await fetch(
		'https://cors-anywhere.herokuapp.com/https://chat-groupe6.herokuapp.com/handler.php'
	);
	const data = await res.json();
	console.log(data);
	displayMsgUser(data);
};

const displayMsgUser = (data) => {
	const today = new Date();
	const time = today.getHours() + ':' + today.getMinutes();

	data = data.reverse();

	for (let i = 0; i < data.length; i++) {
		const newMsg = document.createElement('p');
		if (data[i].username === 'henrique') {
			newMsg.classList.add('user');
		} else {
			newMsg.classList.add('guest');
		}
		newMsg.innerHTML = `${data[i].content} <span>${time} </span> <i class="fas fa-check"></i>`;
		msgContainer.appendChild(newMsg);
	}

	msgs.scrollTop = msgs.scrollHeight;
};

form.addEventListener('submit', (e) => {
	e.preventDefault();

	const author = document.getElementById('author');
	const content = document.getElementById('content');

	const data = new FormData();
	data.append('author', author.value);
	data.append('content', content.value);

	const requestAjax = new XMLHttpRequest();
	requestAjax.open(
		'POST',
		'https://cors-anywhere.herokuapp.com/https://chat-groupe6.herokuapp.com/handler.php?task=write'
	);

	requestAjax.onload = function () {
		displayMsgUser();
	};

	requestAjax.send(data);
});

getMsg();
