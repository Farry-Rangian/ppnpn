@extends('layouts.app')



@section('content')

<div class="relative w-full mx-auto mt-60 ">

  <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-auto max-w-full px-3">
        <div class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
          <img src="{{asset('assets/img/team-1.jpg')}}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
        </div>
      </div>
      <div class="flex-none w-auto max-w-full px-3 my-auto">
        <div class="h-full">
          <h5 class="mb-1 dark:text-white">Sayo Kravits</h5>
          <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
        <div class="relative right-0">
          <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills role="tablist">
            <li class="z-30 flex-auto text-center">
              <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700" nav-link active href="javascript:;" role="tab" aria-selected="true">
                <i class="ni ni-app"></i>
                <span class="ml-2">App</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                <i class="ni ni-email-83"></i>
                <span class="ml-2">Messages</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-colors ease-in-out border-0 rounded-lg bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                <i class="ni ni-settings-gear-65"></i>
                <span class="ml-2">Settings</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w-full p-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Users Management</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">User</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Roles</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $user)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ ++$i }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $user->name }}</h6>
                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->email }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ $v }}</p>
                    @endforeach
                    @endif
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <a href="{{ route('users.show',$user->id) }}" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                      Show
                    </a>

                    <a href="{{ route('users.edit',$user->id) }}" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 ml-2">
                      Edit
                    </a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 cursor-pointer ml-2']) !!}
                    {!! Form::close() !!}
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

<div class="row">

  <div class="col-lg-12 margin-tb">

    <div class="pull-left">

      <h2>Users Management</h2>

    </div>

    <div class="pull-right">

      <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

    </div>

  </div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

  <tr>

    <th>No</th>

    <th>Name</th>

    <th>Email</th>

    <th>Roles</th>

    <th width="280px">Action</th>

  </tr>

  @foreach ($data as $key => $user)

  <tr>

    <td>{{ ++$i }}</td>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

    <td>

      @if(!empty($user->getRoleNames()))

      @foreach($user->getRoleNames() as $v)

      <label class="badge badge-success">{{ $v }}</label>

      @endforeach

      @endif

    </td>

    <td>

      <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

      {!! Form::close() !!}

    </td>

  </tr>

  @endforeach

</table>



{!! $data->render() !!}



<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>

@endsection