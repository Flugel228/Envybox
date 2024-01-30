<script setup lang="ts">
import {computed, reactive} from "vue";
import {helpers, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {Form} from "@/types/store/modules/forms";
import DefaultInputComponent from "@/components/inputs/DefaultInputComponent.vue";
import DefaultTextareaComponent from "@/components/textareas/DefaultTextareaComponent.vue";
import {useStore} from "vuex";

const store$ = useStore();
const state = reactive<Form>({
  name: '',
  appeal: ''
});

const rules = computed(() => ({
  name: {
    required: helpers.withMessage('Это поле обязательно для заполнения.', required)
  },
  appeal: {
    required: helpers.withMessage('Это поле обязательно для заполнения.', required)
  }
}));

const v$ = useVuelidate(rules, state);

const submitForm = async (): Promise<void> => {
  const isFormCorrect = await v$.value.$validate();

  if (isFormCorrect) {
    await store$.dispatch('forms/SUBMIT_FEEDBACK', state);
  } else {
    alert('Заполните все поля!');
  }
}
</script>

<template>
  <form>
    <div class="flex flex-col">
      <default-input-component name="name"
                               placeholder="Введите имя"
                               :errors="v$.name.$errors"
                               v-model:value="v$.name.$model"
                               label="Имя"/>
      <default-textarea-component name="appeal"
                                  placeholder="Введите текст обращения"
                                  v-model:value="v$.appeal.$model"
                                  label="Обращение"
                                  :errors="v$.appeal.$errors"
      />
      <button class="p-2 bg-blue-700 rounded border border-neutral-900 text-lg text-white w-8/12 font-semibold mt-5"
              @click.prevent="submitForm"
      >
        Отправить
      </button>
    </div>
  </form>
</template>

<style scoped>

</style>