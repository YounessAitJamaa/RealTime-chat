import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


if(window.Echo) {
    window.Echo.private('role.recruiter')
        .listen('.role.message', (e) => {
            console.log(e);
            addMessage('[RECRUITER]' + e.message);
    });

    window.Echo.private('role.candidate')
        .listen('.role.message', (e) => {
            console.log(e);
            addMessage('[CANDIDATE]' + e.message);
        })
}


function addMessage(text) {
        const div = document.createElement('div');
        div.innerText = text;
        div.style.padding = '10px';
        div.style.background = '#e5ffe5';
        div.style.margin = '5px 0';

        const container = document.getElementById('realtime-messages');

        if(container) 
        {
            container.appendChild(div);
        }
}