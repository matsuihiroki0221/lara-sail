import { createRouter, createWebHistory } from "vue-router"
import ProductRouter from "../router/product-router"
import orderRouter from "./order-router"
import Test from "../components/Test.vue"
import NotFound from "../components/not-found.vue"
import HeaderProduct from "../components/header/header-product.vue"
import Login from "../components/Login.vue"
import Logout from "../components/Logout.vue"
import OrderStatus from "./order-status"

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
    { ...ProductRouter },
    { ...orderRouter },
    {...OrderStatus },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {guestOnly: true}
    },
    {
        path: "/logout",
        name: "Logout",
        component: Logout,
        meta: {authOnly: true}
    },
]

const isLogin = () => {
    return localStorage.getItem("auth");
}



const router = createRouter({
    history: createWebHistory(),
    routes: routes, 
})

router.beforeEach((to, from, next) => {
    if (to.meta.authOnly) {
        if (!isLogin()) {
            next("/login");
        } else {
            next();
        }
    } else if (to.meta.guestOnly) {
        if (isLogin()) {
            next("/logout");
        } else {
            next();
        }
    } else {
        next();
    }
});

  
export default router;