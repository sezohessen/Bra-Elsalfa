import { ref } from 'vue';
import { useRoute } from 'vue-router';
import { post } from '../api/api.js';

export const JoinGameMixin = {
  setup() {
    const route = useRoute();
    const gameId = ref(route.params.id);

    const playerName = ref('');
    const playerIP = ref(localStorage.getItem('playerIP') || '127.0.0.1');

    const isJoinRequestSend = ref(false);

    const joinGame = async () => {
      try {
        if (isJoinRequestSend.value == true) { // Prevent multiple database calls  
          return;
        }
        isJoinRequestSend.value = true;
        await post(`join-game/${gameId.value}`, {
          name: playerName.value,
          ip_address: playerIP.value
        });

        isJoinRequestSend.value = false;
    } catch (error) {
        console.error(error);
        isJoinRequestSend.value = false;
      }
    };

    return {
      playerName,
      joinGame,
    };
  },
};
