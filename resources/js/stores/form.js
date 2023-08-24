import { ref } from "vue";

export const form = ref({
  isOpened: false,
  setIsOpened(value) {
    this.isOpened = value;
  },
  checkAndOpen() {
    if (window.location.pathname.includes('form-popup')) {
      this.isOpened = true;
    }
  }
});

// Exporte die checkAndOpen-Methode, damit sie von außerhalb des Moduls aufgerufen werden kann
export function openFormIfRequired() {
  form.value.checkAndOpen();
}
