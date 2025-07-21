@extends('layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          {{-- Flex container for title and button --}}
          <div class="flex items-center justify-between">
            <h6 class="mb-0 dark:text-white">Role Management</h6>
            <a class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl from-emerald-500 to-teal-400 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25" href="{{ route('roles.create') }}">
              <i class="fas fa-plus"> </i>&nbsp;&nbsp;Create New Role
            </a>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-2 overflow-x-auto">
            {{-- Add w-full to the table to ensure it takes full width of its parent --}}
            <table id="example" class="display w-full">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-blue-700 to-cyan-500 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text" href="{{ route('roles.show',$role->id) }}"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Show</a>
                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-orange-500 to-yellow-500 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text" href="{{ route('roles.edit',$role->id) }}"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection