<template>
  <div class="container mx-auto mt-10">
    <FullPageSpinner :show="show"></FullPageSpinner>
    <PropertySearch @searchProperty="searchProperty" @cancelSearchProperty="cancelSearch"></PropertySearch>

    <PropertyListing :properties="properties"></PropertyListing>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

import PropertySearch from "./propertySearchView.vue";
import PropertyListing from "./propertyListingView.vue";
import FullPageSpinner from "./FullPageSpinnerView.vue";

let properties = ref([]);
let show = ref(false);

onMounted(() => {
  makeNetworkRequestForProperties();
});

function searchProperty(event) {
  makeNetworkRequestForProperties(event.params)
}

function cancelSearch(event) {
  makeNetworkRequestForProperties();
}

function toggleSpinner() {
  show.value = !show.value;
}

async function makeNetworkRequestForProperties(params = '') {
  let url = 'http://localhost:81/api/v1/properties';

  if(params) {
    url += '?' + params;
  }

  try {
    toggleSpinner();

    await axios.get(url)
        .then(response => response.data)
        .then(response => properties.value = response.data);

    toggleSpinner();
  } catch (error) {
    toggleSpinner();

    properties.value = [];

    console.error('Error fetching property data:', error);
  }
}

</script>
