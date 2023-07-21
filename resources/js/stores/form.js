import {ref} from "vue";

export const form = ref({
	isOpened: false,
  setIsOpened(value) {
      this.isOpened = value;
  }
})