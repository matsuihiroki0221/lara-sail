import Echo from 'laravel-echo';
import 'pusher-js'


(window as any)._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

(window as any).axios = require('axios');

(window as any).axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */



 (window as any).Pusher = require('pusher-js');

 (window as any).Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

(window as any).Echo.channel('new-ordered-channel')
		   .listen('newOrdered',function(data:any){
			  console.log('received a message');
			  console.log(data);
			});