<template>
    <teleport to="body">
        <div class="modal-back" id="url-create" v-show="isVisible" @click="close"></div>
        <div class="modal-contents" v-show="isVisible">
            <p>
                テーブル毎にURLを作成します。<br>
            </p>
            <p>
                <label class="typo__label"></label>
                <select class="form-select" multiple aria-label="multiple select example">
                    <Multiselect
                    v-model="selectTableNumber"
                    mode="tags"
                    placeholder=""
                    :options="tableNumbers"
                    :searchable="true"
                    :createTag="true"
                />
                </select>
            </p>
        </div>
        <div v-if="selectTableNumber.length ==0 ">
            <p v-for="No  in selectTableNumber" :key="No">
                <vue-qrcode value="process.env.MIX_APP_API_BASE_URL + '//' + No"></vue-qrcode>
            </p>
        </div>
   </teleport>
</template>
<script lang="ts">
import { defineComponent, onMounted, ref } from 'vue'
import Multiselect from '@vueform/multiselect'
import { useRoute } from 'vue-router'


export default defineComponent({
    props: {
            isVisible: {
                required: true,
                type:Boolean,
                default: false,
            }
        },
    components: {
        Multiselect
    },
    setup(props,context) {
        const route = useRoute()
        const branchId = ref(route.params.branchId);
        const baseUrl = ref(process.env.MIX_APP_API_BASE_URL);
        const selectTableNumber = ref<number[]>([]);
        const tableNumbers = ref<number[]>([]);

        const close = () => {
            context.emit('url-close');
        }

        const appendTableNumber = () => {
            for(let n = 1; n < 30; n++) {
                tableNumbers.value.push(n);
            }
        }

        onMounted(
            appendTableNumber
        )

        return {
            baseUrl,
            branchId,
            selectTableNumber,
            tableNumbers,
            close
        }
    },
})
</script>

<style scoped src="@vueform/multiselect/themes/default.css">

/* .modal{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(0,0,0,.5);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 1;
}
  

.modal-content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,.5);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 2;
    
    background-color: white;
    width: 600px;
    height: auto;
    border-radius: 20px;
    padding: 20px;
} */
</style>