<script>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import CreateGame from "@/components/CreateGame.vue";
import Logo from "@/components/Logo.vue";



export default {
    props: {
        headerTitle: {
            type: String,
            default: 'The Outcast',
        },
        showCreateButton: {
            type: Boolean,
            default: true,
        },
    },
    setup() {
        const route = useRoute();

        const isHomePage = computed(() => {
            return route.path === '/';
        });

        const showCreateGameModel = ref(false);

        function showPopup() {
            showCreateGameModel.value = true;
        }

        function closeModel() {
            showCreateGameModel.value = false;
        }

        return {
            showPopup,
            closeModel,
            showCreateGameModel,
            isHomePage,
        };
    },
    components: {
        CreateGame,
        Logo
    },
}
</script>

<template>
    <header>
        <div id="sticky-header" class="tg-header__area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <Logo />
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="#">
                                            <router-link :to="{ name: 'home' }">
                                                {{ headerTitle }}
                                            </router-link>
                                        </a>
                                        </li>

                                    </ul>
                                </div>
                                <div v-if="isHomePage" class="tgmenu__action d-none d-md-block">
                                    <ul class="list-wrap">
                                        <li class="header-btn">
                                            <a href="#"  @click="showPopup" class="tg-border-btn">
                                                <i class="fa-sharp fa-solid fa-star"></i> Play
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header-search -->
        <div class="search__popup-wrap">
            <div class="search__layer"></div>
            <div class="search__close">
                <span><i class="flaticon-swords-in-cross-arrangement"></i></span>
            </div>
            <div class="search__wrap text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title">... <span>Search Here</span> ...</h2>
                            <div class="search__form">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Type keywords here" required>
                                    <button class="search-btn"><i class="flaticon-loupe"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-search-end -->

        <!-- offCanvas-area -->
        <div class="offCanvas__wrap">
            <div class="offCanvas__body">
                <div class="offCanvas__top">
                    <div class="offCanvas__toggle">
                        <i class="flaticon-swords-in-cross-arrangement"></i>
                    </div>
                </div>
                <div class="offCanvas__content">
                    <h2 class="title">Best Seller of Month Ideas for <span>NFT Wallet</span></h2>
                    <div class="offCanvas__contact">
                        <h4 class="small-title">CONTACT US</h4>
                        <ul class="offCanvas__contact-list list-wrap">
                            <li><a href="tel:93332225557">+9 333 222 5557</a></li>
                            <li><a href="mailto:info@webmail.com">info@webmail.com</a></li>
                            <li>New Central Park W7 Street ,New York</li>
                        </ul>
                    </div>
                    <div class="offCanvas__newsletter">
                        <h4 class="small-title">Subscribe</h4>
                        <form action="#" class="offCanvas__newsletter-form">
                            <input type="email" placeholder="Get News & Updates">
                            <button type="submit"><i class="flaticon-send"></i></button>
                        </form>
                        <p>Subscribe dolor sitamet, consectetur adiping eli. Duis esollici tudin augue.</p>
                    </div>
                    <ul class="offCanvas__social list-wrap">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="offCanvas__copyright">
                    <p>Copyright © 2023 - By <span>MYKD</span></p>
                </div>
            </div>
        </div>
        <div class="offCanvas__overlay"></div>
        <CreateGame v-show="showCreateGameModel" @close-model="closeModel"  />


    </header>
</template>
  


