<script>
export default {
    props: {
        text: {
            type: String,
            required: true
        },
        emitName: {
            type: String,
            required: true
        }
    },
    methods: {
        play() {
            this.$emit(this.emitName)
        }
    }
}
</script>

<template>
    <div class="about__buttons pt-10">
        <a @click="play" class="tg-btn-2 -secondary">{{ text }}</a>
    </div>
</template>

<style scoped>
.pt-10 {
    padding-top: 2rem;
}
</style>