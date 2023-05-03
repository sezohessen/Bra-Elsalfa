import { post } from '../api/api.js';

const createGame = async (name, gameThemeId,creatorIP) => {
  const response = await post('games', {
    player_ip: creatorIP,
    name: name,
    game_theme_id: gameThemeId,
  });

  const { game, player } = response;

  sessionStorage.setItem('player', player);

  window.location.href = `/${game.id}`;
};

export default createGame;

