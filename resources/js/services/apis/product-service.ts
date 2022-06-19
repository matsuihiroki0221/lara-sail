import http from './../http-common';
import { AxiosPromise } from 'axios';
import{ Product } from '../../types/product'

class ProductService {
    public commonUrl = "/products";

    //一覧取得
    getIndex(): AxiosPromise<Product[]> {
        return http.get<Product[]>(this.commonUrl);
    
    }
    // 詳細取得
    getDetail(id:any): AxiosPromise<Product> {
        return http.get<Product>(this.commonUrl + '/' + id );
    }
    
    // 新規登録
    storeProduct(data: FormData): AxiosPromise<Boolean> {
        return http.post<Boolean>( this.commonUrl, data);
    }

    // 更新
    updateProduct(data: FormData, id:any): AxiosPromise<Boolean> {
        return http.post<Boolean>(this.commonUrl + "/"+ id, data);
    }

    //削除
    deleteProduct(id:any):AxiosPromise<Boolean> {
        return http.delete<Boolean>(this.commonUrl + "/"+ id);
    }
}

export default new ProductService();