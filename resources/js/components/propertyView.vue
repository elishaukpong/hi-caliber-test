<template>
  <div class="container mx-auto mt-10">
    <PropertySearch @searchProperty="searchProperty" @cancelSearchProperty="cancelSearch"></PropertySearch>

    <PropertyListing :properties="properties"></PropertyListing>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

import PropertySearch from "./propertySearchView.vue";
import PropertyListing from "./propertyListingView.vue";

let properties = ref([]);

async function getPropertyData() {
  try {
    await axios.get('http://localhost:81/api/v1/properties')
        .then(response => response.data)
        .then(response => properties.value = response.data);
  } catch (error) {
    console.error('Error fetching property data:', error);
  }
}

onMounted(() => {
  getPropertyData();
});

async function searchProperty(event) {
  try {
    await axios.get('http://localhost:81/api/v1/properties?' + event.params)
        .then(response => response.data)
        .then(response => properties.value = response.data);
  } catch (error) {
    console.error('Error fetching property data:', error);
  }
}

function cancelSearch(event) {
  getPropertyData();
}


</script>
