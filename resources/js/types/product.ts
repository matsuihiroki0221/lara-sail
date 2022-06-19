import {ProductImage} from './product-image'
import {Category} from './category'

interface Product {
    id: null | number;
    name :string;
    price: number;
    tax_class: number;
    explanation: string;
    images: ProductImage[];
    categories: number[];
}

const DefaultProduct:Product = {
    id: null,
    name: '',
    price: 0,
    tax_class: 1,
    explanation: "",
    images: [],
    categories:[],
}

export { Product, DefaultProduct}