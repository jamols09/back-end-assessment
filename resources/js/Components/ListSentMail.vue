<script setup>
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    mails: {
        type: Array,
    },
});

const redirect = (id) => {
    router.get(`/sent/${id}`);
};
</script>

<template>
    <div>
        <h2>Sent mails</h2>
        <!-- <p class="text-gray-400">{# email #} - email & name only</p> -->
        <div class="my-2">
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
            <main class="flex flex-row h-screen">
                <div
                    class="w-1/5 h-full flex max-h-screen overflow-y-auto flex-col flex-grow"
                >
                    Count: {{ mails?.length ?? 0 }}
                    <div
                        class="max-w-sm p-3 my-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                        v-for="mail in mails"
                    >
                        <a href="#">
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                {{ mail.title }}
                            </h5>
                        </a>
                        <p
                            class="mb-3 font-normal text-gray-500 dark:text-gray-400"
                        >
                            {{
                                mail?.body.length < 90
                                    ? mail?.body
                                    : mail?.body.substring(0, 90) + "..."
                            }}
                        </p>
                        <div class="mx-1 my-1">
                            <Link
                                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-2 rounded mr-2"
                                @click="redirect(mail?.id)"
                            >
                                View {{ mail.id }}
                            </Link>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
