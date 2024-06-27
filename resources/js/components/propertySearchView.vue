<template>
  <form @submit="dispatchSubmitEvent" class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <div>
        <label for="name" class="block text-gray-700">Name</label>
        <input type="text" id="name" v-model="formData.name" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="price" class="block text-gray-700">Price From</label>
        <input type="number" id="price" v-model="formData.price.from" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>

      <div>
        <label for="price" class="block text-gray-700">Price To</label>
        <input type="number" id="price" v-model="formData.price.to" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="bedrooms" class="block text-gray-700">Bedrooms</label>
        <input type="number" id="bedrooms" v-model="formData.bedrooms" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="bathrooms" class="block text-gray-700">Bathrooms</label>
        <input type="number" id="bathrooms" v-model="formData.bathrooms" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="garages" class="block text-gray-700">Garages</label>
        <input type="number" id="garages" v-model="formData.garages" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>

      <div class="mt-7">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 w-full">Search</button>
      </div>

      <div class="mt-7">
        <button @click="$emit('cancelSearchProperty')" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-blue-600 w-full">Clear</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { ref, getCurrentInstance } from 'vue';

// const emit = defineEmits(['searchProperty']);
const {emit} = getCurrentInstance();

const formData = ref({
  name: '',
  price: {
    from:'',
    to:''
  },
  bedrooms: '',
  bathrooms: '',
  garages: '',
});

function dispatchSubmitEvent(e) {
  e.preventDefault();

  const data = new FormData();
  for (const key in formData.value) {
    if(key === 'price') {

      if(formData.value[key].from && formData.value[key].to) {
        data.append(key, formData.value[key].from + ',' + formData.value[key].to);
      } else if (formData.value[key].from) {
        data.append(key, formData.value[key].from);
      }

      continue;
    }

    if(formData.value[key]) {
      data.append(key, formData.value[key]);
    }
  }
  const params = new URLSearchParams(data).toString();

  if(params) {
    emit('searchProperty', { params: params });
  }
}

</script>