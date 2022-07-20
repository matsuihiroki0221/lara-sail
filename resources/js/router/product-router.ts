import HeaderProduct from '../components/header/header-product.vue'
import ShowProductList from "../components/main/basic-product-information/show-product-list.vue";
import ShowProductDetail from "../components/main/basic-product-information/show-product-detail.vue";
import CreateProduct from "../components/main/basic-product-information/create-product.vue";

export default 
{
    path: '/product',
    component: HeaderProduct,
    children:
        [
            {
                path: 'productList',
                component: ShowProductList,
                name: 'ProductList',
                meta: {authOnly: true}
            },
            {
                path: 'productDetail/:productId',
                component: ShowProductDetail,
                name: 'ProductDetail',
                meta: {authOnly: true}
            },
            {
                path: 'createProduct',
                component: CreateProduct,
                name: 'CreateProduct',
                meta: {authOnly: true}
            },
        ]
}