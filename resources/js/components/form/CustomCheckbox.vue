<template>
  <input type="checkbox" v-model="model" :value="value" />
  <span>{{ label }}</span>
</template>

<script setup >
import { computed, defineEmits } from "vue";
const props = defineProps({
  modelValue: { type: [Array, Boolean] },
  value: { type: [Boolean, Object] },
  label: { type: String },
});
const emit = defineEmits(["update:modelValue"]);
const model = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>