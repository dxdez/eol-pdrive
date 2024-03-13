<template>
    <MenuItem v-slot="{ active }">
        <a href="#" class="text-gray-700 block px-4 py-2 text-sm">
            Upload Files
            <input type="file" class="absolute left-0 top-0 bottom-0 right-0 cursor-pointer opacity-0">
        </a>
    </MenuItem>
</template>
<script setup>
    import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
    import {ref} from "vue";
</script>
