<script setup lang="ts">
import {IProps, IEmit} from "@/types/components/inputs/default-input";
import {withDefaults, defineProps, defineEmits} from "vue"

const props = withDefaults(defineProps<IProps>(), {
  value: '',
  type: 'text',
  width: '100%'
})

const emit = defineEmits<IEmit>();

const updateValue = (e: InputEvent) => {
  emit("update:value", (e.target as HTMLInputElement).value)
}
</script>

<template>
  <div :style="{width: width}">
    <label :for="props.name" class="block mb-2 text-sm font-medium text-gray-900">{{ props.label }}</label>
    <input
        :id="props.name"
        class="border border-neutral-900 rounded p-2 w-full bg-gray-500/10 text-neutral-900"
        :type="props.type"
        :placeholder="props.placeholder"
        :name="props.name"
        :value="props.value"
        @input="updateValue"
    />
    <div
        class="mb-3 error-content text-red-600 w-full"
        v-for="error in errors"
        :key="error.$uid"
    >
      <p>{{ error.$message }}</p>
    </div>
  </div>
</template>

<style scoped>

</style>