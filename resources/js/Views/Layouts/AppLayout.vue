<template>
    <div class="min-h-screen min-w-full overflow-x-hidden">
        <banner></banner>

        <!-- Main Header Area -->
        <header>
            <navbar class="bg-gray-50">
                <template #logo>
                    <logo classes="h-6 w-auto text-gray-800" :title="config('app.name')"></logo>
                </template>

                <template #linksleft>
                    <!-- Left Links -->
                </template>

                <template #linksright>
                    <navbar-link href="/" class="text-gray-800 bg-gray-100 hover:bg-gray-100 focus:bg-gray-100">
                        Home
                    </navbar-link>

                    <navbar-link href="/docs/project" class="text-gray-800 bg-gray-100 hover:bg-gray-100 focus:bg-gray-100">
                        Project
                    </navbar-link>
                </template>
            </navbar>
        </header>

        <!-- Main Content Area -->
        <main class="py-8" role="main">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="md:grid md:grid-cols-12 md:gap-6">
                    <div class="md:col-span-2">
                        <sidebar :links="$page.props.links"></sidebar>
                    </div>

                    <div class="md:col-span-8">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </main>

        <!-- Main Footer Area -->
        <footer>
            <div class="container mx-auto px-4 sm:px-6">
                <div class="py-16 flex items-center justify-center">
                    <p class="text-center">
                        <span class="text-gray-500 text-xs">{{ copyright }}</span>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import Logo from '@/Views/Components/Logos/Logo';
import Navbar from '@/Views/Components/Navbars/Navbar';
import NavbarLink from '@/Views/Components/Navbars/NavbarLink';
import Dropdown from '@/Views/Components/Dropdowns/Dropdown';
import DropdownLink from '@/Views/Components/Dropdowns/DropdownLink';
import Banner from '@/Views/Components/Banners/Banner';
import Sidebar from '@/Views/Components/Sidebar/Sidebar';

export default {
    components: {
        Logo,
        Navbar,
        NavbarLink,
        Dropdown,
        DropdownLink,
        Banner,
        Sidebar,
    },

    data() {
        return {
            copyright: `© ${new Date().getFullYear()} ${this.config('app.name')}. All rights reserved.`,
        };
    },

    methods: {
        logout() {
            this.$inertia.post(this.route('logout'));
        }
    }
}
</script>
