<template>
    <div class="name-popup">
      <h2>Enter your name</h2>
      <input v-model="name" type="text" placeholder="Your name">
      <button @click="submitName">Submit</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: "",
      };
    },
    methods: {
      submitName() {
        if (this.name.trim() === "") {
          alert("Please enter your name");
          return;
        }
        this.$emit("submit-name", this.name);
      },
    },
  };
  </script>
  
  <style scoped>
  .name-popup {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
  }
  
  .name-popup input {
    margin: 10px 0;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
  }
  
  .name-popup button {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }
  </style>
  