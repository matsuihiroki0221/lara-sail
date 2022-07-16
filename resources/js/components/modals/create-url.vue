<template>
    <teleport to="body">
        <div class="modal-back" id="url-create" v-show="isVisible" @click="close"></div>
        <div class="modal-contents" v-show="isVisible">
            <p>
                テーブル毎にURLを作成します。<br>
            </p>
            <p class="w-100">
                <label class="typo__label">テーブル番号</label>
                    <Multiselect
                    v-model="selectTableNumber"
                    mode="tags"
                    placeholder="テーブル番号を選択してください"
                    :close-on-select="false"
                    :options="tableNumbers"
                    :searchable="true"
                :createTag="true"
                />
            </p>
            <div v-if="selectTableNumber.length > 0 ">
                <p v-for="No  in selectTableNumber" :key="No">
                    <span>{{No}}</span>
                    <vue-qrcode value="process.env.MIX_APP_API_BASE_URL + '//' + No"></vue-qrcode>
                </p>
            </div>
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
        const storeId = ref(route.params.storeId);
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
            storeId,
            selectTableNumber,
            tableNumbers,
            close
        }
    },
})
</script>

<style src="@vueform/multiselect/themes/default.css"></style>