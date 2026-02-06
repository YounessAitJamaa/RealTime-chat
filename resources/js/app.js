import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


if(window.Echo) {
    window.Echo.channel('demo-channel')
    .listen('.demo.event', (e) => {
        console.log('EVENT RECEIVED', e);

        const div = document.createElement('div');
        div.innerText = e.message;
        div.style.padding = '10px';
        div.style.background = '#e5ffe5';
        div.style.margin = '5px 0';

        const container = document.getElementById('realtime-messages');

        if(container) 
        {
            container.appendChild(div);
        }
    });

}