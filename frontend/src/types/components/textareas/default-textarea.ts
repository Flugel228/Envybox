import {ErrorObject} from "@vuelidate/core";

export interface IProps {
    errors?: ErrorObject[]
    value?: string
    name: string
    placeholder: string
    width?: string
    label: string
}

export interface IEmit {
    (e: 'update:value', value: string): void
}