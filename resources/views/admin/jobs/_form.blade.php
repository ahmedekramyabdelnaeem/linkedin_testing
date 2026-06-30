{{-- Shared form fields for create & edit --}}

<div class="space-y-5">

    

    {{-- Company --}}
    <div>
        <label for="company_id" class="block text-sm font-medium text-gray-700 mb-1">
            الشركة <span class="text-red-500">*</span>
        </label>
        <select id="company_id" name="company_id"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">-- اختر الشركة --</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}"
                    {{ old('company_id', $job->company_id ?? '') == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
        @error('company_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Title --}}
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
            المسمى الوظيفي <span class="text-red-500">*</span>
        </label>
        <input type="text" id="title" name="title"
               value="{{ old('title', $job->title ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
               placeholder="مثال: مطور Laravel">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
            الوصف الوظيفي <span class="text-red-500">*</span>
        </label>
        <textarea id="description" name="description" rows="4"
                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                  placeholder="اكتب وصفاً تفصيلياً للوظيفة...">{{ old('description', $job->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Location & Type --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                الموقع <span class="text-red-500">*</span>
            </label>
            <input type="text" id="location" name="location"
                   value="{{ old('location', $job->location ?? '') }}"
                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="مثال: القاهرة">
            @error('location')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                نوع الوظيفة <span class="text-red-500">*</span>
            </label>
            <select id="type" name="type"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- اختر النوع --</option>
                @foreach (['Full Time' => 'دوام كامل', 'Part Time' => 'دوام جزئي', 'Remote' => 'عن بُعد', 'Internship' => 'تدريب'] as $val => $label)
                    <option value="{{ $val }}"
                        {{ old('type', $job->type ?? '') === $val ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Salary --}}
    <div>
        <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">
            الراتب (اختياري)
        </label>
        <input type="number" id="salary" name="salary" min="0" step="0.01"
               value="{{ old('salary', $job->salary ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
               placeholder="مثال: 5000">
        @error('salary')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Requirements --}}
    <div>
        <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">
            المتطلبات <span class="text-red-500">*</span>
        </label>
        <textarea id="requirements" name="requirements" rows="4"
                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                  placeholder="اكتب متطلبات الوظيفة...">{{ old('requirements', $job->requirements ?? '') }}</textarea>
        @error('requirements')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

</div>
