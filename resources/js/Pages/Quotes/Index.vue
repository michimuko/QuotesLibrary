<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head,Link } from '@inertiajs/vue3';

    const props = defineProps({
        quotes: Array
    });
</script>

<template>
    <Head title="名言一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">名言一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- グリッドレイアウトでカードを表示 -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="quote in quotes" :key="quote.id" 
                         class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4"
                         :style="{ borderColor: quote.preset_background?.theme_color || '#ccc' }">
                        
                        <!-- 名言本文 -->
                        <p class="text-lg font-medium text-gray-900 mb-4">
                            「{{ quote.content }}」
                        </p>

                        <!-- 作者名 -->
                        <div class="text-right text-gray-600 mb-4">
                            — {{ quote.author?.name || '不明' }}
                        </div>

                        <!-- 感情タグ -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span v-for="emotion in quote.emotions" :key="emotion.id"
                                  class="px-2 py-1 bg-gray-100 text-xs rounded-full text-gray-600">
                                #{{ emotion.name }}
                            </span>
                        </div>

                        <!-- 詳細へのリンク -->
                        <div class="flex justify-between items-center mt-4 border-t pt-4">
                            <span class="text-xs text-gray-400">投稿者: {{ quote.user?.name }}</span>
                            <Link :href="route('quotes.show', quote.id)" 
                                  class="text-blue-600 hover:text-blue-800 font-semibold">
                                詳細を見る
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>