<template>
  <button class="close">
    <font-awesome-icon icon="fa-solid fa-minus" />
  </button>
</template>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
.close {
  position: absolute;
  top: $sp2;
  right: $sp2;
  i {
    font-size: $s-font;
    color: $primary;
  }
}
</style>