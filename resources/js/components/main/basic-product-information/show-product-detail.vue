<template>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">商品名</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" v-model="product.name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">金額</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="金額：10000" v-model="product.price">
        </div>
        <div>税込み区分</div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value=1 v-model="product.tax_class">
            <label class="form-check-label" for="flexRadioDefault1">
                Default radio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value=1 v-model="product.tax_class" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Default checked radio
            </label>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">商品説明</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="product.explanation"></textarea>
        </div>
        <div>
            <label class="typo__label">カテゴリ</label>
            <Multiselect
                v-model="product.categories"
                mode="tags"
                placeholder="カテゴリを選択してください"
                :options="tagsIndex"
                :searchable="true"
                :createTag="true"
            />
        </div>
        <div>
            <div>
                画像一覧
            </div>
            <div v-if="product.images.length == 0 && previewUrl.length == 0">
                <p class="alert alert-success" role="alert">
                    画像が登録されていません
                </p>
            </div>
            <div v-else  class="input-group">
                <div v-for="(image, index) in product.images" :key="index">
                    <img :src="image.path" class="img-fluid" alt="イメージ画像" ><br>
                    <button type="button" class="btn btn-secondary" @click="deleteImage(index)">削除する</button>
                </div>
            </div>
            
            <div class="mt-3">
                <h3>
                    画像新規追加
                </h3>
                <input type="file" multiple class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" @change="fileSelected">
            </div>
            <div>
                画像プレビュー
            </div>
            <div v-for="url in previewUrl" :key="url">
                <img :src="url" class="img-fluid" alt="画像"><br>
                
            </div>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-primary" @click="sendData()">更新</button>
            <button type="button" class="btn btn-danger mx-3" @click="deleteData()">削除</button>
        </div>
    </div>
</template>

<script lang="ts">
    import { defineComponent, reactive, ref, onMounted } from 'vue';
    import Multiselect from '@vueform/multiselect';
    import { useRoute, useRouter } from 'vue-router'
    import { Product, DefaultProduct } from '../../../types/product';
    import ProductService from "../../../services/apis/product-service"
    import CategoryService from "../../../services/apis/category-service"

    export default defineComponent({
        components: {
            Multiselect,
        },
        setup() {
            const router = useRouter();
            const route = useRoute();
            const tagsIndex = ref([]);
            const fileInfo = ref<any>([]);
            const previewUrl = ref<any>([]);
            const product = ref<Product>(DefaultProduct);

            const fileSelected = (event:any) => {
                fileInfo.value = [];
                previewUrl.value = [];
                console.log(event.target.files);
                for (const file of event.target.files) {
                    fileInfo.value.push(file);
                    previewUrl.value.push(URL.createObjectURL(file));
                }
            };

            const getProduct =  ():any => {
                const productId = route.params.productId;
                ProductService.getDetail(productId)
                    .then(res => {
                        const {data} = res;
                        product.value = data;
                        getTags();
                        console.log(product.value);
                    })
            }

            const getTags = ():any => {
                CategoryService.getTags().then (
                    res=> {
                        const {data} = res;
                        tagsIndex.value = data;
                    }
                )
            }

            const deleteImage = (index:number):any => {
                product.value.images.splice(index,1);
                console.log(product);
            }

            const sendData = () => {
                const formData = new FormData();
                fileInfo.value.forEach((file: string | Blob, index: string) => {
                formData.append('files[' + index + ']', file)
                });
                formData.append('product', JSON.stringify(product.value));
                ProductService.updateProduct(formData, product.value.id)
                    .then(res => {
                        router.push({name: 'ProductList'})
                })    
            }

            const deleteData = () => {
                const productId = route.params.productId;
                ProductService.deleteProduct(productId)
                    .then(res => {
                        router.push({name: 'ProductList'});
                    })
            }

            onMounted(
                () => {
                    getProduct()
                }
            )

            return {
                product,
                tagsIndex,
                fileInfo,
                previewUrl,
                getProduct,
                fileSelected,
                deleteImage,
                sendData,
                deleteData,

            }
        },
})
</script>


<style src="@vueform/multiselect/themes/default.css"></style>