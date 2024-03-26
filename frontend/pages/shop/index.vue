<template>
    <div>
      <p>Category: {{ category }}</p>
      <p>Subcategory: {{ subcategory }}</p>
    </div>
  </template>
  
  <script setup>
  const queryParams = new URLSearchParams(window.location.search);
  const category = queryParams.get('category');
  const subcategory = queryParams.get('subcategory');
  </script>
  