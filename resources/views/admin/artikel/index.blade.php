@extends('layout.admin')

@section('container')
<div class="p-4 sm:ml-64">
      <div class="grid grid-cols-0 gap-0 mb-0">
         <div class="flex items-left relative justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
         <a href="/dashboard/ulasan/create" class="btn btn-primary mb-3">Create new ulasan</a>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ulasan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aproval
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ulasan as $ulasan)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$ulasan->nama}}
                        </th>
                        <td class="px-6 py-4">
                            {{$ulasan->email}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($ulasan->status)
                                <span class="font-medium text-green-600 dark:text-green-500">Approved</span>
                            @else
                                <span class="font-medium text-red-600 dark:text-red-500">Not Approved</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$ulasan->isi}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($ulasan->status)
                                <form action="{{ route('ulasan.notapprove', $ulasan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-6 py-4 font-medium text-red-600 dark:text-red-500 hover:underline">Don't Approve</button>
                                </form>
                            @else
                            <form action="{{ route('ulasan.approve', $ulasan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-6 py-4 font-medium text-green-600 dark:text-green-500 hover:underline">Approve</button>
                                </form>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection