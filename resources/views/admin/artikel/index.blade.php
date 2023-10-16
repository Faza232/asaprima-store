@extends('layout.admin')

@section('container')
<div class="p-4 sm:ml-64">
      <div class="grid grid-cols-0 gap-0 mb-0">
         <div class="flex items-left relative justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
         <a href="/dashboard/artikel/create" class="btn btn-primary mb-3">Create new artikel</a>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($artikel as $artikel)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{$artikel->title}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('artikel.edit', $artikel->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" style="display: inline;">
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