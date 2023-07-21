import './bootstrap';

// Static assets
import.meta.glob([
  '../img/**',
]);

// Imports
import { createApp } from 'vue';

// Vue
// Form
import FormInputs from './components/form/FormInputs.vue';
import FormSelects from './components/form/FormSelects.vue';
import FormFieldset from './components/form/FormFieldset.vue';

// Typography
import PageH1 from './components/typography/PageH1.vue';
import PageH2 from './components/typography/PageH2.vue';
import PageH3 from './components/typography/PageH3.vue';
import PageH4 from './components/typography/PageH4.vue';
import PageH5 from './components/typography/PageH5.vue';
import PageH6 from './components/typography/PageH6.vue';
import Paragraph from './components/typography/Paragraph.vue';

// Content
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import FormPage from './components/FormPage.vue';
import RequestForm from './components/RequestForm.vue';
import RequestFormPage from './components/RequestFormPage.vue';

if(document.querySelector('#app') != null) {
  const app = createApp({});

  // Form
  app.component('form-inputs', FormInputs)
  app.component('form-selects', FormSelects)
  app.component('form-fieldset', FormFieldset)

  // Typography
  app.component('pageh1', PageH1)
  app.component('pageh2', PageH2)
  app.component('pageh3', PageH3)
  app.component('pageh4', PageH4)
  app.component('pageh5', PageH5)
  app.component('pageh6', PageH6)
  app.component('paragraph', Paragraph)

  // Content
  app.component('page-header', Header)
  app.component('page-footer', Footer)
  app.component('form-page', FormPage)
  app.component('request-form', RequestForm)
  app.component('request-form-page', RequestFormPage)

  // Mount Vue.js app
  app.mount('#app')
}