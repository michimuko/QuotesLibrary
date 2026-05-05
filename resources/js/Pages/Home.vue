<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Headbar from '@/Components/Headbar.vue';

const props = defineProps({
    quotes: Array,
    // 本日の対決データをコントローラーから渡す想定（一旦モック）
    // dailyDebate: Object 
});
</script>

<template>
    <Head title="心を揺さぶる名言の対決" />

    <div class="bg-gray-50 min-h-screen font-sans">
        <!-- ナビゲーション -->
        <Headbar />

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            
            <!-- 本日の対決セクション -->
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 tracking-tight">本日の哲学バトル</h2>
                        <p class="text-gray-500 mt-1 font-medium">相反する二つの真理。あなたはどちらを信じますか？</p>
                    </div>
                    <div class="hidden sm:block">
                        <span class="bg-indigo-100 text-indigo-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                            残り 12時間
                        </span>
                    </div>
                </div>

                <div class="relative bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100">
                    <!-- VSラベル -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                        <div class="bg-gray-900 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl border-4 border-white animate-bounce">
                            <span class="text-xl font-black italic">VS</span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row min-h-[500px]">
                        <!-- 左側：結果主義 -->
                        <div class="flex-1 relative p-10 flex flex-col justify-between items-center text-center bg-gradient-to-br from-indigo-50 to-white">
                            <div class="mt-auto">
                                <i class="fas fa-quote-left text-indigo-200 text-5xl mb-6"></i>
                                <blockquote class="serif text-2xl md:text-3xl text-gray-800 leading-relaxed mb-6 font-serif">
                                    結果がすべてだ。<br>過程は敗者の言い訳に過ぎない。
                                </blockquote>
                                <cite class="not-italic text-indigo-600 font-bold tracking-widest">— 勝負師の格言</cite>
                            </div>
                            <div class="mt-auto pt-10 w-full max-w-xs">
                                <button class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-black py-4 rounded-2xl shadow-xl hover:scale-105 transition-transform">
                                    この言葉に救われた
                                </button>
                                <p class="mt-4 text-sm font-bold text-gray-400">現在の支持率: 62%</p>
                            </div>
                        </div>

                        <!-- 右側：過程主義 -->
                        <div class="flex-1 relative p-10 flex flex-col justify-between items-center text-center bg-gradient-to-bl from-purple-50 to-white border-t md:border-t-0 md:border-l border-gray-100">
                            <div class="mt-auto">
                                <i class="fas fa-quote-left text-purple-200 text-5xl mb-6"></i>
                                <blockquote class="serif text-2xl md:text-3xl text-gray-800 leading-relaxed mb-6 font-serif">
                                    神は細部に宿る。<br>プロセスこそが魂を磨く唯一の道だ。
                                </blockquote>
                                <cite class="not-italic text-purple-600 font-bold tracking-widest">— 芸術家の言葉</cite>
                            </div>
                            <div class="mt-auto pt-10 w-full max-w-xs">
                                <button class="w-full bg-white border-4 border-purple-500 text-purple-600 font-black py-4 rounded-2xl shadow-xl hover:bg-purple-500 hover:text-white transition-all">
                                    この言葉に救われた
                                </button>
                                <p class="mt-4 text-sm font-bold text-gray-400">現在の支持率: 38%</p>
                            </div>
                        </div>
                    </div>

                    <!-- サポート率ゲージ -->
                    <div class="h-4 bg-gray-100 flex">
                        <div class="h-full bg-indigo-500" style="width: 62%"></div>
                        <div class="h-full bg-purple-500" style="width: 38%"></div>
                    </div>
                </div>
            </section>

            <!-- お作法 -->
            <section class="mb-16 bg-white p-8 rounded-3xl border border-dashed border-gray-300 flex items-start gap-4">
                <div class="bg-amber-100 p-3 rounded-2xl">
                    <i class="fas fa-handshake text-amber-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-black text-gray-900">議論の「お作法」</h3>
                    <p class="text-gray-600 text-sm mt-1 leading-relaxed">
                        名言に正解はありません。相手の解釈を否定せず、「私はこう感じる」というメッセージで語り合いましょう。
                    </p>
                </div>
            </section>

            <!-- 名言グリッド（動的データ） -->
            <section>
                <h2 class="text-2xl font-black text-gray-900 mb-8">新着の救い</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="quote in quotes" :key="quote.id" 
                         class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-2 h-2 rounded-full" :style="{ backgroundColor: quote.preset_background?.theme_color || '#10b981' }"></div>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                                {{ quote.author ? '偉人の言葉' : 'ユーザーの言葉' }}
                            </span>
                        </div>
                        <p class="text-xl text-gray-800 leading-relaxed mb-8 font-serif">
                            「{{ quote.content }}」
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 overflow-hidden">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-600">{{ quote.author?.name || quote.user?.name }}</span>
                            </div>
                            <Link :href="route('quotes.show', quote.id)" class="text-gray-300 group-hover:text-pink-500 transition-colors">
                                <i class="fas fa-heart text-xl"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- フッター -->
        <footer class="bg-gray-900 text-white py-16 mt-20 text-center">
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-gray-900">
                    <i class="fas fa-book-open text-gray-900 text-166px]"></i>
                </div>
                <span class="text-2xl font-black">名言図書館</span>
            </div>
            <p class="text-gray-400 text-sm max-w-md mx-auto px-4">
                つらい時、迷った時、誰かの言葉があなたの背中を支えます。ここは、魂と魂が響き合う場所。
            </p>
        </footer>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&display=swap');
.font-serif {
    font-family: 'Noto Serif JP', serif;
}
</style>