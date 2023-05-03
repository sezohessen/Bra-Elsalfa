<script>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import CreateGame from "@/components/CreateGame.vue";


export default {
    props: {
        headerTitle: {
            type: String,
            default: 'The Outcast',
        },
        showCreateButton: {
            type: Boolean,
            default: true,
        },
    },
    setup() {
        const route = useRoute();

        const showCreateGameModel = ref(false);
        const isHomePage = computed(() => {
            return route.path === '/';
        });

        function showPopup() {
            showCreateGameModel.value = true;
        }

        function closeModel() {
            showCreateGameModel.value = false;
        }

        return {
            showPopup,
            closeModel,
            showCreateGameModel,
            isHomePage
        };
    },
    components: {
        CreateGame,
    },
}
</script>

<template>
    <header>
        <div class="header">
            <div class="header-left">
                <router-link :to="{ name: 'home' }">
                    <h1 class="header-title">{{ headerTitle }}</h1>
                </router-link>
            </div>
            <div class="header-right" v-if="isHomePage">
                <button class="btn" @click="showPopup">Create Room</button>
            </div>
            <CreateGame v-if="showCreateGameModel" @close-model="closeModel" />
        </div>
    </header>
</template>
  


<style scoped>

a, a:focus,a:active {
    color: #FFEBC6;
    text-decoration: none;
}
.header {
    background-color: #003844;
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px 100px;
}

.logo h1 {
    color: #FFEBC6;
    font-size: 40px;
    margin: 0;
}

nav {
    display: flex;
}

nav ul {
    list-style: none;
    display: flex;
}

nav li {
    margin-left: 30px;
}

nav a {
    text-decoration: none;
    color: #FFEBC6;
    font-size: 24px;
    font-weight: bold;
    border-bottom: 2px solid transparent;
    transition: border-bottom-color 0.3s;
}

nav a:hover {
    border-bottom-color: #FFEBC6;
}
</style>
