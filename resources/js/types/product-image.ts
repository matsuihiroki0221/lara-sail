

interface ProductImage {
    id: null | number;
    basic_product_id: null | number;
    name :string;
    path: string;
}

const DefaultProductImage:ProductImage = {
    id: null,
    basic_product_id: null,
    name: '',
    path: '',
}

export { ProductImage, DefaultProductImage}