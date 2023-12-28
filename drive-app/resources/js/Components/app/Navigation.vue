<script setup>
    import {Link} from '@inertiajs/vue3'
    import ApplicationLogo from "@/Components/ApplicationLogo.vue"
    import CreateNewDropdown from "@/Components/app/CreateNewDropdown.vue"
</script>

<template>
    <nav class="min-w-[200px]">
        <div class="h-80px px-3 flex items-center gap-3">
            <Link href="/">
                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
            </Link>
            CasaStorage
        </div>
        <div class="px-3">
            <CreateNewDropdown />
        </div>
    </nav>
</template>

<style scoped>
</style>
