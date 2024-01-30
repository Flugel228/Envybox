import {
    Actions,
    ActionsTypes,
    AugmentedActionContext,
    Form,
    Getters,
    GettersTypes,
    Mutations,
    MutationsTypes,
    State
} from "@/types/store/modules/forms";
import {ActionTree, GetterTree, Module, MutationTree} from "vuex";
import axios from "axios"
import {API_URL} from "@/config";

const state: State = {
    formsList: []
}

const getters: GetterTree<State, any> & Getters = {
    [GettersTypes.GET_FORMS]: (state: State): Form[] => state.formsList
}

const mutations: MutationTree<State> & Mutations = {
    [MutationsTypes.ADD_FORM]: (state: State, payload: Form): void => {
        state.formsList.push(payload);
    }
}

const actions: ActionTree<State, any> & Actions = {
    [ActionsTypes.SUBMIT_FEEDBACK]: async ({commit}: AugmentedActionContext, payload: Form): Promise<void> => {
        try {
            const res = await axios.post(`${API_URL}/api/feedback`, payload)
            commit(MutationsTypes.ADD_FORM, payload)
            alert(res.data.message);
        } catch (e) {
            if (axios.isAxiosError(e)) {
                console.log(e.response?.data.error)
            } else if (e instanceof Error) {
                console.log(e.message);
            }
            alert('Произошла ошибка при отправке формы!')
        }
    }
}

const module: Module<State, any> = {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}

export default module;