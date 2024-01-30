<script setup lang="ts">
import DefaultReview from "@/components/reviews/DefaultReview.vue";
import {useStore} from "vuex";
import {GettersTypes} from "@/types/store/modules/forms";
import {computed} from "vue";

const store$ = useStore();

const forms = computed(() => store$.getters[`forms/${GettersTypes.GET_FORMS}`])
</script>

<template>
  <section
      class="p-6 text-center md:text-left">
    <DefaultReview v-for="(form, id) in forms"
                   :key="id"
                   :form="form"
    />
  </section>
</template>

<style scoped>

</style>