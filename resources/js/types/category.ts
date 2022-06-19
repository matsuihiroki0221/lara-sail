import {Product} from './product';

interface Category {
    id?: number ;
    name: string;
    products: Product[];
}

const DefaultCategory:Category = {
    name: '',
    products:[],
}

export { Category, DefaultCategory}