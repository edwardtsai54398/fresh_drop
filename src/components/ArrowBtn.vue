<template>
    <button class="btn_arrow" href="" 
    :class="{'btn_flat':isFlat, [`btn_${size}`]:true}"
    @mouseover="hover" @mouseleave="mousLeave">
        {{ text }}
        <img src="@/assets/images/icon_bg/arrow_long_prim.svg" alt="" v-if="isBgcFFF">
        <img src="@/assets/images/icon_bg/arrow_long_fff.svg" alt="" v-if="!isBgcFFF">
    </button>
</template>
<script>

    export default {
      name: 'ArrowBtn',
      props: {
        size:{
            size:String,
            default: 's'
        },
        isFlat:{
            isFlat:Boolean,
            default: false,
        },
        text: String,
      },
      data() {
        return {
          isBgcFFF: this.isFlat,
        };
      },
      computed:{

      },
      methods: {
        hover() {
            if(this.isFlat){
                this.isBgcFFF = false
            }
        },
        mousLeave() {
            if(this.isFlat){
                this.isBgcFFF = true
            }
        }
      },
    }
</script>
<style lang="scss">
    @import "@/assets/scss/all.scss";
    .btn_arrow{
        display: flex;
        align-items: center;
        img[src*="arrow_long"]{
            margin-left: $sp2;
        }
        &.btn_xs img{
            margin-left: $sp1;
            width: 36px;
        }
    }
</style>