@extends('layouts/authenticated')

@section('title')
    <title>{{ _('Account Information') }}</title>
@endsection

@section('section-title')
    {{ _('Show Account Information') }}
@endsection

@section('section-content')
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section class="flex flex-col gap-3">
            <div>
                <label for="username" class="block mb-2 text-sm text-gray-700 font-medium">
                    Username
                </label>
                <input type="text" id="username" value="{{ $user->username }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm text-gray-700 font-medium">
                    Email
                </label>
                <input type="email" id="email" value="{{ $user->email }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

            </div>            <div>
                <label for="first_name" class="block mb-2 text-sm text-gray-700 font-medium">
                    First Name
                </label>
                <input type="text" id="first_name" value="{{ $user->first_name }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

            </div>
            <div>
                <label for="middle_name" class="block mb-2 text-sm text-gray-700 font-medium">
                    Middle Name
                </label>
                <input type="text" id="middle_name" value="{{ $user->middle_name }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm text-gray-700 font-medium">
                    Last Name
                </label>
                <input type="text" id="last_name" value="{{ $user->last_name }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

            </div>
            <div>
                <label for="suffix" class="block mb-2 text-sm text-gray-700 font-medium">
                    Suffix
                </label>
                <input type="text" id="suffix" value="{{ $user->suffix }}" readonly
                    class="py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

            </div>
        </section>
    </div>
@endsection
