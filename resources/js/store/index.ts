import { createStore } from 'vuex'
import categories from './modules/categories'
import storeInfos from './modules/store-infos'
import createPersistedState from "vuex-persistedstate";


export default createStore({
    modules: {
        categories,
        storeInfos
      },
      plugins: [createPersistedState(
        {
          key: 'id',
          paths:[
            'storeInfos.id'
          ],
        storage: window.sessionStorage,
      }
      )],
})