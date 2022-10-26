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
        path: '/solicitud-compra',
        name: 'SolicitudCompra',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/Compra')
    },
    {
        path: '/orders-buy',
        name: 'OrderBuy',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/orders_buy/IndexProvider')
    },
    {
        path: '/acts',
        name: 'Acts',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/acts/Index')
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
