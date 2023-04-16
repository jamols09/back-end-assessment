<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";

defineProps({
    policy: String,
});
</script>

<template>
    <Head title="Privacy Policy" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>

                <div
                    class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose"
                >
                    <h2>Create Template</h2>
                    <p class="text-gray-400">{# email #} - email & name only</p>

                    <div class="my-2">
                        <label
                            for="price"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Title
                        </label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="my-2">
                        <label
                            for="price"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Body
                        </label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <textarea
                                type="text"
                                name="body"
                                id="body"
                                rows="10"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="my-2">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Upload file</label
                        >
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input"
                            type="file"
                        />
                    </div>
                    <div class="mt-7">
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded mr-2"
                        >
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
