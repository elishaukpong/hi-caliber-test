<template>
  <div v-if="properties.length" class="mt-[100px]">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-200 text-gray-600 font-bold uppercase text-sm">
      <tr>
        <th class="py-3 px-6 text-left">Name</th>
        <th class="py-3 px-6 text-left">Price</th>
        <th class="py-3 px-6 text-left">Bedrooms</th>
        <th class="py-3 px-6 text-left">Bathrooms</th>
        <th class="py-3 px-6 text-left">Garages</th>
        <th class="py-3 px-6 text-left">Created At</th>
        <th class="py-3 px-6 text-left">Updated At</th>
      </tr>
      </thead>
      <tbody>
        <property-listing-item v-for="property in properties" :property="property"></property-listing-item>
      </tbody>
    </table>
  </div>

  <div v-else class="mt-[100px]">
    <h1 class="text-4xl font-bold text-center text-gray-800">No Property Found!</h1>
  </div>

</template>

<script setup>
import PropertyListingItem from "./propertyListingItemView.vue";

defineProps({
  properties: {
    type: Array,
    default: []
  }
});
</script>