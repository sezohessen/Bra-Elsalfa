<script>
import { ref, onMounted, defineEmits } from 'vue';
import { get } from '../api/api.js';
import createRoom from '../utils/createGame';
import Loader from '@/components/Loader';
import { saveSession } from '../utils/saveSession';
import { loadSession } from '../utils/loadSession';

export default {
  name: 'CreateGame',
  components: {
    Loader
  },
  emits: ['close-model'],
  setup(props, { emit }) {
    const creatorName = ref('');
    const selectedGameThemeId = ref('');
    const loadingTheme = ref(true);
    const gameThemes = ref([]);
    const CreationLoader = ref(false);
    
    const loadGameThemes = async () => {
      gameThemes.value = loadSession('gameThemes', 12);
      console.log(gameThemes.value)
      if (!gameThemes.value) {
        try {
          const response = await get('game-themes');
          gameThemes.value = response;
          saveSession('gameThemes', gameThemes.value, 12);
        } catch (error) {
          console.error(error);
        }
      }
      loadingTheme.value = false;
    };

    const create = async () => {
      if (!selectedGameThemeId.value) {
        selectedGameThemeId.value = gameThemes.value[0]?.id;
      }
      CreationLoader.value = true;
      const playerIP = localStorage.getItem('playerIP');
      await createRoom(creatorName.value, selectedGameThemeId.value, playerIP);
    };

    const closePopup = () => {
      emit('close-model');
    };

    const selectGameTheme = (themeId) => {
      selectedGameThemeId.value = themeId;
    };

    onMounted(() => {
      loadGameThemes();
    });

    return {
      creatorName,
      selectedGameThemeId,
      gameThemes,
      loadingTheme,
      CreationLoader,
      create,
      closePopup,
      selectGameTheme,
    };
  }
};
</script>

<template>
  <section class="tournament__details-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="blog-post-wrapper">
          <div class="tournament__details-content">
            <Loader :message="'Creating Game In Progress...'" v-show="CreationLoader" />
            <div v-if="!CreationLoader" class="game-creating-section">
              <div class="close-icon" @click="closePopup">&#10006;</div>
              <h1 style="text-align: center;" class="title">Create Room</h1>
              <div class="tournament__details-form">
                <section class="team__area team-bg text" data-background="assets/img/bg/team_bg.jpg"
                  style="text-align: center;">
                  <input v-model="creatorName" type="text" placeholder="Type your name">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section__title text-center">
                          <span class="sub-title tg__animate-text">Game Theme</span>
                          <h5 class="title">CHOOSE A GAME THEME</h5>
                        </div>
                      </div>
                    </div>
                    <div v-if="loadingTheme" class="loading-section">
                      <loader />
                    </div>
                    <div v-else class="row justify-content-center">
                      <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".2s"
                        v-for="(theme, index) in gameThemes" :key="theme.id"
                        :class="[{ 'selected': selectedGameThemeId === theme.id }, { 'selected': index === 0 && !selectedGameThemeId }]"
                        @click="selectGameTheme(theme.id)">
                        <div class="team__item">
                          <div class="team__thumb">
                            <img :src="`images/profile/nft_img0${index + 1}.jpg`" alt="img">
                          </div>
                          <div class="team__content">
                            <h4 class="name">
                              {{ theme.name }}
                            </h4>
                            <span class="designation">Free</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button @click="create" class="tournament__details-form-btn">Create Room</button>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.tournament__details-area {
  margin-top: 4rem;
}

.close-icon {
  cursor: pointer;
}

.selected {
  background-color: #4ebd92;
}
</style>