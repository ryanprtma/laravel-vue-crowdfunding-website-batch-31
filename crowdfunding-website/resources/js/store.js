import Vue from 'vue'
import Vuex from 'vuex'
import transaction from './stores/transaction.js'
import alert from './stores/alert'
import auth from './stores/auth'
import dialog from './stores/dialog'
import VuexPersist from 'vuex-persist'

const vuexPersist = new VuexPersist({
    key:'crowdfunding',
    storage:localStorage
})

Vue.use(Vuex)

export default new Vuex.Store({
    plugins:[vuexPersist.plugin],
    modules:{
        transaction,
        alert,
        auth,
        dialog
    }
})