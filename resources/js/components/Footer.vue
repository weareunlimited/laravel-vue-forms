<template>
  <footer class="bg-white">
    <div class="mx-auto max-w-7xl overflow-hidden px-6 pb-20 sm:pb-24 lg:px-8">
<!--       <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
        <div v-for="item in navigation.main" :key="item.name" class="pb-6">
          <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-unlimited-500 transition">{{ item.name }}</a>
        </div>
      </nav> -->
      <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; {{ new Date().getFullYear() }} <a href="https://unlimited.studio" target="_blank" class="hover:text-unlimited-500 transition">unlimited.studio</a></p>
    </div>
  </footer>
</template>

<script setup>
import { defineComponent, h } from 'vue'

const navigation = {
  main: [
    { name: 'Forms', href: '/' },
  ],
}
</script>