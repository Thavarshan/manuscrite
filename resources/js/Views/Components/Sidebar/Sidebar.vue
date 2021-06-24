<template>
    <div>
        <div v-for="(routes, title) in links" :key="title">
            <div>{{ title }}</div>

            <div class="mt-2" v-for="(link, name) in routes" :key="name">
                <app-link :href="route('docs.show', { category: link.category, page: link.page })">{{ name }}</app-link>
            </div>
        </div>
    </div>
</template>

<script>
import AppLink from '@/Views/Components/Base/Link';

export default {
    components: {
        AppLink,
    },

    props: ['links']
}
</script>
