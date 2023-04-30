<template>
  <div class="container">
    <div class="welcome-message">
      <h1>Welcome to Guess Who</h1>
      <p>
        This is a fun game where you have to guess the person based on a
        series of yes-or-no questions. Think you can do it?
      </p>
    </div>
    <div class="about-us">
      <h2>About Us</h2>
      <p>
        We are a team of developers who love to create fun and engaging games
        for people of all ages. Our goal is to make gaming more accessible and
        enjoyable for everyone. Thanks for playing!
      </p>
    </div>
  </div>
</template>

<script>

export default {
  name: "WelcomePage",
};
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.welcome-message {
  margin-top: 50px;
  text-align: center;
}

.about-us {
  margin-top: 50px;
  text-align: center;
}

.about-us h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.about-us p {
  font-size: 18px;
  line-height: 1.5;
}
</style>
