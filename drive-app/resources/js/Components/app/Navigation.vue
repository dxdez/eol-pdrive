<script setup>
    import ApplicationLogo from "@/Components/ApplicationLogo.vue"
</script>

<template>
    <nav class="min-w-[200px]">
        <div class="h-80px px-3 flex items-center gap-3">
            <Link href="/">
                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
            </Link>
        </div>
    </nav>
</template>

<style scoped>
</style>
