import WelcomePage from './pages/WelcomePage.vue';
import GameRoom from './pages/GameRoom.vue';


const routes = [
  {
    path: '/',
    name: 'home',
    component: WelcomePage,
  },
  {
    path: '/:id',
    name: 'GameRoom',
    component: GameRoom,
  },
];

export default routes;