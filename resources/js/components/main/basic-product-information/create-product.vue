<template>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">商品名</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" v-model="newProduct.name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">金額</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="金額：10000" v-model="newProduct.price">
        </div>
        <div>税込み区分</div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value=1 v-model="newProduct.tax_class">
            <label class="form-check-label" for="flexRadioDefault1">
                Default radio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value=1 v-model="newProduct.tax_class" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Default checked radio
            </label>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">商品説明</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="newProduct.explanation"></textarea>
        </div>
        <div class="mb-3">
            <label class="typo__label">カテゴリ</label>
            <Multiselect
                v-model="newProduct.categories"
                mode="tags"
                placeholder="カテゴリを選択してください"
                :options="tagsIndex"
                :searchable="true"
                :createTag="true"
            />
        </div>
        <div class="">
            <div>
                <input type="file" multiple class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" @change="fileSelected">
            </div>
            <div>
                画像プレビュー
            </div>
            <div v-for="url in previewUrl" :key="url">
                <img :src="url" class="img-fluid" alt="画像">
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary mt-3" @click="storeProduct()">送信</button>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, reactive, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useToast } from "vue-toastification";
import Multiselect from '@vueform/multiselect';
import { Product, DefaultProduct } from '../../../types/product';
import ProductService from "../../../services/apis/product-service"
import categoryService from '../../../services/apis/category-service';

export default defineComponent({
    components: {
        Multiselect
    },
    setup() {
        const router = useRouter();
        const toast = useToast();
        const fileInfo = ref<any>([]);
        const previewUrl = ref<any>([]);
        const newProduct:Product = reactive(DefaultProduct);
        const tagsIndex = ref([]);

        const fileSelected = (event:any) => {
            fileInfo.value = [];
            previewUrl.value = [];
            for (const file of event.target.files) {
                fileInfo.value.push(file);
                previewUrl.value.push(URL.createObjectURL(file));
            }
        };

        const storeProduct =  ():any => {
           const formData  = new FormData();
            fileInfo.value.forEach((file: string | Blob, index: string) => {
               formData.append('files[' + index + ']', file)
            });
            formData.append('product', JSON.stringify(newProduct));

            ProductService.storeProduct(formData).
                then(res => {
                    console.log(res);
                    router.push({name: 'ProductList'})
                    
                })
                .catch(error => {
                    console.log(error.response.data);
                    toast.error(error.response.data.message, {
                        timeout: 2000
                    });
                });
        }

        const getTags = () => {
            categoryService.getTags().then(res => {
                const {data} = res;
                tagsIndex.value = data;
            })
        }
        onMounted(
            () => {
                getTags();
            }
        )

        return {
            newProduct,
            fileInfo,
            previewUrl,
            storeProduct,
            fileSelected,
            tagsIndex
        }
    },
})
</script>


<style src="@vueform/multiselect/themes/default.css">

</style>