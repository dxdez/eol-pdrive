<script setup>
    import {Link} from '@inertiajs/vue3'
    import ApplicationLogo from "@/Components/ApplicationLogo.vue"
    import NavLink from "@/Components/NavLink.vue"
    import CreateNewDropdown from "@/Components/app/CreateNewDropdown.vue"
</script>

<template>
    <nav class="min-w-[200px]">
        <Link :href="route('myFiles')" class="h-80px px-3 flex items-center gap-3">
            <strong>Proto Drive Storage</strong>
        </Link>
        <div class="px-3">
            <div class="py-3">
                <CreateNewDropdown />
                <NavLink :href="route('myFiles')" :active="$page.url == '/my-files'">My Files</NavLink>
                <NavLink href="/">Shared with Me</NavLink>
                <NavLink href="/">Shared by Me</NavLink>
                <NavLink href="route('trash')" :active="$page.url == '/trash'">Trash</NavLink>
            </div>
        </div>
    </nav>
</template>

<style scoped>
</style>
