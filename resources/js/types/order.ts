import { Product,DefaultProduct } from './product'

interface Order {
    id: number;
    number_purchases: number;
    sales_detail_id: number;
    product: Product;
    status: number;
    table_no: number;
    created_at: string;
    finished_at: string;
}

const DefaultOrder :Order = {
    id: 0,
    number_purchases: 0,
    sales_detail_id: 0,
    product: DefaultProduct,
    status: 0,
    table_no: 0,
    created_at: '',
    finished_at: ''
}

export { Order, DefaultOrder}