<script setup>
import { ref, reactive, watch } from 'vue';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faPaperPlane } from '@fortawesome/free-regular-svg-icons'
/* add icons to the library */
library.add(faPaperPlane)

const props = defineProps({
  label: {
    type: String,
    required: true,
  },
  labelSecond: {
    type: String,
    required: false,
  },
  products: {
    type: Array,
    required: true,
  },
  modelValue: {
    type: Array,
    default: () => [],
  },
  errorMessage: {
    type: String,
    required: false,
  },
});

const getProductColumnClass = (index) => {
  return {
    'sm:col-span-1': index % 2 === 0,
    'sm:col-span-1': index % 2 === 1
  };
};

const emit = defineEmits(['update:modelValue']);

const modelValue = reactive(props.modelValue);

const handleChange = (event, value) => {
  // console.log('Checkbox state: ', event.target.checked);
  // console.log('Value: ', value);
  // console.log('Current modelValue: ', modelValue);

  if (event.target.checked) {
    // Add the value to the modelValue array
    modelValue.push(value);
  } else {
    // Find the index of the value in the modelValue array
    const index = modelValue.indexOf(value);

    // Remove the value from the modelValue array
    if (index !== -1) {
      modelValue.splice(index, 1);
    }
  }

  // console.log('New modelValue: ', modelValue);
  emit('update:modelValue', modelValue);
};
</script>

<template>
  <fieldset>
    <div class="p-3 flex flex-col sm:px-6 sm:pt-5 sm:pb-0">
      <legend class="block text-lg font-medium leading-6 text-white sm:mt-1.5">
        {{ label }}
      </legend>
      <label class="block text-sm sm:text-base text-white/50 sm:mt-1.5">{{ labelSecond }}</label>
    </div>
    <div class="mb-10">
      <div class="space-y-4 px-3 sm:grid sm:grid-cols-2 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
        <label
          v-for="(item, index) in products"
          :key="item.name"
          :class="[getProductColumnClass(index), 'group', 'transition', 'md:hover:bg-unlimited-500', 'relative', 'flex', 'sm:col-span-1', 'cursor-pointer', 'border', 'rounded-2xl', 'border-white/20', 'py-4', 'px-4', 'md:px-8', 'focus:outline-none', props.modelValue.includes(item.value) ? '!border-unlimited-500' : '']"
        >
        <input
            type="checkbox"
            :name="`services[${index}]`"
            :value="item.value"
            :checked="props.modelValue.includes(item.value)"
            @change="handleChange($event, item.value)"
            class="sr-only"
            :aria-labelledby="`service-${index}-label`"
            :aria-describedby="`service-${index}-description service-${index}-description`"
        />

          <span class="flex flex-1">
            <span class="flex flex-col">
              <span class="flex gap-x-4 mb-2">
                <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-unlimited-500 group-hover:bg-black">
                  <font-awesome-icon :icon="item.icon" class="h-6 w-6 text-black group-hover:text-unlimited-500" />
                </div>
                <div class="flex flex-col">
                  <span id="service-0-label" class="block text-lg font-omnes-pro text-white">{{ item.name }}</span>
                  <span id="service-0-description-0" class="mt-1 items-center text-xs text-white max-w-[20rem]">{{ item.description }}</span>
                </div>
              </span>
            </span>
          </span>
          <font-awesome-icon icon="fa-regular fa-paper-plane" class="text-white" v-if="props.modelValue.includes(item.value)" />
          <span class="pointer-events-none absolute -inset-px border-1 border-white rounded-3xl" aria-hidden="true"></span>
        </label>
      </div>

      <div class="px-4 grid grid-cols-1 sm:px-6">
        <div v-if="errorMessage" class="form-error mt-0 px-4 py-2 border-2 rounded-3xl border-unlimited-600 text-white text-center text-sm font-medium leading-6">{{ errorMessage }}</div>
      </div>
    </div>
  </fieldset>
</template>