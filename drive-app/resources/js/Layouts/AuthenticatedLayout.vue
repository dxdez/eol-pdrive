<script setup>
    import Navigation from "@/Components/app/Navigation.vue";
    import SearchForm from "@/Components/app/SearchForm.vue";
    import UserSettingsDropdown from "@/Components/app/UserSettingsDropdown.vue";
    import {onMounted, ref} from "vue";
    import {emitter, FILE_UPLOAD_STARTED} from "@/event-bus.js";

    function uploadFiles(files) {
        console.log(files);
    }

    onMounted(() => {
        emitter.on(FILE_UPLOAD_STARTED, uploadFiles)
    })
</script>

<template>
    <div class="h-screen bg-gray-50 flex w-full gap-4">
        <Navigation class="p-6 bg-zinc-200" />
        <main class="flex flex-col flex-1 px-4 overflow-hidden p-6">
            <div class="flex item-center justify-between w-full">
                <SearchForm />
                <UserSettingsDropdown />
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <slot />
            </div>
        </main>
    </div>
</template>
