import http from './../http-common';
import { AxiosPromise } from 'axios';
import { Category } from '../../types/category';
import { useStore } from 'vuex';

class CategoryService {
    public store = useStore();
    public commonUrl = '/categories';

    //一覧取得
    getIndex(): AxiosPromise<Category[]> {
        return http.get<Category[]>(this.commonUrl);
    }

    //一覧取得
    getTags(): AxiosPromise<any> {
        return http.get<any>(this.commonUrl+'/tags_index');
    }

    // 詳細取得
    getDetail(id:any): AxiosPromise<Category> {
        return http.get<Category>(this.commonUrl + '/' + id );
    }

    // 新規登録
    storeCategory(data:any): AxiosPromise<Boolean> {
        return http.post<Boolean>( this.commonUrl, data);
    }

    // 更新
    updateProduct(data: any, id:any): AxiosPromise<Boolean> {
        return http.put<Boolean>(this.commonUrl + "/"+ id, data);
    }

    //削除
    deleteCategory(id:any):AxiosPromise<Boolean> {
        return http.delete<Boolean>(this.commonUrl + "/"+ id);
    }
}
export default new CategoryService();