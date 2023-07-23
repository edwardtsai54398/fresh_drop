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


library.add(faPen)
library.add(faUserSecret)
library.add(faXmark)
library.add(faArrowLeft)
library.add(faSliders)
library.add(faBoxOpen)
library.add(faBoxArchive)
library.add(faPlus)
library.add(faBowlFood)
library.add(faTrashCan)
library.add(faMinus)
library.add(faEllipsisVertical)


createApp(App).use(store).use(router).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
