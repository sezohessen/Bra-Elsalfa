<script>
export default {
  name: "WelcomePage",
};
</script>

<template>
  <div class="welcome-page">
    <div class="left">
      <h1>Outcast</h1>
      <p>Join the world of online gaming and compete against players from all over the world. We offer a variety of games for players of all ages and skill levels.</p>
    </div>
    <div class="right">
      <img src="https://images.pexels.com/photos/5427445/pexels-photo-5427445.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Welcome Page Image">
    </div>
  </div>
</template>

<style scoped>
.welcome-page {
  background-color: #003844;
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1400px;
  margin: 0 auto;
  padding: 100px;
  margin-top: 2rem;
}

.left {
  color: #FFEBC6;
  flex-basis: 50%;
}

.left h1 {
  font-size: 48px;
  margin-bottom: 30px;
}

.left p {
  font-size: 24px;
  margin-bottom: 30px;
}

.right img {
  width: 100%;
  height: auto;
  border: 1px solid #FFEBC6;
  border-radius: 2rem;
}
</style>
