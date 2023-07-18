<template>
    <em class="popular">
        <img  src="@/assets/images/icon_bg/popular_h.svg" alt="">
        <span>人氣</span>
      </em>
</template>
<script>

</script>
<style lang="scss">
    .popular{
    position: absolute;
    top: 8px;
    right: -26px;
    transform: rotate(45deg);
    width: 100px;
    img{
        width: 100%;
    }
    span{
        color: #fff;
        font-size: 12px;
        position: absolute;
        top: 50%;
        transform: translateY(-80%);
        left: 0;
        width: 100%;
        text-align: center;
    }
    
}
</style>