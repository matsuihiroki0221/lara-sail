<template>
    <div>
        <h2>Login</h2>
        <p class="mt-2 text-danger">{{ getMessage }}</p>
        <form @submit.prevent="login">
            <label><input v-model="loginId" placeholder="ログインID"></label>
            <label><input v-model="pass" placeholder="password"></label>
            <br>
            <button type="submit">ログイン</button>
        </form>
    </div>
</template>

<script lang="ts">
import axios from 'axios';
import { defineComponent, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router';

export default defineComponent({
    setup() {
        const router = useRouter();
        const loginId = ref('');
        const pass = ref('')
        const error = ref(false)
        const getMessage = ref('')
        
        const login = () => {
            axios.get('/sanctum/csfr-cookie')
                .then((res) => {
                    axios.post('api/login', {
                        login_id :loginId.value,
                        password: pass.value,
                    })
                    .then((res) => {
                        if( res.data.status_code == 200) {
                            router.push({
                                name:"ProductList"
                            });
                        }
                        getMessage.value = 'ログインに失敗しました。';
                        }).catch((err) => {
                            console.log(err);
                            getMessage.value = 'ログインに失敗しました'
                        })
                    })
                     .catch((err) => {
                //
                })
                }
        

        return {
            loginId,
            pass,
            error,
            getMessage,
            login
        }
        }
    },
)
</script>
