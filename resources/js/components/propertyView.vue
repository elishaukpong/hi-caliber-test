<template>
  <div class="container mx-auto mt-10">
    <PropertySearch></PropertySearch>

    <PropertyListing :properties="properties"></PropertyListing>
  </div>
</template>

<script setup>
import { ref } from 'vue';

import PropertySearch from "./propertySearchView.vue";
import PropertyListing from "./propertyListingView.vue";

let properties = ref([]);


</script>
