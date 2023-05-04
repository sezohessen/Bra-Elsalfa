<script>
import Lobby from '@/components/Lobby';
import CustomButton from '@/components/CustomButton';
import Loader from '@/components/Loader';
import JoinGame from '@/components/JoinGame';

import { get } from '../api/api.js';

export default {
    data() {
        return {
            gamePlayers: [],
            loading: true
        };
    },
    async mounted() {
        const gameId = this.$route.params.id;
        try {
            await this.fetchPlayer(gameId)
            this.loading = false

        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async fetchPlayer(gameId) {
            const response = await get(`games/${gameId}`);
            this.gamePlayers = response[0]
        },
        startGame() {
            console.log('start game gooooooo')
        }
    },
    components: {
        Lobby,
        CustomButton,
        Loader,
        JoinGame
    }
};
</script>

<template>
    <section class="streamers__area padd-top">
        <div class="container">
            <div v-if="loading">
                <Loader class="loader--hidden" />
            </div>
            <JoinGame />
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