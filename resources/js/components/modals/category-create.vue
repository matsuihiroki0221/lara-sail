<template>
    <teleport to="body">
        <div class="modal" id="tag-create" v-show="isVisible" @click="close"></div>
        <div class="modal-content" v-show="isVisible">
            <h3>カテゴリ―一覧・作成</h3>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputName" class="col-form-label">カテゴリ名</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputName" class="form-control" v-model="newCategory.name">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success" @click="storeCategory">
                        作成する
                    </button>
                </div>
            </div>
            <div class="w-100">
                <div v-if="categories.length === 0" class="alert alert-info mt-3">
                        カテゴリが登録されておりません。<br>
                        カテゴリを登録することで、商品のカテゴリを作成し、今後商品をカテゴリ別で管理することができます。
                </div>
                <div v-else>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">カテゴリ名</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in categories" :key="index">
                                <td>{{category.name}}</td>
                                <td>
                                    <button class="btn btn-warning" @click="destroy(category.id)">
                                        削除
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </teleport>
</template>
<script lang="ts">
    import { defineComponent,ref,reactive, onMounted, computed } from 'vue';
    import { Category,DefaultCategory } from '../../types/category';
    import categoryService from '../../services/apis/category-service';
    import Loading from '../../Loading.vue';
    import { useToast } from 'vue-toastification';
    import { useStore } from 'vuex';

    export default defineComponent({
        props: {
            isVisible: {
                required: true,
                type:Boolean,
                default: false,
            }
        },
        components : {
            Loading
        }, 
        setup(props,context) {
            const store = useStore();
            const newCategory= ref<Category>(DefaultCategory);
            const categories= computed(() => store.state.categories.all)

            
            const toast = useToast();

            const getCategories = () => {
                store.dispatch('categories/getAllCategories')
            }

            const storeCategory = () => {
                store.dispatch('categories/storeCategory', newCategory.value);
                
            }
            const destroy = (id:number|undefined) => {
                store.dispatch('categories/destroyCategory', id);
            }

            onMounted(
                getCategories,
            )
        
            const close = () => {
                context.emit('close');
            }

            return {
                
                categories,
                newCategory,
                //method
                close,
                storeCategory,
                destroy,
                
            }
        },
    })
</script>

<style scoped lang='sass'>
.modal
  position: fixed
  top: 0
  right: 0
  bottom: 0
  left: 0
  background-color: rgba(0,0,0,.5)
  display: flex
  flex-direction: column
  align-items: center
  justify-content: center
  z-index: 1

.modal-content
  position: fixed
  top: 50%
  left: 50%
  transform: translate(-50%, -50%)
  background-color: rgba(0,0,0,.5)
  display: flex
  flex-direction: column
  align-items: center
  justify-content: center
  z-index: 2
  
  // モーダルの幅や色などはお好きにどうぞ！
  background-color: white
  width: 600px
  height: auto
  border-radius: 20px
  padding: 20px

</style>
