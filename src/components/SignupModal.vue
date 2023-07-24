<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="sign-container" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        
    </div>
</template>
<script>
import modalClose from "@/components/modalClose.vue";

export default {
    name: "SignupModal",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
    },
    data() {
        return {
            
        };
    },
    methods: {

    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/signup.scss";
</style>