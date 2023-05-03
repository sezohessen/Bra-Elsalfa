<script>
import { get } from '../api/api.js';
import createRoom from '../utils/createGame';

export default {
  data() {
    return {
      creatorName: "",
      selectedGameThemeId: "",
      gameThemes: [],
      loading: true,
    };
  },
  async mounted() {
    try {
      const response = await get('game-themes');
      this.gameThemes = response;
    } catch (error) {
      console.error(error);
    } finally {
      this.loading = false;
    }
  },
  methods: {
    async create() {
      if (!this.selectedGameThemeId) {
        this.selectedGameThemeId = this.gameThemes[0]
      }
      const playerIP = localStorage.getItem('playerIP');
      await createRoom(this.creatorName, this.selectedGameThemeId, playerIP);
    },

    closePopup() {
      this.$emit("close-model");
      console.log('close')
    },

    selectGameTheme(themeId) {
      this.selectedGameThemeId = themeId;
    }
  },
};
</script>

<template>
  <section class="tournament__details-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="blog-post-wrapper">
          <div class="tournament__details-content">
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
                  <div v-if="loading" class="loading-section">
                    Loading...
                  </div>
                  <div v-else class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".2s" v-for="(theme, index) in gameThemes"
                      :key="theme.id" 
                      :class="[{ 'selected': selectedGameThemeId === theme.id }, { 'selected': index === 0 && !selectedGameThemeId   }]"
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