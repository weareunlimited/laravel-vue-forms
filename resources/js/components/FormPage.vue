<script setup>
  import { form } from "../stores/form.js"

  import {
    ArrowUpIcon,
    ArrowLeftIcon,
    ArrowTopRightOnSquareIcon,
    BellAlertIcon,
  } from '@heroicons/vue/24/outline'

  const actions = [
    {
      title: 'Modal fade-up',
      description: 'Modal that works as popup and fades in from the bottom',
      icon: ArrowUpIcon,
      iconForeground: 'text-teal-700',
      iconBackground: 'bg-teal-50',
    },
    {
      title: 'Modal fade-right',
      description: 'Modal that works as popup and fades in from the right',
      href: '#',
      icon: ArrowLeftIcon,
      iconForeground: 'text-purple-700',
      iconBackground: 'bg-purple-50',
    },
    {
      title: 'Single page',
      description: 'Regular form within page content',
      href: 'form-page',
      icon: ArrowTopRightOnSquareIcon,
      iconForeground: 'text-sky-700',
      iconBackground: 'bg-sky-50',
    },
    {
      title: 'Coming soon',
      description: 'More forms and components on the way.',
      href: '#',
      icon: BellAlertIcon,
      iconForeground: 'text-yellow-700',
      iconBackground: 'bg-yellow-50',
    },
  ]
</script>

<template>
  <div class="bg-white flex items-center justify-center h-screen">
    <div class="mx-auto w-full max-w-7xl py-24 px-6 sm:py-32 lg:px-8">
      <div class="relative isolate overflow-hidden bg-black px-6 py-24 text-center shadow-2xl rounded-3xl sm:px-16">
        <h2 class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl">laravel.vue.forms</h2>
        <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-neutral-300">form template library for forms based on Laravel, Vue.js and Tailwind CSS including Laravel Validation, reCAPTCHA, Error handling and much more.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="#overview" class="cursor-pointer rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-neutral-900 shadow-sm hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
          <a href="https://unlimited.studio" target="_blank" class="text-sm font-semibold leading-6 text-white">unlimited.studio <span aria-hidden="true">→</span></a>
        </div>
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
          <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.8" />
          <defs>
            <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
              <stop stop-color="#FE3312" />
              <stop offset="1" stop-color="#FE3312" />
            </radialGradient>
          </defs>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white" id="overview">
    <div class="mx-auto w-full max-w-7xl pb-24 px-6 sm:pb-32 lg:px-8">
      <div class="divide-y divide-gray-200 overflow-hidden rounded-3xl bg-gray-200 shadow-lg border border-gray-100 sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
        <div v-for="(action, actionIdx) in actions" :key="action.title" :class="[actionIdx === 0 ? 'rounded-tl-lg rounded-tr-lg sm:rounded-tr-none' : '', actionIdx === 1 ? 'sm:rounded-tr-lg' : '', actionIdx === actions.length - 2 ? 'sm:rounded-bl-lg' : '', actionIdx === actions.length - 1 ? 'rounded-bl-lg rounded-br-lg sm:rounded-bl-none' : '', 'group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500']">
          <div>
            <span :class="[action.iconBackground, action.iconForeground, 'inline-flex rounded-lg p-3 ring-4 ring-white']">
              <component :is="action.icon" class="h-6 w-6" aria-hidden="true" />
            </span>
          </div>
          <div class="mt-8">
            <h3 class="text-base font-semibold leading-6 text-gray-900">
              <a v-if="action.title === 'Modal fade-up'" @click="form.setIsOpened(true)" class="focus:outline-none cursor-pointer">
                <!-- Extend touch target to entire panel -->
                <span class="absolute inset-0" aria-hidden="true" />
                {{ action.title }}
              </a>
              <a v-else="action.title === 'Modal fade-right'" class="focus:outline-none cursor-pointer">
                <!-- Extend touch target to entire panel -->
                <span class="absolute inset-0" aria-hidden="true" />
                {{ action.title }}
              </a>
              <a v-else :href="action.href" class="focus:outline-none">
                <!-- Extend touch target to entire panel -->
                <span class="absolute inset-0" aria-hidden="true" />
                {{ action.title }}
              </a>
            </h3>
            <p class="mt-2 text-sm text-gray-500">{{ action.description }}</p>
          </div>
          <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>