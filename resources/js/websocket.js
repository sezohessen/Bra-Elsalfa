import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

export const echo = new Echo({
  broadcaster: 'pusher',
  key: 'local',
  wsHost: window.location.hostname,
  cluster: 'mt1',
  wsPort: 6001,
  wssPort: 443,
  forceTLS: false,
  disableStats: true,
  enabledTransports: ['ws', 'wss'],
});
