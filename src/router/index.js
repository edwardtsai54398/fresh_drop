import { createRouter, createWebHistory } from 'vue-router'
import FrontView from '../views/FrontView.vue'

const routesUser = [
  {
    path: '/',
    name: 'welcome',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: AboutView,
    component: () => import(/* webpackChunkName: "about" */ '../views/WelcomeView.vue'),
  },
  {
    path: '/front',
    name: 'front',
    component: FrontView,
    redirect: '/index',
    children: [
      {
        path: '/index',
        name: 'index',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/IndexView.vue')
      },
      {
        path: '/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
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
        path: '/member',
        name: 'member',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/Member/MbrIndexView.vue')
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
        path: '/giftcardprogress',
        name: 'giftcardprogress',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/GiftcardProgressView.vue')
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
        path: '/certified',
        name: 'certified',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/CertifiedView.vue')
      },
      {
        path: '/faq',
        name: 'faq',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/FaqView.vue')
      },
      {
        path: '/source',
        name: 'source',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: AboutView,
        component: () => import(/* webpackChunkName: "about" */ '../views/SourceView.vue')
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
      
    ]
  },



]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routesUser
})

export default router
