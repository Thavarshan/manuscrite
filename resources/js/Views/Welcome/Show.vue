<template>
    <app-layout>
        <div class="markdown w-full">
            <div v-html="content"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Views/Layouts/AppLayout';
import AppLink from '@/Views/Components/Base/Link';

export default {
    components: {
        AppLayout,
        AppLink
    },

    props: {
        content: {
            type: String,
            default: ''
        }
    }
};
</script>
