const state = () => ({
    storeId: 0
})

const getters = {}

const mutations = {
    getStoreId (state:any, getId:number) {
        state.storeId = getId;
    }
}

const actions = {
    getStoreId({commit}: {commit:any}, getId : number) {
        commit('getStoreId', getId)
    }
}

export default{
    namespaced:true,
    state,
    actions,
    mutations
}