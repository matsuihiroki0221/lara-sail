<template>
    <div>
        <button type="button" @click="logout">ログアウト</button>
    </div>  
</template>

<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import { useRoute, useRouter } from 'vue-router'

export default defineComponent({
    setup() {
        const router = useRouter();
        const logout = () => {
            axios.post("api/logout")
                .then(res => {
                    localStorage.removeItem("auth")
                    router.push({
                        name:"Login"
                    })
                    .catch(err => {
                        console.log(err)
                    })
                })
        }
        return {
            logout
        }
    },
})
</script>
