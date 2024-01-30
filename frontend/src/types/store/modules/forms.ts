import {ActionContext} from "vuex";

export interface Form {
    name: string
    appeal: string
}

export interface State {
    formsList: Form[];
}

export enum GettersTypes {
    GET_FORMS = "GET_FORMS"
}

export enum MutationsTypes {
    ADD_FORM = "ADD_FORM"
}

export enum ActionsTypes {
    SUBMIT_FEEDBACK = "SUBMIT_FEEDBACK"
}

export interface Getters<S = State> {
    [GettersTypes.GET_FORMS](state: S): Form[]
}

export interface Mutations<S = State> {
    [MutationsTypes.ADD_FORM](state: S, payload: Form): void
}

export type AugmentedActionContext = {
    commit<K extends keyof Mutations>(
        key: K,
        payload: Parameters<Mutations[K]>[1]
    ): ReturnType<Mutations[K]>
} & Omit<ActionContext<State, State>, "commit">

export interface Actions {
    [ActionsTypes.SUBMIT_FEEDBACK](
        {commit}: AugmentedActionContext,
        payload: Form
    ): Promise<void>
}