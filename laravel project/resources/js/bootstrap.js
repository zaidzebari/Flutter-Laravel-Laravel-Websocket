window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     // forceTLS: true//because we will not use this for test
//     wsHost : window.location.hostname,
//     wsPort : 6001,
//     disableStats: true
// });
//

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    wsHost:  window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,//then added
    forceTLS: false,//then added
    cluster:  process.env.MIX_PUSHER_APP_CLUSTER,
    disableStats: true,
    scheme: 'http',
    // encrypted: true,
    transports: ['websocket', 'polling', 'flashsocket'],
    enabledTransports: ['ws', 'wss'],
    disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming']
});



// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     wsHost: 'http://127.0.0.1:8000',//http://127.0.0.1:
//     wsPort: 6001,
//     wssPort: 6001,//then added
//     // forceTLS: false,//then added
//     cluster:  process.env.MIX_PUSHER_APP_CLUSTER,
//     disableStats: true,
//     scheme: 'http',
//     // encrypted: true,
//     transports: ['websocket', 'polling', 'flashsocket'],
//     enabledTransports: ['ws', 'wss'],
//     disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming']
// });
