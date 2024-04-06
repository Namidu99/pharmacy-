@extends('layouts.app')
 
@section('title', 'Show Customer')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">Customer Detail</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                {{ $customer->name }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Date of birth</label>
            <div class="mt-2">
                {{ $customer->dob }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Contact Number</label>
            <div class="mt-2">
                {{ $customer->number }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
                {{ $customer->email }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Address</label>
            <div class="mt-2">
                {{ $customer->address }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Disease information</label>
            <div class="mt-2">
                {{ $customer->info }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">History of medications taken</label>
            <div class="mt-2">
                {{ $customer->history }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection