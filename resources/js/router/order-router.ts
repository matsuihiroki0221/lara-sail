import OrderHeader from "../components/header/order-header.vue";
import OrderProductList from "../components/main/order-screen/product-list.vue"

export default {
    path:'/order',
    component: OrderHeader,
    children: [
        {
            path: 'list/:storeId/:tableNo',
            component: OrderProductList,
            name: 'OrderProductList',
        }
    ]
}