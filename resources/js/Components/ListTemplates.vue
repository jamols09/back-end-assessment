<script setup>
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    templates: {
        type: Array,
    },
});

const destory = (id) => {
    router.delete(`/template/${id}`, {
        onBefore: () =>
            confirm("Are you sure you want to delete this template?"),
    });
};

const update = (id) => {
    router.get(`/template/${id}`);
};
</script>

<template>
    <div>
        <h2>Templates</h2>
        <!-- <p class="text-gray-400">{# email #} - email & name only</p> -->
        <div class="my-2">
            <main class="flex flex-row h-screen">
                <div
                    class="w-1/5 h-full flex max-h-screen overflow-y-auto flex-col flex-grow"
                >
                    Count: {{ templates?.length ?? 0 }}
                    <div
                        class="max-w-sm p-3 my-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                        v-for="template in templates"
                    >
                        <a href="#">
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                {{ template.title }}
                            </h5>
                        </a>
                        <p
                            class="mb-3 font-normal text-gray-500 dark:text-gray-400"
                        >
                            {{
                                template.body.length < 90
                                    ? template.body
                                    : template.body.substring(0, 90) + "..."
                            }}
                        </p>
                        <div class="mx-1 my-1">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-2 rounded mr-2"
                            >
                                Use
                            </button>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-2 rounded mr-2"
                                @click="update(template?.id)"
                            >
                                Update
                            </button>
                            <button
                                class="bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded mr-2"
                                @click="destory(template?.id)"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="my-2">
            <div class="mt-7">
                <Link
                    class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-2 rounded mr-2"
                    href="/dashboard"
                >
                    Back
                </Link>
            </div>
        </div>
    </div>
</template>
