<template>
    <app-layout>
        <div class="markdown lg:max-w-3xl">
            <div v-html="content"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Views/Layouts/AppLayout';

export default {
    components: {
        AppLayout
    },

    props: {
        content: {
            type: String,
            default: '',
        }
    }
};
</script>
