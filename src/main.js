import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'


//載入font awesome
//基本引入
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
//引入要用的icon
import { faPen } from '@fortawesome/free-solid-svg-icons'
import { faMinus } from '@fortawesome/free-solid-svg-icons'
import { faXmark } from '@fortawesome/free-solid-svg-icons'
import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { faChevronLeft } from '@fortawesome/free-solid-svg-icons'
import { faArrowRight } from '@fortawesome/free-solid-svg-icons'
import { faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faFacebookF } from '@fortawesome/free-brands-svg-icons'
library.add(faPen, faMinus, faXmark, faChevronDown, faChevronRight, faChevronLeft, faArrowRight, faInstagram, faFacebookF)

//切換router後頁面跳到最上面
router.afterEach(() => {
    window.scrollTo(0,0);
});

createApp(App).use(store).use(router).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
