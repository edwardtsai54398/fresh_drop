<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="modal" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        <slot name="content">
            <!-- 內容 -->
        </slot>
    </div>
</template>

<script>
import modalClose from "@/components/modalClose.vue";
export default {
    name: "modalComponent",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
    },
    data() {
        return {};
    },
    methods: {},
};
</script>
<style lang="scss">
.modal {
    opacity: 0;
    visibility: hidden;
    box-shadow: 20px 20px 50px rgba(0,0,0,0.3);
    position: fixed;
    z-index: 21;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: fit-content;
    height: fit-content;
    border-radius: $m-br;
    overflow: hidden;
    background-color: $bg--;
    padding: $sp3 $sp4;
    transform: rotateX(90deg) translateZ(400px);
    transform-origin: center center;
    transform-style: preserve-3d;
    perspective: 100px;
    transition: opacity .3s, visibility .3s, transform .5s;
    &.open {
        opacity: 1;
        visibility: visible;
        transform: perspective(1000px) rotateX(0deg) translateZ(100px);
    }
}
</style>
