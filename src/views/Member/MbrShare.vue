<template>
    
      <section class="member_share">
        <div class="title">
          <h5>烹飪心得</h5>
          <SelectComponent :customOptions="selectOptions" :placeholder="'日期排序'"/>
        </div>
        <ul class="share_list">
            <li class="share_item" v-for="share in shareEllipsis" :key="share.id">
              <div class="pic">
                <img :src="share.img" alt="">
              </div>
              <h6 class="name">{{ share.dishname }}</h6>
              <div class="date">{{ share.date }}</div>
              <div class="content">
                <p>{{ share.message }}</p>
                <button class="btn_icon btn_flat edit_massage"><font-awesome-icon icon="fa-solid fa-pen" /></button>
              </div>
            </li>
          </ul>
      </section>
    
</template>

<script>
    import SelectComponent from '@/components/SelectComponent.vue'
    import memberShare from '@/assets/data/memberShare.js'
    
    export default {
    name: 'MbrShare',
    components: {
      SelectComponent,
    },
    data() {
        return {
          selectOptions: ['最新', '最舊'],
          memberShare,
          // memberShareEllipsis: memberShare
        };
    },
    computed: {
      shareEllipsis() {
        let strLenStrict = 9
        let memberShareEllipsis = this.memberShare
        this.memberShare.forEach((share, index) =>{
          if(share.message.length > strLenStrict){
          let newStr = share.message.substr(0, strLenStrict)
          newStr += '...'
          memberShareEllipsis[index].message = newStr
        }
        })
        return memberShareEllipsis
      }
    },
    methods: {

    },
}
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/mbrShare.scss";
</style>