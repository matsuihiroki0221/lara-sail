<template>
    <teleport to="body">
        <div class="modal" id="tag-create" v-show="isVisible" @click="close"></div>
        <div class="modal-content" v-show="isVisible && productId !==0">
            <div class="card">
                <img :src="product.images[0].path" class="card-img-top" v-if="product.images.length">
                <div class="card-body">
                    <h5 class="card-title">{{product.name}}</h5>
                    <h5 class="card-title">{{product.price}}円</h5>
                    <p class="card-text">{{product.explanation}}</p>
                    <p>
                        <select class="form-select" v-model="orderNumber">
                            <option v-for="n in 10" :key="n-1" :value="n-1">
                                {{ n-1 }} 
                            </option>
                        </select>
                    </p>
                    <p>
                        <button type="button" class="btn btn-primary" @click="order()">注文する</button>
                    </p>
                </div>
            </div>
        </div>
    </teleport>
</template>
<script lang="ts">
import { defineComponent, onMounted, ref , watch  } from 'vue'
import { Product, DefaultProduct } from '../../../types/product'
import { useToast } from 'vue-toastification'
import ProductService from '../../../services/apis/product-service'
import SalesProductService from '../../../services/apis/sales-product-service'

export default defineComponent({
    props: {
        isVisible: {
            required: true,
            type:Boolean,
            default: false,
        },
        productId: {
            required: true,
            type: Number,
            defalult: 0
        },
        tableNo: {
            required:true,
            type: Number,
            defalult:0
        },
        branchId : {
            required: true,
            type: Number,
            defaoult: 0,
        }
    },
    setup(props,context) {
        const product = ref<Product>({...DefaultProduct})
        const orderNumber = ref<Number>(0);
        const toast = useToast();

        const getProduct = ():void => {
            if(props.productId !== 0) {
                ProductService.getDetail(props.productId).then(res => {
                    const {data} = res;
                    console.log(data);
                    product.value = data;
                })
            } else {
                product.value = DefaultProduct;
            }
        }

        const order = ():void => {
            const order_content = {
                product_id: props.productId,
                number_purchases: orderNumber.value
            }
            const other_info = {
                branch_id:1,
                sales_detail_id:5,
                table_no:1
            }
            const saveData= {
                order_content,
                other_info
            }

            SalesProductService.storeSalesProduct(saveData).then(res => {
                toast.success("注文しました", {
                    timeout:2000
                });
                context.emit('close');
            }).catch(
                error => {
                    toast.error("注文に失敗しました", {
                        timeout:2000
                    })
                }
            )



        }
        const close = ():void => {
            context.emit('close')
        }

        watch(props, (props) => {
            getProduct();
        })

        onMounted(
            getProduct,
        )
        return {
            product,
            order,
            orderNumber,
            close
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

    background-color: white
    width: 600px
    height: auto
    border-radius: 20px
    padding: 20px

.card
    border: none !important

</style>