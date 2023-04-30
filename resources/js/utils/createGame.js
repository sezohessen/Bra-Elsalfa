import getIP from './getIP.js';
import generateRoomID from './generateRoomID.js';

export const createRoom = (name) => {
  const randomId = generateRoomID(16);
  getIP()
    .then((creatorIP) => {
      const players = [
        {
          "guestName": name,
          "guestIP": creatorIP
        }
      ];
      const game = {
        "gameID": randomId,
        "creatorIP": creatorIP,
        "players": players
      };
      const storedGames = JSON.parse(sessionStorage.getItem('games') || '[]');

      sessionStorage.setItem('guestName', name);
      sessionStorage.setItem(`game-${randomId}`, JSON.stringify(game));
      window.location.href = `/lobby/${randomId}`;
    })
    .catch((error) => {
      console.error(error);
      // Handle error
    });
};

export default createRoom;
