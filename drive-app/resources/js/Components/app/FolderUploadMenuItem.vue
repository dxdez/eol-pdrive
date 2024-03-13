<template>
    <MenuItem v-slot="{ active }">
        <a class="text-gray-700 block px-4 py-2 text-sm">
            Upload Folder
        </a>
    </MenuItem>
</template>
<script setup>
    import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
    import {ref} from "vue";
</script>
