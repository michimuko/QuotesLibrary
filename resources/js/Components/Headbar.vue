<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <Link href="/" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book-open text-white text-[16px]"></i>
                        </div>
                        <span class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">名言図書館</span>
                    </Link>
                </div>
                
                <div class="hidden md:flex space-x-8 text-sm font-bold text-gray-600">
                    <Link :href="route('quotes.index')" class="hover:text-indigo-600 transition">名言を探す</Link>
                    <!-- <Link :href="route('discussions.index')" class="hover:text-indigo-600 transition">議論に参加</Link>
                    <Link :href="route('rankings.index')" class="hover:text-indigo-600 transition">ランキング</Link> -->
                </div>

                <div class="flex items-center gap-4">
                    <template v-if="!$page.props.auth.user">
                        <Link :href="route('login')" class="text-sm font-bold text-gray-600 hover:text-indigo-600">ログイン</Link>
                        <Link :href="route('register')" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow-lg shadow-indigo-200 hover:opacity-90 transition">
                            新規登録
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>