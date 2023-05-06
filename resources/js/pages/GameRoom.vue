<script>
import { ref, reactive, onMounted, watchEffect, computed } from 'vue';
import { useRoute } from 'vue-router';
import Lobby from '@/components/Lobby';
import Loader from '@/components/Loader';
import JoinGame from '@/components/JoinGame';
import { get } from '../api/api.js';

export default {
    components: {
        Lobby,
        Loader,
        JoinGame
    },

    setup() {
        window.Echo.channel('player-join')
            .listen('PlayerJoinEvent', (e) => {
                gamePlayers.push(e.data);
            });


        const route = useRoute();
        const gameId = ref(route.params.id);

        const playerIP = ref(localStorage.getItem('playerIP') || '127.0.0.1');
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

        const PlayerExists = () => {
            for (let i = 0; i < gamePlayers.length; i++) {
                if (gamePlayers[i].ip_address === playerIP.value) {
                    return true;
                }
            }
            return false;
        }

        const closeJoinModal = () => {
            showJoinGame.value = false;
        };

        const startGame = () => {
            console.log('start game gooooooo');
        };

        onMounted(() => {
            fetchPlayer();
        });

        const showJoinGame = computed(() => {
            return !PlayerExists() && !loading.value;
        });

        return {
            showJoinGame,
            gamePlayers,
            loading,
            closeJoinModal,
            startGame,
            playerIP,
        };
    }
};
</script>

<template>
    <section class="streamers__area padd-top">
        <div class="container">
            <div v-show="loading">
                <Loader :message="'Joining Game In Progress...'" class="loader--hidden" />
            </div>
            <JoinGame v-if="showJoinGame" @close-join="closeJoinModal" />
            <Lobby :gamePlayers='gamePlayers' />
        </div>
    </section>
</template>

<style scoped>
.padd-top {
    padding-top: 14rem;
}
</style>