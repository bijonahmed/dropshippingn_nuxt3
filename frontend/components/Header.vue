<template>
    <div>
       
    </div>
</template>

<script setup>
import { ref, getCurrentInstance } from 'vue';

const toggleSidebar = () => {
    console.log("-----togglesidebar----");
  const instance = getCurrentInstance();
  if (instance) {
    instance.emit('toggle-sidebar'); // Emitting a custom event named 'toggle-sidebar'
  }
};
</script>