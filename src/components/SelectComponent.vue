<template>
    <div class="select" :class="{ open: isSelectOpen }">
        <div class="placeholder" @click="isSelectOpen = !isSelectOpen">
            {{ selectedOption || placeholder }}
            <font-awesome-icon icon="fa-solid fa-chevron-down" />
        </div>
        <ul class="option" v-show="isSelectOpen">
            <li v-show="selectedOption!==placeholder && selectedOption" @click="selectOption('')">{{ placeholder }}</li>
            <li v-for="item in customOptions" :key="item" @click="selectOption(item)">
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
        placeholder: String,
    },
    data() {
        return {
            isSelectOpen: false,
            selectedOption: "",
        };
    },
    methods: {
        selectOption(option) {
            this.selectedOption = option;
            this.isSelectOpen = false;
            if (option) {
                this.$emit('func', option)
            }
        },
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
%select_bgc {
    background-color: $bg--;
}
$select-h: 36px;
.select {
    position: relative;
    // height: $select-h;
    min-width: 110px;
    font-size: $xs-font;
    text-align: center;
    cursor: pointer;
    transition: 0.1s;
    &.open {
        .placeholder {
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
    overflow: hidden;
    z-index: 2;
    width: 100%;
    top: 100%;
    left: 0;
    border: 1px solid $primary;
    border-bottom-left-radius: calc($select-h / 2);
    border-bottom-right-radius: calc($select-h / 2);
    border-top: none;
    li {
        padding: 12px $sp3;
        &:first-child {
            padding-top: $sp2;
        }
        &:last-child {
            padding-bottom: $sp2;
        }
        &:hover{
            background-color: $secondary--;
        }
    }
}
</style>
