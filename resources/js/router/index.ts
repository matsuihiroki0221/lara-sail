
import { createRouter, createWebHistory } from "vue-router";
import ProductRouter from "../router/product-router"
import Test from "../components/Test.vue";
import HeaderProduct from "../components/bascic-product-information/header-product.vue";

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
    { ...ProductRouter},
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes, 
  })
  

export default router;