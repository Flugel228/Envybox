<script setup lang="ts">
import {withDefaults, defineProps, defineEmits} from "vue"
import {IProps, IEmit} from "@/types/components/textareas/default-textarea";

const props = withDefaults(defineProps<IProps>(), {
  value: '',
  width: '100%'
})

const emit = defineEmits<IEmit>();

const updateValue = (e: InputEvent) => {
  emit("update:value", (e.target as HTMLTextAreaElement).value)
}
</script>

<template>
  <div :style="{width: width}">
    <label :for="props.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ props.label }}</label>
    <textarea :id="props.name"
              :name="props.name"
              rows="4"
              class="border border-neutral-900 rounded p-2 w-full bg-gray-500/10 text-neutral-900"
              :placeholder="props.placeholder"
              :value="props.value"
              @input="updateValue"
    ></textarea>
    <div
        class="mb-3 error-content text-red-600"
        v-for="error in errors"
        :key="error.$uid"
    >
      <p>{{ error.$message }}</p>
    </div>
  </div>
</template>

<style scoped>

</style>