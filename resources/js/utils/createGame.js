import getIP from './getIP.js';
import { get, post, put, remove } from './api.js';

const createRoom = async (name) => {
  const creatorIP = await getIP();

  const data = {
    creatorIP,
    players: [
      {
        guestName: name,
        guestIP: creatorIP,
      },
    ],
  };

  const response = await post('/games', data);

  const { gameID } = response;

  window.location.href = `/lobby/${gameID}`;
};
export default createRoom;
