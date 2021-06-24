<template>
    <app-layout>
        <markdown-section :content="content"></markdown-section>
    </app-layout>
</template>

<script>
import AppLayout from '@/Views/Layouts/AppLayout';
import MarkdownSection from '@/Views/Components/Sections/MarkdownSection';

export default {
    components: {
        AppLayout,
        MarkdownSection
    },

    props: {
        content: {
            type: String,
            default: '',
        }
    }
};
</script>
