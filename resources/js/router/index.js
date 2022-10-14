import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Index',
    component: () => import(/* webpackChunkName: "index" */ '../components/partials/Index')
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import(/* webpackChunkName: "index" */ '../components/partials/Index')
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
