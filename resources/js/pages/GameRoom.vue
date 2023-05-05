<script>
import { ref, reactive, onMounted, watchEffect } from 'vue';
import { useRoute } from 'vue-router';
import Lobby from '@/components/Lobby';
import CustomButton from '@/components/CustomButton';
import Loader from '@/components/Loader';
import JoinGame from '@/components/JoinGame';
import { get, post } from '../api/api.js';

export default {
    components: {
        Lobby,
        CustomButton,
        Loader,
        JoinGame
    },

    setup() {

        window.Echo.channel('player-join')
        .listen('PlayerJoinEvent', (e) => {
            console.log(e);
            gamePlayers.push(e.data);
        });


        const route = useRoute();
        const gameId = ref(route.params.id);

        const playerIP = ref(localStorage.getItem('playerIP') || '127.0.0.1');

        const newPlayer = ref(true);
        const gamePlayers = reactive([]);
        const loading = ref(true);

        const fetchPlayer = async () => {
            try {
                const response = await get(`games/${gameId.value}`);
                gamePlayers.push(...response[0]);
                loading.value = false;
            } catch (error) {
                console.error(error);
            }
        };

        const joinGame = async (newPlayerName) => {
            try {
                const response = await post(`join-game/${gameId.value}`, {
                    name: newPlayerName,
                    ip_address: playerIP.value
                });
              /*   const player = response.player;
                gamePlayers.push(player); */
                newPlayer.value = false;
                // socket.emit('so-player-join', player);
            } catch (error) {
                console.error(error);
            }
        };

        const startGame = () => {
            console.log('start game gooooooo');
        };

        onMounted(() => {
            fetchPlayer();



        });



        return {
            newPlayer,
            gamePlayers,
            loading,
            joinGame,
            startGame,

        };
    }
};
</script>
<template>
    <section class="streamers__area padd-top">
        <div class="container">
            <div v-if="loading">
                <Loader class="loader--hidden" />
            </div>
            <JoinGame v-if="newPlayer" @player-join="joinGame" />
            <Lobby :gamePlayers='gamePlayers' />
            <CustomButton :text="'Play'" :emitName="'start-game'" @start-game="startGame" />
        </div>
    </section>
</template>

<style scoped>
.padd-top {
    padding-top: 14rem;
}
</style>