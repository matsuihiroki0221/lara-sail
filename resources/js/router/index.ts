import { createRouter, createWebHistory } from "vue-router"
import ProductRouter from "../router/product-router"
import orderRouter from "./order-router"
import Test from "../components/Test.vue"
import NotFound from "../components/not-found.vue"
import HeaderProduct from "../components/header/header-product.vue"
import Login from "../components/Login.vue"
import Logout from "../components/Logout.vue"
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
    { ...orderRouter},
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/about",
        name: "About",
        component: Logout,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes, 
})
  
export default router;