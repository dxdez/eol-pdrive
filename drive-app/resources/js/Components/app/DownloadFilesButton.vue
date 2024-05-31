<template>
    <button @click="download" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Download
    </button>
</template>

<script setup>
    import {useForm, usePage} from "@inertiajs/vue3";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {httpGet} from "@/Helper/http-helper.js";

    const page = usePage();
    
    const props = defineProps({
        all: {
            type: Boolean,
            required: false,
            default: false
        },
        ids: {
            type: Array,
            required: false
        }
    })

    function download() {
        if (!props.all && props.ids.length === 0) {
            return;
        }
        
        const params = new URLSearchParams();

        if (page.props.folder?.id) {
            params.append('parent_id', page.props.folder?.id);
        }

        if (props.all) {
            params.append('all', props.all ? 1 : 0);
        } else {
            for (let id of props.ids) { 
                params.append('ids[]', id)
            }
        }
        let url = route('file.download');
        httpGet(url + '?' + params.toString())
            .then(res => {
                console.log(res);
                if (res.url) {
                    return;
                }
                const a = document.createElement('a');
                a.download = res.filename;
                a.href = res.url;
                a.click();
           })
    }
</script>
