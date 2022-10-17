import { createRouter, createWebHistory } from 'vue-router'

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
            import ( /* webpackChunkName: "index" */ '../components/OC/SolicitudOrdenCompra')
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: 'active'
})

export default router