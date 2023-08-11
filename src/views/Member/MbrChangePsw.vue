<template>
    <modalComponent @close="modalClose" :isopen="$store.state.pswIsOpen">
        <template v-slot:content>
            <div class="changepsw_container">
                <h4>修改密碼</h4>
                <form>
                    <label for="newpsw">新密碼：</label>
                    <input id="newpsw" v-model="newPsw" type="password" placeholder="請輸入新密碼" />
                    <label for="confirm-newpsw">確認新密碼：</label>
                    <input
                        id="confirm-newpsw"
                        type="password"
                        placeholder="再次輸入新密碼"
                        v-model="newPswConfirm"
                        @paste="
                            (e) => {
                                e.preventDefault();
                            }
                        "
                    />
                </form>
                <button class="btn_s btn_flat" @click="changePsw">確認變更</button>
            </div>
        </template>
    </modalComponent>
</template>

<script>
import modalComponent from "@/components/modalComponent.vue";
export default {
    name: "ChangePsw",
    props: {},
    components: {
        modalComponent,
    },
    data() {
        return {
            newPsw: "",
            newPswConfirm: "",
        };
    },
    methods: {
        modalClose() {
            this.$store.state.pswIsOpen = false;
        },
        changePsw() {
            if (this.newPsw !== "" && this.newPswConfirm !== "") {
                if (this.newPsw == this.$store.state.memberInfoAll.info.psw) {
                    alert("輸入的新密碼與舊密碼一樣喔~");
                } else if (this.newPsw == this.newPswConfirm) {
                    let cusNo = sessionStorage.getItem("cus_no");
                    let url = `${this.$url}changePsw.php`;
                    let params = new URLSearchParams();
                    params.append("cusNo", cusNo);
                    params.append("newPsw", this.newPsw);
                    this.axios
                        .post(url, params)
                        .then((res) => {
                            alert(res.data);
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                } else {
                    alert("請再次確認新密碼");
                }
            } else if (this.newPsw == "") {
                document.querySelector('[for="newpsw"]').classList.add("shake");
                setTimeout(() => {
                    document.querySelector('[for="newpsw"]').classList.remove("shake");
                }, 1000);
            } else if (this.newPswConfirm == "") {
                document.querySelector('[for="confirm-newpsw"]').classList.add("shake");
                setTimeout(() => {
                    document.querySelector('[for="confirm-newpsw"]').classList.remove("shake");
                }, 1000);
            }
        },
    },
};
</script>
<style lang="scss">
@keyframes shake {
    0%,
    100% {
        transform: translateX(0);
    }
    20%,
    60% {
        transform: translateX(-10px);
    }
    40%,
    80% {
        transform: translateX(10px);
    }
}
.changepsw_container {
    margin-top: $sp2;
    display: flex;
    flex-direction: column;
    align-items: center;
    h4 {
        text-align: center;
        font-size: $m-font;
        font-weight: 700;
        color: $primary;
    }
    form {
        margin-top: $sp4;
        display: grid;
        align-items: center;
        grid-template-columns: repeat(2, auto);
        row-gap: $sp2;
        column-gap: $sp1;
        label {
            font-size: $s-font;
            justify-self: end;
            &.shake {
                animation: shake 1s ease;
                & + input {
                    animation: shake 1s ease;
                }
            }
        }
    }
    button {
        margin-top: $sp3;
    }
}
</style>
