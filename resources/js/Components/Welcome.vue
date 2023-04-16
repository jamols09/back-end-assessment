<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to Mail application!
            </h1>
            <div class="mt-3 p-2">
                <Link
                    href="/template"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                >
                    Create Template
                </Link>
                <Link
                    href="/template/list"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                >
                    View Templates
                </Link>
            </div>
        </div>
    </div>
</template>
