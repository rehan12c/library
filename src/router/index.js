import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/buku',
      name: 'buku',
      component: () => import('../views/BukuView.vue')
    },
    {
      path: '/insert-buku',
      name: 'insert',
      component: () => import('../components/InsertBuku.vue')
    },
    {
      path: '/kategori',
      name: 'kategori',
      component: () => import('../views/KategoriView.vue')
    },
    {
      path: '/anggota',
      name: 'anggota',
      component: () => import('../views/AnggotaView.vue')
    },
    {
      path: '/insert-kategori',
      name: 'InsertKategori',
      component: () => import('../components/InsertKategori.vue')
    },
    {
      path: '/insert-anggota',
      name: 'InsertAnggota',
      component: () => import('../components/InsertAnggota.vue')
    },
    {
      path: '/edit-anggota/:id',
      name: 'EditAnggota',
      component: () => import('../components/UpdateAnggota.vue')
    },
    {
      path: '/edit-buku/:id',
      name: 'EditBuku',
      component: () => import('../components/UpdateBuku.vue')
    },
    {
      path: '/edit-kategori/:id',
      name: 'EditKategori',
      component: () => import('../components/UpdateKategori.vue')
    },
    {
      path: '/peminjaman',
      name: 'peminjaman',
      component: () => import('../views/PeminjamanView.vue')
    },
    {
      path: '/peminjaman-master',
      name: 'PeminjamanMaster',
      component: () => import('../components/PeminjamanMasterView.vue')
    },
    {
      path: '/detail-pinjaman/:id',
      name: 'PeminjamanDetail',
      component: () => import('../views/PeminjamanDetailView.vue')
    }
  ]
})

export default router
