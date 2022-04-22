import HeaderProduct from "../components/bascic-product-information/header-product.vue";
import ShowProductList from "../components/bascic-product-information/show-product-list.vue";
import CreateProduct from "../components/bascic-product-information/create-product.vue";

export default 
{
    path: '/product',
    component: HeaderProduct,
    children:
        [
            {
                path: 'productList',
                component: ShowProductList,
                name: 'ShowProductList'
            },
            {
                path: 'createProduct',
                component: CreateProduct,
                name: 'CreateProduct'
            },
        ]
}