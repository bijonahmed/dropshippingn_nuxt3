<template>
    <h1>asjdflasdjfl</h1>
    <div>
      <p>Category Slug: {{ categorySlug }}</p>
      <p>Subcategory Slug: {{ subcategorySlug }}</p>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const categorySlug = ref($route.query.categorySlug)
  const subcategorySlug = ref($route.query.subcategorySlug)
  </script>
  