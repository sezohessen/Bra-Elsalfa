<script>
import { ref, computed } from 'vue'
import NamePopup from "@/components/NamePopup.vue";

export default {
    props: {
        headerTitle: {
            type: String,
            default: 'Game Who',
        },
        showCreateButton: {
            type: Boolean,
            default: true,
        },
    },
    setup(props) {
        const showNamePopup = ref(false);

        function createRoom(name) {
            const randomId = Array.from({ length: 16 }, () => Math.floor(Math.random() * 35).toString(35)).join('');



            sessionStorage.setItem('guestName', name);
            window.location.href = `/lobby/${randomId}`;
        }

        function showPopup() {
            showNamePopup.value = true;
        }

        function onSubmitName(name) {
            createRoom(name);
        }
        return {
            showPopup,
            onSubmitName,
            showNamePopup
        };
    },
    components: {
        NamePopup,
    },
}
</script>

<template>
    <header class="header">
        <div class="header-left">
            <router-link :to="{ name: 'home' }">
                <h1 class="header-title">{{ headerTitle }}</h1>
            </router-link>
        </div>
        <div class="header-right">
            <button class="create-button" @click="showPopup">Create Room</button>
        </div>
        <NamePopup v-if="showNamePopup" @submit-name="onSubmitName" />
    </header>
</template>
  
<style scoped>
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #222;
    color: #fff;
    padding: 1rem;
}

.header-left {
    display: flex;
    align-items: center;
}

.header-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 2rem;
    font-weight: bold;
    margin: 0;
    color: #ff9900;
}

.header-right {
    display: flex;
    align-items: center;
}

.create-button {
    font-family: 'Lato', sans-serif;
    font-size: 1rem;
    font-weight: bold;
    background-color: #ff9900;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 0.5rem 1rem;
    text-decoration: none;
    transition: background-color 0.2s ease-in-out;
}

.create-button:hover {
    background-color: #e68a00;
}
</style>
  