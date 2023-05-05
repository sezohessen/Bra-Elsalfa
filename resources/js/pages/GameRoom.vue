<script>
import { ref, reactive, onMounted, watchEffect, computed } from 'vue';
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
        
        const gamePlayers = reactive([]);
        const loading = ref(true);
        
        const Creator = ref();
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
        const getCreator = async () => {
            try {
                const response = await get(`creator/${gameId.value}`);
                Creator.value = response;
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
            } catch (error) {
                console.error(error);
            }
        };

        const startGame = () => {
            console.log('start game gooooooo');
        };
        
        onMounted(() => {
            fetchPlayer();
            getCreator();
        });

        const showJoinGame = computed(() => {
            return !PlayerExists() && !loading.value;
        });
        return {
            showJoinGame,
            gamePlayers,
            loading,
            joinGame,
            startGame,
            getCreator,
            Creator,
            playerIP
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
            <JoinGame v-if="showJoinGame" @player-join="joinGame" />
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