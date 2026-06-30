@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Create Post Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="flex gap-4">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#2557A7] font-bold">
                {{ auth()->user() ? substr(auth()->user()->name, 0, 1) : 'U' }}
            </div>
            <div class="flex-1">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea name="content" rows="3" required
                              class="w-full border-none focus:ring-0 text-lg placeholder-gray-400 resize-none"
                              placeholder="ماذا يدور في ذهنك؟"></textarea>
                    
                    <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer text-gray-500 hover:text-[#2557A7] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm font-bold">صورة</span>
                            <input type="file" name="image" class="hidden" accept="image/*">
                        </label>
                        
                        <button type="submit" 
                                class="bg-[#2557A7] hover:bg-[#164081] text-white font-bold py-2 px-6 rounded-full transition-all shadow-sm">
                            نشر
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Posts List --}}
    <div class="space-y-6">
        @forelse($posts as $post)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#2557A7] font-bold">
                                {{ substr($post->user->name ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">{{ $post->user->name ?? 'غير معروف' }}</h4>
                                <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        
                        @can('update', $post)
                            <div class="flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}" class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap mb-4">{{ $post->content }}</p>
                    
                    @if($post->image)
                        <div class="rounded-lg overflow-hidden border border-gray-50 mb-4">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto object-cover max-h-96" alt="Post image">
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-white rounded-xl border border-dashed border-gray-200">
                <p class="text-gray-400 font-medium">لا توجد منشورات حتى الآن.</p>
            </div>
        @endforelse

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
