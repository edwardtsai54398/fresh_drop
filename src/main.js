import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

//載入font awesome
//使用這個方法有些 icon 出不來，再想辦法解決
// import '@fortawesome/fontawesome-free/css/all.css'
// import '@fortawesome/fontawesome-free/js/all.js'

createApp(App).use(store).use(router).mount('#app')

