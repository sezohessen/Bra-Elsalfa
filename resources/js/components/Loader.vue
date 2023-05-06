<script>
import { ref } from 'vue';

export default {
    props: {
        message: {
            type: String,
            required: true
        }

    },
    setup(props) {
        const imgNumber = Math.floor(Math.random() * 8) + 1;

        return {
            imgNumber
        };
    }
}
</script>

<template>
    <div class="loader-holder">
        <div class="blog-post-thumb img">
            <img :src="`images/blog/g${imgNumber}.jpg`" alt="joining-game-loader">
            <p class="creating-p">{{ message }}</p>
        </div>
        <div class="progress-bar"></div>
    </div>
</template>

<style>
.loader-holder {
    margin: 1rem 0;
}

.creating-p {
    padding: 1rem 0;
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
}

.img {
    text-align: center;
}

.progress-bar {
    height: 5px;
    background-color: #ddd;
    position: relative;
}

.progress-bar:before {
    content: "";
    display: block;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #4CAF50;
    animation: progress-bar 2s ease-in-out infinite;
}

@keyframes progress-bar {
    0% {
        width: 0%;
    }

    50% {
        width: 50%;
    }

    100% {
        width: 100%;
    }
}
</style>