import http from './../http-common';
import { AxiosPromise } from 'axios';

class SalesProductService {
    public commonUrl = "/sales_product";

    //一覧取得
    getIndex(): AxiosPromise<any> {
        return http.get<any>(this.commonUrl);
    
    }
    // 詳細取得
    getDetail(id:any): AxiosPromise<any> {
        return http.get<any>(this.commonUrl + '/' + id );
    }
    
    // 新規登録
    storeSalesProduct(data: any): AxiosPromise<Boolean> {
        return http.post<Boolean>( this.commonUrl, data);
    }

    // 更新
    updateSalesProduct(data: any, id:any): AxiosPromise<Boolean> {
        return http.post<Boolean>(this.commonUrl + "/"+ id, data);
    }

    //削除
    deleteSalesProduct(id:any):AxiosPromise<Boolean> {
        return http.delete<Boolean>(this.commonUrl + "/"+ id);
    }
}

export default new  SalesProductService();