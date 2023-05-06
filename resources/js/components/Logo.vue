<template>
  <div class="logo">
    <router-link :to="{ name: 'home' }">
      <a href="#"
        ><img :src="HostName+'images/logo2.png'" alt="Logo"
      /></a>
    </router-link>
  </div>
</template>

<script>
import { ref, computed } from 'vue' 

    export default {
    setup() {
        const HostName = window.BaseURL;
        return {
            HostName
        };
    },
}
</script>