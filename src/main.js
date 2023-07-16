import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app')

// view-ui-plus
// import ViewUIPlus from 'view-ui-plus'
// import 'view-ui-plus/dist/styles/viewuiplus.css'

// const app = createApp(App)
// app.use(store).use(router)
// app.use(ViewUIPlus)
// app.mount('#app')


