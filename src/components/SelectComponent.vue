<template>
  <div class="select"
    :class="{ open: isSelectOpen }">
    <div class="placeholder" @click="isSelectOpen = !isSelectOpen">
      {{ selectedOption || placeholder }}
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <ul class="option" v-show="isSelectOpen">
      <li v-for="item in customOptions" :key="item"
      @click="selectOption(item)">
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "SelectComponent",
  props: {
    customOptions: Array,
    placeholder: String
  },
  data() {
    return {
      isSelectOpen: false,
      selectedOption: '',
    };
  },
  methods: {
    selectOption(option) {
      this.selectedOption = option;
      this.isSelectOpen = false;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/_var.scss";
%select_bgc {
  background-color: $bg--;
}
$select-h: 36px;
.select {
  position: relative;
  // height: $select-h;
  width: 110px;
  font-size: $xs-font;
  text-align: center;
  cursor: pointer;
  transition: 0.1s;
  &.open {
    .placeholder{
    @extend %select_bgc;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    }
    
    .option {
      @extend %select_bgc;
    }
  }
}

.placeholder {
  padding: 0px $sp3;
  line-height: $select-h;
  width: 100%;
  border: 1px solid $primary;
  border-radius: calc($select-h / 2);
  .fa-chevron-down {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    font-size: 10px;
  }
}

.option {
  position: absolute;
  z-index: 2;
  width: 100%;
  top: 100%;
  left: 0;
  border: 1px solid $primary;
  border-bottom-left-radius: calc($select-h / 2);
  border-bottom-right-radius: calc($select-h / 2);
  border-top: none;
  li {
    padding: calc($s-br / 2) $sp3;
    &:first-child {
      padding-top: $s-br;
    }
    &:last-child {
      padding-bottom: $s-br;
    }
  }
}
</style>