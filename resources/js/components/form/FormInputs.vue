<script setup>
  import { ref } from 'vue';

  const props = defineProps({
    label: {
      type: String,
      required: true,
    },
    labelSecond: {
      type: String,
      required: false,
    },
    option: {
      type: String,
      required: false,
    },
    fieldName: {
      type: String,
      required: true,
    },
    fieldId: {
      type: String,
      required: true,
    },
    placeholder: {
      type: String,
      required: true,
    },
    inputType: {
      type: String,
      default: 'text',
    },
    modelValue: {
      type: String,
      required: false,
    },
    errorMessage: {
      type: String,
      required: false,
    },
  });

  const checkForInput = (event) => {
    const input = event.target;
    if (input.value !== '') {
      input.classList.add('!ring-white');
    } else {
      input.classList.remove('!ring-white');
    }
  };

  const emits = defineEmits(['update:modelValue']);
</script>

<template>
  <div class="space-y-2 px-2 sm:space-y-0 sm:px-6 sm:py-5 mb-5 md:md-0">
    <div class="mb-3.5">
      <label :for="fieldId" class="block text-lg font-medium leading-6 text-white sm:mt-1.5">
        {{ label }}
        <span class="text-white/50 text-sm">{{ option }}</span>
      </label>
      <label class="block text-sm sm:text-base text-white/50 sm:mt-1.5">{{ labelSecond }}</label>
    </div>
    <div class="sm:col-span-2">
      <input
        v-if="inputType !== 'textarea'"
        :type="inputType"
        :name="fieldName"
        :id="fieldId"
        :placeholder="placeholder"
        class="block font-normal text-sm sm:text-base bg-transparent w-full border rounded-full py-2 px-4 text-white ring-1 ring-inset ring-white/20 placeholder:text-white/25 focus:ring-1 focus:ring-inset focus:ring-unlimited-500 border-none"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        @change="checkForInput($event)"
      />
      <textarea
        v-else
        :name="fieldName"
        :id="fieldId"
        :placeholder="placeholder"
        class="block font-normal text-sm sm:text-base bg-transparent w-full h-28 sm:h-16 border rounded-3xl py-2 px-4 text-white ring-1 ring-inset ring-white/20 placeholder:text-white/25 focus:ring-1 focus:ring-inset focus:ring-unlimited-500 border-none"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        @change="checkForInput($event)"
      ></textarea>
      <div v-if="errorMessage" class="form-error mt-2 px-4 py-2 border-2 rounded-full border-unlimited-600 text-white text-center text-sm font-medium leading-6">{{ errorMessage }}</div>
    </div>
  </div>
</template>