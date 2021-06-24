<template>
    <div class="markdown">
        <div v-html="content"></div>
    </div>
</template>

<script>
import Prism from 'prismjs';
import 'prismjs/components/prism-bash';
import 'prismjs/components/prism-javascript';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-liquid';
import 'prismjs/components/prism-markdown';
import 'prismjs/components/prism-markup-templating';
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-scss';

export default {
    props: {
        content: {
            type: String,
            default: ''
        }
    },

    mounted() {
        Prism.manual = true;
        Prism.highlightAll();
    }
}
</script>

<style>
@import 'prism-themes/themes/prism-nord.css';
</style>
