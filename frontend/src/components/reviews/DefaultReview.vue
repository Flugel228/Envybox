<script setup lang="ts">
import {withDefaults, defineProps} from "vue"
import {IProps} from "@/types/components/reviews/default-review";

const props = withDefaults(defineProps<IProps>(), {});
</script>

<template>

    <div class="flex justify-center">
      <div class="max-w-3xl">
        <div
            class="m-4 block rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-800 dark:shadow-black/20">
          <!--Testimonial-->
          <div class="md:flex md:flex-row">
            <div class="md:ml-6">
              <p
                  class="mb-6 font-light text-neutral-500 dark:text-neutral-300">
                {{ props.form.appeal }}
              </p>
              <p
                  class="mb-2 text-xl font-semibold text-neutral-800 dark:text-neutral-200">
                {{ props.form.name}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<style scoped>

</style>