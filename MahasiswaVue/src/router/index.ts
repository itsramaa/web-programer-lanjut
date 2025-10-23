import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/mahasiswa',
      name: 'list',
      component: () => import('../views/mahasiswa/ListView.vue'),
    },
    {
      path: '/mahasiswa/create',
      name: 'create',
      component: () => import('../views/mahasiswa/CreateView.vue'),
    },
    {
      path: '/mahasiswa/:id',
      name: 'edit',
      component: () => import('../views/mahasiswa/EditView.vue'),
    },
  ],
})

export default router
