@extends('layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    {{-- Flex container for title and button --}}
                    <div class="flex items-center justify-between">
                        <h6 class="mb-0 dark:text-white">Create New Role</h6>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-2 overflow-x-auto">
                        {{-- Add w-full to the table to ensure it takes full width of its parent --}}
                        <form method="POST" action="{{ route('roles.store') }}" role="form" autocomplete="off">
                            @csrf

                            <div class="mb-4">
                                <input id="name" name="name" type="name" required
                                    class="form-control @error('name') is-invalid @enderror placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="name" aria-label="name" autofocus />

                                @error('name')
                                <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-orange-600">
                                    nama roles tidak valid
                                    <button type="button" alert-close class="box-content absolute top-0 right-0 w-4 h-4 p-4 text-sm text-white bg-transparent border-0 rounded z-2">
                                        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <strong>Permission:</strong>
                                <br />
                                @foreach($permission as $value)
                                <label class="inline-flex items-center mt-2">
                                    {{-- Note: If you are using Laravel Collective's Form facade, keep 'Form::checkbox'. Otherwise, use standard HTML input type="checkbox". --}}
                                    {{-- Assuming $permission is an array of objects with 'id' and 'name' properties --}}
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-700">{{ $value->name }}</span>
                                </label>
                                <br />
                                @endforeach
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full px-5 py-2.5 mt-6 mb-2 font-bold text-white transition-all rounded-lg shadow-md bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:bg-slate-700">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection