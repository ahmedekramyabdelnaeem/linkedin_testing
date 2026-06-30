@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-[#2557A7] px-8 py-4 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">تعديل المنشور</h3>
            <a href="{{ route('posts.index') }}" class="text-blue-100 hover:text-white text-sm font-bold">إلغاء</a>
        </div>

        <div class="p-8">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">محتوى المنشور</label>
                    <textarea name="content" rows="6" required
                              class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm resize-none">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">تغيير الصورة (اختياري)</label>
                    @if($post->image)
                        <div class="mb-4 relative w-32 h-32 rounded-lg overflow-hidden border border-gray-100">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover" alt="Current image">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                <span class="text-white text-[10px] font-bold">الحالية</span>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-[#2557A7] hover:file:bg-blue-100 transition-all">
                    @error('image')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full bg-[#2557A7] hover:bg-[#164081] text-white font-black py-4 rounded-full transition-all shadow-md hover:shadow-lg active:scale-[0.98]">
                    حفظ التعديلات
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
