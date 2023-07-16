import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routesUser = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/shop',
    name: 'shop',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/ShopView.vue')
  },
  {
    path: '/product',
    name: 'product',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/ProductView.vue')
  },
  {
    path: '/login',
    name: 'login',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/LoginView.vue')
  },
  {
    path: '/giftcard',
    name: 'giftcard',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/GiftcardView.vue')
  },
  {
    path: '/game',
    name: 'game',

    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/GameView.vue')
  },
  {
    path: '/meat',
    name: 'meat',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/MeatView.vue')
  },
  {
    path: '/carousel',
    name: 'carousel',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/CarouselView.vue')
  },
  {
    path: '/pay',
    name: 'pay',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/PayView.vue')
  },
  {
    path: '/product/:id',
    name: 'productDetail',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/ProductView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routesUser
})

export default router
