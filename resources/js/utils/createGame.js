import getIP from './getIP.js';
import { post } from '../api/api.js';

const createGame = async (name, gameThemeId) => {
  const creatorIP = await getIP();
    console.log(name,gameThemeId)
  const response = await post('games', {
    player_ip: creatorIP,
    name: name,
    game_theme_id: gameThemeId,
  });

  const { game, player } = response;

  sessionStorage.setItem('player', player);

  window.location.href = `/lobby/${game.id}`;
};

export default createGame;

