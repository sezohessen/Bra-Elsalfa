<script>
import { get } from '../api/api.js';

export default {
  data() {
    return {
      creatorName: "",
      selectedGameThemeId: "",
      gameThemes: [],
    };
  },
  async mounted() {
    try {
      const response = await get('game-themes');
      this.gameThemes = response;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    submitNameAndGameTheme() {
      if (!this.selectedGameThemeId) {
        alert("Please select a game theme");
        return;
      }
      this.$emit("create-game", this.creatorName, this.selectedGameThemeId);
    },
    closePopup() {
      this.$emit("close-model");
    }
  },
};
</script>

<template>
  <div class="name-popup">
    <div class="form-container">
      <h2>Enter your name and choose a game theme</h2>
      <input v-model="creatorName" type="text" placeholder="Your name">
      <select v-model="selectedGameThemeId">
        <option value="" disabled>Select a game theme</option>
        <option v-for="theme in gameThemes" :key="theme.id" :value="theme.id">{{ theme.name }}</option>
      </select>
      <button @click="submitNameAndGameTheme">Submit</button>
    </div>
    <div class="image-container">
      <div class="close-icon" @click="closePopup">&#10006;</div>
      <img src="https://wallpapercave.com/wp/31K91HR.jpg" alt="Registration Image">
    </div>
  </div>
</template>

<style scoped>
input{
  border: 1px solid black;
}
.name-popup {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.form-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.form-container h2 {
  margin-bottom: 20px;
  font-size: 24px;
  text-align: center;
}

.form-container input {
  margin: 10px 0;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
}

.form-container select {
  margin: 10px 0;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
}

.form-container button {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.image-container {
  position: relative;
  width: 400px;
  height: 400px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  margin-left: 20px;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.close-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 24px;
  font-weight: bold;
  color: #fff;
  cursor: pointer;
}
</style>