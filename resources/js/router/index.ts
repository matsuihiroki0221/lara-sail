import { createRouter, createWebHistory } from "vue-router"
import ProductRouter from "../router/product-router"
import orderRouter from "./order-router"
import Test from "../components/Test.vue"
import NotFound from "../components/not-found.vue"
import HeaderProduct from "../components/header/header-product.vue"

const routes = [
    { 
        path: '/',
        component: HeaderProduct,
        children : [
            {
                path: "",
                component: Test
            }
        ]
    },
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
    { ...ProductRouter},
    { ...orderRouter}
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes, 
})
  
export default router;