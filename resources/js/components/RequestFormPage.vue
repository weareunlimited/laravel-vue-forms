<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import { LinkIcon, PlusIcon, QuestionMarkCircleIcon, CheckIcon, ChevronDownIcon } from '@heroicons/vue/20/solid'

onMounted(() => {
  let token = document.head.querySelector('meta[name="csrf-token"]');
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
});

const formFields = [
  {
    label: 'Dein Name',
    labelSecond: 'Verrat uns deinen Namen!',
    fieldName: 'form-name',
    fieldId: 'form-name',
    placeholder: 'Elon Musk',
    inputType: 'text',
  },
  {
    label: 'E-Mail Adresse',
    labelSecond: 'Damit wir dir antworten können.',
    fieldName: 'form-mail',
    fieldId: 'form-mail',
    placeholder: 'hello@world.com',
    inputType: 'email',
  },
  {
    label: 'Unternehmen',
    labelSecond: 'Wie heißt dein Unternehmen?',
    option: 'Optional',
    fieldName: 'form-company',
    fieldId: 'form-company',
    placeholder: 'SpaceX',
    inputType: 'text',
  },
  {
    label: 'Telefon',
    labelSecond: 'Wenn wir dich lieber anrufen sollen!',
    option: 'Optional',
    fieldName: 'form-tel',
    fieldId: 'form-tel',
    placeholder: '069-420-1337',
    inputType: 'tel',
  },
  {
    label: 'Beschreibung',
    labelSecond: 'Beschreibe hier dein Projekt oder deine Idee!',
    option: 'Optional',
    fieldName: 'form-comment',
    fieldId: 'form-comment',
    placeholder: 'Eine interaktive Website mit 3D Animationen und Online-Shop für unsere Produkte.',
    inputType: 'textarea',
  }
];

const dateField = [
  {
    label: 'Welcher Zeitraum ist gewünscht?',
    fieldName: 'form-date',
    fieldId: 'form-date',
    placeholder: 'Zeitraum auswählen',
  }
];

const defaultList = [
  { id: 1, name: 'Auswahl' },
  { id: 2, name: 'unter 1.000€' },
  { id: 3, name: '1.000 - 2.000€' },
  { id: 4, name: '2.000 - 5.000€' },
  { id: 5, name: '5.000 - 10.000€' },
  { id: 6, name: 'mehr als 10.000€' }
];

const list = [defaultList];
const selected = list[0];

const yesNoList = [
  { id: 0, name: '/' },
  { id: 1, name: 'Ja' },
  { id: 2, name: 'Nein' },
];

const items = [
  { label: 'Dein Budget', price: 'Dies hilft uns bei der Ersteinschätzung des Projekts.', list: defaultList, selected: null },
];

items.forEach(item => {
  item.selected = item.list[0];
});

const auswahlList = [
  { id: 1, name: 'Auswahl' },
  { id: 2, name: '01' },
  { id: 3, name: '02' },
  { id: 4, name: '03' },
  { id: 5, name: '04' },
  { id: 6, name: '05' },
  { id: 7, name: '06' },
  { id: 8, name: '07' },
  { id: 9, name: '08' },
  { id: 10, name: '09' },
  { id: 11, name: '10' }
];

const items2 = [
  { label: 'Wohnmobil', price: '+ 6,00 EUR', list: yesNoList, selected: null },
  { label: 'Wohnwagen', price: '+ 4,50 EUR', list: auswahlList, selected: null },
  { label: 'Zelt', price: '+ 4,50 EUR', list: auswahlList, selected: null },
  { label: 'PKW', price: '+ 1,50 EUR', list: auswahlList, selected: null },
  { label: 'Transportanhänger', price: '+ 3,50 EUR', list: auswahlList, selected: null },
];

items2.forEach(item => {
  item.selected = item.list[0];
});

const services = [
  {
    label: 'Womit können wir dich unterstützen?',
    labelSecond: 'Du kannst auch mehrere Leistungen gleichzeitig auswählen.',
    list: [
      { name: 'web.development', description: 'custom, cms, shopify, laravel, onepager & more', value: 'Web Development', icon: ['fa-regular', 'fa-paper-plane'], },
      { name: 'web.design', description: 'sitemap concept, design prototype, user interface (ui), user interface (ux)', value: 'Web Design', icon: ['fa-regular', 'fa-paper-plane'], },
      { name: 'brand.design', description: 'logodesign, style guide, farbgebung, schriftgestaltung, markenidentität', value: 'Design', icon: ['fa-regular', 'fa-paper-plane'], },
      { name: 'print.design', description: 'produktdesign, magazine, produktion, geschäftsausstattung, textildesign', value: 'Print', icon: ['fa-regular', 'fa-paper-plane'], },
      { name: 'performance.marketing', description: 'google ads, meta ads, regelmäßige auswertungen, advertorials, seo', value: 'Marketing', icon: ['fa-regular', 'fa-paper-plane'], },
      { name: 'social.media', description: 'contentplanung, design templates, user generated content, multichannel', value: 'Social', icon: ['fa-regular', 'fa-paper-plane'], },
    ],
    selected: [],
  },
];

// Store form data
const formData = {
  'form-name': '',
  'form-company': '',
  'form-tel': '',
  'form-mail': '',
  'form-comment': '',
  'form-date': '',
  items: [],
  items2: [],
  services: [], 
};

const handleUpdateDate = (newDate) => {
  formData['form-date'] = newDate.join(' - ');
};

const errorMessage = ref('');
const successMessage = ref('');
const errors = ref({
  'form-name': '',
  'form-company': '',
  'form-tel': '',
  'form-mail': '',
  'form-comment': '',
  'form-date': '',
  items: [],
  items2: [],
  services: [],  
});

// Clear error message for the specified field
function clearError(fieldName) {
  errors.value[fieldName] = '';
}

async function submitForm() {
  try {
    // Update formData with selected values
    formData.items = items.map(item => ({ label: item.label, selected: item.selected }));
    formData.items2 = items2.map(item => ({ label: item.label, selected: item.selected }));
    formData.services = services.map(item => ({ label: item.label, selected: item.selected }));

    const recaptchaToken = await grecaptcha.execute("6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI", {action: 'submit'});
    
    formData.recaptcha = recaptchaToken;

    // console.log(formData) // Show all form data before submission
    // console.log('reCAPTCHA Token:', recaptchaToken); // Display recaptchaToken for debugging

    await axios.post('/form-submit', formData);

    // Modify the URL by adding a query parameter
    const url = new URL(window.location.href);
    url.searchParams.set('success', 'true');
    window.history.pushState({}, '', url);

    // Reset form data and display success message
    errorMessage.value = '';
    successMessage.value = 'Vielen Dank für deine Anfrage! Wir melden uns ASAP bei dir!';
    scrollToTop();
  } catch (error) {
    // Display error message and scroll to top
    successMessage.value = '';
    errorMessage.value = 'Hmm.. da lief etwas schief! Überprüfe und behebe die nachfolgenden Probleme.';
    scrollToTop();
    // Handle specific field errors
    if (error.response && error.response.data.errors) {
      const fieldErrors = error.response.data.errors;
      Object.keys(fieldErrors).forEach(field => {
        let errorPath = field.split('.'); // split the error key into its parts
        if (errorPath.length > 1 && ['items', 'items2', 'services'].includes(errorPath[0])) {
          // handle 'items' and 'services' error keys
          let errorFieldName = `${errorPath[0]}[${errorPath[1]}].${errorPath.slice(2).join('.')}`;
          errors.value[errorFieldName] = fieldErrors[field][0];
        } else {
          errors.value[field] = fieldErrors[field][0];
        }
      });
    }
    // console.error(error);
  }
}

function scrollToTop() {
  window.scrollTo({
    top: 160,
    behavior: 'smooth'
  });
}
</script>

<template>
  <div class="relative bg-white z-[1000px]">
    <div class="pointer-events-auto w-screen max-w-full w-full md:max-w-[1200px] mx-auto px-4 md:px-10 py-4 md:py-10">
      <div class="h-full md:pr-2.5 py-5 bg-black">
        <form id="form-container" class="flex h-full flex-col overflow-y-scroll px-3 md:pr-0 md:pl-5" @submit.prevent="submitForm">

          <!-- Form success & error messages -->
          <template v-if="successMessage || errorMessage">
            <div class="px-3 py-6 md:px-6">
              <div class="px-4 md:px-20 py-4 bg-green-500 text-white rounded-3xl md:rounded-full text-center text-base font-medium leading-6 text-white" v-if="successMessage">
                {{ successMessage }} ✌️
              </div>
              <div class="px-4 md:px-20 py-4 bg-unlimited-600 text-white rounded-3xl md:rounded-full text-center text-base font-medium leading-6 text-white" v-if="errorMessage">
                {{ errorMessage }} 👀
              </div>
            </div>
          </template>
          <!-- Form success & error messages END -->

          <div class="flex-1">
            <div class="space-y-6 pb-3 sm:space-y-0">
              <!-- General data -->
              <div class="grid md:grid-cols-2">
                <form-inputs
                  v-for="(field, index) in formFields"
                  :key="index"
                  :class="{ 'md:col-span-2': index === formFields.length - 1 }"
                  :label="field.label"
                  :labelSecond="field.labelSecond"
                  :option="field.option"
                  :fieldName="field.fieldName"
                  :fieldId="field.fieldId"
                  :placeholder="field.placeholder"
                  :inputType="field.inputType"
                  v-model="formData[field.fieldName]"
                  :errorMessage="errors[field.fieldName]"
                  @input="clearError(field.fieldName)"
                />
              </div>

              <form-datepicker
                v-for="(field, index) in dateField"
                :key="index"
                :label="field.label"
                :labelSecond="field.labelSecond"
                :option="field.option"
                :fieldName="field.fieldName"
                :fieldId="field.fieldId"
                :placeholder="field.placeholder"
                @update:date="handleUpdateDate"
                :errorMessage="errors[field.fieldName]"
                @input="clearError(field.fieldName)"
              />

              <div class="px-3 sm:px-6">
                <hr class="border-white/20" />
              </div>

              <!-- Budget -->
              <fieldset class="space-y-2 grid grid-cols-1 px-3 gap-5 sm:space-y-0 sm:px-6 sm:py-10">
                <form-selects 
                  v-for="(item, index) in items"
                  :key="index"
                  :list="item.list"
                  :label="item.label"
                  :price="item.price"
                  :modelValue="item.selected"
                  @update:modelValue="(value) => { item.selected = value; clearError(`items[${index}].selected.name`); }"
                  :errorMessage="errors[`items[${index}].selected.name`] || ''"
                />
              </fieldset>

              <div class="px-3 sm:px-6">
                <hr class="border-white/20" />
              </div>

              <!-- Auswahl -->
              <fieldset class="space-y-2 grid grid-cols-1 px-3 gap-5 sm:space-y-0 sm:px-6 sm:py-10">
                <form-selects
                  v-for="(item, index) in items2"
                  :key="'item2-' + index"
                  :list="item.list"
                  :label="item.label"
                  :price="item.price"
                  :modelValue="item.selected"
                  @update:modelValue="(value) => { item.selected = value; clearError(`items2[${index}].selected.name`); }"
                  :errorMessage="errors[`items2[${index}].selected.name`] || ''"
                />
              </fieldset>

              <div class="px-3 sm:px-6">
                <hr class="border-white/20" />
              </div>

              <!-- Service selection -->
              <form-fieldset 
                v-for="(item, index) in services"
                :key="index"
                :products="item.list"
                :label="item.label"
                :labelSecond="item.labelSecond"
                :modelValue="item.selected"
                @update:modelValue="(value) => { item.selected = value; clearError(`services[${index}].selected`); }"
                :errorMessage="errors[`services[${index}].selected`] || ''"
              />
            </div>
          </div>

          <!-- Submit -->
          <div class="flex-shrink-0 px-3 pb-5 sm:px-6">
            <div class="flex justify-end space-x-3">
              <button type="submit" class="inline-flex w-full justify-center border-2 border-transparent bg-unlimited-500 px-3 py-2 rounded-full text-xl font-medium text-white transition hover:bg-transparent hover:border-2 hover:border-unlimited-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-100">Anfrage senden</button>
            </div>
          </div>

          <div class="pt-2 px-3 md:px-6">
            <span class="text-xs text-gray-500">Diese Website ist durch reCAPTCHA geschützt und es gelten die <a href="https://policies.google.com/privacy" target="_blank">Datenschutzbestimmungen</a> und <a href="https://policies.google.com/terms" target="_blank">Nutzungsbedingungen</a> von Google.</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>