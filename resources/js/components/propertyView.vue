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

onMounted(() => {
  makeNetworkRequestForProperties();
});

function searchProperty(event) {
  makeNetworkRequestForProperties(event.params)
}

function cancelSearch(event) {
  makeNetworkRequestForProperties();
}

async function makeNetworkRequestForProperties(params = '') {
  let url = 'http://localhost:81/api/v1/properties';

  if(params) {
    url += '?' + params;
  }

  try {
    await axios.get(url)
        .then(response => response.data)
        .then(response => properties.value = response.data);
  } catch (error) {
    properties.value = [];

    console.error('Error fetching property data:', error);
  }
}

</script>
