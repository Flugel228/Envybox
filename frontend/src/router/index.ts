import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'first',
    component: () => import('../views/FirstView.vue')
  },
  {
    path: '/second',
    name: 'second',
    component: () => import('../views/SecondView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
