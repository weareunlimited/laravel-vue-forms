<script setup>
import { ref, watch } from 'vue';
import { Listbox, ListboxButton, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid';

const props = defineProps({
  label: {
    type: String,
    required: true,
  },
  price: {
    type: String,
    required: true,
  },
  list: {
    type: Array,
    required: true,
  },
  modelValue: {
    type: Object,
    required: false,
  },
  errorMessage: {
    type: String,
    required: false,
  },
});

const emits = defineEmits(['update:modelValue']);

const selected = ref(props.modelValue || props.list[0]);
const isClicked = ref(false);

watch(selected, (newValue, oldValue) => {
  if (newValue !== oldValue) {
    isClicked.value = false;
  }
});

watch(selected, (newValue) => {
  emits('update:modelValue', newValue);
});
</script>

<template>
  <div class="flex flex-col items-center md:grid grid-cols-3 gap-4 sm:space-y-0">
    <div class="col-span-2 flex flex-col w-full">
      <legend class="block text-lg font-medium leading-6 text-white sm:mt-1.5">
        {{ label }}
      </legend>
      <label class="block text-sm sm:text-base text-white/50 sm:mt-1.5">{{ price }}</label>
    </div>
    <div class="col-span-1 grid md:justify-end w-full">
      <Listbox
        v-model="selected"
        v-slot="{ open }"
        class="w-full md:w-[220px]"
      >
        <div class="relative">
          <ListboxButton
            class="relative text-right w-full cursor-default py-2 pl-10 pr-3 text-left text-white ring-0 ring-inset border focus:outline-none focus:ring-0 rounded-2xl"
            :class="{
              'bg-black': open,
              '!border-unlimited-500': open,
              'border-b-0': open,
              'rounded-b-none': open,
              'border-white/20': selected.name === 'Auswahl',
              'border-white': selected.name !== 'Auswahl',
            }"
            @click="isClicked = true"
          >
            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
              <ChevronDownIcon class="h-5 w-5" :class="[selected.name === 'Auswahl' ? 'text-white/50' : 'text-white']" aria-hidden="true" />
            </span>
            <span class="block truncate text-base" :class="[selected.name === 'Auswahl' ? 'text-white/50' : 'text-white']">{{ selected.name }}</span>
          </ListboxButton>

          <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <ListboxOptions class="absolute border border-unlimited-500 z-10 -mt max-h-62 rounded-b-2xl w-full overflow-auto bg-black text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <ListboxOption
                v-for="number in list"
                :key="number.id"
                :value="number"
                v-slot="{ active, selected }"
              >
                <li :class="[active ? 'bg-unlimited-900 text-unlimited-500' : 'text-white', 'relative cursor-default text-right select-none py-2 pl-3 pr-9']">
                  <span :class="[selected ? 'text-unlimited-500' : 'font-normal', 'block truncate']">{{ number.name }}</span>
                </li>
              </ListboxOption>
            </ListboxOptions>
          </transition>
        </div>
      </Listbox>
    </div>
  </div>
  <div v-if="errorMessage" class="form-error mt-2 px-4 py-2 border-2 rounded-full border-unlimited-600 text-white text-center text-sm font-medium leading-6">{{ errorMessage }}</div>
</template>