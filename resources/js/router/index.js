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
        path: '/solicitud-compra-edit',
        name: 'EditCompra',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/EditCompra')
    },
    {
        path: '/solicitud-compra-validacion',
        name: 'SolicitudCompraValidacion',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/validations/Index')
    },
    {
        path: '/orders-buy',
        name: 'OrderBuy',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/orders_buy/IndexProvider')
    },
    {
        path: '/orders-buy-create',
        name: 'OrderBuyCreate',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/orders_buy/Create')
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
        path: '/form',
        name: 'Form',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/steps/Form')
    },
    {
        path: '/confirmation',
        name: 'Confirmation',
        component: () =>
            import ( /* webpackChunkName: "index" */ '../components/solicitudes/steps/Confirmation')
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
