<template>
  <tr class="border-b border-gray-200 hover:bg-gray-100">
    <td class="py-3 px-6 text-left">{{ property.attributes.name }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.price }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.bedrooms }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.bathrooms }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.garages }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.createdAt }}</td>
    <td class="py-3 px-6 text-left">{{ property.attributes.updatedAt }}</td>
  </tr>
</template>

<script setup>

defineProps({
  property: {
    type: Object
  }
});
</script>