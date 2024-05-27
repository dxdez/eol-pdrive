<template>
    <PrimaryButton @click="download">
        Download
    </PrimaryButton>
</template>

<script setup>
    import {useForm, usePage} from "@inertiajs/vue3";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

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
            params.append('all', props.all ? 1: 0);
        } else {
            for (let id of props.id) {
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
