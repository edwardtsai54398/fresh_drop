import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

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
library.add(faPen, faMinus, faXmark, faChevronDown, faChevronRight, faChevronLeft, faArrowRight, faInstagram, faFacebookF, faCircleCheck, faCamera, faArrowTurnDown, faDollarSign, faUserSecret, faArrowLeft, faBoxArchive, faSliders, faBoxOpen, faPlus, faBowlFood, faTrashCan, faEllipsisVertical,faFloppyDisk)

//切換router後頁面跳到最上面
router.afterEach(() => {
    window.scrollTo(0, 0);
});

createApp(App).use(store).use(router).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
