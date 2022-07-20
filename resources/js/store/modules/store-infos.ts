const state = () => ({
    storeId: 0
})

const getters = {}

const mutaions = {
    getStoreId (state:any, getId:number) {
        state.storeId = getId;
    }
}

const actions = {
    getStoreIdAction({commit}: {commit:any}, getId : number) {
        commit('getStoreId', getId)
    }
}

export default{}