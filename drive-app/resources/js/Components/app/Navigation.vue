<script setup>
    import {Link} from '@inertiajs/vue3'
    import ApplicationLogo from "@/Components/ApplicationLogo.vue"
    import NavLink from "@/Components/NavLink.vue"
    import CreateNewDropdown from "@/Components/app/CreateNewDropdown.vue"
</script>

<template>
    <nav class="min-w-[200px]">
        <div class="h-80px px-3 flex items-center gap-3">
            <Link href="/">
                <strong>Proto Drive Storage</strong>
            </Link>
        </div>
        <div class="px-3">
            <div class="py-3">
                <CreateNewDropdown />
                <NavLink href="/">My Files</NavLink>
                <NavLink href="/">Shared with Me</NavLink>
                <NavLink href="/">Shared by Me</NavLink>
                <NavLink href="/">Trash</NavLink>
            </div>
        </div>
    </nav>
</template>

<style scoped>
</style>
