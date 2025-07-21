@extends('layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    {{-- Flex container for title and button --}}
                    <div class="flex items-center justify-between">
                        <h6 class="mb-0 dark:text-white">Create New User</h6>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-2 overflow-x-auto">
                        {{-- Add w-full to the table to ensure it takes full width of its parent --}}
                        <form method="POST" action="{{ route('users.store') }}" role="form" autocomplete="off">
                            @csrf

                            <div class="mb-4">
                                <input id="name" name="name" type="name" required
                                    class="form-control @error('name') is-invalid @enderror placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="name" aria-label="name" autofocus />

                                @error('name')
                                <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-orange-600">
                                    nama tidak valid
                                    <button type="button" alert-close class="box-content absolute top-0 right-0 w-4 h-4 p-4 text-sm text-white bg-transparent border-0 rounded z-2">
                                        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="email" name="email" type="email" required
                                    class="form-control @error('email') is-invalid @enderror placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none"
                                    email="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" aria-label="email" autofocus />

                                @error('email')
                                <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-orange-600">
                                    email tidak valid
                                    <button type="button" alert-close class="box-content absolute top-0 right-0 w-4 h-4 p-4 text-sm text-white bg-transparent border-0 rounded z-2">
                                        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input name="password" type="password" required
                                    class="form-control @error('email') is-invalid @enderror placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none"
                                    placeholder="Password" aria-label="Password" name="password" required autocomplete="current-password" />

                                @error('password')
                                <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-orange-600">
                                    email atau password salah
                                    <button type="button" alert-close class="box-content absolute top-0 right-0 w-4 h-4 p-4 text-sm text-white bg-transparent border-0 rounded z-2">
                                        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input name="confirm-password" type="password" required
                                    class="form-control placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none"
                                    placeholder="Confirm Password" aria-label="Confirm Password" autocomplete="new-password" />

                                {{-- You might also want a separate error message for confirm-password if validation fails --}}
                                {{-- @error('confirm-password')
                                <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-orange-600">
                                    Password konfirmasi tidak cocok.
                                    <button type="button" alert-close class="box-content absolute top-0 right-0 w-4 h-4 p-4 text-sm text-white bg-transparent border-0 rounded z-2">
                                        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                                    </button>
                                </div>
                                @enderror --}}
                            </div>

                            <div class="mb-4">
                                <strong>Role:</strong>
                                {{-- Assuming $roles is an array where keys are role IDs and values are role names --}}
                                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 px-3 text-gray-700 transition-all focus:border-blue-500 focus:outline-none', 'multiple']) !!}
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