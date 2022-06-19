import { createStore} from 'vuex'
import categories from './modules/categories';


export default createStore({
    modules: {
        categories,
      },
    //   strict: debug,
    //   plugins: debug ? [createLogger()] : []
})