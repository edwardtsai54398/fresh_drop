import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
const app = createApp(App)


///基本引入
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

//引入要用的icon
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { faPen } from '@fortawesome/free-solid-svg-icons'
import { faXmark } from '@fortawesome/free-solid-svg-icons'
import { faArrowLeft } from '@fortawesome/free-solid-svg-icons'
import { faSliders } from '@fortawesome/free-solid-svg-icons'
import { faBoxOpen } from '@fortawesome/free-solid-svg-icons'
import { faBoxArchive } from '@fortawesome/free-solid-svg-icons'
import { faPlus } from '@fortawesome/free-solid-svg-icons'
import { faBowlFood } from '@fortawesome/free-solid-svg-icons'
import { faTrashCan } from '@fortawesome/free-solid-svg-icons'
import { faMinus } from '@fortawesome/free-solid-svg-icons'
import { faEllipsisVertical } from '@fortawesome/free-solid-svg-icons'
import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { faChevronLeft } from '@fortawesome/free-solid-svg-icons'
import { faArrowRight } from '@fortawesome/free-solid-svg-icons'
import { faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faFacebookF } from '@fortawesome/free-brands-svg-icons'
import { faCircleCheck } from '@fortawesome/free-solid-svg-icons'
import { faCamera } from '@fortawesome/free-solid-svg-icons'
import { faArrowTurnDown } from '@fortawesome/free-solid-svg-icons'
import { faDollarSign } from '@fortawesome/free-solid-svg-icons'
import { faFloppyDisk } from '@fortawesome/free-solid-svg-icons'
import { faHandPointer } from '@fortawesome/free-solid-svg-icons'
library.add(faPen, faMinus, faXmark, faChevronDown, faChevronRight, faChevronLeft, faArrowRight, faInstagram, faFacebookF, faCircleCheck, faCamera, faArrowTurnDown, faDollarSign, faUserSecret, faArrowLeft, faBoxArchive, faSliders, faBoxOpen, faPlus, faBowlFood, faTrashCan, faEllipsisVertical, faFloppyDisk, faHandPointer)

//切換router後頁面跳到最上面
router.afterEach(() => {
  window.scrollTo(0, 0);
});

//全域引入axios
import axios from 'axios';
import VueAxios from 'vue-axios'
//開發用
// const apiURL = 'http://localhost/fresh_drop/public/phps/'
//上線用
const apiURL = 'https://tibamef2e.com/chd102/g2/phps/'

app.config.globalProperties.$url = apiURL

//firebase vue
import { VueFire, VueFireAuth } from 'vuefire'
import { firebaseApp } from '@/assets/js/firebase.js'
app.use(VueFire, {
  firebaseApp,
  modules: [

    VueFireAuth(),
  ]
})

app.use(store).use(router).use(VueAxios, axios).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
