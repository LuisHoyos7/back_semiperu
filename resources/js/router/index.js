import { createRouter, createWebHistory } from 'vue-router'
import NotFound from '../components/errors/NotFound'

const routes = [{
        path: '/',
        name: 'Index',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/partials/Index')
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/partials/Index')
    },
    {
        path: '/solicitud-orden-compra',
        name: 'SolicituOrdenCompra',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/OrdenCompra')
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: 'active'
})

export default router
