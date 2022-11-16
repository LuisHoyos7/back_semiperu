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
        path: '/vouchers',
        name: 'Vouchers',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/vouchers/Index')
    },
    {
        path: '/vouchers-create',
        name: 'VoucherCreate',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/vouchers/Create')
    },
    {
        path: '/personal',
        name: 'Personal',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/components/PersonalDemo')
    },
    {
        path: '/seat-demo',
        name: 'Seat',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/components/SeatDemo')
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
