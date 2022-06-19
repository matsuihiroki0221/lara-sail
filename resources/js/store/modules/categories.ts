import CategoryService from "../../services/apis/category-service"

const state = () => ({
    all:[]
})

const getters = {
    all:(state:any) => state.all
}

const actions = {
    getAllCategories ({ commit }: {commit: any}) {
         CategoryService.getIndex().then(
             res => {
                const {data} = res;
                commit('setCategories', data)
             }
         );
    },
    storeCategory({dispatch,commit}: {dispatch:any,commit:any},savaData:any) {
        CategoryService.storeCategory(savaData).then(
            res => {
                dispatch('getAllCategories')
            }
        )
    },
    destroyCategory({dispatch,commit}: {dispatch:any,commit:any},id:number) {
        CategoryService.deleteCategory(id).then(
            res => {
                dispatch('getAllCategories')
            }
        )
    }
}

//mutaions
const mutations = {
    setCategories(state:any, categories:any) {
            state.all = categories
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
  }