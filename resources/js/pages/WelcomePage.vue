<script>
import { ref, onMounted } from 'vue';
import getIP from '../utils/getIP';

export default {
    name: 'WelcomePage',

    setup() {
        const playerIP = ref(localStorage.getItem('playerIP') || null);

        const getPlayerIP = async () => {
            if (playerIP.value === null) {
                const ip = await getIP();
                localStorage.setItem('playerIP', ip);
                playerIP.value = ip;
            }
        };

        onMounted(() => {
            getPlayerIP();
        });

        return {
            playerIP,
        };
    },
};
</script>


<template>
    <section class="slider__area slider__bg" data-background="assets/img/slider/slider_bg.jpg">
        <div class="slider-activee">
            <div class="single-slider">
                <div class="container custom-container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6">
                            <div class="slider__content">
                                <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s">live rooms</h6>
                                <h2 class="title wow fadeInUp" data-wow-delay=".5s">who is the outcast</h2>
                                <p class="wow fadeInUp" data-wow-delay=".8s">Play with friends</p>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-5 col-lg-6">
                            <div class="slider__img text-center">
                                <img :src="`images/avatar.avif`" data-magnetic alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__shapes">
            <img :src="`images/profile/nft_avatar.png`" alt="shape">
            <img :src="`images/profile/nft_avatar01.png`" alt="shape">
            <img :src="`images/profile/nft_avatar02.png`" alt="shape">
            <img :src="`images/profile/nft_avatar03.png`" alt="shape">
        </div>
    </section>
</template>
