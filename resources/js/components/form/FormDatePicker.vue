<script setup>
import { ref } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
  label: {
    type: String,
    required: true,
  },
  labelSecond: {
    type: String,
    required: false,
  },
  fieldId: {
    type: String,
    required: true,
  },
  fieldName: {
    type: String,
    required: true,
  },
  placeholder: {
    type: String,
    required: true,
  },
  option: {
    type: String,
    required: false,
  },
  errorMessage: {
    type: String,
    required: false,
  },
});

const minDate = new Date();

const formDate = ref();
const emit = defineEmits(['update:date'])

const updateDate = (newDate) => {
  emit('update:date', newDate);
};
</script>

<template>
  <div class="space-y-2 px-4 sm:space-y-0 sm:px-6 sm:py-5">
    <div class="mb-3.5">
      <label :for="fieldId" class="block text-lg font-medium leading-6 text-secondary-50 sm:mt-1.5">
        {{ label }}
        <span class="text-secondary-50/60 text-sm">{{ option }}</span>
      </label>
      <label class="block text-lg text-secondary-50/60 sm:mt-1.5">{{ labelSecond }}</label>
    </div>
    <div class="sm:col-span-2">
      <VueDatePicker
        v-model="formDate"
        @update:model-value="updateDate"
        :id="fieldId"
        :name="fieldName"
        :placeholder="placeholder"
        model-type="dd.MM.yyyy"
        format="dd.MM.yyyy"
        :enable-time-picker="false"
        :year-range="[2020, 2040]"
        :min-date="minDate"
        locale="de"
        cancelText="&#x2715"
        selectText="&#x2713"
        range
      />
      <div v-if="errorMessage" class="form-error mt-2 px-4 py-2 border-2 border-red-500 text-white text-center text-sm font-medium leading-6 text-secondary-50">{{ errorMessage }}</div>
    </div>
  </div>
</template>